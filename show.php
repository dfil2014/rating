<?php
session_start();
include ('lib/connect.php'); //подключаемся к БД
include('lib/function_global.php');
validate();
if(!isset($_SESSION['theme'])) header('Location: criterion_list.php');
if(isset($_POST['delete']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `expert`");
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
mysqli_query($dbcnx,"DELETE FROM `expert` WHERE `expert`.`ID` = '".$result['ID']."';");
			}
		}	
}

echo '
<head>
  <link rel="stylesheet" href="css/style2.css">
    <style>
   hr {
    border: none; /* Убираем границу */
    background-color: blue; /* Цвет линии */
    color: red; /* Цвет линии для IE6-7 */
    height: 2px; /* Толщина линии */
   }
  </style>
  </head>
  <div class="block">
  <div class="panel"><a href="criterion.php"><img alt="" src="img/house.svg" class="control" /></a></div>';
		$res=mysqli_query($dbcnx,"SELECT * FROM `expert` where `UID`='".$_SESSION['id']."' and `theme_id`=".$_SESSION['theme'].' order by `expert`');
		echo '<hr>';
		while($result=mysqli_fetch_array($res))
		{
  echo '<p style="font-size: 2em;"><b>'.$result['expert'].'</b></p>';
  echo '<p style="font-size: 2em;"><b>'.str_pad($result['pass'],6,0,STR_PAD_LEFT).'</b></p><hr>';
  echo '';
		}
		echo '
<p>&nbsp;</p>
</div>
';
?>