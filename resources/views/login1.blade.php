<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

    <div class="header">

        <h1 class="title"><span style="color:#379237">H</span>ealthify</h1>

    </div>

<div class="top-div">
<div class="middle-div">

    <div class="login-container">
       
        
        <form id="login-form" method="post">
            <h1>Welcome Back!</h1>
            <p >login to continue</p>
           
            <input  class="input"  id="user"type="text" name="username" placeholder="Enter username"><br>
       
            <input class="input" id="pass" type="password" name="password" placeholder="Enter your password"><br>
            <button type="submit">LOGIN</button>
         
            <p class="new-user-p">New User? <a href="{{route('signup')}}">Sign Up</a></p>
           
        </form>
    </div>

</div>
</div>

</body>
</html>

