<html>
    <head>
        <title>Login Here</title>
        <style>
            *{
                margin:0px;
                padding:0px;
            }
            body{
                background-image:linear-gradient(180deg, rgb(241, 230, 130), rgb(169, 240, 240));
            }
            .tab{
                position:absolute;
                padding: 30px;;
                background-color: lightgray;
                width:max-content;
                height:max-content;
                text-align:center;
                left:50%;
                top:30%;
                border-radius:20px;
                transform:translate(-50%, -30%);
            }
            .tab h2{
                padding:10px;
                font-family: cambria;
                font-size:35px;
            }
            .tab input{
                outline:none;
                margin:20px;
                width:230px;
                font-size:18px;
                border:2px solid gray;
                border-radius: 8px;
                padding:5px 20px;
                font-weight:bold;
            }
            .tab input[type = "submit"]{
                border:2px solid rgb(172, 0, 0);
                color:rgb(172, 0, 0);
            }
            .tab input[type = "submit"]:hover{
                color:white;
                background-color:rgb(172, 0, 0);
            }
            .tab input[type = "submit"]:active{
                background-color:white;
            }
            .tab label{
                font-size:18px;
                display:none;
                color:red;
            }
        </style>
    </head>
    <body>
        <div class="tab">
            <h2>Login Here</h2>
            <form autocomplete="off" action = "" method = "POST">
            <input type = "text" name = "username" placeholder="Username" required ><br>
            <input type = "password" name = "password" placeholder="Password" required ><br>
            <input type = "submit" name = "submit" Value = "Login" >
            </form>
            <label id = "error">
                Error Reporting
            </label>                
            </p>
        </div>
    </body>
</html>
<?php 
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where user = '$username' and password = '$password'";
        $rs = $conn->query($sql);
        if($rs){
            if(mysqli_num_rows($rs)>0){
                $row = mysqli_fetch_assoc($rs);
                $ex_id = $row['ex_id'];
                $str = "select * from timing where ex_id = '$ex_id'";
                $timing = $conn->query($str);
                if($timing){
                    if(mysqli_num_rows($timing) > 0){
                        $TM = mysqli_fetch_assoc($timing);
                        $strT = $TM['doe']. " " .$TM['timing']. ":00";
                        $endT = $TM['doe']. " " .$TM['end_timing']. ":00";
                        
                        date_default_timezone_set("Asia/kolkata");
                        $strTime = new DateTime($strT);
                        $endTime = new DateTIme($endT);
                        
                        if(new DateTime() >= $strTime && new DateTime() <= $endTime){
                            echo "
                                <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/inst.html#$ex_id'>
                            ";
                        }else{
                            if($strTime > new DateTime()){
                                echo "
                                    <script>
                                        document.getElementById('error').style.display = 'flex';
                                        document.getElementById('error').innerHTML = 'Your test is not yet activated';
                                    </script>
                                ";
                            }
                            if($endTime < new DateTime()){
                                echo "
                                    <script>
                                        document.getElementById('error').style.display = 'flex';
                                        document.getElementById('error').innerHTML = 'Your test has passed';
                                    </script>
                                ";
                            }
                        }
                        
                    }else{
                        echo "
                            <script> alert('Error, Please try again') </script>
                        ";
                    }
                }else{
                    echo "
                        <script> alert('Error, Please try again') </script>
                    ";
                }

            }else{
                echo "
                    <script>
                        document.getElementById('error').style.display = 'flex';
                        document.getElementById('error').innerHTML = 'Incorrect Username or Password !';
                    </script>
                ";
            }
        }else{
            echo "
                <script> alert('Error, Please try again') </script>
            ";
        }
    }

?>