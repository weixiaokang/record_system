/**
 * ajax请求用于动态更新界面
 */
function myAjax(url, fnSucc, fnFaild){
    //1.创建对象
    var oAjax = null;
    if(window.XMLHttpRequest){
        oAjax = new XMLHttpRequest();
    }else{
        oAjax = new ActiveXObject("Microsoft.XMLHTTP");
    }
      
    //2.连接服务器  
    oAjax.open('GET', url, true);   //open(方法, url, 是否异步)
    
     /*
      * POST方式向服务器发出一个请求
      */
      //xmlHttpRequest.open("POST", "AjaxServlet", true);
      
    //3.发送请求  
    oAjax.send();
    
    // 使用post提交时必须加上下面这行代码
    // xmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
     
    //4.接收返回
    oAjax.onreadystatechange = function(){  //OnReadyStateChange事件
        if(oAjax.readyState == 4){  //4为完成
            if(oAjax.status == 200){    //200为成功
                fnSucc(oAjax.responseText) 
            }else{
                if(fnFaild){
                    fnFaild();
                }
            }
        }
    };
}

function say(params) {
    alert(params);
}