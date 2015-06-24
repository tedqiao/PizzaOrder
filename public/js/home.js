function show(){
    document.getElementById('login').style.display='none';
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