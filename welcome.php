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
    <p class="lead">Enter college,course details</p>
  </div>
<form class="form-inline" action="welcome.php" method="GET">
  <label class="mr-sm-2" for="inlineFormCustomSelectPref">College</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelectPref" name="coll">
    <option selected>Choose...</option>
     <?php
     session_start();
    $display_string="";
    $connection = mysqli_connect("localhost", "root", "", "blackboard");
    $qry_result1=mysqli_query($connection,"SELECT DISTINCT College from course");
    while($row2 = mysqli_fetch_array($qry_result1)) {
    $display_string .= "<option value=\"$row2[College]\">$row2[College]</option>";
	}
	echo $display_string;
    ?>
  </select>
   <label class="mr-sm-2" for="inlineFormCustomSelectPref">Subject</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelectPref2" name="sub">
    <option selected>Choose...</option>
    <?php
    $display_string="";
    $qry_result2=mysqli_query($connection,"SELECT DISTINCT Subject from course");
    while($row3 = mysqli_fetch_array($qry_result2)) {
    $display_string .= "<option value=\"$row3[Subject]\">$row3[Subject]</option>";
	}
	echo $display_string;
    ?>
  </select>
   <label class="mr-sm-2" for="inlineFormCustomSelectPref">Course</label>
  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelectPref1" name="cour">
    <option selected>Choose...</option>
    <?php
    $display_string="";
    $qry_result3=mysqli_query($connection,"SELECT DISTINCT CourseN from course");
    while($row4 = mysqli_fetch_array($qry_result3)) {
    $display_string .= "<option value=\"$row4[CourseN]\">$row4[CourseN]</option>";
	}
	echo $display_string;
    ?>
  </select>
  <button type="submit" class="btn btn-primary mb-2 mr-sm-2 mb-sm-0" name="sub2">Find</button>
  <button type="submit" class="btn btn-secondary mb-2 mr-sm-2 mb-sm-0" name="sub3">Display All</button>
</form>
	
</form>
  <form action="" method="GET">
  <?php
   $userid=$_SESSION["login"];
   $uid=$_SESSION["UID"];
   // Retrieve data from Query String
   if(isset($_GET['sub2']) || isset($_GET['sub3']))
   {
   $college = $_GET['coll'];
	$subject = $_GET['sub'];
   $cour_name = $_GET['cour'];
   
   
   //Escape User Input to help prevent SQL Injection
   //$college = mysqli_real_escape_string($db,$college);
   //$subject = mysqli_real_escape_string($db,$subject);
   //$cour_name = mysqli_real_escape_string($db,$cour_name);
   
   //build query
   $query = "SELECT question_paper.QP_ID,c.College,c.Subject,c.CourseN FROM (SELECT * FROM course WHERE College='$college' AND Subject='$subject' AND CourseN='$cour_name' ) AS C INNER JOIN question_paper ON question_paper.CID = c.CID where question_paper.UID='$uid'";
   
   if(isset($_GET['sub3']))
   {
   $query = "SELECT question_paper.QP_ID,c.College,c.Subject,c.CourseN FROM course AS C INNER JOIN question_paper ON question_paper.CID = c.CID where question_paper.UID='$uid'";
   }
   //Execute query
   $qry_result = mysqli_query($connection, $query);
   
   //Build Result String
   $display_string = "<table class=\"table\">";
   $display_string .= "<thead class=\"thead-dark\">";
   $display_string .= "<tr>";
   $display_string .= "<th>Question Paper ID</th>";
   $display_string .= "<th>College</th>";
   $display_string .= "<th>Subject</th>";
   $display_string .= "<th>Course</th>";
   $display_string .= "<th>Select</th>";
   $display_string .= "</thead>";
   $display_string .= "</tr>";
   
   // Insert a new row in the table for each person returned
   while($row = mysqli_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>Q$row[QP_ID]</td>";
      $display_string .= "<td>$row[College]</td>";
      $display_string .= "<td>$row[Subject]</td>";
      $display_string .= "<td>$row[CourseN]</td>";
      $display_string .= "<td><input type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"$row[QP_ID]\"></td>";
      $display_string .= "</tr>";
   }
  // echo "Query: " . $query . "<br />";
   
   $display_string .= "</table>";
   echo $display_string;
}
?>
</form>
</div>
</body>
</html>