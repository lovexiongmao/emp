<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gbk" />
	<title>��Ա��Ϣ�б�</title>
	<script type="text/javascript">
	<!-- 
		function confirmDele(val){
			return window.confirm("�Ƿ�Ҫɾ��id="+val+"���û�");
		}
	//-->
	</script> 
</head>
<?php
	require_once '../model/common.php';
	require_once '../model/EmpService.class.php';
	require_once '../model/FenyePage.class.php';	

	//����֤�Ƿ��ǺϷ���¼
	checkUserValidate();
	
	//������һ��EmpService����ʵ��
	$empService=new EmpService();
		
	//����һ��FenyePage����ʵ��
	$fenyePage=new FenyePage();
	
	$fenyePage->gotoUrl="empList1.php";
	$fenyePage->pageSize=7;     //ÿҳ��ʾ��������¼���Լ�ָ����
	//����������Ҫ�жϣ��Ƿ������pageNow���ͣ��о�ʹ�ã�
	//���û�У���Ĭ����ʾ��һҳ
	$fenyePage->pageNow=1;
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];	
	}				 		
	$empService->getFenyePage($fenyePage);
	
	echo "<h1>��Ա��Ϣ�б�</h1>";
	echo "<table width='700px' border='2px' cellspacing='0px' bordercolor='green'>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>ɾ���û�</th>".
	"<th>�޸��û�</th></tr>";
	
	for ($i=0;$i<count($fenyePage->res_array);$i++){
		
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td>".
		"<td>{$row['salary']}</td><td><a onclick='return confirmDele({$row['id']})' href='../controller/empProcess.php?flag=del&id={$row['id']}'>ɾ���û�2</a></td><td><a href='updateEmpUI.php?id={$row['id']}'>�޸��û�</a></td></tr>";
		
	}
	echo "</table>";	
    //��ʾ��һҳ����һҳ    
	echo  $fenyePage->navigate;
 
    ?>
    <form action="empList1.php">
            ��ת��:<input type="text" name="pageNow" />
    <input type="submit" value="GO">
    </form>
    <?php 
    echo "<a href='empMange1.php'>����������</a>";
    ?>
   
</html>