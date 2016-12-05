<?php
	require_once '../model/AdminService.class.php';
	//接收参数
	//1.id
	$id=$_POST['id'];
	//2.password
	$password=$_POST['password'];
	//3.验证码
	$checkCode=$_POST['checkcode'];
	// 先看看验证码是否ok
	session_start();
	if($checkCode!=$_SESSION['myCheckCode']){
		header("Location: ../index.php?errno=3");
		exit();
	}

	//4.看看用户是否有点击选择保存id
	if(empty($_POST['keep'])){
 		if(!empty($_COOKIE["id"])){
 			setcookie("id",$id,time()-100);
		}
	}else{
		setcookie("id",$id,time()+24*3600);
	}

	$adminService=new AdminService();
	if ($name=$adminService->checkAdmin($id, $password)) {
		session_start();
		$_SESSION['loginuser']=$name;
		header("location:../view/empMange1.php?name=$name&indexin=yes");
		//下面三个是测试cookies的作用域问题。
		// header("location:test.php");
		// header("location:../model/test.php");
		// header("location:../view/test.php");
		exit();
	}else{
		header("location:../index.php?errno=1");
		exit();
	}
	
?>