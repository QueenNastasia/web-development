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
if (!is_dir('data'))
{
	mkdir('data');
}
$pathToFile = 'data/'.$email.'.txt';
$email = 'Email: '.$email.PHP_EOL;
if (isset($_GET['first_name']))
{
    $firstName = 'First name: '.$_GET['first_name'].PHP_EOL;
}
else
{
	if (file_exists($pathToFile))
	{
		$linesOfFile = file($pathToFile);
		if ($linesOfFile)
		{
			$firstName = $linesOfFile[0];
		}
		else
		{
			$firstName = 'First name: '.PHP_EOL;
		}
	}
}
if (isset($_GET['last_name']))
{
    $lastName = 'Last name: '.$_GET['last_name'].PHP_EOL;
}
else
{
	if (file_exists($pathToFile))
	{
		$linesOfFile = file($pathToFile);
		if ($linesOfFile)
		{
			$lastName = $linesOfFile[1];
		}
		else
		{
			$lastName = 'Last name: '.PHP_EOL;
		}
	}
}
if (isset($_GET['age']))
{
    $age = 'Age: '.$_GET['age'].PHP_EOL;
}
else
{
	if (file_exists($pathToFile))
	{
		$linesOfFile = file($pathToFile);
		if ($linesOfFile)
		{
			$age = $linesOfFile[3];
		}
		else
		{
			$age = 'Age: '.PHP_EOL;
		}
	}
}
$content = $firstName.$lastName.$email.$age;
$file = fopen($pathToFile, 'w+');
fwrite($file, $content);
fclose($file);
