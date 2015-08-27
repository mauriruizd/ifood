InfoWindows = [];
radios = [];
function setMap(divID, child){
	var mapDiv = document.createElement("DIV");
	mapDiv.id = "geoloc";
	document.getElementById(divID).insertBefore(mapDiv, document.getElementById(divID).childNodes[child]);
	mapTarget = document.getElementById("geoloc");
	var lat = createHiddenField("formLat");
	var lng = createHiddenField("formLng");
	document.getElementById(divID).insertBefore(lat, document.getElementById(divID).childNodes[child]);
	document.getElementById(divID).insertBefore(lng, document.getElementById(divID).childNodes[child]);
}
function initMap(circle){
	var mapOptions = {
		zoom : 15
	}
	map = new google.maps.Map(mapTarget, mapOptions);
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(pos){
			var geoPosition = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
			var posicionPosible = new google.maps.InfoWindow({
				map : map,
				position : geoPosition,
				content : 'Te encontramos! Si no estás aquí, clica en la ubicación correcta!'
			});
			InfoWindows.push(posicionPosible);
			map.setCenter(geoPosition);
			saveLatLng(geoPosition);
		}, function(){
				//Error en la geolocalizacion
				noGeoloc(true);
		});
	} else {
		//Sin soporte para geolocalizacion
		noGeoloc(false);
	}
	google.maps.event.addListener(map, 'click', function(e){
		setInfo(e.latLng);
		saveLatLng(e.latLng);
	});
	if (typeof circle != 'undefined' && circle == true){
		google.maps.event.addListener(map, 'tilesloaded', function(){
			circleIt(InfoWindows[0].position, document.getElementById("radio_delivery").value);
		});
		
		google.maps.event.addListener(map, 'click', function(e){
			circleIt(e.latLng, document.getElementById("radio_delivery").value);
		});
	}
}

function noGeoloc(bool){
	if(bool){
		var content = "Falló la geolocalizacion. Podrías clicar en tu dirección?";
	} else {
		var content = "El navegador no soporta geolocalizacion. Podrías clicar en tu dirección?";
	}
	var options = {
		map : map,
		position : new google.maps.LatLng(-25.511089, -54.612078),
		content : content
	}
	var noPosicion = new google.maps.InfoWindow(options);
	InfoWindows.push(noPosicion);
	map.setCenter(options.position);
}
function setInfo(pos, msg){
	if(typeof msg == 'undefined'){
		msg = "Entonces es esta";
	}
	clearInfos();
	var newPosition = new google.maps.InfoWindow({
			map : map,
			position : pos,
			content : msg
		});
	InfoWindows.push(newPosition);
	saveLatLng(pos);
}
function clearInfos(){
	for (var k=0; k < InfoWindows.length; k++){
		InfoWindows[k].close();
	}
}
function saveLatLng(pos, googlePos){
	document.getElementById("formLat").value = pos.A;
	document.getElementById("formLng").value = pos.F;	
}
function createHiddenField(inputID){
	var newEl = document.createElement("INPUT");
	newEl.id = inputID;
	newEl.name = inputID;
	newEl.type = "hidden";
	return newEl;
}
//Circulo para el radio
function circleIt(pos, radius){
	clearCircles();
	circleOptions = {
		strokeColor : "#8A0808",
		strokeOpacity : 0.8,
		strokeWeight : 0.5,
		fillColor : "#8A0808",
		fillOpacity : 0.5,
		map : map,
		center : pos,
		radius : radius*1000,
	};
	var radio = new google.maps.Circle(circleOptions);
	radios.push(radio);
}

function clearCircles(){
	for(var i=0; i < radios.length; i++){
		radios[i].setMap(null);
	}
}

function changeRadius(newRadius){
	circleIt(radios[radios.length].center, newRadius);
}