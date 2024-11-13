<?php
ini_set ("session.use_trans_sid", true);
session_start();
if(is_dir('install'))
{
	header("Location: install");
} 
include ('lib/connect.php'); //подключаемся к БД
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) 
{
	header('Location: login.php');
}
if(isset($_SESSION['id']) && !isset($_COOKIE['pass'])) 
{
	header('Location: login.php');
}
if (isset($_GET['action'])=='out')
{
	if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];	
mysqli_query($dbcnx, "UPDATE users SET `online`=0 WHERE `id`='".$id."'"); //обнуляем поле online, говорящее, что пользователь вышел с сайта (пригодится в будущем) 	
unset($_SESSION['id']); //удаляем переменную сессии 	
}
 if(isset($_SESSION['expert'])) 
 {
unset($_SESSION['expert']); //удаляем переменную сессии 
 }	
SetCookie("pass", NULL,-1); //удаляем cookie с паролем 	
SetCookie("login", NULL,-1); //удаляем cookie с логином 	
SetCookie("password", NULL,-1); //удаляем cookie с паролем
header('Location: ./');  
}
else{
if (isset($_SESSION['expert']) || (isset($_COOKIE['pass'])!="")) 
{
	  	if (isset($_SESSION['pass']))//если сесcия есть 	

{ 
if(isset($_COOKIE['pass']))
{
SetCookie("pass",NULL,  - 1); 			
		

setcookie ("pass", $_COOKIE['pass'], time() + 900);	
		header('Location: criterion.php');		
}
else //иначе добавим cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала  		
{
setcookie ("pass", md5($row['expert'].$row['pass']), time() + 900); 			
header('Location: criterion.php');
} 
}
}
else //если сессии нет, то проверим существование cookie. Если они существуют, то проверим их валидность по БД 	
{ 		
if(isset($_COOKIE['pass'])) //если куки существуют. 		

{ 			
$rez = mysqli_query($dbcnx, "SELECT * FROM `expert` WHERE `ID`='".$_COOKIE['expert']."'"); //запрашиваем строку с искомым логином и паролем 			
@$row = mysqli_fetch_assoc($rez); 			

if(@mysqli_num_rows($rez) == 1 && $row['pass'] == $_COOKIE['pass']) //если логин и пароль нашлись в БД 			
{ 				
$_SESSION['pass'] = $row['pass']; //записываем в сесиию id 						 				
header('Location: criterion.php'); 			
} 			
else //если данные из cookie не подошли, то удаляем эти куки, ибо они такие нам не нужны 			
{ 								

SetCookie("pass", NULL, -1);	 				
} 		
} 			
} 
}
if(isset($_POST['pass']))
{
	if ($_POST['pass'] != "")
	{
	$password = $_POST['pass'];
	$rez = mysqli_query($dbcnx, "SELECT * FROM `expert` WHERE `pass`=".$password); //запрашиваем строку из БД с логином, введённым пользователем 	
	
	if (mysqli_num_rows($rez) == 1) //если нашлась одна строка, значит такой юзер существует в БД 
	{
		$row = mysqli_fetch_array($rez); 			
		//пишем логин и пароль в cookie, также создаём переменную сессии						
		setcookie ("pass", $row['pass'], time() + 900); 					
		$_SESSION['expert'] = $row['ID'];	//записываем в сессию id пользователя
		$_SESSION['theme']=$row['theme_id'];
		$_SESSION['id']=$row['UID'];
		header('Location: criterion.php');
		
	}
	else echo "<script>alert('Неверный пароль')</script>";
		
		
	}
	else echo "<script>alert('Поля не должны быть пустыми')</script>";
	}
echo '
  <link rel="stylesheet" href="css/style2.css">
  <div class="block">
<a href="./oauth"><img title="Войти с помощью личного сертификата" alt="" src="img/certi.svg" style="  position: absolute;
  top:5%; right:6%; float:right; height:12%; margin:20px; width:12%" /></a> 
<a href="./login.php"><img title="Войти" alt="" src="img/log-in.svg" style="  position: absolute;
  top:5%; right:0; float:right; height:12%; margin:20px; width:12%" /></a>
<p style="font-size: 2em;"><b>Введите PIN - код:</b></p>
<form method="post" name="form1">
	<p><input class="text" maxlength="6" autocomplete="off" name="pass" size="6" type="text"> <input class="button" name="ok" type="submit" value="OK"></p>
</form>
<p>&nbsp;</p>
</div>
';
?>