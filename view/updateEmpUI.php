<!DOCTYPE html>
<html lang="en">
<?php
	require_once '../model/EmpService.class.php';
	//该页面要显示准备修改的用户的信息
	$id=$_GET['id'];
	//通过id取得用户的其他信息
	
	$empServiece=new EmpService();
	//$arr=$empServiece->getEmpById($id);
	$emp=$empServiece->getEmpById($id);
?>
<head>
<meta charset="gbk" />
<title>管理员登录页面</title>
</head>
<body>
<h1>修改雇员</h1>
<form action="../controller/empProcess.php?" method="post">
<table>
<tr><td>id</td><td><input type="text" readonly="readonly" name="id" value="<?php echo $emp->getId(); ?>"/></td></tr>
<tr><td>名字</td><td><input type="text" name="name" value="<?php echo $emp->getName(); ?>"/></td></tr>
<tr><td>级别</td><td><input type="text" name="grade" value="<?php echo $emp->getGrade(); ?>"/></td></tr>
<tr><td>电邮</td><td><input type="text" name="email" value="<?php echo $emp->getEmail(); ?>"/></td></tr>
<tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $emp->getSalary(); ?>"/></td></tr>
<input type="hidden" name="flag" value="updateemp"/>
<tr><td><input type="submit" value="修改用户"></td>
<td><input type="reset" value="重新填写"/></td></tr>
</table>

</form>
<?php 
	echo "<a href='empMange1.php'>返回主界面</a>.<br/>";
	echo "<a href='empList1.php'>返回员工列表</a>";
?>
</body>
</html>