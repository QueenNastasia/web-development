<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
header("Content-Type: text/plain");

if (isset($_GET['email']))
{
    $email = $_GET['email'];
	if (strlen($email) == 0)
	{
		die ('Вы не ввели email');
	}
}
else
{
	die ('Отсутствует параметр \'email\'') ;
}
$pathToFile = 'data/'.$email.'.txt';
if (file_exists($pathToFile))
{
	$linesOfFile = file($pathToFile);
	if ($linesOfFile)
	{
		foreach ($linesOfFile as $string)
		{
			echo $string;
		}
	}
}
else
{
	echo 'Файл не найден';
}