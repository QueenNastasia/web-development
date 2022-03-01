<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
header("Content-Type: text/plain");

$strength = 0; //надежность пароля
if (isset($_GET['password'])) //проверяем, существует ли параметр 'password'
{
    $password = $_GET['password'];
	if (strlen($password) == 0)
	{
		echo 'Введите пароль';
	}
	else
	{   
		$arr = str_split($password, 1);
		$flag = true;
		$countUpper = 0; //счетчик количества букв в верхнем регистре
		$countLower = 0; //счетчик количества букв в нижнем регистре
		$countDigital = 0; //счетчик количества цифр
		$len = count($arr); //длина пароля
		foreach ($arr as $key => $simbol)
		{
			if (!(is_numeric($simbol) or ctype_alpha($simbol)))
			{
				$flag = false;
				echo 'пароль содержит недопустимый символ';
				break;
			}
			if (is_numeric($simbol)) //считаем количество цифр
			{
				$countDigital++;
			}
			if (ctype_alpha($simbol) and ctype_upper($simbol)) //считаем количество букв в верхнем регистре
			{
				$countUpper++;
			}
			if (ctype_alpha($simbol) and ctype_lower($simbol)) ////считаем количество букв в нижнем регистре
			{
				$countLower++;
			}
		}
		if ($flag === true)
		{
			$strength += 4 * $len; //добавляем количество символов *4
			$strength += 4 * $countDigital; //добавляем количество цифр *4
			if ($countUpper != 0) //учитываем количество букв в верхнем регистре
			{
				$strength += ($len - $countUpper)*2;
			}
			if ($countLower != 0) //учитываем количество букв в нижнем регистре
			{
				$strength += ($len - $countLower)*2;
			}
			if (($countDigital == $len) or ($countDigital == 0))
			{
				$strength -= $countDigital;
			}
			$countDouble = 0;
			foreach (count_chars($password, 1) as $elem => $vhozhdenie)
			{
				if ($vhozhdenie > 1)
				{
					$countDouble +=$vhozhdenie;
				}
			}
			$strength -= $countDouble;
			echo $strength;
		}
	}
}
else
{
	echo 'Parameter \'password\' not found';
}	