<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/style.css" />
    <script type="text/javascript" src="/record_system/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form action="<?php echo U('User/edit');?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="<?php echo ($_id); ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">身份证</td>
            <td><input type="text" value="<?php echo ($idnumber); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">姓名</td>
            <td><input type="text" value="<?php echo ($name); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">手机号码</td>
            <td><input type="text" value="<?php echo ($phonenumber_1); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">固定电话</td>
            <td><input type="text" value="<?php echo ($phonenumber_2); ?>"/></td>
        </tr>
         <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value="<?php echo ($email); ?>"/></td>
        </tr>
         <tr>
            <td class="tableleft">工作单位</td>
            <td><input type="text" value="<?php echo ($workplace); ?>"/></td>
        </tr>
         <tr>
            <td class="tableleft">家庭住址</td>
            <td><input type="text" value="<?php echo ($address); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('User/index');?>";
		 });

    });
</script>