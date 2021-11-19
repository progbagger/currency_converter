<?php
// непосредственно конвертация валют
function convert() {
    global $conn, $result, $ratesPath, $table, $cache;
    // получение данных из формы
    (float) $valueFrom = htmlentities($_GET["valueFrom"]);
    (string) $currencyFrom = htmlentities(($_GET["currencyFrom"]));
    (string) $currencyTo = htmlentities($_GET["currencyTo"]);
    // поттягивание информации из кэша
    $cache = json_decode(file_get_contents($ratesPath));
    $currentDate = date("Y-m-d H:i:s");
    (float) $rateFrom = $cache->Valute->$currencyFrom->Value;
    (float) $rateTo = $cache->Valute->$currencyTo->Value;
    (float) $nominalFrom = $cache->Valute->$currencyFrom->Nominal;
    (float) $nominalTo = $cache->Valute->$currencyTo->Nominal;
    if (!$cache)
        $result = "Нет данных";
    else
        $result = round($valueFrom * (($rateFrom * $nominalTo) / ($rateTo * $nominalFrom)), 2);
    // заносим в базу данных информацию о совершённой операции
    $sql_insert = "INSERT INTO $table (date_time, value_from, value_to, rate_from, rate_to) VALUES ('$currentDate', '$valueFrom', '$result', '$currencyFrom', '$currencyTo')";
    $stmt = $conn->prepare($sql_insert);
    $stmt->execute();
}
?>