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
    $date = $_POST['date'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $dur = $_POST['duration'];

    
    $sql = "insert into timing values ('$ex_id', '$date','$time1' , '$time2' , '$dur')";
    $insert = $conn->query( $sql);
    if(!$insert){
        echo "Not inserteed";
    }else{
        echo "<script>alert('Timing added successfully');
        window.location.href = 'Set_Timing.html';
        </script>";
    };
?>