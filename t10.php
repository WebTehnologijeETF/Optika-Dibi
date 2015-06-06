<?php

$idvijesti = $_GET['novosti'];

$veza = new PDO('mysql:host=localhost;dbname=wt8;charset=utf8', 'ezugor1', 'nepricaj456');
$veza->exec("set names utf8");

$upit = $veza->prepare("SELECT * FROM komentar WHERE Novosti=?");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();

foreach ($upit->fetchAll() as $komentar)
    print $komentar["Tekst"] . "," . $komentar["Autor"] . "," . $komentar["Datum_Vrijeme"] ."\n";
?>