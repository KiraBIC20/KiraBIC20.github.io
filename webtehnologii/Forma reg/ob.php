<?php
 ini_set('display_errors', 1);
 error_reporting(E_ALL & ~E_NOTICE);
 
   $login = $_POST['user_name'];
 $tel = $_POST['tel'];
 $email = $_POST['email'];
$section = $_POST['section'];
$birthdate = $_POST['date'];
$speaker = $_POST['speaker'];
$report = $_POST['report'];
$formpart = $_POST['edutype'];
 /* $db = new PDO("mysql:host=localhost;dbname=conferences;charset=utf8;", "root", ""); */

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'conferences'; // Имя БД
$db_table = 'participants'; // Имя Таблицы БД

try {
   // Подключение к базе данных
   $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
   // Устанавливаем корректную кодировку
   $db->exec("set names utf8");
   echo "Connected!<br>";
}

catch (PDOException $e) {
   // Если есть ошибка соединения, выводим её
   print "Error!: " . $e->getMessage() . "<br/>";
}
   
// Собираем данные для запроса
$data = array( 'user_name' => $login, 'tel' => $tel, 'email' => $email, 'section' => $section, 'date' => $birthdate, 'speaker' => $speaker, 'report' => $report, 'edutype' => $formpart );

// Подготавливаем SQL-запрос
$query = $db->prepare("INSERT INTO $db_table (user_name, tel, email, section, bdate, speaker, report, formpart) VALUES ($login, $tel, $email, $section, $birthdate, $speaker, $report, $formpart)");

// Выполняем запрос с данными
$query->execute($data);

if ($query)
   echo "Recorded!";
 else
     echo "Not recorded!";
     if (isset($_POST))
 {
    print("Ваше ФИО: <b> " . $_POST['user_name']);
    print("<br> </b>Ваш номер телефона: <b> " . $_POST['tel']);
    print("<br> </b>Ваша почта: <b> " . $_POST['email']);
    print("<br> </b>Ваша тема конференции: <b> " . $_POST['section']);
    print("<br> </b>Ваша дата рождения: <b> " . $_POST['date']); 
    print("<br> </b>Участие с докладом: <b> " . $_POST['speaker']); 
    print("<br> </b>Tемa Вашего доклада: <b> " . $_POST['report']); 
    print("<br> </b>Форма участия: <b> " . $_POST['edutype']);    
 }
?>