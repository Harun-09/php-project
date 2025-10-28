<?php session_start();  

//  $base_url="http://harun.intelsofts.com/php";
  //  $base_url="http://localhost/php";
  //require_once("library/classes/system_log.class.php");
  //  $db=new mysqli("localhost","harun","6587@;;","wdpf66_harun");
    // $db=new mysqli("localhost","root","","wdpf66_harun");
    // $tx="core_";
   
// echo password_hash("admin123", PASSWORD_DEFAULT);

 
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     //$result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");
     $result=$db->query("select u.id,u.full_name,u.password,u.email,u.photo,u.mobile,u.role_id,r.name role from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' and u.inactive=0");
      
         
      $user=$result->fetch_object();

    if($user && password_verify($password, $user->password)){
        
        $_SESSION["uid"]=$user->id;
        $_SESSION["uname"]=$user->full_name;
        $_SESSION["uphoto"]=$user->photo;
        $_SESSION["email"]=$user->email;
        $_SESSION["mobile"]=$user->mobile; 
        $_SESSION["role_id"]=$user->role_id;
        $_SESSION["urole"]=$user->role;

        header("location:home");
      }else{
        echo "";
      }
        
        
        
         //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

               
  
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease;
    }
    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #fff;
      letter-spacing: 1px;
    }
    .form-group {
      margin-bottom: 20px;
      position: relative;
    }
    .form-group label {
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
      color: #fff;
    }
    .form-group input {
      width: 100%;
      padding: 12px 40px 12px 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      outline: none;
      background: rgba(255, 255, 255, 0.9);
    }
    .form-group i {
      position: absolute;
      right: 12px;
      top: 38px;
      color: #667eea;
      font-size: 18px;
    }
    .btn-login {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #667eea, #764ba2);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    }
    .error {
      color: #ff6b6b;
      text-align: center;
      margin-top: 15px;
      font-weight: 600;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.9);}
      to {opacity: 1; transform: scale(1);}
    }
  </style>
</head>
<body>
  <form class="login-box" method="post" action="">
    <h2>Admin Login</h2>
    <div class="form-group">
      <label for="txtUsername">Username</label>
      <input type="text" name="txtUsername" id="txtUsername" required>
      <i class="fa fa-user"></i>
    </div>
    <div class="form-group">
      <label for="txtPassword">Password</label>
      <input type="password" name="txtPassword" id="txtPassword" required>
      <i class="fa fa-lock"></i>
    </div>
    <button type="submit" name="btnSignIn" class="btn-login">Sign In</button>
    <?php
      if(isset($_POST["btnSignIn"]) && (!isset($user) || !password_verify($password, $user->password))){
        echo '<div class="error">Incorrect username or password</div>';
      }
    ?>
  </form>
</body>
</html>


