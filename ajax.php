<?php

	try 
	{
		$dsn = "mysql:host=localhost;dbname=redir_url;charset=utf8";
		$pdo = new PDO($dsn, "root", "vertrigo");
	} 
	catch (PDOException $error) 
	{
		print "Error!: " . $error->getMessage() . "<br/>";
		die();
	}
	
	//обработка входящей ссылки
	if(isset($_GET["q"]))
	{
		$q = $_REQUEST["q"];

		if(isset($_GET["e"])) //проверяем наличие желаемого вида для ссылки
		{
			$e = $_REQUEST["e"];
			
			$stmt=$pdo->query("SELECT COUNT(*) AS LLL FROM links l WHERE l.NewLink='".$e."'");
			$row = $stmt->fetch();
			if($row['LLL']==0) //если ссылка уже есть в базе, выводим соответсвующее сообщение
			{
				$pdo->query("INSERT links (NewLink, Link) VALUES ('".$e."', '".$q."')"); //добавляем в базу
				$pdo->query("UPDATE counter c SET c.Counter=c.Counter+1"); //увеличиваем счётчик
				
				echo "<a href='http://localhost/$e' target='_blank'>http://localhost/$e</a>"; 
			}
			else
			{
				die("ссылка занята, введите другую");
			}
		}
		else //случайная ссылка
		{
			$stmt = $pdo->query("SELECT l.Link,l.NewLink FROM links l WHERE l.Link='".$q."'");
			$exist = $stmt->rowCount();
			if($exist!=0) //если ссылка уже есть в базе, выводим готовое сокращение
			{
				while ($row = $stmt->fetch())
				{
					$newc=$row['NewLink'];
				}
				die("<a href='http://localhost/$newc' target='_blank'>http://localhost/$newc</a>");
			}
			
			$stmt = $pdo->query("SELECT c.Counter FROM counter c"); //добываем счётчик
			while ($row = $stmt->fetch())
			{
				$c=$row['Counter'];
			}
			
			$newc=base_convert($c, 10, 36); //генерируем ссылку из счётчика
			$c++; 
			
			$pdo->query("INSERT links (NewLink, Link) VALUES ('".$newc."', '".$q."')"); //добавляем в базу
			$pdo->query("UPDATE counter c SET c.Counter=c.Counter+1"); //увеличиваем счётчик
			
			
			echo "<a href='http://localhost/$newc' target='_blank'>http://localhost/$newc</a>"; 
			
		}	
	}
	
	
?>