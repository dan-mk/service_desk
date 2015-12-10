function abrir(id_box){
	id_box = document.getElementById(id_box);
	if(id_box.clientHeight == 0){
		id_box.style.height = id_box.scrollHeight + "px";
		setTimeout(function(){ id_box.style.height = "auto"; }, 300);
	}else{
		id_box.style.height = id_box.scrollHeight + "px";
		id_box.clientHeight;
		id_box.style.height = 0;
	}
}