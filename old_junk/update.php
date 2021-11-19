<?php
// обновление данных
function update() {
    global $ratesPath, $datePath;
    $cacheFile = fopen($ratesPath, 'w'); // создание файла кэша валют
    $cache = get_rates(); // получение актуальных курсов валют
    fwrite($cacheFile, $cache); // записываем кэш в файл
    fclose($cacheFile); // закрываем файл
    $dateCache = fopen($datePath, 'w');
    $date_time = date("Y-m-d H:i:s");
    fwrite($dateCache, $date_time);
    fclose($dateCache);
}
?>