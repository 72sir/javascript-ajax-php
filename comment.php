<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" content="text/html">
	<title>Комментарии</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script type="text/javascript" src="/js/comment_ajax_view_all_region.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<h1>Ваш комментарий</h1>
			<?php
                require __DIR__ . '/php/models/comment.php';

                echo comment_viewAllRegion();
                return comment_viewAllRegion();
            ?>
			<form>
				<div class="form-group has-feedback lastNameBlock">
					<label class="control-label" for="lastName">Фамилия</label>
					<input type="text" class="form-control" placeholder="Иванов" id="lastName"
						   aria-describedby="inputSuccess2Status">
				</div>
				<div class="form-group has-feedback firstNameBlock">
					<label class="control-label" for="firstName">Имя</label>
					<input type="text" class="form-control" placeholder="Иван" id="firstName"
						   aria-describedby="inputSuccess2Status">
				</div>
				<div class="form-group has-feedback middleNameBlock">
					<label class="control-label" for="middleName">Отчество</label>
					<input type="text" class="form-control" placeholder="Иванович" id="middleName"
						   aria-describedby="inputSuccess2Status">
				</div>
				<div class="form-group has-feedback middleNameBlock">
					<label class="control-label" for="country_id">Регион проживания</label>
					<select name="country_id" id="country_id" class='form-control'>
						<option value="0" >- выберите страну -</option>
					</select>
				</div>
				<div class='form-group has-feedback cityBlock'>
					<label class='control-label' for="region_id">Город проживания</label>
					<select name="region_id" id="region_id" disabled="disabled"  class='form-control'>
						<option value="0">- выберите город -</option>
					</select>
				</div>
				<div class="form-group has-feedback phoneNameBlock">
					<label class="control-label" for="phoneName">Контактный телефон</label>
					<input type="text" class="form-control" placeholder="+7(999)1234567"  id="phoneName"
						   aria-describedby="inputSuccess2Status">
				</div>
				<div class="form-group has-feedback emailNameBlock">
					<label class="control-label" for="emailName">Email</label>
					<input type="text" class="form-control" id="emailName" placeholder="email@email.com"
						   aria-describedby="inputSuccess2Status">
				</div>
				<div class="form-group has-feedback commentNameBlock">
					<label class="control-label" for="commentName">Оставьте свой комментарий</label>
					<textarea type="text" class="form-control" id="commentName" placeholder="Ваш комментарий"
							  aria-describedby="inputSuccess2Status"></textarea	>
				</div>
				<button class="btn btn-success btn-lg" type="submit">Отправить</button>
			</form>
			<br>
			<br>
			<a class="btn btn-default" href="/stat.html" role="button">Статистика комментариев</a>
			<a class="btn btn-default" href="/comment.html" role="button">Добавить комментарий</a>
			<br>
			<br>
			<br>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/js/comment_ajax_download_the_list_of_cities_in_the_region.js"></script>
	<script type="text/javascript" src="/js/comment_form_validation_function_and_save_true_result.js"></script>
	
</body>
</html>


