<?php
	require_once 'SqlHelper.class.php';
	require_once 'Emp.class.php';
	//定义一个函数可以获取共有多少页
	class EmpService{
		
		function updataEmp($id,$name,$grade,$email,$salary){
			$sql="update emp set name='$name',grade=$grade,email='$email',salary=$salary where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		//根据id号获取一个雇员的信息
		function getEmpById($id){
			
			$sql="select * from emp where id=$id";
			$sqlHelper=new SqlHelper();
			$arr=$sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();
			//二次封装，$arr->Emp对象实例演示
			//创建Emp对象实例
			$emp=new Emp();
			$emp->setId($arr[0]['id']);
			$emp->setName($arr[0]['name']);
			$emp->setGrade($arr[0]['grade']);
			$emp->setEmail($arr[0]['email']);
			$emp->setSalary($arr[0]['salary']);
			return $emp;			
		}
		
		//添加一个方法
		function addEmp($name,$grade,$email,$salary){
			
			//做一个sql语句
			$sql="insert into emp (name,grade,email,salary) values(
				'$name',$grade,'$email',$salary);";
			//通过sqlHelper完成添加
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;			
		}
	
		//第二种使用封装的方式完成分页(分页的业务逻辑) 
		function getFenyePage($fenyePage){
			
			//创建一个SqlHelper实例
			$sqlHelper=new SqlHelper();
			$sql1="select * from emp limit "
					.($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;		
			
			$sql2="select count(id) from emp";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);				
			
			$sqlHelper->close_connect();
		}
		
		//根据输入的id删除某个用户
		public function delEmpById($id){
			
			$sql="delete from emp where id=$id";
			//创建一个SqlHelper对象实例
			$sqlHelper=new SqlHelper();
			
			return $sqlHelper->execute_dml($sql);
		}		
	}
	
?>











