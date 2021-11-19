<?php
require_once("get_rates.php");
require_once("update.php");
require_once("convert.php");

// данные для подключения к Вашему серверу
$server_name = "localhost";
$username = "mysql";
$pass = "";
$db = "data";
$table = "history";
$charset = "utf8";

// пути кэша
$ratesPath = "./data/rates.json";
$datePath = "./data/date.txt";

// адрес API для получения курсов валют
$API_URL = "https://www.cbr-xml-daily.ru/daily_json.js";

date_default_timezone_set("Europe/Moscow");

// база данных и есть кэш
// если в базе нет нужной валюты на нужную дату -
// подтянуть из API курсы и сохранить в базу

// подключение к базе данных
$dsn = "mysql:host=$server_name;dbname=$db;charset=$charset";
$conn = new PDO($dsn, $username, $pass);

if (isset($_GET["updateDate"])) {
    update();
}

if (isset($_GET["convert"])) {
    convert();
}

$date = file_get_contents($datePath);
$cache = json_decode(file_get_contents($ratesPath));
?>