<!DOCTYPE html>
<html>
<head>
	<title>Banking</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
    $conn = new mysqli('localhost','root','','mybank');
    define('bankname', 'United Bank');
	session_start();
	
		$error = "";
		if (isset($_POST['userLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $conn->query("select * from userAccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      $data = $result->fetch_assoc();
		      $_SESSION['userId']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:index.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		if (isset($_POST['cashierLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $conn->query("select * from login where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      $data = $result->fetch_assoc();
		      $_SESSION['cashId']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:cindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		if (isset($_POST['managerLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $conn->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		    if($result->num_rows>0)
		    { 
		      $data = $result->fetch_assoc();
		      $_SESSION['managerId']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:mindex.php');
		     }
			 
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
		if (isset($_POST['PraveenLogin']))
		{
			$error = "";
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		   
		    $result = $conn->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		    if($result->num_rows>0)
		    { 
		      $data = $result->fetch_assoc();
		      $_SESSION['managerId']=$data['id'];
		      //$_SESSION['user'] = $data;
		      header('location:mindex.php');
		     }
			 
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}

	 ?>	

<link rel="stylesheet" href="header_style.css">
<link rel="stylesheet" href="style.css">



</head>
<body>





	    <header>
      <video controls muted autoplay loop class="video-container">
        <source src="./video.mp4" type="video/mp4" />
      </video>
    
      <!-- video switch -->
      <button class="switch-btn">
        <span>
          play
        </span>
        <span>
          pause
        </span>
        <span class="switch"></span>
      </button>
    </header>
    <!-- javascript -->
    <script src="app.js"></script>








		<div class="flex-container-header">
		<div class="flex-item-header">
            <img src="images/log.png" onclick="eEgg_func()" width="100" height="100">
        </div>

		<div class="flex-item-header ">
<h1 class="dark rounded-0"><?php echo bankname; ?></h1>
<br>
<?php echo $error ?>
<br>
	</div>
	</div>





    <div class="flex-container-background">
                <h1 id="form_header" >Your Bank at Your Fingertips.</h1>
            </div>




		<div id="accordion" role="tablist" class="container">
	<br><h4 class="text-center">WELCOME</h4>

    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-primary btn-block" id="btn">User Login</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <form method="POST">
       	<input type="email" value="some@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="some" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
       </form>
      </div>
  </div>

    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="btn">
          Manager Login
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <form method="POST">
       	<input type="email" value="manager@manager.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="manager" class="form-control" required placeholder="Enter Password">
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
       </form>
      </div>
  </div>

    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-primary btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="btn">
         Cashier Login
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form method="POST">
       	<input type="email" value="cashier@cashier.com" name="email" class="form-control" required placeholder="Enter Email">
       	<input type="password" name="password" value="cashier" class="form-control" required placeholder="Enter Password">
       	<button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
       </form>
      </div>
    </div>
</div>


</body>
</html>