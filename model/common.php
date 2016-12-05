<?php
	function getLastTime(){
		//设置时区
		date_default_timezone_set("Asia/Chongqing");
		//首先看看cookie有没有上次登录的信息
		if(!empty($_COOKIE['lastVisit'])){		
			echo "你上次登录时间是".$_COOKIE['lastVisit'];
			//更新时间
			setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);		
		}else{		
			//说明用户是第一次登录
			echo "你是第一次登录";
			//更新时间
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
	//验证用户是否是合法的登录
	function checkUserValidate(){
		session_start();		
		if(empty($_SESSION['loginuser'])){
			header("location:../index.php?errno=2");
		}		
	}
?>