<?php
$conn = new mysqli("localhost", "root", "", "conferences");

if($conn->connect_error){
die("Ошибка: " . $conn->connect_error);
}

$sql = "SELECT * FROM list";
if($result = $conn->query($sql)){
$rowsCount = $result->num_rows; // количество полученных строк
echo "<p>Получено объектов: $rowsCount</p>";
echo "<table>

<tr>
<th>Id</th>
<th>ФИО</th>
<th>Телефон</th>
<th>Почта</th>
<th>Тема конференции</th>
<th>Дата рождения</th>
<th>Участие с докладом</th>
<th>Тема доклада</th>
<th>Форма участия</th>
</tr>";

foreach($result as $row){
echo "<tr>";
echo "<td>" . $row[‘id’] . "</td>";
echo "<td>" . $row[‘user_name’] . "</td>";
echo "<td>" . $row[‘tel’] . "</td>";
echo "<td>" . $row[‘email’] . "</td>";
echo "<td>" . $row[‘section’] . "</td>";
echo "<td>" . $row[‘bdate’] . "</td>";
echo "<td>" . $row[‘speaker’] . "</td>";
echo "<td>" . $row[‘report’] . "</td>";
echo "<td>" . $row[‘formpart’] . "</td>";
echo "</tr>";
}
echo "</table>";
$result->free();
} else{
echo "Ошибка: " . $conn->error;
}

$conn->close();
?>