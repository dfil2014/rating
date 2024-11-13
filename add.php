<?php
include ('lib/connect.php'); //подключаемся к БД
session_start();
include('lib/function_global.php');
	validate();
    check_session();
if(isset($_POST['add']))
{
mysqli_query($dbcnx,"INSERT INTO `criterion` (`criterion`,`UID`,`theme_id`) VALUES ('".$_POST['criterion']."','".$_SESSION['id']."','".$_SESSION['theme']."');");	
}
if(isset($_POST['delete']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `criterion` where `theme_id`=".$_SESSION['theme']." and `UID`=".$_SESSION['id']);
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
mysqli_query($dbcnx,"DELETE FROM `criterion` WHERE `criterion`.`ID` = '".$result['ID']."';");
			}
		}	
}
if(isset($_POST['copy']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `criterion` where `UID`=".$_SESSION['id']." and `theme_id`=".$_SESSION['theme']);
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
$a=mysqli_fetch_array(mysqli_query($dbcnx,"select `criterion` from `criterion` WHERE `criterion`.`ID` = '".$result['ID']."';"));
mysqli_query($dbcnx,"insert into `criterion` ( `UID`, `theme_id`, `criterion`) VALUES (".$_SESSION['id'].",".$_POST['t'].",'".$a['criterion']."')");
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
  <div class="panel"><a href="criterion.php"><img alt="" src="img/house.svg" class="control" /></a></div>
<p><b>Добавление критериев:</b></p>
<form method="post" name="form1">
<div class="block window" id="cp" >
Выберете в какую тему копировать выбранные критерии: 
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
	<p><input class="text" maxlength="50" name="criterion" size="50" type="text"> <input name="add" class="button min" type="submit" value="Добавить"></p>
	<table class="greenTable" align="center" border="1" cellpadding="1" cellspacing="1" >
		<caption>Список критериев</caption>
		<thead>
			<tr>
				<th scope="col">Критерий</th>
				<th scope="col" style="text-align: center;"><input class="checkbox" type="checkbox" onclick="checkAll(this)" /></th>
			</tr>
		</thead>
		<tbody>';
		$res=mysqli_query($dbcnx,"SELECT * FROM `criterion` where `theme_id`=".$_SESSION['theme']." and `UID`=".$_SESSION['id']);
		while($result=mysqli_fetch_array($res))
		{
			echo '
			<tr>
				<td>'.$result['criterion'].'</td>
				<td style="text-align: center;"><input name="'.$result['ID'].'" type="checkbox" class="checkbox" value="TRUE"></td>
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