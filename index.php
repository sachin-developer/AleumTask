<?php
session_start();

$host = 'localhost';
$db = 'aleum';
$user='root';
$password='';
$conn = mysqli_connect($host,$user,$password,$db);
$result = mysqli_query($conn, "SELECT * FROM timer ORDER BY id DESC");
while($row = mysqli_fetch_array($result)){
    $minutes = $row['minutes'];
}
$_SESSION['minutes'] = $minutes;
$_SESSION['start_time'] = date("Y-m-d H:i:s");
$endtime =date('Y-m-d H:i:s', strtotime("+".$_SESSION['minutes'].'minutes',strtotime($_SESSION['start_time'])));
$_SESSION['end_time'] = $endtime;

$string = md5(rand());
$code = substr($string,0,6);
$_SESSION['captcha'] = $code;

if(isset($_GET['capError'])){
    $captchaError = 'Please Enter Captcha Code Correctly';
}

header( "refresh:180;url=timeup.php" ); 
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
        .captchaBox{
           background-image:url('./bg6.png');
           background-repeat:no-repeat;
            padding: 2em 2em;
            color:grey;
            font-size:2rem;
        }
    </style>
</head>
<body>
    <div class="container">
   <header>
       <p>You have <span id='response'></span> to submit the form</p>
   </header>

   <main>
   <h1><?php if(isset($captchaError))echo $captchaError;?></h1>
       <div class="formBox">
       <form action="formdata.php" method='POST'>
           <label for="name">Name:</label>
           <input type="text" name="name" placeholder = 'Enter your name here...' required /> <br/>

           <label for="email">Email:</label>
           <input type="email" name="email" placeholder = 'Enter your email here...' required /><br/>

           <label for="dob">Date of Birth:</label>
           <input type="date" name="dob" required /><br/>

           <label for="about">About yourself:</label>
           <textarea name="about" placeholder = 'Enter about yourself here...' cols="50" rows="20" required></textarea><br/>


           <label for="capRec">Enter Captcha Code:</label>
           <input type="text" name="capRec" required />

           <div class=''>
            <img src="capGen.php?captchaCode=<?php echo $_SESSION['captcha'];?>" >
           </div>
           <?php if(isset($captchaError)) echo $captchaError;?>

           <input type='submit' value='submit' class="submit">
       </form>
    </div>
   </main>
</div>
</body>
<script>

    setInterval(() => {
       var req = new XMLHttpRequest();
       req.open("GET",'counter.php',false);
       req.send(null);
       document.getElementById('response').innerHTML=req.responseText; 
    }, 1000);
</script>
</html>