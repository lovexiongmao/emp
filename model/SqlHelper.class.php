<?php
	//���һ�������࣬��ҵ����ɶ����ݿ�Ĳ���
	class SqlHelper{
		public  $conn;
		public  $dbname="empsystem";
		public  $username="root";
		public  $password="root";
		public  $host="localhost";
		
		
		//���캯����ɶ����ݿ�̶�������ǰ����
		public function __construct(){
			//1.�������ݿ�
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn){
				die("����ʧ��".mysql_error());			
			}
			//2.ѡ�����ݿ�
			mysql_select_db($this->dbname,$this->conn);
			//3.�������ݿ����
			mysql_query("set names utf8",$this->conn) or die(mysql_error());
		}
			//4��5.�������ݿ����ָ��Ұѽ�����أ�����

			 
		//ִ��dql���
		public function  execute_dql($sql){
			
			// $res=mysql_query($sql,$this->conn) or die(mysql_error());			
			$res=mysql_query($sql,$this->conn);			
			return $res;
			
		}
		//ΪʲôҪ�ѽ�����������飬�����鷵���أ�����Ϊ�����Ҫ�����ͷţ������ŵ����������Ժ������
		//�����ͷ��ˣ�ʣ�µľͿ��������鷵�ؽ���ˣ���Ϊ������Ա��������ջ��ƣ�����������ܱ��������ջ��ƻ���
		//ִ��dql��䣬���Ƿ��ص���һ������
		
		public function execute_dql2($sql){
			
			$arr=array();
			// $res=mysql_query($sql,$this->conn) or die(mysql_error());
			$res=mysql_query($sql,$this->conn);
			$i=0;
			//��$res=>$arr
			while (($row=mysql_fetch_assoc($res))!=false){
				$arr[$i++]=$row;
			}
			//����Ϳ������ϰ�$res�ر� ��
			mysql_free_result($res);
			return $arr;
		}
		
		//���Ƿ�ҳ����Ĳ�ѯ������һ���Ƚ�ͨ�õĲ�������oop���˼��Ĵ���
		//$sql1="select * from where ���� limit 0,8";
		//$sql2="select count(id) from ����";
		 
		 
		public function execute_dql_fenye($sql1,$sql2,$fenyePage){
			
			//�������ǲ�ѯ��Ҫ��ҳ��ʾ������
			// $res=mysql_query($sql1,$this->conn) or die(mysql_error());
			$res=mysql_query($sql1,$this->conn);
			//$res=>array()
			$arr=array();
			//��$resת�Ƶ�$arr
			while ($row=mysql_fetch_assoc($res)){
				$arr[]=$row;
			}
			mysql_free_result($res);
			
			// $res2=mysql_query($sql2,$this->conn) or die(mysql_error());
			$res2=mysql_query($sql2,$this->conn);
			if($row=mysql_fetch_row($res2)){
				$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
				//$fenyePage->rowCount=$row[0];
			}
			
			mysql_free_result($res2);
			
			//�ѵ�����ϢҲ��װ�����ǵ�fenyePage������
			$navigate="";
			if($fenyePage->pageNow>1){
			$prePage=$fenyePage->pageNow-1;
			$navigate="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>��һҳ</a>";
			}
			if($fenyePage->pageNow<$fenyePage->pageCount){
			$nextPage=$fenyePage->pageNow+1;
			$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>��һҳ</a>";
			}
			
			$page_whole=10;
			$start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
			$index=$start;
			
			//����ÿʮҳ ��ǰ����
	 		//�����ǰpageNow��1-10ҳ������û����ǰ�����ĳ�����
			if($fenyePage->pageNow>$page_whole){
				$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'><<<</a>";
			}
			//����ʹ��for��ӡ������
			for(;$start<$index+$page_whole;$start++){
				$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>";
			}
			
			//����ÿʮҳ ��󷭶�
			$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$start'>>>></a>";
			
			//��ʾ��ǰҳ�͹��ж���ҳ
			$navigate.="��ǰҳ{$fenyePage->pageNow}/����{$fenyePage->pageCount}ҳ";
			//ָ����ת��ĳҳ
			echo "<br/></br/>";
			
			//��$arr���� fenyePage
			$fenyePage->res_array=$arr;
			//���￴����Ϊʲô$navigate.�������$navigate����ô���ֵģ��ѵ���ͨ���������ֵ���
			$fenyePage->navigate=$navigate;
			
		}
		
		
		
		//ִ��dml���
		public function execute_dml($sql){
			
			// $b=mysql_query($sql,$this->conn) or die(mysql_error());
			$b=mysql_query($sql,$this->conn);
			if(!$b){
				return 0;
			}else{
				if(mysql_affected_rows($this->conn)>0){
					return 1; //��ʾִ�гɹ�
				}else{
					return 2; //��ʾû�����ܵ�Ӱ��
				}
			}
		}
		
			//6.�ر����ӣ���Ϊ�ͷ���Դ�ܼ򵥣�û�б�Ҫ��װ��һ������Ȼ����ã���������Ĵ��뻹û��
			//�Լ�ֱ�����Ǹ�ҳ��дһ���ͷ���Դ���㣬��������û�з��װ�����������˼�벢������ȫ��oop˼�룻
		//�ر����ӵķ���
		public function close_connect(){
			
			if (!empty($this->conn)) {
				mysql_close($this->conn);
			}
		}
	}

?>