<?php
ini_set ("session.use_trans_sid", true);
session_start();
if(is_dir('install'))
{
	header("Location: install");
	}
include ('lib/connect.php'); //подключаемся к БД
if (isset($_GET['action'])=='out')
{
session_start(); 	
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];	
mysqli_query($dbcnx, "UPDATE users SET `online`=0 WHERE `id`='".$id."'"); //обнуляем поле online, говорящее, что пользователь вышел с сайта (пригодится в будущем) 	
unset($_SESSION['id']); //удаляем переменную сессии 
unset($_SESSION['theme']);	
}
SetCookie("login", NULL,1); //удаляем cookie с логином 
SetCookie("password", NULL,1); //удаляем cookie с паролем
SetCookie("pass", NULL,1);
header('Location: ./');  
}
else{
if (isset($_SESSION['id']) || ((isset($_COOKIE['login'])!="") && (isset($_COOKIE['password'])!=""))) 
{
	 	  	if (isset($_SESSION['id']))//если сесcия есть 	

{ 		
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если cookie есть, то просто обновим время их жизни и вернём true 		
{ 			
SetCookie("login", "", time() - 1); 			SetCookie("password","", time() - 1); 			

setcookie ("login", $_COOKIE['login'], time() + 900); 			

setcookie ("password", $_COOKIE['password'], time() + 900); 			

$id = $_SESSION['id']; 			
		$tm = time(); 	
        mysqli_query($dbcnx, "UPDATE users SET `online`='".$tm."', `last_act`='".$tm."' WHERE `id`='".$id."'"); //обновляем активность пользователя
		$res=mysqli_query($dbcnx,'select `page` from save where `id`='.$_SESSION['id']);
		$page=mysqli_fetch_array($res);
		$start=$page['page'];
		header('Location: criterion_list.php');				
} 
else //иначе добавим cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала  		
{ 			
$rez = mysqli_query($dbcnx, "SELECT * FROM users WHERE `id`='".$_SESSION['id']."'"); //запрашиваем строку с искомым id 			

if (mysqli_num_rows($rez) == 1) //если получена одна строка 			
{ 		
$row = mysqli_fetch_assoc($rez); //записываем её в ассоциативный массив 				

setcookie ("login", $row['login'], time()+900); 				

setcookie ("password", md5($row['login'].$row['password']), time() + 900); 

$id = $_SESSION['id'];
		$tm = time(); 	
        mysqli_query($dbcnx, "UPDATE users SET `online`='".$tm."', `last_act`='".$tm."' WHERE `id`='".$id."'"); //обновляем активность пользователя		
		header('Location: criterion_list.php');
		

} 
}
}
else //если сессии нет, то проверим существование cookie. Если они существуют, то проверим их валидность по БД 	
{ 		
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если куки существуют. 		

{ 			
$rez = mysqli_query($dbcnx, "SELECT * FROM users WHERE `login`='".$_COOKIE['login']."'"); //запрашиваем строку с искомым логином и паролем 			
@$row = mysqli_fetch_assoc($rez); 			

if(@mysqli_num_rows($rez) == 1 && md5($row['login'].$row['password']) == $_COOKIE['password']) //если логин и пароль нашлись в БД 			
{ 				
$_SESSION['id'] = $row['id']; //записываем в сесиию id 				
$id = $_SESSION['id']; 				

$tm = time(); 	
mysqli_query($dbcnx, "UPDATE users SET `online`='".$tm."', `last_act`='".$tm."' WHERE `id`='".$id."'");	 				
		header('Location: criterion_list.php');			
} 			
else //если данные из cookie не подошли, то удаляем эти куки, ибо они такие нам не нужны 			
{ 				
SetCookie("login", NULL, -1); 				

SetCookie("password", NULL, -1);	 				
} 		
} 			
} 
}
if(isset($_POST['log_in']))
{
	if ($_POST['login'] != "" && $_POST['password'] != "")
	{
	$login = $_POST['login']; 
	$password = $_POST['password'];
	$rez = mysqli_query($dbcnx, "SELECT * FROM users WHERE `login`='".$login."'"); //запрашиваем строку из БД с логином, введённым пользователем 	
	
	if (mysqli_num_rows($rez) == 1) //если нашлась одна строка, значит такой юзер существует в БД 
	{
		$row = mysqli_fetch_assoc($rez); 			
		if (md5(md5($password).$row['salt']) == $row['password']) //сравниваем хэшированный пароль из БД с хэшированными паролем, введённым пользователем и солью (алгоритм хэширования описан в предыдущей статье)
		{ 
		//пишем логин и хэшированный пароль в cookie, также создаём переменную сессии
		if(setcookie ("login", $row['login'], time() + 900)) echo '1'; 						
		setcookie ("password", md5($row['login'].$row['password']), time() + 900); 					
		$_SESSION['id'] = $row['id'];	//записываем в сессию id пользователя 	
		$tm = time(); 	
        mysqli_query($dbcnx, "UPDATE users SET `online`='".$tm."', `last_act`='".$tm."' WHERE `id`='".$id."'"); //обновляем активность пользователя	
		header('Location: ./');
		}
		else echo "<script>alert('Неверный пароль')</script>";
	}
	else echo "<script>alert('Неверный логин и пароль')</script>";
		
		
	}
	else echo "<script>alert('Поля не должны быть пустыми')</script>";
	}
}
include ('template/index.html'); //подключаем файл с формой


?>