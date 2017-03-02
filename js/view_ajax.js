$.ajax({
	type: "GET",
	url: "/php/wrap/view/view_request.php",
	dataType: "text",
	//data: "",
	success: function(data){
		data = JSON.parse(data);

		var output="";
		for (var i in data.users) {
			output+="<tr><td><p>" +
			data.users[i].firstName + "</p></td><td><p>" +
			data.users[i].lastName + "</p></td><td><p>" +
			data.users[i].middleName + "</p></td><td><p>" +
			data.users[i].phone + "</p></td><td><p>" +
			data.users[i].emailName + "</p></td><td><p>" +
			data.users[i].countryId + "</p></td><td><p>" +
			data.users[i].city_id + "</p></td><td><h6>" +
			data.users[i].commentName + "</h6></td><td><p>" +
			"<input type='button' value='Удалить' onclick='deleteRow(this)' id=" + data.users[i].id + ">" +"</p></td></tr>";
		}
		document.getElementById("placeholder").innerHTML=output;
	},
	error: function(){
		alert('Errors');
	}
});

function deleteRow(r) {
	var i=r.parentNode.parentNode.parentNode.rowIndex;
	var text = document.getElementsByTagName("input")[i-1];
	var val = text.id;

	document.getElementById('myTable').deleteRow(i);

	jQuery.ajax({
		type: "POST", // HTTP метод  POST или GET
		url: "/php/wrap/view/delete_user.php", //url-адрес, по которому будет отправлен запрос
		dataType:"text", // Тип данных
		data: {
			"user_id": val
		}, //post переменные
		success:function(response){
			// в случае успеха, скрываем, выбранный пользователем для удаления, элемент
			alert("Запись удалена.");
		},
		error:function (xhr, ajaxOptions, thrownError){
			//выводим ошибку
			alert(thrownError);
		}
	});
}