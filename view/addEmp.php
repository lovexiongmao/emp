<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gbk" />
    <title>管理员登录页面</title>
</head>
<body>
<h1>添加雇员</h1>
<form action="../controller/empProcess.php?" method="post">
<table>
<tr><td>名字</td><td><input type="text" name="name"/></td></tr>
<tr><td>级别</td><td><input type="text" name="grade"/></td></tr>
<tr><td>电邮</td><td><input type="text" name="email"/></td></tr>
<tr><td>薪水</td><td><input type="text" name="salary"/></td></tr>
<input type="hidden" name="flag" value="addemp"/>
<tr><td><input type="submit" value="添加用户"></td>
<td><input type="reset" value="重新填写"/></td></tr>
</table>
</form>
</body>
</html>