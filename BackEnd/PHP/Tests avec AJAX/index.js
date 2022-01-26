function sauvegarder(str)
{
    var inputDom = document.getElementById("text");//找到元素，假如给input元素加了id属性 且 值为:text
    var text = inputDom.value; //获取元素值


    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
     {
         alert ("Browser does not support HTTP Request")
     return
     } 
    var url="index1.php";
    url=url+"?q="+text;
    url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange=stateChanged ;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);

    window.location.reload();
    
}
function refresh(){
    window.location.reload();
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}