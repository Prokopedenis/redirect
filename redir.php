<?php
	
	//редирект
	$shortlinks = parse_ini_file("test.ini"); // Получаем массив данных из INI-файла
	if(isset($_GET["r"]) && array_key_exists($_GET["r"], $shortlinks)) //если GET параметр из сгенерированной ссылки получен и существует в ini файле
	{
		header("Location: ".$shortlinks[$_GET["r"]]); // Делаем редирект
		exit; // Завершаем скрипт

	}
?>