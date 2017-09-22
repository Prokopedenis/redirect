<?php
	
	//редирект
	$shortlinks = parse_ini_file("test.ini"); // Получаем массив данных из INI-файла
$yes_ravno=str_replace("ravnoo", "=", $_GET["r"]);
	if(isset($_GET["r"]) && array_key_exists($yes_ravno, $shortlinks)) //если GET параметр из сгенерированной ссылки получен и существует в ini файле
	{
		header("Location: ".$shortlinks[$_GET["r"]]); // Делаем редирект
		exit; // Завершаем скрипт

	}
?>