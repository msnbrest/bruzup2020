let body_mode = (mode,valeur={}) => {
	document.body.classList.forEach(a => {
		a.indexOf('cadre_')==0 ? document.body.classList.remove(a) : 0
	});
	mode == '' ? 0 : (
		document.body.classList.add(mode),
		document.getElementsByName('form_id').forEach(a=>{a.value=""}),
		document.getElementsByName('form_nom').forEach(a=>{a.value=""}),
		document.getElementsByClassName("input_admin_id_"+mode).length>0?document.getElementsByClassName("input_admin_id_"+mode)[0].value=valeur.id:0,
		document.getElementsByClassName("input_admin_first_"+mode).length>0?document.getElementsByClassName("input_admin_first_"+mode)[0].focus():0,
		mode=="cadre_modifier"?(
			document.getElementsByClassName("input_admin_first_cadre_modifier").length>0?document.getElementsByClassName("input_admin_first_cadre_modifier")[0].value=valeur.nom:0,
			document.getElementsByClassName("input_admin_categorie_cadre_modifier").length>0?document.getElementsByClassName("input_admin_categorie_cadre_modifier")[0].value=valeur.categorie:0,
			document.getElementsByClassName("input_admin_mdp_cadre_modifier").length>0?document.getElementsByClassName("input_admin_mdp_cadre_modifier")[0].value=valeur.mdp:0,
			document.getElementsByClassName("input_admin_liens_cadre_modifier").length>0?document.getElementsByClassName("input_admin_liens_cadre_modifier")[0].value=valeur.liens:0,
			document.getElementsByClassName("input_admin_description_cadre_modifier").length>0?document.getElementsByClassName("input_admin_description_cadre_modifier")[0].value=valeur.description:0,
			document.getElementsByClassName("input_admin_email_cadre_modifier").length>0?document.getElementsByClassName("input_admin_email_cadre_modifier")[0].value=valeur.email:0,
			document.getElementsByClassName("input_admin_tels_cadre_modifier").length>0?document.getElementsByClassName("input_admin_tels_cadre_modifier")[0].value=valeur.tels:0,
			document.getElementsByClassName("input_admin_adresse_cadre_modifier").length>0?document.getElementsByClassName("input_admin_adresse_cadre_modifier")[0].value=valeur.adresse:0,
			document.getElementsByClassName("input_admin_codepostal_cadre_modifier").length>0?document.getElementsByClassName("input_admin_codepostal_cadre_modifier")[0].value=valeur.codepostal:0,
			document.getElementsByClassName("input_admin_ville_cadre_modifier").length>0?document.getElementsByClassName("input_admin_ville_cadre_modifier")[0].value=valeur.ville:0
		):0
	);
},

rechercher=(value)=>{

if(value==""){
	let list=document.getElementsByClassName("search_result_wait");
	for(let i0=0;i0<list.length;i0++){ list[i0].classList.add("searched") }
}else{
	let list=document.getElementsByClassName("search_result_wait");
	for(let i0=0;i0<list.length;i0++){ list[i0].classList.remove("searched") }
	list=document.getElementsByClassName("searchable");
	for(let i0=0;i0<list.length;i0++){ list[i0].innerHTML.toLowerCase().indexOf(value)<0 ? 0 : list[i0].parentElement.classList.contains("searched") ? 0 : list[i0].parentElement.classList.add("searched") }
}

}; (meme_1)