<?php 
session_start();
session_destroy();

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
       <h1>Fill the form</h1>
   </header>

   <main>
       <div class="formBox">
           <h1>Your time up to fill the form</h1>
           <a href="index.php">Back to fill form</a>
       </div>
   </main>
</div>
</body>
</html>