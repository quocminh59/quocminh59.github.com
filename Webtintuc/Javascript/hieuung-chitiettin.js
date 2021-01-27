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

	// Xu ly quang cao
	var pages = document.getElementsByClassName('pages');
	var qc = document.getElementById('qc');
	var height_tin = $(pages).height();
	var diemdung = height_tin -  1000;
	window.addEventListener("scroll",function(){
		console.log(window.pageYOffset);
		//Xu li quangcaoright
		if(window.pageYOffset > 1500 && window.pageYOffset <diemdung){
			qc.classList.add('hienquangcao');
			qc.classList.remove('dungyenkhac');
		}
		if(window.pageYOffset < 700 ){
			qc.classList.remove('hienquangcao');
			qc.classList.remove('dungyenkhac');

		}
		if(window.pageYOffset >diemdung){
			qc.classList.remove('hienquangcao');
			qc.classList.add('dungyenkhac');
		}
		
	})
},false)