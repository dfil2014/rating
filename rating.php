<?php
session_start();
include ('lib/connect.php'); //подключаемся к БД
include ('lib/function_global.php');
validate();
if(isset($_POST['save']))
{
	$res=mysqli_query($dbcnx,'SELECT * FROM `criterion` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].'');
	if(isset($_POST['expert']))
		$expert=$_POST['expert'];
	else $expert=$_SESSION['expert'];
	while($result=mysqli_fetch_array($res))
	{
		$save=mysqli_query($dbcnx,"SELECT * FROM `rating` WHERE `expert`='".$expert."' and criterion='".$result['ID']."' and `name_id`=".$_POST['name']." ");
		$s=mysqli_fetch_array($save);
		if(mysqli_num_rows($save)==0) 	
		mysqli_query($dbcnx,"insert into `rating`(`expert`, `name_id`, `criterion`, `score`,`UID`,`theme_id`) VALUES ('".$expert."','".$_POST['name']."','".$result['ID']."','".$_POST[$result['ID']]."',".$_SESSION['id'].",'".$_SESSION['theme']."')");
		else mysqli_query($dbcnx,"UPDATE `rating` SET `score`=".$_POST[$result['ID']]." WHERE `ID`=".$s['ID']);
		echo mysqli_error($dbcnx);	
	}
}
if(isset($_POST['expert']))
	$_SESSION['expert']=$_POST['expert'];
else if(isset($_COOKIE['pass']))
{
	$res=mysqli_fetch_array(mysqli_query($dbcnx,'select * from `expert` where`pass`='.$_COOKIE['pass'].''));
	$_SESSION['expert']=$res['ID'];		
}
else
{
		$res=mysqli_fetch_array(mysqli_query($dbcnx,'select * from `expert` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].''));
	$_SESSION['expert']=$res['ID'];		
}
if(isset($_POST['name']))
{
	$name=mysqli_fetch_array(mysqli_query($dbcnx,'select * from `name` where `ID`='.$_POST['name']));
	$_SESSION['name']=$name['name'];
}
else
{

	$res2=mysqli_fetch_array(mysqli_query($dbcnx,'select * from `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].' ORDER BY `name` ASC '));	

	$_SESSION['name']=$res2['name'];
}

echo '
 <link rel="stylesheet" href="css/style2.css">
  <script>
    function Replace(element)
  {
	let object=document.getElementById(element);
	object.value=object.value.replace(",",".");
  }
  </script>
 
<div class="block">
 <div class="panel"><a href="criterion.php"><img alt="" src="img/house.svg" class="control" /></a></div>
<p style="text-align:center"><strong>Оценка работ</strong></p>
<form method="post" name="form1">';
if(isset($_COOKIE['login']))
{
echo '<p style="text-align:center">Эксперт: 
<select class="text" name="expert" onchange="submit();">';
$res2=mysqli_query($dbcnx,'SELECT * FROM `expert` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].' ORDER BY `expert`.`expert` ASC ');
while($result2=mysqli_fetch_array($res2))
{
	if(isset($_SESSION['expert']))
	{
		if($_SESSION['expert']==$result2['ID'])
$sel='selected="selected"';
		else $sel='';
	}
echo '
<option '.$sel.' value="'.$result2['ID'].'">'.$result2['expert'].'</option>';
}
echo '</select>';
}
else
{
	$e=mysqli_fetch_array(mysqli_query($dbcnx,"select `expert` from `expert` where `pass`='".$_COOKIE['pass']."'"));
	echo mysqli_error($dbcnx);
	echo 'Имя эксперта: '.$e['expert'];
}
echo ' Фамилия оцениваемого:';
echo '
<select class="text" name="name" onchange="submit();">';
$res2=mysqli_query($dbcnx,'SELECT * FROM `name` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].' ORDER BY `name`.`name` ASC ');
while($result2=mysqli_fetch_array($res2))
{
		if(isset($_SESSION['name']))
	{
		if($_SESSION['name']==$result2['name'])
		{
$sel='selected="selected"';
$_SESSION['ID']=$result2['ID'];
		}
		else $sel='';
	}
		echo '
<option '.$sel.' value="'.$result2['ID'].'">'.$result2['name'].'</option>';
}
	echo '</select>';
echo '<table class="greenTable" align="center" border="1" cellpadding="1" cellspacing="1" >
	<caption>
	<p>Список оценки</p>

	<p><strong>2 </strong>- выполнен полностью, <strong>1 </strong>- присутствует частично, <strong>0 </strong>- не выполнен совсем</p>
	</caption>
	<thead>
		<tr>
			<th scope="col">Критерий</th>
			<th scope="col">Оценка</th>
		</tr>
	</thead>
	<tbody>';	
$res3=mysqli_query($dbcnx,'SELECT * FROM `criterion` where `UID`='.$_SESSION['id'].' and `theme_id`='.$_SESSION['theme'].'');
while($result3=mysqli_fetch_array($res3))
{
	$res4=mysqli_query($dbcnx,"SELECT * FROM `rating` WHERE `expert`='".$_SESSION['expert']."' and criterion='".$result3['ID']."' and `name_id`=".$_SESSION['ID']." and `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']);
	mysqli_error($dbcnx);
	$result4=mysqli_fetch_array($res4);
	if(mysqli_num_rows($res4)==0)
	{
		$score='0';
	}
	else $score=$result4['score'];
		echo '
		<tr>
			<td>'.$result3['criterion'].'</td>
			<td style="text-align:center"><input oninput="Replace(\''.$result3['ID'].'\');" class="text" maxlength="4" name="'.$result3['ID'].'" id="'.$result3['ID'].'" size="4" type="text" value="'.$score.'" /></td>
		</tr>';
}
	echo '
	</tbody>
</table>

<p><input class="button" name="save" type="submit" value="Сохранить оценки" /></p>
</form>

<p>&nbsp;</p>
</div>
';

?>