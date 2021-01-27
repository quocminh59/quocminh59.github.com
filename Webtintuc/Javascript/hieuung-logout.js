document.addEventListener("DOMContentLoaded",function(){
	//Xu ly hieu ung dang nhap
	var nutdangnhap = document.getElementsByClassName('btnlogin');
	var nuttat = document.getElementsByClassName('close');
	var nutchuyen = document.getElementsByClassName('chuyen');
	var phandn = document.getElementsByClassName('phandn');
	var phandk = document.getElementsByClassName('phandk');
	var vungdangnhap = document.getElementsByClassName('wrap-dangnhap');
	var vungden = document.getElementsByClassName('vungden');
	var chophep = 'dk';
	nutchuyen[0].onclick = function(){
		nutchuyen[0].classList.add('dn');
		nutchuyen[0].classList.remove('mautoi');
		nutchuyen[1].classList.remove('mautrang');
		if(chophep == "dn"){
			phandn[0].classList.remove('bienmat');
			phandk[0].classList.remove('xuathien');
			phandk[0].classList.add('bienmat');
			chophep = "dk";
		}
		
	}
	nutchuyen[1].onclick = function(){
		nutchuyen[0].classList.remove('dn');
		nutchuyen[0].classList.add('mautoi');
		nutchuyen[1].classList.add('mautrang');
		if(chophep == "dk"){
			phandn[0].classList.add('bienmat');
			phandk[0].classList.remove('bienmat');
			phandk[0].classList.add('xuathien');
			chophep = "dn";
		}
		
	}

	nutdangnhap[0].onclick = function(){
		vungdangnhap[0].classList.add('dnxuathien');
		vungden[0].classList.add('vungdenxuathien');
	}
	nuttat[0].onclick = function(){
		vungdangnhap[0].classList.remove('dnxuathien');
		vungden[0].classList.remove('vungdenxuathien');
	}
},false)