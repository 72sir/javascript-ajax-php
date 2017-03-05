
$(document).ready(function(){
	// по умолчанию заносим пустоту
	var validLastName = false;
	var validFirstName = false;
	var validMiddleName = false;
	var validPhoneName = false;
	var validEmailName = false;
	var validCommentName = false;
	var validRegionName = false;

	// Передаем событие
	$("form").submit(function(event){
		// Перекрываем отправку для проверку полей на коррректность
		event.preventDefault();

		var lastName = $("#lastName").val();
		var firstName = $("#firstName").val();
		var middleName = $("#middleName").val();
		var phoneName = $("#phoneName").val();
		var emailName = $("#emailName").val();
		var commentName = $("#commentName").val();
		var country = $("#country").val();
		var city = $("#region").val();

		var patternName = /^[A-Za-zА-Яа-яЁё]{2,20}$/;
		var patternPhone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
		var patternEmail = /^[-._A-Za-z0-9]+@(?:[A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/;

		//если значение пустое то добавляем красную рамку и крестик
		if (lastName == "" || patternName.test(lastName) == false) {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#lastName').parent().removeClass("has-success").addClass("has-error");
			validLastName = false;
		} else {
			$('#lastName').parent().removeClass("has-error").addClass("has-success");
			validLastName = true;
		}

		if (firstName == ""  || patternName.test(lastName) == false) {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#firstName').parent().removeClass("has-success").addClass("has-error");
			validFirstName = false;
		} else {
			$('#firstName').parent().removeClass("has-error").addClass("has-success");
			validFirstName = true;
		}

		if (middleName == ""  || patternName.test(lastName) == false) {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#middleName').parent().removeClass("has-success").addClass("has-error");
			validMiddleName = false;
		} else {
			$('#middleName').parent().removeClass("has-error").addClass("has-success");
			validMiddleName = true;
		}

		if (phoneName == ""  || patternPhone.test(phoneName) == false) {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#phoneName').parent().removeClass("has-success").addClass("has-error");
			validPhoneName = false;
		} else {
			$('#phoneName').parent().removeClass("has-error").addClass("has-success");
			validPhoneName = true;
		}

		if (emailName == ""  || patternEmail.test(emailName) == false) {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#emailName').parent().removeClass("has-success").addClass("has-error");
			validEmailName = false;
		} else {
			$('#emailName').parent().removeClass("has-error").addClass("has-success");
			validEmailName = true;
		}

		if (commentName == "") {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#commentName').parent().removeClass("has-success").addClass("has-error");
			validCommentName = false;
		} else {
			$('#commentName').parent().removeClass("has-error").addClass("has-success");
			validCommentName = true;
		}

		if (country == "0") {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#country').parent().removeClass("has-success").addClass("has-error");
			validRegionName = false;
		} else {
			$('#country').parent().removeClass("has-error").addClass("has-success");
			validRegionName = true;
		}

		if (country == "0") {
			// обращаемся к родителю и убираем класс все ок и добавляем ошибку
			$('#region').parent().removeClass("has-success").addClass("has-error");
			validRegionName = false;
		} else {
			$('#region').parent().removeClass("has-error").addClass("has-success");
			validRegionName = true;
		}

		// Проверяем все переменные
		if (validLastName == true && validFirstName == true && validMiddleName == true && validPhoneName == true &&
				validEmailName == true && validRegionName == true) {
			// если все хорошо то можно отсылать данные
			$("form").unbind('submit').submit();

			$.ajax({
				type: "POST", // HTTP метод  POST или GET
				url: "/www/controllers/comment_save.php", //url-адрес, по которому будет отправлен запрос
				dataType: "text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
				data: {
					"lastName": lastName,
					"firstName": firstName,
					"middleName": middleName,
					"phoneName": phoneName,
					"emailName": emailName,
					"commentName": commentName,
					"country": country,
					"city": city
				}, //данные, которые будут отправлены на сервер (post переменные)
				success:function(response){
					alert("data " + data);
					alert("save comment");
					location.href="/view.html"
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert("data " + data);
					alert("Error save comment: " + ajaxOptions + ", thrownError: " + thrownError);
					location.href="/comment.html"
				}
			});
		}
	})
});