<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="article.css">*
    <title>Connection</title>
</head>
<body>
  <?php 

    /// NEED TO IMPLEMENT EMAIL CONFIRMATION AND MAKE SURE EMAIL DOMAIN EXISTS ! /// 
    
        function loadClass($class){
           

            require "$class.php";
        }

        spl_autoload_register("loadClass");
        if($_POST){ 
          session_start();

            $userData = [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "email" => $_POST['email']
            ];

            $existingAccount = False;
            $findExistingUser = new UserManager();
            $users = $findExistingUser->getAll();

            if(empty($userData['username'])){
                ?> <script href="javascript:;">
                        alert("Name is required")
                    </script> <?php
                    $existingAccount = True;
            }

            if(!preg_match("/^[a-zA-Z-' ]*$/",$userData['username'])){
                ?> <script href="javascript:;">
                        alert("Only letters and white spaces allowed")
                    </script> <?php
                    $existingAccount = True;
            }

            if(empty($userData['email'])){
                ?> <script href="javascript:;">
                        alert("Email is required")
                    </script> <?php
                    $existingAccount = True;
            }
            
            if(!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)){
                ?> <script href="javascript:;">
                        alert("Invalid email format")
                    </script> <?php
                    $existingAccount = True;
            }
            
            foreach($users as $user){
                // echo  $user->getUsername()==$userData['username'] ? "1" : "2";
                if($user->getUsername()==$userData['username']){
                    ?> <script href="javascript:;">
                        alert("This username is already taken !")
                    </script> <?php
                    $existingAccount = True;
                    break;
                }
            }
            foreach($users as $user){
                if($user->getEmail()==$userData['email'] && $existingAccount == False){
                    ?> <script href="javascript:;">
                        alert("This email address is already taken !")
                    </script> <?php
                    $existingAccount = True;
                    break;
               } 
            }
            if($existingAccount == False){
                $findExistingUser->add(new User($userData));
                // echo "<script>window.location.href= 'index.php'</script>";
            }     
    }   
?>

    <button class="bouton"><a href="index.php"><strong>Home</strong></a></button>
    <button class="bouton"><a href="logout.php"><strong>Logout</strong></a></button>
    
    <form class="box" method="post" autocomplete="off">
      <h1>Login</h1> 
      <input type="text" name="username" id="username" placeholder="Username">
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
      <input type="password" name="password" id="passsword "placeholder="Password">
      <input target="_blank" type="submit" value="Login"></input>
    </form>






                                                              <style type="text/css">body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
     background-image: url("https://images.unsplash.com/photo-1523821741446-edb2b68bb7a0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTF8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60");  
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
}
.box{
  width: 300px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: url("https://images.unsplash.com/photo-1569982175971-d92b01cf8694?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8M3x8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60");
  text-align: center;
      box-shadow: -1px 92px 99px -62px rgba(3, 107, 255, 0.27), 0 1px 6px 0 rgba(10, 48, 255, 0.48);
    border-radius: 5px;
}
.box h1{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
}
.box input[type = "text"],.box input[type = "password"],.box input[type = "email"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  
}

