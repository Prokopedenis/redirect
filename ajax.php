<?php
	//обработка входящей ссылки
	if(isset($_GET["q"]))
	{
		$q = $_REQUEST["q"];

		if(isset($_GET["e"])) //проверяем наличие желаемого вида для ссылки
		{
			$e = $_REQUEST["e"];
			$site = "https://prokopedenis.000webhostapp.com/redir.php"; //Адрес страницы с редиректом 
			$rand = "?r=".$e;
			$url_to_write = $e."=".$q;
	
			echo "<a href='$site$rand' target='_blank'>$site$rand</a>"; //выводим пользователю ссылку, в виде ссылки
			$fp = fopen("test.ini", "a"); // Открываем файл в режиме записи. ini файл используется для лёгкого парса стандартной функцией
			$test = fwrite($fp, $url_to_write.PHP_EOL); // Запись в файл
			fclose($fp); //Закрываем файл
		}
		else //случайная ссылка
		{
			$h = "QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm1234567890"; //Выбираем символы, из которых будет состоять наш рандом
			$rand2 = substr(str_shuffle($h), 0, 5); //создаём ранд длиной в 5 символов
			$rand = "?r=".$rand2;
			$site = "https://prokopedenis.000webhostapp.com/redir.php";  
			$url_to_write = $rand2."=".$q;

			
			echo "<a href='$site$rand' target='_blank'>$site$rand</a>"; 
			$fp = fopen("test.ini", "a");  
			$test = fwrite($fp, $url_to_write.PHP_EOL); 
			fclose($fp); 
		}	
	}
	
	
?>