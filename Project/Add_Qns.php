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
    $qns = $_POST['qns'];
    $opa = $_POST['opA'];
    $opb = $_POST['opB'];
    $opc = $_POST['opC'];
    $opd = $_POST['opD'];
    $corr = $_POST['corr_op'];
    
    $sql = "insert into question(qns, opA, opB, opC, opD, corr_ans, ex_id) values ('$qns', '$opa', '$opb', '$opc', '$opd', '$corr', '$ex_id')";
    $insert = $conn->query( $sql);
    if(!$insert){
        echo "Not inserted";
    }else{
        echo "<script>alert('Question added successfully');
        window.location.href = 'Add_Qns.html';
        </script>";
    };
?>