<?php
	function getLastTime(){
		//����ʱ��
		date_default_timezone_set("Asia/Chongqing");
		//���ȿ���cookie��û���ϴε�¼����Ϣ
		if(!empty($_COOKIE['lastVisit'])){		
			echo "���ϴε�¼ʱ����".$_COOKIE['lastVisit'];
			//����ʱ��
			setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);		
		}else{		
			//˵���û��ǵ�һ�ε�¼
			echo "���ǵ�һ�ε�¼";
			//����ʱ��
			setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
		}
	}

	
	function getCookieVal($key){
		if (empty($_COOKIE["$key"])){
			return "";
		}else {
			return $_COOKIE["$key"];
		}		
	}
	//��֤�û��Ƿ��ǺϷ��ĵ�¼
	function checkUserValidate(){
		session_start();		
		if(empty($_SESSION['loginuser'])){
			header("location:../index.php?errno=2");
		}		
	}
?>