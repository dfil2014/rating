<?php
session_start();
include('lib/function_global.php');
if(is_dir('install'))
{
	header("Location: install");
	}
	validate();
    check_session();
echo '
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Экспертная оценка работ</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="panel"><a href="./index.php?action=out"><img alt="" src="img/log-in.svg" class="control" /></a>';
 if(isset($_COOKIE['login'])) 
echo '<a href="./login.php"><img alt="" src="img/house.svg" class="control two" /></a> '; 
echo '</div><h1><p align="center" class="about"><b>Оценка работ</b></p></h1>
  <nav class="side-nav">
    <a href="add.php" class="side-nav-button">Настройка критериев</a>
    <a href="add_name.php" class="side-nav-button">Настройка участников</a>';
if(isset($_SESSION['expert']))	
    echo '<a href="rating.php" class="side-nav-button">Выставление отметок</a>'; 
if(isset($_COOKIE['login']))
echo '<a href="add_expert.php" class="side-nav-button">Имена экспертов</a>
<a href="rating.php" class="side-nav-button">Оценка с помощью экспертов</a>
'; 
echo '<a href="set_mark/" class="side-nav-button">Настройка отметок</a>';
echo '    <a href="result.php" class="side-nav-button">Результаты проверки</a>';
 if(isset($_COOKIE['login']))	echo ' <a href="show.php" class="side-nav-button">Приступить к оценке</a>
  </nav>

</body>
</html>';
?>