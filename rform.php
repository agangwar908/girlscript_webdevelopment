<?php
//index.php

$error = '';
$name = '';
$email = '';
$Mobile_NO = '';
$Student_professional = '';
$college='';
$expecting ='';
$suggestion='';
function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["Mobile_NO"]))
 {
  $error .= '<p><label class="text-danger">Mobile No. is required</label></p>';
 }
 else
 {
  $Mobile_NO = clean_text($_POST["Mobile_NO"]);
 }
 if(empty($_POST["Student_professional"]))
 {
  $error .= '<p><label class="text-danger">Student_professional is required</label></p>';
 }
 else
 {
  $Student_professional = clean_text($_POST["Student_professional"]);
 }
 
 if(empty($_POST["college"]))
 {
  $error .= '<p><label class="text-danger">College/company name  is required</label></p>';
 }
 else
 {
  $college = clean_text($_POST["college"]);
 }
 if(empty($_POST["expecting"]))
 {
  $error .= '<p><label class="text-danger">Fill expectation field is required</label></p>';
 }
 else
 {
  $expecting = clean_text($_POST["expecting"]);
 }
 if(empty($_POST["suggestion"]))
 {
  $error .= '<p><label class="text-danger">Fill Suggestion field is required</label></p>';
 }
 else
 {
  $suggestion = clean_text($_POST["suggestion"]);
 }


 if($error == '')
 {
  $file_open = fopen("reg.csv", "a");
  $no_rows = count(file("reg.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'Mobile_NO' =>$Mobile_NO,
   'Student_professional' => $Student_professional,
   'college'=>$college,
   'expecting'=>$expecting,
   'suggestion'=>$suggestion
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $Mobile_NO = '';
  $Student_professional = '';
  $college='';
  $expecting ='';
  $suggestion='';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style>
        body{
            margin:0 ;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("k.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:cover;
            -webkit-filter: blur(0px);
            -moz-filter: blur(0px);
            -o-filter: blur(0px);
            -ms-filter: blur(0px);
            filter: blur(5px);
            
        }
        
        
         .contact-form input[type="submit"] {
            height: 60px;
            color: #fff;
            font-size: 30px;
            background: red;
            cursor: pointer;
            border-radius: 60px;
            border: none;
            outline: none;
            margin-top:5%;
        }
        
    </style>  
 
 </head>
 <body>
  
  <div class="contact-form">
     
   <div class="col-md-6" style="margin:0 auto; float:none;">
       
    <form method="post">
     <h1 align="center"color="white"><strong>Registration Form For Webinar</strong></h1>
     <br />
     <?php echo $error; ?>
     
     <div class="form-group">
      <label><strong>Name</strong></label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label><strong>Email Id</strong></label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label><strong>Mobile No.</strong></label>
      <input type="text" name="Mobile_NO" class="form-control" placeholder="Enter Mobile No." value="<?php echo $Mobile_NO; ?>" />
     </div>
       <div class="form-group">
                            <label for="gender" class="radio-label"><strong>Are you student or Working professional ?</strong></label>
                            <div class="form-radio-item">
                                <input type="radio" name="Student_professional" value="Student" id="Student" checked>
                                <label for="Student">Student</label>
                                <span class="check"></span>
                            </div>

                            <div class="form-radio-item">
                                <input type="radio" name="Student_professional" value="professional" id="professional">
                                <label for="Professional">Professional</label>
                                <span class="check"></span>
                            </div>
     
     <div class="form-group">
      <label><strong>College or Company Name</strong></label>
      <textarea name="college" class="form-control" placeholder="Enter College or company name"><?php echo $college; ?></textarea>
     </div>
     <div class="form-group">
      <label>What are you expecting from this webinar ? </label>
      <textarea name="expecting" class="form-control" placeholder="Expecting from webinar"><?php echo $expecting; ?></textarea>
     </div>
     <div class="form-group">
      <label>Any suggestion for event to be conducting in future ? </label>
      <textarea name="suggestion" class="form-control" placeholder="suggestions"><?php echo $suggestion; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
      
      

     </div>
    </form>
          <p class="text-center">
                <a href="index.php" class="btn btn-primary">Back to Home</a>
              </p>
   </div>
  </div>
  
  <script src="jquery.min.js"></script>
    <script src="main.js"></script>
 </body>
</html>