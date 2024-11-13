<?php
session_start();
include ('lib/function_global.php');
include ('lib/connect.php');
validate();
if(!isset($_SESSION['id'])) header('Location: ./');
$res=mysqli_query($dbcnx,"select * from `theme` where `UID`=".$_SESSION['id']);
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
  <script>
var theme=document.getElementById("theme");
  </script>
</head>
<body>
<div class="panel"><a href="login.php?action=out"><img class="control" alt="" src="img/log-in.svg"  /></a></div>
<h1><p align="center" class="about"><b>Список тем</b></p></h1>
  <form name="form" id="form" action="criterion.php" method="POST">
  <input type="hidden" name="theme" value="">
  <nav class="side-nav">
      <a href="add_theme.php"><p class="hyper" align="center">Добавить темы</p></a>';
  while($result=mysqli_fetch_array($res))
  {
	  echo '
    <input type="button" style="width:100%;cursor:pointer;text-align:left;" class="side-nav-button" value="'.$result['Theme'].'" onclick="theme.value=\''.$result['ID'].'\';submit();"></input>';
  }
  echo '
  </nav>
</form>
</body>
</html>';
?>
