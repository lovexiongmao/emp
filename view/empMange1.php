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
        //����֤�Ƿ��ǺϷ���¼
        checkUserValidate();    
        echo "��ӭ".$_GET['name']."��¼�ɹ�"."<br/>";
        //��ʾ�ϴε�¼ʱ��
        getLastTime();
        echo "<br/><a href='../index.php'>���ص�¼����</a>";
    }
	
?>
<div class="kk">
    <h1>����Ա������</h1>
    <h3>1.Ա����</h3>
    &nbsp;&nbsp;<a href="empList1.php">�����û�</a><br/>
    &nbsp;&nbsp;<a href="addEmp.php">����û�</a><br/>
    <h3>2.<a href="../../���˼��/myself.html">���˼��</a></h3>
    <h3>3.<a href="../../qingmo/index.html">��ĭ���ֵ�̨</a></h3>
    <h3>4.<a href="../../tingmc��ҳ��Ŀ/tingmc.html">�����������</a></h3>
    <h3>5.<a href="../../meituan/index.html">�ƶ�������</a></h3>
    <h3>6.<a href="../../����Ӣ������/index.html">�ƶ���TGP�ٷ�����</a></h3>
    <h3>7.<a href="../../mini������.html">mini�������</a></h3>
    <h3>8.<a href="../../jsС��ϰ֮��ȭ��Ϸ/test8.html">��ȭС��Ϸ</a></h3>
    <h3>9.<a href="../index.php">�˳�ϵͳ</a></h3>
</div>
</body>
</html>
