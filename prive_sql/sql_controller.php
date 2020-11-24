<?php

namespace sql_app;

use Exception;
use PDO;
use PDOException;

// - - -

class Controller
{
    // Requ�te entrante
    protected $request = array();

    // Action � r�aliser
    protected $action = array();

    protected $file = "";

    // Fonction qui appelle la vue et y envoi les donn�es
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
            throw new Exception("Fichier '$file' introuvable");
        }
    }


    // M�morisation de la requ�te entrante
    public function setRequest($request)
    {
        $this->request = $request;
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

    public function connect(array $param) // appel� par le post du php page_connect
    {
        $sellersRepository = new SellersRepository();

        include("../prive/mdp.php");// $login = ''; $password = ''; $password_add = "";

        if (isset($param["login"]) && $param["login"] === $login) {
            if (isset($param["password"]) && $param["password"] === $password) {
                //$param["password"].=$password_add;// add pour se co sur vrai bdd
                $datas = $sellersRepository->getAllSellers();
                $this->include_page("page_admin", $datas);
            }
        } else {
            header("Location: /admin_bdd/index.php");
        }
    }

    // envoi vers la page visiteur
    public function index(array $param)
    {
        $sellersRepository = new SellersRepository();
        $datas = $sellersRepository->getAllSellers();
			if(!isset($param["page_precise"]) || $param["page_precise"]==""){
				$this->include_page("page_connect", $datas);
			}else{
				$this->include_page($param["page_precise"], $datas);
			}
    }
}

// - - -

class Database
{
    protected $connection;

    public function __construct()
    {
        try {
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
}

// - - -

/*
	#	Nom 	Type	Interclassement	Attributs	Null	Valeur par d�faut	Commentaires	Extra	Action
	1	idPrimaire	int(3)		UNSIGNED	Non	Aucun(e)		AUTO_INCREMENT	Modifier Modifier	Supprimer Supprimer	
	2	nom	varchar(50)	utf8_bin		Oui	NULL			Modifier Modifier	Supprimer Supprimer	
*/

class SellersRepository extends Database
{

    public function getAllSellers()
    {
        $sql = 'SELECT * FROM `anc_commercants`';
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneSeller(int $id)
    {
        $request = $this->connection->prepare("
                SELECT * FROM anc_commercants
                    WHERE $id = :$id  ");
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();
        $datas = $request->fetch(PDO::FETCH_OBJ);
        return $datas;
    }

    public function addSeller(array $param)
    {
/*
        $query = "INSERT INTO sellers(seller_name, seller_fisrtname, company, adress, postal_code, city, 
                    product, category, phone, cellphone, mail, website, social_media, picture) 
                    VALUES(:seller_name, :seller_fisrtname, :company, :adress, :postal_code, :city, :product,
                           :category, :phone, :cellphone, :mail, :website, :social_media, :picture)";
        $res = $this->connection->prepare($query);
        $res->bindValue(':seller_name', $param['seller_name'], PDO::PARAM_STR);
        $res->bindValue(':seller_fisrtname', $param['seller_fisrtname'], PDO::PARAM_STR);
        $res->bindValue(':company', $param['company'], PDO::PARAM_STR);
        $res->bindValue(':adress', $param['adress'], PDO::PARAM_STR);
        $res->bindValue(':postal_code', $param['postal_code'], PDO::PARAM_STR);
        $res->bindValue(':city', $param['city'], PDO::PARAM_STR);
        $res->bindValue(':product', $param['product'], PDO::PARAM_STR);
        $res->bindValue(':category', $param['category'], PDO::PARAM_STR);
        $res->bindValue(':phone', $param['phone'], PDO::PARAM_STR);
        $res->bindValue(':cellphone', $param['cellphone'], PDO::PARAM_STR);
        $res->bindValue(':mail', $param['mail'], PDO::PARAM_STR);
        $res->bindValue(':website', $param['website'], PDO::PARAM_STR);
        $res->bindValue(':social_media', $param['social_media'], PDO::PARAM_STR);
        $res->bindValue(':picture', $param['picture'], PDO::PARAM_STR);
*/
        $query = "INSERT INTO anc_commercants(nom) 
                    VALUES(:nom)";
        $res = $this->connection->prepare($query);
        $res->bindValue(':nom', $param['form_nom'], PDO::PARAM_STR);
        $res->execute();
    }

    public function updateSeller(array $param)
    {
/*
        $query = "UPDATE sellers SET seller_name = :seller_name, seller_fisrtname = :seller_fisrtname, 
                   company = :company, adress = :adress, postal_code = :postal_code, city = :city,
                   product = :product, category = :category, phone = :phone, cellphone = :cellphone,
                   mail = :mail, website = :website, social_media = :social_media, picture = :picture
                   WHERE id = :id";
        $res = $this->connection->prepare($query);
        $res->bindValue(':id', $param['id'], PDO::PARAM_INT);
        $res->bindValue(':seller_name', $param['seller_name'], PDO::PARAM_STR);
        $res->bindValue(':seller_fisrtname', $param['seller_fisrtname'], PDO::PARAM_STR);
        $res->bindValue(':company', $param['company'], PDO::PARAM_STR);
        $res->bindValue(':adress', $param['adress'], PDO::PARAM_STR);
        $res->bindValue(':postal_code', $param['postal_code'], PDO::PARAM_STR);
        $res->bindValue(':city', $param['city'], PDO::PARAM_STR);
        $res->bindValue(':product', $param['product'], PDO::PARAM_STR);
        $res->bindValue(':category', $param['category'], PDO::PARAM_STR);
        $res->bindValue(':phone', $param['phone'], PDO::PARAM_STR);
        $res->bindValue(':cellphone', $param['cellphone'], PDO::PARAM_STR);
        $res->bindValue(':mail', $param['mail'], PDO::PARAM_STR);
        $res->bindValue(':website', $param['website'], PDO::PARAM_STR);
        $res->bindValue(':social_media', $param['social_media'], PDO::PARAM_STR);
        $res->bindValue(':picture', $param['picture'], PDO::PARAM_STR);
*/
        $query = "UPDATE anc_commercants SET nom = :nom
                   WHERE id = :id";
        $res = $this->connection->prepare($query);
        $res->bindValue(':id', $param['form_id'], PDO::PARAM_INT);
        $res->bindValue(':nom', $param['form_nom'], PDO::PARAM_STR);
        $task = $res->execute();
        return $task;
    }

	public function deleteSeller(array $param){
		if(isset($param['form_id'])||isset($param['form_id'])<0){
			$query = "DELETE FROM anc_commercants WHERE id = :id";
			$res = $this->connection->prepare($query);
			$res->bindValue(':id', $param['form_id'], PDO::PARAM_INT);
			return $res->execute();
		}else{
			echo"Erreur, id commer�ant non reconnu";//client_error
		}
	}
}