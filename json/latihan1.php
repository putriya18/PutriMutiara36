<?php
// $mahasiswa = [
//     [
//         "nama" => "Putri Mutiara",
//         "nip" => "22170209036",
//         "email" => "ptrmtr08@gmail.com"
//     ],
//     [
//         "nama" => "Santoso",
//         "nip" => "22170209088",
//         "email" => "santoso@gmail.com"
//     ],
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO ::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
?>
