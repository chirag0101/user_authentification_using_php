
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <style>

        body{
            margin: 0;
            padding: 130px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-family: 'Courier New', Courier, monospace;
        }

        .page input{
            font-size: 20px;
            border-radius: 9px;
            height: 30px;
            width: 250px;
            font-family: 'Courier New', Courier, monospace;
        }

        #btn{
            background-image: linear-gradient(to bottom right, violet, yellow);
            width: 100px;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            text-decoration: none;
        }

        #btn:hover{
            background-image: linear-gradient(to bottom right, yellow, violet);
        }
        
    </style>

</head>

<body background="w.jpg">

    <form method="POST">
        <div class="page">
            <b>New User?</b>
            <p>Enter your details.</p>
            <p><input type="text" name="uname" placeholder="ex:Chirag"></p>
            <p><input type="password" name="password" placeholder="******"></p>
            <p><input type="submit" name="submit" id="btn" value="SIGNUP"></p>
            
            <p><?php
                    $host="localhost";
                    $user="root";
                    $pass="";
                    $dbname="test";

                    $username="";
                    $userpass="";
                    
                    $conn=mysqli_connect($host,$user,$pass,$dbname);
                    if(mysqli_connect_error()){
                        die("STATUS:OFFLINE");
                    }else{
                        echo "STATUS:ONLINE";
                    }

                    if(array_key_exists('submit',$_POST)){
                        $username=$_POST['uname'];
                        $userpass=$_POST['password'];
                        $query="SELECT * FROM data";
                        $ans=1;
                        if($result=mysqli_query($conn,$query)){
                            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                if($row["uname"]==$username){
                                    $ans=0;
                                    echo '<script type="text/javascript">alert("Already Exists!")</script>';
                                    header('location:index.php');
                                }
                            }
                            if($ans==0){
                                $insQuery="INSERT INTO data VALUES('$username','$userpass')";
                                if(mysqli_query($conn,$insQuery)){
                                    echo '<script type="text/javascript">alert("Added!")</script>';
                                    header('location:index.php');
                                }
                            }
                        }
                    

            ?></p>

        </div>
    </form>

</body>
</html>