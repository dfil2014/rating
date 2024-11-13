<?php
session_start();
include ('lib/function_global.php');
include ('lib/connect.php'); //подключаемся к БД 
validate();
check_session();
if(isset($_POST['add']))
{
do
{
	$random=rand(0, 999999);
	$res=mysqli_query($dbcnx,"select `pass` from `expert` where pass=".$random);
}
while(mysqli_num_rows($res)<0);	
mysqli_query($dbcnx,"INSERT INTO `expert` (`expert`,`pass`,`UID`,`theme_id`) VALUES ('".$_POST['expert']."','".$random."',".$_SESSION['id'].",".$_SESSION['theme'].");");	
}
if(isset($_POST['delete']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `expert` where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']);
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
mysqli_query($dbcnx,"DELETE FROM `expert` WHERE `expert`.`ID` = '".$result['ID']."';");
			}
		}	
}
if(isset($_POST['copy']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `expert` where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']);
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
			    if($_POST['select']=='Оцениваемые')
			    {
$a=mysqli_fetch_array(mysqli_query($dbcnx,"select `expert` from `expert` WHERE `expert`.`ID` = '".$result['ID']."';"));
mysqli_query($dbcnx,"insert into `name` ( `UID`, `theme_id`, `name`) VALUES (".$_SESSION['id'].",".$_POST['t'].",'".$a['expert']."')");
                }
                if($_POST['select']=='Эксперты')
                {
                    do
{
	$random=rand(0, 999999);
	$res=mysqli_query($dbcnx,"select `pass` from `expert` where pass=".$random);
}
while(mysqli_num_rows($res)<0);
$a=mysqli_fetch_array(mysqli_query($dbcnx,"select `expert` from `expert` WHERE `expert`.`ID` = '".$result['ID']."';"));
mysqli_query($dbcnx,"insert into `expert` ( `UID`, `theme_id`, `expert`,`pass`) VALUES (".$_SESSION['id'].",".$_POST['t'].",'".$a['expert']."',".$random.")");
echo mysqli_error($dbcnx);
                }
			}
		}	
}
echo '
<script type="text/javascript">
function checkAll(obj) {
  \'use strict\';
  var items = obj.form.getElementsByTagName("input"), 
      len, i;
  for (i = 0, len = items.length; i < len; i += 1) {
    if (items.item(i).type && items.item(i).type === "checkbox") {       
      if (obj.checked) {
        items.item(i).checked = true;
      } else {
        items.item(i).checked = false;
      }       
    }
  }
}
</script>
  <link rel="stylesheet" href="css/style2.css">
  <div class="block">
  <div class="panel"><a href="./"><img alt="" src="img/house.svg" class="control" /></a></div>
<p><b>Настройка экспертов:</b></p>
<form method="post" name="form1">
<div class="block window" id="cp" style="margin:0 auto;width:20%;display:none;position:fixed;z-index:1;">
Выберете, куда и в какую тему копировать имена экспертов 
<select class="text" name="select">
<option value="Эксперты">Эксперты</option>
<option value="Оцениваемые">Оцениваемые</option>
</select>
<select class="text" name="t" >';
$t=mysqli_query($dbcnx,"select * from `theme` where `UID`=".$_SESSION['id']);
while($theme=mysqli_fetch_array($t))
{
    echo '<option value="'.$theme['ID'].'">'.$theme['Theme'].'</option>';
}

echo '
</select>
<input class="button" name="copy" type="submit" value="Копировать">
<input class="button" name="cancel" type="button" onclick="document.getElementById(\'cp\').style.display=\'none\';" value="Отмена">
</div>
	<p><input class="text" maxlength="50" name="expert" size="50" type="text"> <input class="button min" name="add" type="submit" value="Добавить"></p>
	<table class="greenTable" align="center" border="1" cellpadding="1" cellspacing="1" style="width: 70%">
		<caption>Список экспертов</caption>
		<thead>
			<tr>
				<th scope="col">Имя</th>
				<th scope="col" style="text-align: center;"><input class="checkbox" type="checkbox" onclick="checkAll(this)" /></th>
			</tr>
		</thead>
		<tbody>';
		$res=mysqli_query($dbcnx,"SELECT * FROM `expert` where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']." order by `expert`");
		while($result=mysqli_fetch_array($res))
		{
			echo '
			<tr>
				<td>'.$result['expert'].'</td>
				<td style="text-align: center;"><input name="'.$result['ID'].'" type="checkbox" value="TRUE"></td>
			</tr>
		';
		}
		echo '
		</tbody>
	</table>
	<p><input class="button" name="delete" type="submit" value="Удалить выбранные"> <input class="button" name="cp" onclick="document.getElementById(\'cp\').style.display=\'block\'" type="button"  value="Копировать выбранные"></p>
</form>
<p>&nbsp;</p>
</div>
';
?>