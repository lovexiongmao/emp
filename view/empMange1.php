<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gbk" />
    <title>Document</title>
    <style type="text/css">
        video {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border: 1px solid #504137;
        }

        .kk {
            position: relative;
            color: red;
        }
    </style>
</head>
<body>


<?php
    if(!empty($_GET['indexin'])){
        require_once '../model/common.php';
        //先验证是否是合法登录
        checkUserValidate();    
        echo "欢迎".$_GET['name']."登录成功"."<br/>";
        //显示上次登录时间
        getLastTime();
        echo "<br/><a href='../index.php'>返回登录界面</a>";
    }
	
?>
<div class="kk">
    <h1>管理员主界面</h1>
    <h3>1.员工表</h3>
    &nbsp;&nbsp;<a href="empList1.php">管理用户</a><br/>
    &nbsp;&nbsp;<a href="addEmp.php">添加用户</a><br/>
    <h3>2.<a href="../../个人简介/myself.html">个人简介</a></h3>
    <h3>3.<a href="../../qingmo/index.html">清沫音乐电台</a></h3>
    <h3>4.<a href="../../tingmc网页项目/tingmc.html">听麦克音乐网</a></h3>
    <h3>5.<a href="../../meituan/index.html">移动端美团</a></h3>
    <h3>6.<a href="../../掌上英雄联盟/index.html">移动端TGP官方助手</a></h3>
    <h3>7.<a href="../../mini计算器.html">mini版计算器</a></h3>
    <h3>8.<a href="../../js小练习之猜拳游戏/test8.html">猜拳小游戏</a></h3>
    <h3>9.<a href="../index.php">退出系统</a></h3>
</div>
</body>
</html>
