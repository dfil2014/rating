<?php
session_start();
include ('lib/function_global.php');
include ('lib/connect.php'); //подключаемся к БД 
validate();
if(isset($_POST['add']))
{
mysqli_query($dbcnx,"INSERT INTO `theme` (`theme`,`UID`) VALUES ('".$_POST['theme']."','".$_SESSION['id']."');");	
echo mysqli_error($dbcnx);
}
if(isset($_POST['delete']))
{
		$res=mysqli_query($dbcnx,"SELECT * FROM `theme` where `UID`=".$_SESSION['id']);
		while($result=mysqli_fetch_array($res))
		{
			if(isset($_POST[$result['ID']])&&$_POST[$result['ID']]=='TRUE')
			{
mysqli_query($dbcnx,"DELETE FROM `theme` WHERE `theme`.`ID` = '".$result['ID']."';");
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
<p><b>Настройка тем:</b></p>
<form method="post" name="form1">
	<p><input class="text" maxlength="50" name="theme" size="50" type="text"> <input class="button min" name="add" type="submit" value="Добавить"></p>
	<table class="greenTable" align="center" border="1" cellpadding="1" cellspacing="1">
		<caption>Список тем</caption>
		<thead>
			<tr>
				<th scope="col">Тема</th>
				<th scope="col" style="text-align: center;"><input class="checkbox" type="checkbox" onclick="checkAll(this)" /></th>
			</tr>
		</thead>
		<tbody>';
		$res=mysqli_query($dbcnx,"SELECT * FROM `theme` where `UID`=".$_SESSION['id']);
		while($result=mysqli_fetch_array($res))
		{
			echo '
			<tr>
				<td>'.$result['Theme'].'</td>
				<td style="text-align: center;"><input name="'.$result['ID'].'" type="checkbox" class="checkbox" value="TRUE"></td>
			</tr>
		';
		}
		echo '
		</tbody>
	</table>
	<p><input class="button" name="delete" type="submit" value="Удалить выбранные"></p>
</form>
<p>&nbsp;</p>
</div>
';
?>