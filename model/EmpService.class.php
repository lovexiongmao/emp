<?php
	require_once 'SqlHelper.class.php';
	require_once 'Emp.class.php';
	//����һ���������Ի�ȡ���ж���ҳ
	class EmpService{
		
		function updataEmp($id,$name,$grade,$email,$salary){
			$sql="update emp set name='$name',grade=$grade,email='$email',salary=$salary where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		//����id�Ż�ȡһ����Ա����Ϣ
		function getEmpById($id){
			
			$sql="select * from emp where id=$id";
			$sqlHelper=new SqlHelper();
			$arr=$sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
			//���η�װ��$arr->Emp����ʵ����ʾ
			//����Emp����ʵ��
			$emp=new Emp();
			$emp->setId($arr[0]['id']);
			$emp->setName($arr[0]['name']);
			$emp->setGrade($arr[0]['grade']);
			$emp->setEmail($arr[0]['email']);
			$emp->setSalary($arr[0]['salary']);
			return $emp;			
		}
		
		//���һ������
		function addEmp($name,$grade,$email,$salary){
			
			//��һ��sql���
			$sql="insert into emp (name,grade,email,salary) values(
				'$name',$grade,'$email',$salary);";
			//ͨ��sqlHelper������
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;			
		}
	
		//�ڶ���ʹ�÷�װ�ķ�ʽ��ɷ�ҳ(��ҳ��ҵ���߼�) 
		function getFenyePage($fenyePage){
			
			//����һ��SqlHelperʵ��
			$sqlHelper=new SqlHelper();
			$sql1="select * from emp limit "
					.($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;		
			
			$sql2="select count(id) from emp";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);				
			
			$sqlHelper->close_connect();
		}
		
		//���������idɾ��ĳ���û�
		public function delEmpById($id){
			
			$sql="delete from emp where id=$id";
			//����һ��SqlHelper����ʵ��
			$sqlHelper=new SqlHelper();
			
			return $sqlHelper->execute_dml($sql);
		}		
	}
	
?>











