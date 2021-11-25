<?php  
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from adminLogin where username = '$user' and password = '$pass'";
    $rs = $conn->query($sql);

    if($rs){
        if(mysqli_num_rows($rs)>0){
            echo "
            <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/admin_dash.php'>
            ";
        }else{
            echo "
            <script> alert('Incorrect username or password !') </script>
            ";
            echo "
            <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/login.html'>
            ";
        }
    }else{
        echo "unable to fetch data";
    }

?>