<?php
	require_once '../model/EmpService.class.php';
	//接收用户要删除的用户ID
	$empService=new EmpService();

	//先看看用户是要分页还是删除某个雇员
	if(!empty($_REQUEST['flag'])){		
		//接收flag的值
		$flag=$_REQUEST['flag'];
		//处理删除请求
		if($flag=="del"){
			//这时我们知道要删除用户
			$id=$_GET['id'];
			if($empService->delEmpById($id)==1){
				//成功！
				header("location:../view/ok.php");
				exit();
			}else {
				//失败！
				header("location:../view/err.php");
				exit();
			}
		//处理添加请求
		}else if ($flag=="addemp"){
			//说明用户希望执行添加雇员
			//接收数据
			$name=$_POST['name'];
			$grade=$_POST['grade'];
			$email=$_POST['email'];
			$salary=$_POST['salary'];
			//完成添加->数据库
			$res=$empService->addEmp($name, $grade, $email, $salary);
			if($res==1){
				header("location:../view/ok.php");
				exit();
			}else {
				header("location:../view/err.php");
				exit();
			}
		//处理修改请求
		}else if ($flag=="updateemp"){
			//说明用户希望执行修改雇员信息
			//接收数据
			$id=$_POST['id'];
			$name=$_POST['name'];
			$grade=$_POST['grade'];
			$email=$_POST['email'];
			$salary=$_POST['salary'];			
			//完成修改->数据库
			$res=$empService->updataEmp($id, $name, $grade, $email, $salary);
			if($res==1){
				header("location:../view/ok.php");
				exit();
			}else {
				header("location:../view/err.php");
				exit();
			}
		}
	}
?>