<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form validation</title>
    <script >
        function validateform(){
            var username=document.myform.username.value;
            var password=document.myform.password.value;
            if( username==null || username==""){
            alert("name can't be balanced");
            return false;
            }else if(password.length<6){
                alert("pass  cant not it long");
                return false;
            
            }else if(number.length<10){
                alert("number cant not it long");
                return false;
            }
                  
        
    }
    
    
    </script>
</head>
<body>
    <form name="myform" method="post" action="adminlogin.php" onsubmit=" return validateform()">
    
    name: <input type="text" name="username"></br>
    password: <input type="password" name="password"></br>
      <input type="submit" value="Log in"></br>
    
    
</form>
</body>
</html>