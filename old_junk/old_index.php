<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Конвертёр валют</title>
      <link rel="icon" href="../public/favicon.png">
      <link rel="stylesheet" href="../public/css/reset.css">
      <link rel="stylesheet" href="../public/css/style.css">
   </head>
   <body>
       <div class="box">
            <form id="converter" action="" method="get">
                <h1>Конвертёр валют</h1><br>
                <hr><br>
                <p class="line">
                    <input class="inputNumber name" type="text" placeholder="Из" disabled>
                    <input class="inputNumber name" type="text" placeholder="В" disabled>
                </p>
                <p class="line">
                <select class="selector" name="currencyFrom" form="converter" required>
                    <option value="EUR">Евро</option>
                    <option value="USD">Доллар</option>
                    <option value="UAH">Украинская гривна</option>
                    <option value="BYN">Белорусский рубль</option>
                </select>
                <select class="selector" name="currencyTo" form="converter" required>
                    <option value="EUR">Евро</option>
                    <option value="USD">Доллар</option>
                    <option value="UAH">Украинская гривна</option>
                    <option value="BYN">Белорусский рубль</option>
                </select>
                </p>
                <p class="line">
                    <input class="inputNumber" name="valueFrom" type="number" placeholder="Введите число" required autofocus value="<?php echo $_GET['valueFrom']; ?>">
                    <input class="inputNumber" name="ValueTo" type="text" placeholder="Текст" readonly>
                </p>
                <p class="line">
                    <input class="button" name="addValute" type="button" value="Добавить валюту">
                    <input class="button redButton" name="removeValute" type="button" value="Удалить валюту">
                </p>
                <br>
                <p class="line">
                    <input class="button convertButton" name="convert" type="submit" value="Конвертировать">
                    <input class="button" form="date" name="updateDate" type="submit" value="Обновить">
                </p>
            </form>
            <hr>
            <form id="date" action="" method="get">
                <p class="dateUpdateText">Данные обновлены (МСК): Текст</p><br>
            </form>
       </div>
   </body>
</html>