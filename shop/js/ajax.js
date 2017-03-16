/**
 * Created by Administrator on 2017/2/24.
 */
function ajax(method,url,obj,callback){
    //console.log(callback);
    //1.新建
    var xhr=null;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }else if(window.ActiveXObject){
        xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        alert("您的浏览器版本过低，请更换")
    }
    var data=null;
    if(method=="post"){
        var str="";
        for(item in obj){
            str+=item+"="+obj[item]+"&";
        }
        data=str.substring(0,str.length-1)
    }else{
        data=true;
    }

    //2.打开操作
    xhr.open(method,url,true);
    if(method=="post"){
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    }
    //3,绑定xhr对象的监听状态
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            callback(xhr);//xhr传实参代替传进来的函数的形参。callback是形参，就相当于前面定义的传进来的一个匿名函数，
            // 因为是匿名的，所以要用callbackg来调用
        }

        //if(xhr.readyState==4){
        //    if(xhr.status==200){
        //       callback(xhr.responseText,xhr.statusText)
        //    }else{
        //        callback(xhr.responseText,"error")
        //    }
        //}
    };
    //4,发送请求
    xhr.send(data)
}