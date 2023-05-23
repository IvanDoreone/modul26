<?php
ini_set('display_errors', '1');

//берм код из файла Example.php и записываем в строку
$str2 = file_get_contents('example.php');

// разбивам строку на массив
$arr = explode('<', $str2);
unset($arr[0]);

// задаем условия (что вырезать)
$sub = 'meta name="keywords';
$sub2 = 'meta name="description';
$sub3 = 'title>';
$sub4 = '/title>';
$arr2 ='';
//итератор с простым foreach циклом для обработки 
$iter = new ArrayIterator($arr);
foreach($iter as $key => $row) {
    if (strpos($row, $sub) === false && strpos($row, $sub2) === false && strpos($row, $sub3) === false && strpos($row, $sub4) === false) {
        //формируем массив с кодом из исходного файла (по условию указанному выше:
        $arr2 .= '<'.$iter[$key];
    }
}

// записываем новый код в новый файл если требуется:
$file = 'add.php';
$current = file_get_contents($file);
file_put_contents($file, $arr2);


include('add.php');
?>