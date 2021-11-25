<?php  
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }   
    $qno = $_GET['qn'];
    $id = $_GET['id'];
    $sql = "delete from question where qno = '$qno'";
    $delete = $conn->query($sql);
    if($delete){
        echo "
        <script>
            alert('Question deleted successfully');
            </script>
        ";
    }else{
        echo "
        <script>
            alert('Unable to delete question');
            </script>
        ";
    }
    echo "
    <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/View_Qns.php?ex_id=$id'>
    ";
?>
