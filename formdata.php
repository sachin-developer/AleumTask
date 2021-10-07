<?php 
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$about = $_POST['about'];
$cap = $_SESSION['captcha'];
$capRec = $_POST['capRec'];
if($cap != $capRec){
    $captchaError = 'Please Enter Captcha Code Correctly';
    header("Location:index.php?capError");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sachin Singh </title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            width: 100%;
            max-width: 1300px;
        }
        body{
            font-size: 12px;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        header{
            background-color: #1a237e;
            text-align: center;
            color: white;
            padding: 1em 0em;
        }
        .formBox{
            display: block;
            width: 50%;
            padding: 2em 1em;
            margin:auto;
        }
        .formBox input{
            margin: 1em 0em;
        }
    </style>
</head>
<body>
    <div class="container">
   <header>
       <h1>Form Details</h1>
   </header>

   <main>
       <h1><?php if(isset($captchaError)) echo $captchaError;?></h1>
       <div class="formBox">
           <h1>The data is</h1>
          <table border='1'>
              <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Dob</th>
                  <th>About</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $name; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= $dob; ?></td>
                    <td><?= $about; ?></td>
                </tr>
            </tbody>
          </table>
       </div>
   </main>
</div>
</body>
</html>