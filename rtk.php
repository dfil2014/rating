<?php
session_start();
include ('lib/connect.php'); //подключаемся к БД
include ('lib/function_global.php');
validate(); 
echo '
<head>
  <link rel="stylesheet" href="css/style2.css">
<script src="lib/graph.js"></script>
</head>
<div class="block">
  <a href="criterion.php"><img alt="" src="img/house.svg" style="  position: absolute;
  top:5%; right:0; float:right; height:12%; margin:20px; width:12%" /></a>
<p style="text-align: center;"><strong>Рейтинг участников</strong></p>
<table class="blueTable"  style="margin-left: auto; margin-right: auto;" width="70%">
<tbody>';
$i=1;
$res=mysqli_query($dbcnx,"select name.name,sum(score) as score from `name`,(select name_id,criterion,round(avg(score),2) as score from rating where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `name_id`,`criterion`)as d where name.ID=name_id group by `name_id` order by score desc");
while($result=mysqli_fetch_array($res))
{
echo '
<tr>
<td style="width: 10%; text-align: center;"><strong>'.(string)$i++.'.</strong></td>
<td style="width: 10%; text-align: center;">'.$result['score'].'</td>
<td style="width: 85.9811%; text-align: center;">'.$result['name'].'</td>
</tr>
';	
}
$i=0;
$res=mysqli_query($dbcnx,"SELECT `criterion`,Round((avg(`score`)),2) as score FROM `rating`  where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." GROUP BY `criterion`");
echo mysqli_error($dbcnx);
while($result=mysqli_fetch_array($res))
{
    $result2=mysqli_fetch_array(mysqli_query($dbcnx,"select `criterion` from `criterion` where `ID`=".$result['criterion']));
	$cr[$i]=$result2['criterion'];
	$sc[$i]=$result['score'];
	$i++;
}
echo '</tbody>
</table><br>
<br>
<p style="text-align: center;"><strong>Баллы за каждый критерий</strong></p>
<div style=\'width:1000;margin:auto;\'>
<script> 
var width="1000";
var height="300";
let col=["#5555FF","red","blue","black"];
let name='.json_encode($cr).';
let s='.json_encode($sc).';
let s_d=[];
for(var i=0;i<s.length;i++)
{
	s_d[i]=[];
	s_d[i][0]=s[i];
}
graphShow(width,height,s_d,name,col,"");
</script>
</div>';

echo '
<p align="center"><b>Таблица результатов</b></p>
<div style="overflow-x:auto;">
<table class="blueTable" align="center" border="1" cellpadding="1" cellspacing="1" style="width: 90%">';
echo '	<thead>
		<tr>
			<th scope="col"><b>Критерий</b></th>';
$res=mysqli_query($dbcnx,'select name from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
			while($result=mysqli_fetch_array($res))
			{
echo'			<th scope="col">
				<p style="writing-mode: vertical-rl"><b>'.$result['name'].'</b></p>
			</th>';
			}
			echo '		</tr>
	</thead>
	<tbody>
		';
$res2=mysqli_query($dbcnx,'select * from `criterion` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result2=mysqli_fetch_array($res2))
{
echo '
            <tr>
			<td>'.$result2['criterion'].'</td>';
			$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
			while($result=mysqli_fetch_array($res))
			{
				$res3=mysqli_query($dbcnx,'select round(avg(`score`),2) as score from rating where `name_id`=\''.$result['ID'].'\' and `criterion`=\''.$result2['ID'].'\' and `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].' group by `criterion`,`name_id`');
$result3=mysqli_fetch_array($res3);
				echo '<td>'.$result3['score'].'</td>';
			}
			echo '
		</tr>';
}
echo '
<tr>
<td><b>Итого</b></td>';
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result=mysqli_fetch_array($res))
{
	$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");
$result3=mysqli_fetch_array($res3);	
echo '<td>'.$result3['score'].'</td>';
}
echo '
</tr>
';
echo '
<tr>
<td><b>Процент</b></td>';
$p=mysqli_num_rows($res2);
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result=mysqli_fetch_array($res))
{
	$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");
$result3=mysqli_fetch_array($res3);	
echo '<td>'.round($result3['score'],2).' %</td>';
}
echo '
</tr>
';
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
echo '
<tr>
<td><b>Отметка</b></td>';
while($result=mysqli_fetch_array($res))
{
	
$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']."  and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");
$result3=mysqli_fetch_array($res3);
if($result3['score']>=90)	$r='5';
else if($result3['score']>=80)	$r='4';
else if($result3['score']>=70)	$r='3';
else if($result3['score']<70)	$r='2';
echo '<td>'.$r.'</td>';
}
echo '
</tr>
';
echo '
	</tbody>
</table>
  <a href="file2.php"><p align="center">Скачать таблицу результатов</p></a>
</div>
</div>
';	
?>