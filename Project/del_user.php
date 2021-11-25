<?php  
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }
    $user = $_GET['user'];
    $id = $_GET['id'];
    $sql = "delete from users where user = '$user'";
    $rs = $conn->query($sql);
    if($rs){
        echo "
        <script>
            alert('User deleted successfully');
            </script>
        ";
    }else{
        echo "
        <script>
            alert('Unable to delete user');
            </script>
        ";
    }
    echo "
    <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/View_Users.php?ex_id=$id'>
    ";
?>