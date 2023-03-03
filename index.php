<html>  
<head>  
    <title>Login system</title>  
    
    <link rel="stylesheet" href="css/styles.css">  
</head> 




<body>  
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "/core/authentification.php" onsubmit = "return validation()" method = "POST">  
            <div class="login-div">   
                <div class="login">  
                    <label class="login-label" > E-mail:</label>  
                    <input type = "text" id ="user" name  = "user" />  
                </div>  
                <div class="login">  
                    <label class="login-label" > Heslo:</label>  
                    <input type = "password" id ="pass" name  = "pass" />  
                </div>
            </div>  
            <div class="button-div">     
                <button class = "button1" type="submit">
                Login
                </button>
            </div>  
        </form>  
    </div>    
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                        alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>