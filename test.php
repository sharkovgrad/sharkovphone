<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Телефонный справочник Шарковщина 2014</title>
  <link rel="stylesheet" href="http://sharkovphone.xyz/style.css">
 </head>
 <body>

<?php 

/* Подключение к серверу MySQL */ 
$link = mysqli_connect( 
            'mysql.hostinger.ru',  /* Хост, к которому мы подключаемся */ 
            'u408466138_admin',       /* Имя пользователя */ 
            '2176076s',   /* Используемый пароль */ 
            'u408466138_phone');     /* База данных для запросов по умолчанию */ 

if (!$link) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

/* Посылаем запрос серверу */ 
if ($result = mysqli_query($link, 'SELECT SUBSTRING(`phone`, 9, 13) AS name, address, phone FROM phones ORDER BY name ASC')) { 

echo "<table>";
echo "<th><td>ИМЯ</td><td>АДРЕС</td><td>ТЕЛЕФОН</td></th>";	
	
    /* Выборка результатов запроса */ 
    while( $row = mysqli_fetch_assoc($result) ){ 
     echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["address"] . "</td>";
	echo "<td>" . $row["phone"] . "</td>";
    echo "</tr>";
    } 
echo "</table>";
	
    /* Освобождаем используемую память */ 
    mysqli_free_result($result); 
} 

/* Закрываем соединение */ 
mysqli_close($link); 
?>
 </body>
</html>