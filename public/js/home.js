ps = document.getElementsByTagName("ul")[0];

function getIs(){
	i = document.getElementsByTagName("li");
}

var up = setInterval(
	function(){
		getIs();
		i[0].style.marginTop = '-50px';
		setTimeout(
			function(){
				i[0].style.marginTop = '0';
				ps.appendChild(i[0]);
			}, 500
		);
	}, 5000);
window.addEventListener("scroll", function(){
	var scroll = window.getScrollY();
	if(scroll < document.getElementById("top").clientHeight){
		document.getElementById("top").style.backgroundPositionY = -100 +  scroll/4 *(-1) + 'px';
	}
});
document.getElementsByClassName("goDown")[0].addEventListener("click", function(){
	var down = setInterval(function(){
		if (getScrollY() >= document.getElementById("center").offsetTop){clearInterval(down)}
		window.scroll(0, (getScrollY() + 10));
	}, 4);
});

document.getElementById("btnLogin").addEventListener("click", function(e){
	e.preventDefault();
	showForm(0)
});
document.getElementById("btnRegister").addEventListener("click", function(e){
	e.preventDefault();
	showForm(1)
});

function showForm(x){
	var black = document.createElement("DIV");
	black.className = "blackFront";
	document.body.appendChild(black);
	setTimeout(function(){
		document.getElementsByClassName("blackFront")[0].style.opacity = 1;
		document.getElementsByClassName("showUp")[x].style.display = 'block';
		if(x==1 && typeof mapTarget == 'undefined'){
			setMap("registerForm", 8);
			initMap();
		}
	}, 1);
}

function hideForm(x){
	document.getElementsByClassName("blackFront")[0].style.opacity = 0;
	document.getElementsByClassName("showUp")[x].style.display = 'none';
	setTimeout(function(){
		document.body.removeChild(document.getElementsByClassName("blackFront")[0]);
	}, 300);
}
function getScrollY(){
	return window.pageYOffset;
}