.box a
{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  width:10%;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus,.box input[type = "email"]:focus{
  width: 280px;
   -webkit-animation: 9s colorChange alternate;
  transition height 0.3s, width 0.3s 0.1s
  input:focus ~ .border
  
}
.box input[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.box a[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}
.box input[type = "submit"]:hover{
  background: #2ecc71;
}

.box a[type = "submit"]:hover{
  background: #2ecc71;
}

h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}


@-webkit-keyframes colorChange {
  0%   { border-color: #007bff;  }
  5%  { border-color: #6610f2; }
  10%  { border-color: #6f42c1;}
  15%  { border-color: #e83e8c; }
  20% { border-color: #dc3545;}
   25%   { border-color: #fd7e14;  }
  30%  { border-color: #ffc107; }
  35%  { border-color: #28a745;}
  40%  { border-color: #20c997; }
  45%  { border-color: #17a2b8;}
  50%  { border-color: #6c757d;  }
  55%  { border-color: #343a40; }
  60%  { border-color: #007bff;}
  65%  { border-color: #6c757d; }
  70% { border-color: #28a745;}
  75% { border-color: #17a2b8;}
  80% { border-color: #ffc107;}
  85% { border-color: #dc3545;}
  90% { border-color: #343a40;}
  95% { border-color: #28a745;}
  100% { border-color: #20c997;}
}



/**************line*************/

.lines{position:absolute;top:0;left:0;right:0;height:100%;margin:auto;width:100vw;z-index:-1}
.lines 
.line{position:absolute;width:1px;height:100%;top:0;left:50%;background:rgba(255,255,255,.06);overflow:hidden}.lines .line::after{content:"";display:block;position:absolute;height:15vh;width:100%;top:-50%;left:0;background:-webkit-gradient(linear,left top,left bottom,from(rgba(255,255,255,0)),color-stop(75%,#fff),to(#fff));background:linear-gradient(to bottom,rgba(255,255,255,0) 0%,#fff 75%,#fff 100%);
  -webkit-animation:run 7s 0s infinite;animation:run 7s 0s infinite;
-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards;
-webkit-animation-timing-function:cubic-bezier(.4,.26,0,.97);
animation-timing-function:cubic-bezier(.4,.26,0,.97)}.lines 
.line:nth-child(1){margin-left:-45%}.lines .line:nth-child(1)
    ::after{-webkit-animation-delay:.5s;animation-delay:.5s}.lines .line:nth-child(3){margin-left:45%}.lines .line:nth-child(3)
    ::after{-webkit-animation-delay:1s;animation-delay:1s}.lines .line:nth-child(4){margin-left:40%}.lines .line:nth-child(4)
    ::after{-webkit-animation-delay:1.5s;animation-delay:1.5s}.lines .line:nth-child(5){margin-left:-40%}.lines .line:nth-child(5)
    ::after{-webkit-animation-delay:2s;animation-delay:2s}.lines .line:nth-child(6){margin-left:35%}.lines .line:nth-child(6)
    ::after{-webkit-animation-delay:2.5s;animation-delay:2.5s}.lines .line:nth-child(7){margin-left:-35%}.lines .line:nth-child(7)
    ::after{-webkit-animation-delay:3s;animation-delay:3s}.lines .line:nth-child(8){margin-left:30%}.lines .line:nth-child(8)
    ::after{-webkit-animation-delay:3.5s;animation-delay:3.5s}.lines .line:nth-child(9){margin-left:-30%}.lines .line:nth-child(9)::after{-webkit-animation-delay:4s;animation-delay:4s}.lines .line:nth-child(10){margin-left:25%}.lines .line:nth-child(10)
    ::after{-webkit-animation-delay:4.5s;animation-delay:4.5s}.lines .line:nth-child(11){margin-left:-25%}.lines .line:nth-child(11)
    ::after{-webkit-animation-delay:5s;animation-delay:5s}.lines .line:nth-child(12){margin-left:20%}.lines .line:nth-child(12)
    ::after{-webkit-animation-delay:5.5s;animation-delay:5.5s}.lines .line:nth-child(13){margin-left:-20%}.lines .line:nth-child(13)::after{-webkit-animation-delay:6s;animation-delay:6s}.lines .line:nth-child(14){margin-left:15%}.lines .line:nth-child(14)
    ::after{-webkit-animation-delay:6.5s;animation-delay:6.5s}.lines .line:nth-child(15){margin-left:-15%}.lines .line:nth-child(15)
    ::after{-webkit-animation-delay:7s;animation-delay:7s}.lines .line:nth-child(16){margin-left:10%}.lines .line:nth-child(16)
    ::after{-webkit-animation-delay:7.5s;animation-delay:7.5s}.lines .line:nth-child(17){margin-left:-10%}.lines .line:nth-child(17)
    ::after{-webkit-animation-delay:8s;animation-delay:8s}.lines .line:nth-child(18){margin-left:5%}.lines .line:nth-child(18)
    ::after{-webkit-animation-delay:8.5s;animation-delay:8.5s}.lines .line:nth-child(19){margin-left:-5%}.lines .line:nth-child(19)
    ::after{-webkit-animation-delay:9s;animation-delay:9s}@-webkit-keyframes run{0%{top:-50%}100%{top:110%}}@keyframes run{0%{top:-50%}100%{top:110%}}.section-title-bg{color:#f0f0f0;font-size:85px;line-height:0;position:absolute;top:50%;left:0;z-index:-1;opacity:.8;font-family:Monoton,cursive;text-transform:uppercase;right:0;transform:translateY(-50%)}
  </style>
<div class="lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
</body>
</html>
