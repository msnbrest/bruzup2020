<?php

namespace sql_app;

use Exception;
use PDO;
use PDOException;

// - - -

class Controller
{
    // Fonction qui appelle la vue et y envoi les données
    public function include_page($fileName, $datas)
    {
        $file = "../prive_sql/views/". $fileName .".php";

        if (file_exists($file)) {
                ob_start();

                $datas;
                $content = ob_get_clean();
                require $file;

                return $content;
        } else {
            throw new Exception("Fichier '".$file."' introuvable");
        }
    }

    public function add(array $param)
    {
        $sellersRepository = new SellersRepository();
        $sellersRepository->addSeller($param);
        $datas = $sellersRepository->getAllSellers();
        $this->include_page("page_admin", $datas);
    }

    public function update(array $param)
    {
        $sellersRepository = new SellersRepository();
        $sellersRepository->updateSeller($param);
        $datas = $sellersRepository->getAllSellers();
        $this->include_page("page_admin", $datas);
    }

    public function delete(array $param)
    {
        $sellersRepository = new SellersRepository();
            $sellersRepository->deleteSeller($param);
        $datas = $sellersRepository->getAllSellers();
        $this->include_page("page_admin", $datas);
    }

    public function connect(array $param) // appelé par le post du php page_connect
    {
        $sellersRepository = new SellersRepository();

        include("../prive/mdp.php");// $login = ''; $password = ''; $password_add = "";

        if (isset($param["login"]) && $param["login"] === $login) {
            if (isset($param["password"]) && $param["password"] === $password) {
                //$param["password"].=$password_add;// add pour se co sur vrai bdd
                $datas = $sellersRepository->getAllSellers();
                $this->include_page("page_admin", $datas);
            } else {
                    header("Location: /admin_bdd/index.php");
                }
        } else {
            header("Location: /admin_bdd/index.php");
        }
    }

    public function index(array $param)// param=get & post
    {
        $sellersRepository = new SellersRepository();
        $datas = $sellersRepository->getAllSellers();
            if(!isset($param["page_precise"]) || $param["page_precise"]==""){
                $this->include_page("page_connect", $datas);
            }else{
                $this->include_page($param["page_precise"], $datas);
            }
    }

    public function super_admin(array $param)// param=get & post
    {
        if(isset($param["lfpf_query"])){
            $sellersRepository = new SellersRepository();
            echo "Le test: ".$param["lfpf_query"]."<br>\n";
            $datas = $sellersRepository->query_perso($param["lfpf_query"]);
            $this->include_page("page_admin_super", $datas);
        }else{
            echo"En cours de pas build.";
        }
    }

    public function public_commerce(array $param)// param=get & post
    {
        $sellersRepository = new SellersRepository();
        if(!isset($param["commerce_id"]) || $param["commerce_id"]=="" || !ctype_digit($param["commerce_id"])){
            // error commerce_id
            $datas = $sellersRepository->getAllSellers();
            $datas["error"] = "zero_commercant_found";
            $this->include_page("page_public_index", $datas);
        }else{
            $datas = $sellersRepository->getOneSeller($param["commerce_id"]);
            if(!$datas || count($datas)<0){
                // error select commerce_id
                $datas = $sellersRepository->getAllSellers();
                $datas["error"] = "zero_commercant_found";
                $this->include_page("page_public_index", $datas);
            }else{
                // afaire importer donnée de la table selon l'id du commerçant
                $this->include_page("page_public_commerce", $datas);
            }
        }
    }
}

// - - -

/*
chaque commerçant a : id(AI), nom, tel, mdp, commerce, adresse
    #    Nom     Type    Interclassement    Attributs    Null    Valeur par défaut    Commentaires    Extra    Action
    1    idPrimaire    int(3)        UNSIGNED    Non    Aucun(e)        AUTO_INCREMENT    Modifier Modifier    Supprimer Supprimer    
    2    nom    varchar(50)    utf8_bin        Oui    NULL            Modifier Modifier    Supprimer Supprimer    
*/

class SellersRepository
{
    protected $connection;

    public function __construct()
    {
        try {

            include("../prive/mdp.php");// $login = ''; $password = ''; $password_add = "";

            $this->connection = new PDO(
            'mysql:host='.$login.'.mysql.db;dbname='.$login,
            $login,
            $password.$password_add,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllSellers()
    {
        $sql = 'SELECT * FROM anc_commercants';
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query_perso(string $query)
    {
        $res = $this->connection->prepare($query);
        if(strpos($query, "drop table")===0){
echo"-drop-";
            return $res->execute();// pour autre
        }else{
echo"-select-";
            $res->execute();// pour du select
            return $res->fetchAll(PDO::FETCH_ASSOC);// pour du select
        }
    }

    public function getOneSeller(string $id)
    {
        $request = $this->connection->prepare("
                SELECT * FROM anc_commercants
                    WHERE id = :id");
        $request->bindValue(':id', $id, PDO::PARAM_STR);
        $request->execute();
        $datas = $request->fetch(PDO::FETCH_OBJ);
        return $datas;
    }

    public function addSeller(array $param)
    {
        $query = "INSERT INTO anc_commercants(nom) 
            VALUES(:nom)";
        $res = $this->connection->prepare($query);
        $res->bindValue(':nom', $param['form_nom'], PDO::PARAM_STR);
        $res->execute();
    }

    public function updateSeller(array $param)
    {
        $query = "UPDATE anc_commercants SET nom = :nom
            WHERE id = :id";
        $res = $this->connection->prepare($query);
        $res->bindValue(':id', $param['form_id'], PDO::PARAM_INT);
        $res->bindValue(':nom', $param['form_nom'], PDO::PARAM_STR);
        $task = $res->execute();
        return $task;
    }

    public function deleteSeller(array $param){
        if(isset($param['form_id']) || isset($param['form_id'])<0){
            $query = "DELETE FROM anc_commercants WHERE id = :id";
            $res = $this->connection->prepare($query);
            $res->bindValue(':id', $param['form_id'], PDO::PARAM_INT);
            return $res->execute();
        }else{
            echo"Erreur, id commerçant non reconnu";//client_error
        }
    }
}