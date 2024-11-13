<?php
session_start();
include ('lib/connect.php'); //подключаемся к БД
include ('lib/function_global.php');
validate();
check_session();
echo '
<head>
  <link rel="stylesheet" href="css/style2.css">
<script src="lib/graph.js"></script>
</head>
<div class="block">
  <div class="panel"><a href="criterion.php"><img alt="" src="img/house.svg" class="control" /></a></div>
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
<br>';
?>
<canvas id="myChart" width="400" height="200"></canvas>
<script src='lib/chart.js'></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.font.size = 25;
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cr); ?>,
        datasets: [{
            label: 'Баллы по критериям',
            data: <?php echo json_encode($sc); ?>,
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
                ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                font:
                    {
                       size:30 
                    }
            }
        },
        plugins:{
            legend:{
                labels:{
                    font:{
                        size:30
                    }
                }
            },
            tooltip:{
                titleFont:{
                    size:30
                },
                bodyFont:{
                    size:25
                }
            }
        }
}
});
</script>
<?php
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
$mark=$dbcnx->query("SELECT * FROM `mark` WHERE `usr_id`={$_SESSION['id']} AND `theme_id`={$_SESSION['theme']}");
$mark=mysqli_fetch_array($mark);
$p=$mark['max'];
$res=mysqli_query($dbcnx,'select `ID` from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme']);
while($result=mysqli_fetch_array($res))
{
	$res3=mysqli_query($dbcnx,"select sum(score) as score from (select round(avg(score),2) as score from rating where `name_id`=".$result['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." group by `criterion`) as t");
$result3=mysqli_fetch_array($res3);	
echo '<td>'.round(100/$p*$result3['score'],2).' %</td>';
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
if($result3['score']>=$p*$mark['max_five']/100)	$r='5';
else if($result3['score']>=$p*$mark['max_four']/100)	$r='4';
else if($result3['score']>=$p*$mark['max_three']/100)	$r='3';
else $r='2';
echo '<td>'.$r.'</td>';
}
echo '
</tr>
';
echo '
	</tbody>
</table>
  <a href="file.php"><p align="center">Скачать таблицу результатов</p></a>
</div>
</div>
';	
?>