<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
header("Content-Type: text/plain");
if (isset($_GET['identifier'])) //проверяем, существует ли параметр 'identifier'
{
    $identifier = $_GET['identifier'];
	if (strlen($identifier) == 0)
	{
		echo 'Value not found';
	}
	else
	{
		$arr = str_split($identifier, 1); //разбиваем строку в массив, размер элемента = 1
		$flag = true;
		foreach ($arr as $key => $simbol)
		{
			if (!(is_numeric($simbol) or ctype_alpha($simbol)))
			{
				$flag = false;
				echo 'no, т.к. содержит недопустимый символ';
				break;
			}
			if (is_numeric($simbol) and $key==0)
			{
				$flag = false;
				echo 'no, т.к. идентификатор начинается с цифры';
				break;
			}
		}
		if ($flag ===true)
		{
			echo 'yes';
		}
	}
}
else
{
	echo 'Parameter \'identificator\' not found';
}
    