document.addEventListener("DOMContentLoaded",function(){
	var menu = document.getElementsByClassName('menu');
	
	window.addEventListener("scroll",function(){
		console.log(window.pageYOffset);
		//Xu li cuon chuot voi menu
		if(window.pageYOffset > 100){
			menu[0].classList.add('menudungyen');
		}
		else{
			menu[0].classList.remove('menudungyen');
		}
	})
},false)