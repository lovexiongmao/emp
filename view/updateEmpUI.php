<!DOCTYPE html>
<html lang="en">
<?php
	require_once '../model/EmpService.class.php';
	//��ҳ��Ҫ��ʾ׼���޸ĵ��û�����Ϣ
	$id=$_GET['id'];
	//ͨ��idȡ���û���������Ϣ
	
	$empServiece=new EmpService();
	//$arr=$empServiece->getEmpById($id);
	$emp=$empServiece->getEmpById($id);
?>
<head>
<meta charset="gbk" />
<title>����Ա��¼ҳ��</title>
</head>
<body>
<h1>�޸Ĺ�Ա</h1>
<form action="../controller/empProcess.php?" method="post">
<table>
<tr><td>id</td><td><input type="text" readonly="readonly" name="id" value="<?php echo $emp->getId(); ?>"/></td></tr>
<tr><td>����</td><td><input type="text" name="name" value="<?php echo $emp->getName(); ?>"/></td></tr>
<tr><td>����</td><td><input type="text" name="grade" value="<?php echo $emp->getGrade(); ?>"/></td></tr>
<tr><td>����</td><td><input type="text" name="email" value="<?php echo $emp->getEmail(); ?>"/></td></tr>
<tr><td>нˮ</td><td><input type="text" name="salary" value="<?php echo $emp->getSalary(); ?>"/></td></tr>
<input type="hidden" name="flag" value="updateemp"/>
<tr><td><input type="submit" value="�޸��û�"></td>
<td><input type="reset" value="������д"/></td></tr>
</table>

</form>
<?php 
	echo "<a href='empMange1.php'>����������</a>.<br/>";
	echo "<a href='empList1.php'>����Ա���б�</a>";
?>
</body>
</html>