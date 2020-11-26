let body_mode = (mode,valeur=0) => {
	document.body.classList.forEach(a => {
		a.indexOf('cadre_')==0 ? document.body.classList.remove(a) : 0
	});
	mode == '' ? 0 : (
		document.body.classList.add(mode),
		document.getElementsByName('form_id').forEach(a=>{a.value=""}),
		document.getElementsByName('form_nom').forEach(a=>{a.value=""}),
		document.getElementsByClassName("input_admin_id_"+mode).length>0?document.getElementsByClassName("input_admin_id_"+mode)[0].value=valeur:0,
		document.getElementsByClassName("input_admin_first_"+mode).length>0?document.getElementsByClassName("input_admin_first_"+mode)[0].focus():0
	);
}