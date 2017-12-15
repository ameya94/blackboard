<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
		<div class="jumbotron jumbotron-fluid">
  <div class="container-fluid">
    <h1 class="display-3">Welcome <?php session_start(); echo $_SESSION['login']; ?></h1>
    <p class="lead">Enter credentails of the user to register</p>
  </div>
</div>
<form action="reg.php" method="POST" data-toggle="validator">
  <div class="form-row">
    <div class="col">
    	<label for="inputPassword5">First Name</label>
      <input type="text" name="fname" class="form-control" placeholder="First name" required>
    </div>
    <div class="col">
    	<label for="inputPassword5">Last Name</label>
      <input type="text" name="lname" class="form-control" placeholder="Last name" required>
    </div>
	</div>
	<div class="form-row">
	<label for="inputPassword5">Password</label>
	<input type="password" name="pass" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" required>
	<small id="passwordHelpBlock" class="form-text text-muted">
  	Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
	</small>
	</div>
	<div class="form-row">
	<label for="inputPassword5">Confirm Password</label>
	<input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" required>
	</div>
	 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" id="inputusername" placeholder="Username" name="uname" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="add" placeholder="1234 Main St" required>
  </div>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="mr-sm-2" for="inlineFormCustomSelect">User Type</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="utype" required>
        <option selected>Choose...</option>
        <option value="Admin">Admin</option>
        <option value="Faculty">Faculty</option>
        <option value="GA">GA</option>
      </select>
    	</div>
	</div>
    <div class="form-row">
     <button type="submit" class="btn btn-primary">Register</button>
     </div>
</form>
</div>
<br>
<br>

	
</body>
</html>