let body_mode = (mode,valeur) => {
	document.body.classList.forEach(a => {
		a.indexOf('cadre_')==0 ? document.body.classList.remove(a) : 0
	});
	mode == '' ? 0 : (
		document.body.classList.add(mode),
		document.getElementsByName('form_id').forEach(a=>{a.value=""}),
		document.getElementsByName('form_nom').forEach(a=>{a.value=""})
	);
}