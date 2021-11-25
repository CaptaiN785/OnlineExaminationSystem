<?php 
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }
    $ex_id = $_POST['ex_id'];
    $uid = $_POST['uid'];
    

    $sql = "insert into users (user, ex_id) values ('$uid', '$ex_id')";
    $insert = $conn->query( $sql);
    if(!$insert){
        echo "Not inserteed";
    }else{
        echo "<script>alert('User added successfully');
        window.location.href = 'Add_User.html';
        </script>";
    };
?>