document.addEventListener("DOMContentLoaded",function(){
	var nuttamgiac = document.getElementsByClassName('fa-caret-down');
	console.log(nuttamgiac);
	var list = document.getElementsByClassName('list-group');
	var dem = 1;
	nuttamgiac[0].onclick = function(){
		
			list[0].classList.toggle('listhienlen');
		
		
	}
},false)