<?php
session_start();
include ('lib/connect.php'); //подключаемся к БД
include ('lib/function_global.php');
mysqli_set_charset($dbcnx,"cp1251");
header('Content-disposition: attachment; filename=Таблица_результатов-'.date('H:i-d.m.y').'.csv');
header('Content-type: text/csv');
echo "Критерий";
$res=mysqli_query($dbcnx,'select name from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
			while($result=mysqli_fetch_array($res))
			{
			echo ";".$result['name'];	
			}
echo "\r\n";
$res2=mysqli_query($dbcnx,'select * from `criterion` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result2=mysqli_fetch_array($res2))
{
	echo $result2['criterion'];
			$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
			while($result=mysqli_fetch_array($res))
			{
				$res3=mysqli_query($dbcnx,'select round(avg(`score`),2) as score from rating where `name_id`=\''.$result['ID'].'\' and `criterion`=\''.$result2['ID'].'\' and `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].' group by `criterion`,`name_id`');
$result3=mysqli_fetch_array($res3);
echo ";".str_replace('.',',',$result3['score']);
			}
			echo "\r\n";
}
echo "Итого";
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result=mysqli_fetch_array($res))
{
	$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");

$result3=mysqli_fetch_array($res3);	
echo ";".str_replace('.',',',$result3['score']);
}
echo "\r\n";
echo "Процент";
$mark=$dbcnx->query("SELECT * FROM `mark` WHERE `usr_id`={$_SESSION['id']} AND `theme_id`={$_SESSION['theme']}");
$mark=mysqli_fetch_array($mark);
$p=$mark['max'];
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result=mysqli_fetch_array($res))
{
	$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");

$result3=mysqli_fetch_array($res3);	
echo ";".str_replace('.',',',round(100/$p*$result3['score'],2).'%');
}
echo "\r\n";
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
echo "Отметка";
while($result=mysqli_fetch_array($res))
{
	
$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");
$result3=mysqli_fetch_array($res3);
if($result3['score']>=$p*$mark['max_five']/100)	$r='5';
else if($result3['score']>=$p*$mark['max_four']/100)	$r='4';
else if($result3['score']>=$p*$mark['max_three']/100)	$r='3';
else $r='2';
echo ';'.$r;
}
echo "\n\r";
?>