<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Admin Login</title>
    <script>
      function myFunction()
      {
        var x = document.getElementById("password");  
                              
        if (x.type === "password") 
        {
          x.type = "text";
        }
         else
          {
          x.type = "password";
        }
      }
      </script>
      <style>
        
*{
    margin: 0;
    padding: 0;
}
body{
    background-color: #009688;
    
}
.logo{
    width: 140px;
    position: absolute;
    top: 4%;
    left: 10%
}

#sideNav{
    width: 250px;
    height: 100vh;
    position: fixed;
    right: -250px;
    top: 0;
    background: #009688;
    z-index: 2;
    transition: 0.5s;
}
nav ul li{
    list-style: none;
    margin: 50px 20px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
}
#menuBtn{
    width: 50px;
    height: 50px;
    background: #009688;
    text-align: center;
    position: fixed;
    right: 30px;
    top: 20px;
    border-radius: 3px;
    z-index: 3;
    cursor: pointer;
}
#menuBtn img{
    width: 20px;
    margin-top: 15px;
}    
   main{
       height: 500px;
   }
   .form-container{
       width: 30%;
       margin: 0 auto;
       margin-top: 150px;
       padding: 30px;
       border: 1px solid #ddd;
       border-radius: 10px;
   }
   
   .form-text{
       color: black;
   }
   
   
   
   @media (max-width: 700px) {
   
       .form-container{
           width: 90%;
       }
       .form-text{
           font-size: 15px;
       }
       .form-head{
           font-size: 20px;
       }
   }
.btn{
    margin-left: 90px;
    margin-top: 10px;
    width: 150px;
   }
</style>
  </head>
  <body>
    
    <main>
        <div class="form-container">
            <h2 class="form-head text-center"> ADMIN LOGIN</h2>
        <form method="post" action="adminlogin.php">
        <?php
      if(isset($_POST["login"])){
        $gmail=$_POST["gmail"];
        $password=$_POST["password"];
        require_once "database.php";
        $sql="SELECT * FROM users WHERE email='$gmail'";
        $result= mysqli_query($conn,$sql);
        $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($user){
          if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"]="yes";
            header("location: index.php");
            die();
          }
          else{
            echo"<div class='alert alert-danger'>password dose not match </div>";
          }
        }else{
          echo"<div class='alert alert-danger'>gmail dose not match </div>";
        }
          }
           ?>
            <div class="form-group">
                <label class="form-text" for="username">gmail:</label>
                <input type="text" name="gmail" class="form-control" id="username" >
              </div>
              <div class="form-group">
                <label class="form-text" for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
                <input type="checkbox"  style=margin-left:90px;margin-top:15px; onclick="myFunction()"><b class="col" style=color:white;>Show Password</b>
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block">LOGIN</button>
          </form>
        </div>
    </main>
  </body>
</html>                      