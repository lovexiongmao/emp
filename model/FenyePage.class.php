<?php

	Class FenyePage{
		Public $pageSize=6; //这是用户指定
		Public $rowCount;   //这是从数据库中获取
		Public $res_array;  //这是显示数据
		Public $pageNow;    //这是用户指定
		Public $pageCount;  //这是计算得到
		public $navigate;   //分页导航
		public $gotoUrl;    //表示把分页请求提交给哪个页面
		
	}

?>