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
<form class="form-inline definewidth m20" action="index.html" method="get">    
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>纪录id</th>
        <th>拨打号码</th>
        <th>拨打时间</th>
        <th>操作</th>
    </tr>
    </thead>
	     <tr>
            <td>1</td>
            <td>18120170219</td>
            <td>2015-6-11</td>
            <td>
                <a href="<?php echo U(Record/edit);?>">编辑</a>                
            </td>
        </tr>	
</table>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="<?php echo U(Record/add);?>";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>