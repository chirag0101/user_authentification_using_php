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

    <form method="GET">
        <div class="page">
            <b>Authentified User?</b>
            <p>Enter your name to check if your are authentified.</p>
            <p><input type="text" name="uname" placeholder="ex:Chirag"></p>
            <p><input type="password" name="password" placeholder="******"></p>
            <p><input type="submit" name="submit" id="btn" value="SIGNIN"><input type="submit" name="submit2" id="btn" value="SIGNUP"></p>
            
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

                    if(isset($_GET['submit'])){
                        $username=$_GET['uname'];
                        $userpass=$_GET['password'];    

                        $query="SELECT * FROM data";
                        if(mysqli_query($conn,$query)){
                            $result=mysqli_query($conn,$query);
                            
                            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                if($row["uname"]==$username && $row["pass"]==$userpass){
                                    echo '<script type="text/javascript">alert("USER AUTHORIZED")</script>'; 
                                    header('location:login.html');
                                }    
                            }
                            echo'<script type="text/javascript">alert("USER UNAUTHORIZED")</script>';
                        }    
                    }else if(isset($_GET['submit2'])){
                        header('location:signup.php');
                    }
                    
                    // $query="DELETE FROM data WHERE uname='$username'"; 
                    //     if(mysqli_query($conn,$query)){
                    //         echo '<script type="text/javascript">alert("User Updated")</script>';
                    //         echo "<br>USER UPDATED<br>";
                    //     }else{
                    //         echo '<script type="text/javascript">alert("User Not Updated")</script>';
                    //         echo "<br>USER NOT UPDATED<br>";
                    //     }
                        mysqli_close($conn);
            ?></p>

        </div>
    </form>

</body>
</html>