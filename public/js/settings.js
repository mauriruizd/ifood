$('.btn-check').on('click', function(){
	var data = getData($(this), 'update');
	sendData(data);
}).hover(function(){
	$(this).addClass('red');
}, function(){
	$(this).removeClass('red');
});

$('.btn-delete').on('click', function(){
	var data = getData($(this), 'delete');
	sendData(data);
}).hover(function(){
	$(this).addClass('red');
}, function(){
	$(this).removeClass('red');
});
function getData(element, action){
	var parent = element.closest('p');
	var data = {
		nombre : parent.children('.nombre').val(),
		direccion : parent.children('.direccion').val(),
		codigo : parent.children('.codigo').val(),
		url : null
	}
	data.url = '{{ URL::to("/") }}/settings/' + action + '/direccion/';
	return data;
}
function sendData(data){
	data._token = $('#_token').val();
	$.ajax({
		type : 'POST',
		url : data.url,
		data : data,
		success : function(data){
			var response = JSON.parse(data);
			if(response.status != 200){
				window.alert('Error al actualizar direccion!');
				return;
			}
			location.reload();
		}
	});
}