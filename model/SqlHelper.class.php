<?php
	//这个一个工具类，作业是完成对数据库的操作
	class SqlHelper{
		public  $conn;
		public  $dbname="empsystem";
		public  $username="root";
		public  $password="root";
		public  $host="localhost";
		
		
		//构造函数完成对数据库固定操作的前三步
		public function __construct(){
			//1.链接数据库
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn){
				die("链接失败".mysql_error());			
			}
			//2.选择数据库
			mysql_select_db($this->dbname,$this->conn);
			//3.设置数据库编码
			mysql_query("set names utf8",$this->conn) or die(mysql_error());
		}
			//4和5.发送数据库操作指令并且把结果返回（处理）

			 
		//执行dql语句
		public function  execute_dql($sql){
			
			// $res=mysql_query($sql,$this->conn) or die(mysql_error());			
			$res=mysql_query($sql,$this->conn);			
			return $res;
			
		}
		//为什么要把结果集导入数组，用数组返回呢？答：因为结果集要尽早释放，把它放到数组里面以后就立马
		//可以释放了，剩下的就可以用数组返回结果了，因为数组可以被垃圾回收机制，而结果集不能被垃圾回收机制回收
		//执行dql语句，但是返回的是一个数组
		
		public function execute_dql2($sql){
			
			$arr=array();
			// $res=mysql_query($sql,$this->conn) or die(mysql_error());
			$res=mysql_query($sql,$this->conn);
			$i=0;
			//把$res=>$arr
			while (($row=mysql_fetch_assoc($res))!=false){
				$arr[$i++]=$row;
			}
			//这里就可以马上把$res关闭 了
			mysql_free_result($res);
			return $arr;
		}
		
		//考虑分页情况的查询，这是一个比较通用的并体现了oop编程思想的代码
		//$sql1="select * from where 表名 limit 0,8";
		//$sql2="select count(id) from 表名";
		 
		 
		public function execute_dql_fenye($sql1,$sql2,$fenyePage){
			
			//这里我们查询了要分页显示的数据
			// $res=mysql_query($sql1,$this->conn) or die(mysql_error());
			$res=mysql_query($sql1,$this->conn);
			//$res=>array()
			$arr=array();
			//把$res转移到$arr
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
			
			//把导航信息也封装到我们的fenyePage对象中
			$navigate="";
			if($fenyePage->pageNow>1){
			$prePage=$fenyePage->pageNow-1;
			$navigate="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页</a>";
			}
			if($fenyePage->pageNow<$fenyePage->pageCount){
			$nextPage=$fenyePage->pageNow+1;
			$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页</a>";
			}
			
			$page_whole=10;
			$start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
			$index=$start;
			
			//整体每十页 向前翻动
	 		//如果当前pageNow在1-10页数，就没有向前翻动的超链接
			if($fenyePage->pageNow>$page_whole){
				$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'><<<</a>";
			}
			//可以使用for打印超链接
			for(;$start<$index+$page_whole;$start++){
				$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>";
			}
			
			//整体每十页 向后翻动
			$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$start'>>>></a>";
			
			//显示当前页和共有多少页
			$navigate.="当前页{$fenyePage->pageNow}/共有{$fenyePage->pageCount}页";
			//指定跳转到某页
			echo "<br/></br/>";
			
			//把$arr赋给 fenyePage
			$fenyePage->res_array=$arr;
			//这里看不懂为什么$navigate.和上面的$navigate是怎么区分的，难道是通过点来区分的吗？
			$fenyePage->navigate=$navigate;
			
		}
		
		
		
		//执行dml语句
		public function execute_dml($sql){
			
			// $b=mysql_query($sql,$this->conn) or die(mysql_error());
			$b=mysql_query($sql,$this->conn);
			if(!$b){
				return 0;
			}else{
				if(mysql_affected_rows($this->conn)>0){
					return 1; //表示执行成功
				}else{
					return 2; //表示没有行受到影响
				}
			}
		}
		
			//6.关闭连接（因为释放资源很简单，没有必要封装成一个方法然后调用，调用它打的代码还没有
			//自己直接在那个页面写一个释放资源方便，所以这里没有封封装它，但是这个思想并不是完全的oop思想；
		//关闭连接的方法
		public function close_connect(){
			
			if (!empty($this->conn)) {
				mysql_close($this->conn);
			}
		}
	}

?>