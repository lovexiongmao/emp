<?php 
	require_once 'model/common.php';
	getCookieVal("id")
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>后台登录系统</title>
<style type="text/css">
 body { background-color:skyblue;  } 
 .wrapper {margin-top:200px;margin-left:550px;}
 </style>
</head>
<body>

<div class="wrapper">
<h1>管理员登录系统</h1>
<form action="controller/loginProcess1.php" method="post">
<table>
<tr><td>用户id</td><td><input type="text" name="id" value="<?php echo getCookieVal("id"); ?>"/></td></tr>
<tr><td>密&nbsp;码</td><td><input type="password" name="password"/></td></tr>
<tr><td>验证码</td><td><input type="text" name="checkcode"/></td></tr>
<tr><td>验码图</td><td><img src="model/checkCode.php" onclick="this.src='model/checkCode.php?aa='+Math.random()"/></td></tr>
<tr><td colspan="2">是否保存用户id<input type="checkbox" value="yes" name="keep"/></td></tr>
<tr><td><input type="submit" value="用户登录"/></td><td><input type="reset" value="重现填写"/></td></tr>
</table>
</form>
<?php 
	//接收errno
	if(!empty($_GET['errno'])){
		
		//接收错误编号
		$errno=$_GET['errno'];
		if($errno==1){
			echo "<br/><font color='red' size='3'>你的用户名或者密码错误</font>";
		}
		else if($errno==2){
			echo "<br/><font color='red' size='3'>你是一个非法盗链者，请按正常流程登录</font>";
		}
		else if($errno==3){
			echo "<br/><font color='red' size='3'>你的验证码错误</font>";
		}
	}
?>
</div>

</body>
</html>
