<?php
	require_once '../model/EmpService.class.php';
	//�����û�Ҫɾ�����û�ID
	$empService=new EmpService();

	//�ȿ����û���Ҫ��ҳ����ɾ��ĳ����Ա
	if(!empty($_REQUEST['flag'])){		
		//����flag��ֵ
		$flag=$_REQUEST['flag'];
		//����ɾ������
		if($flag=="del"){
			//��ʱ����֪��Ҫɾ���û�
			$id=$_GET['id'];
			if($empService->delEmpById($id)==1){
				//�ɹ���
				header("location:../view/ok.php");
				exit();
			}else {
				//ʧ�ܣ�
				header("location:../view/err.php");
				exit();
			}
		//�����������
		}else if ($flag=="addemp"){
			//˵���û�ϣ��ִ����ӹ�Ա
			//��������
			$name=$_POST['name'];
			$grade=$_POST['grade'];
			$email=$_POST['email'];
			$salary=$_POST['salary'];
			//������->���ݿ�
			$res=$empService->addEmp($name, $grade, $email, $salary);
			if($res==1){
				header("location:../view/ok.php");
				exit();
			}else {
				header("location:../view/err.php");
				exit();
			}
		//�����޸�����
		}else if ($flag=="updateemp"){
			//˵���û�ϣ��ִ���޸Ĺ�Ա��Ϣ
			//��������
			$id=$_POST['id'];
			$name=$_POST['name'];
			$grade=$_POST['grade'];
			$email=$_POST['email'];
			$salary=$_POST['salary'];			
			//����޸�->���ݿ�
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