<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
header("Content-Type: text/plain");
if (isset($_GET['text'])) //проверяем, существует ли параметр 'text'
{
    $text = $_GET['text'];
	if ($text == 0)
	{
		echo 'Value not found';
	}
	else
	{
		$text = trim($text); //избавляемся от пробелов в начале и в конце строки
        $arr = explode(' ', $text);//разбиваем строку в массив по разделителю " "
        foreach ($arr as $key=>$elem) //проходимся по каждому элементу массива
        {
	        if ($elem == '')
	        {
		        unset($arr[$key]); //удаляем элемент, равный ''
	        }
        }
        $text = implode(' ', $arr); //сливаем элементы массива в строку с разделителем ' '
        echo $text;
	}
}
else
{ 
    echo 'Parameter \'text\' not found';
}