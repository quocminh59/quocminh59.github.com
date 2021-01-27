document.addEventListener("DOMContentLoaded",function(){
	var menu = document.getElementsByClassName('menu');
	var quangcaoright = document.getElementsByClassName('quangcao-right');
	var quangcaonext = document.getElementsByClassName('next');
	var vitriquangcao = quangcaoright[0].offsetTop+20;
	var vitriquangcaonext = quangcaonext[0].offsetTop;
	var diemdung = vitriquangcao+vitriquangcaonext-100;
	window.addEventListener("scroll",function(){
		//Xu li cuon chuot voi menu
		if(window.pageYOffset > 100){
			menu[0].classList.add('menudungyen');
		}
		else{
			menu[0].classList.remove('menudungyen');
		}
		//Xu li quangcaoright
		if(window.pageYOffset > 100 && window.pageYOffset <diemdung){
			quangcaoright[0].classList.add('hienquangcao');
			quangcaoright[0].classList.remove('dungyen');
		}
		if(window.pageYOffset < 616 ){
			quangcaoright[0].classList.remove('hienquangcao');
			quangcaoright[0].classList.remove('dungyen');

		}
		if(window.pageYOffset >=diemdung){
			quangcaoright[0].classList.remove('hienquangcao');
			quangcaoright[0].classList.add('dungyen');
		}

	})

	
	
	
},false)