<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/record_system/Public/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/record_system/Public/easyui/themes/icon.css">
	<script type="text/javascript" src="/record_system/Public/easyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/record_system/Public/easyui/jquery.easyui.min.js"></script>
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
    手机/姓名：
    <input type="text" name="n" id="n" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="button" class="btn btn-primary" id="finduser">查询</button>&nbsp;&nbsp; 
    <button type="button" class="btn btn-success" id="adduser">新增用户</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="edituser">编辑用户</button>&nbsp;&nbsp;
    <button type="button" class="btn btn-failed" id="deluser">删除用户</button>&nbsp;&nbsp;
</form>
<table id="dg" title="My Users" class="easyui-datagrid" style="width:1000px;height:1000px"
            url="/record_system/index.php/Home/User/getusers"
            rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="_id" width="50">用户id</th>
        <th field="idnumber" width="50">身份证号码</th>
        <th field="name" width="50">用户名称</th>
        <th field="phonenumber_1" width="50">手机号码</th>
        <th field="phonenumber_2" width="50">固定电话</th>
        <th field="email" width="50">邮箱</th>
        <th field="workplace" width="50">工作单位</th>
        <th field="address" width="50">家庭地址</th>
    </tr>
    </thead>
    <div id="dlg" class="easyui-dialog" style="width:700px;height:500px;padding:10px 20px"
		closed="true" buttons="#dlg-buttons">
	<form id="fm" method="post">
		<div class="fitem">
			<label>身份证号</label>
			<input name="idnumber" class="easyui-validatebox" id="idnumber">
		</div>
		<div class="fitem">
			<label>姓名</label>
			<input name="name" class="easyui-validatebox" id="name">
		</div>
		<div class="fitem">
			<label>手机号码</label>
			<input name="phonenumber_1" class="easyui-validatebox" id="phonenumber_1">
		</div>
        <div class="fitem">
			<label>固定电话</label>
			<input name="phonenumber_2" class="easyui-validatebox" id="phonenumber_2">
		</div>
		<div class="fitem">
			<label>邮箱</label>
			<input name="email" class="easyui-validatebox" validType="email" id="email">
		</div>
        <div class="fitem">
			<label>工作单位</label>
			<input name="workplace" class="easyui-validatebox" id="workplace">
		</div>
        <div class="fitem">
			<label>家庭住址</label>
			<input name="address" class="easyui-validatebox" id="address">
		</div>
	</form>
</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()" width="100">保存</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" width="100">取消</a>
</div>
</table>
</body>
</html>
<script>
    function saveUser(){
        var idnumber = $("#idnumber").val();
        var name = $("#name").val();
        var phonenumber_1 = $("#phonenumber_1").val();
        var phonenumber_2 = $("#phonenumber_2").val();
        var email = $("#email").val();
        var workplace = $("#workplace").val();
        var address = $("#address").val();
        $.post(url,
            {
                id:id,
                idnumber:idnumber,
                name:name,
                phonenumber_1:phonenumber_1,
                phonenumber_2:phonenumber_2,
                email:email,
                workplace:workplace,
                address:address
            },
            function(data, status) {
                alert(data["msg"]);
                $("#dlg").dialog("close");
                $("#dg").datagrid("reload");
            });
}

    $(function () {
        
        $('#edituser').click(function() {
                
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                	$('#dlg').dialog('open').dialog('setTitle','修改');
                	$("#idnumber").val(row.idnumber);
                    $("#name").val(row.name);
                    $("#phonenumber_1").val(row.phonenumber_1);
                    $("#phonenumber_2").val(row.phonenumber_2);
                    $("#email").val(row.email);
                    $("#workplace").val(row.workplace);
                    $("#address").val(row.address); 
                    id = row._id;
                	url = "/record_system/index.php/Home/User/updata";
                }
        });
		$('#adduser').click(function(){
				$('#dlg').dialog('open').dialog('setTitle','添加');
	            $('#fm').form('clear');
                id = null;
	            url = "/record_system/index.php/Home/User/adduser";
		 });
         
         $('#deluser').click(function() {
                var row = $('#dg').datagrid('getSelected');
            	if (row){
            		$.messager.confirm('Confirm','是否删除信息?',function(r){
            			if (r){
            				$.post("/record_system/index.php/Home/User/deluser",{id:row._id},function(result){
            					
            						$('#dg').datagrid('reload');	// reload the user data
            				},'json');
            			}
            		});
            	}
         });
         
         $('#finduser').click(function() {
                var n = $('#n').val();
                if (n.length > 10) {
                    $('#dg').datagrid('load', {
		            phonenumber_1:n
	           });
                } else if (n.length > 0) {
                     $('#dg').datagrid('load', {
		             name:n
	           });
                }
         });

    });
</script>