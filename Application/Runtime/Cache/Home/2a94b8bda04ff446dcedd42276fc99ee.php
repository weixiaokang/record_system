<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>手机消息管理系统</title>
	<meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/style.css" />
    <script type="text/javascript" src="/record_system/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/record_system/Public/Js/common.js"></script>
    <script type="text/javascript" src="/record_system/Public/me.js"></script>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>  
</head>
<body>
<div class="container">

    <form class="form-signin" method="post" action="<?php echo U('User/index');?>">
        <h2 class="form-signin-heading" align="center">登录系统</h2>
        <input type="text" name="phone" class="input-block-level" placeholder="手机号码" id="phone">
        <input type="password" name="pwd" class="input-block-level" placeholder="密码" id="pwd">
       
        <p align="center"><button class="btn btn-large btn-primary" type="submit" id="submit">登录</button></p>
    </form>

</div>
</body>
    <script type="text/javascript">
    </script>
</html>