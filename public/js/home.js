function show(){
    
    var status=document.getElementById('login').style.display;
    console.log(status);
    if(status!='none'){
        document.getElementById('login').style.display='none';
    }else{
        document.getElementById('login').style.display='';
    }
}



function validateEmail() {
    var email=document.getElementById('Email').value;
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!re.test(email)){
        document.getElementById('Email').value='Invalid email';
        document.getElementById('Email').focus();
        return false;
    }else{
        return true;
    }
}


function loadXMLDoc(name)
{
    //alert(name);

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {//alert("name");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     //alert("1");
    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://localhost:8000/order/"+name+"/",true);
xmlhttp.send();
}



function rm(sname)
{
    //alert(sname);
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {//alert("name");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     
    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://localhost:8000/rm/"+sname+"/",true);
xmlhttp.send();
}


function check_out()
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {//alert("name");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     
    document.getElementById("check_out").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://localhost:8000/checkout/",true);
xmlhttp.send();
}



$(document).ready(function(){
    $("#aj").click(function(){
               $.ajax({
                   url:"http://localhost:8000/checkout/",
                   method:'GET',
             
               }).done(function(text){
                   alert('msg'+text);
               });
    })
    
    $("#order").click(function(){
        window.location="http://localhost:8000/menu";
        
    })
    
    
})




