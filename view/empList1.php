<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gbk" />
	<title>雇员信息列表</title>
	<script type="text/javascript">
	<!-- 
		function confirmDele(val){
			return window.confirm("是否要删除id="+val+"的用户");
		}
	//-->
	</script> 
</head>
<?php
	require_once '../model/common.php';
	require_once '../model/EmpService.class.php';
	require_once '../model/FenyePage.class.php';	

	//先验证是否是合法登录
	checkUserValidate();
	
	//创建了一个EmpService对象实例
	$empService=new EmpService();
		
	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();
	
	$fenyePage->gotoUrl="empList1.php";
	$fenyePage->pageSize=7;     //每页显示多少条记录（自己指定）
	//这里我们需要判断，是否有这个pageNow发送，有就使用，
	//如果没有，就默认显示第一页
	$fenyePage->pageNow=1;
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];	
	}				 		
	$empService->getFenyePage($fenyePage);
	
	echo "<h1>雇员信息列表</h1>";
	echo "<table width='700px' border='2px' cellspacing='0px' bordercolor='green'>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th>".
	"<th>修改用户</th></tr>";
	
	for ($i=0;$i<count($fenyePage->res_array);$i++){
		
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td>".
		"<td>{$row['salary']}</td><td><a onclick='return confirmDele({$row['id']})' href='../controller/empProcess.php?flag=del&id={$row['id']}'>删除用户2</a></td><td><a href='updateEmpUI.php?id={$row['id']}'>修改用户</a></td></tr>";
		
	}
	echo "</table>";	
    //显示上一页和下一页    
	echo  $fenyePage->navigate;
 
    ?>
    <form action="empList1.php">
            跳转到:<input type="text" name="pageNow" />
    <input type="submit" value="GO">
    </form>
    <?php 
    echo "<a href='empMange1.php'>返回主界面</a>";
    ?>
   
</html>