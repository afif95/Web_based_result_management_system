


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="" method="post" name="login">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="userid" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>	
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-book fa-fw"></i></span>
						</div>
						<input type="text" class="form-control" name="dept" placeholder="department">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
					<div>
						<a href="homepage.html">Back to Home</a>
				</form>
			</div>
		
			</div>
		</div>
	</div>

</body>
</html>




<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"],$_POST["dept"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $department=$_POST["dept"];
        $sql = "SELECT userid FROM teacher WHERE userid='$username' and password = '$password' and dept='$department'";
        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: teacher1.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password or Department")';
            echo '</script>';
        }
        
    }
?>

