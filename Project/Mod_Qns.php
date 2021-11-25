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
    $sql = "select * from question where qno = '$qno'";

    $rs = $conn->query($sql);
    if(!$rs){
        echo "Unable to fetch data";
    }

    $row = mysqli_fetch_assoc($rs);
    if(isset($_POST['submit'])){
        $ex_id = $_POST['ex_id'];
        $qns = $_POST['qns'];
        $a = $_POST['opa'];
        $b = $_POST['opb'];
        $c = $_POST['opc'];
        $d = $_POST['opd'];
        $corr_ans = $_POST['corr_ans'];

        $sql = "update question set ex_id = '$ex_id', qns = '$qns', opA = '$a',
         opB = '$b', opC = '$c', opD = '$d', corr_ans = '$corr_ans' where qno = '$qno'";

        $rs = $conn->query($sql);
        if($rs){
            echo "<script> alert ('Question updated succussfully') </script>";
            echo "
            <meta http-equiv = 'refresh' content = '0; url = http://localhost/Project/View_Qns.php?ex_id=$ex_id'>
            ";

        }
        else{
            echo "unable to update records";
        }
    }
?>
<html>
    <head>
        <title>
            Update question
        </title>
        <style>
            body h1{
                text-align:center;
                padding:15px;
                font-size:50px;
                font-family:cambria;
                background-color:greenyellow;
                margin:20px;
                border-radius:50%;
            }
            .view_qns{
                position:absolute;
                padding:40px;
                background-color: lightgrey;
                margin:40px;
                border-radius:10px;
                width:max-content; 
                left:50%;
                top:50%;
                transform:translate(-50%, -50%);               
            }
            .view_qns table{
                font-size:20px;
            }
            .view_qns table th, td{
                padding:5px 20px;
                text-align:left;
            }            
            .view_qns textarea{
                font-family: sans-serif;
                font-size:18px;
                padding:5px 5px;
                width:500px;
                height:35px;
            }
            .view_qns input[type = "text"]{
                padding:5px 5px;
                font-family:sans-serif;
                font-weight:bold;
                font-size:18px;
                width:500px;
            }
            .view_qns input[type = "submit"]{
                text-align:center;
                padding:10px 40px;
                outline:none;
                border:2px solid rgb(172, 0, 0);
                font-weight: bold;
                color:rgb(172, 0, 0);
                background-color:white;
                font-size:20px;
                border-radius:8px;
                margin-top:50px;
                width:250px;
            }
            .view_qns input[type = "submit"]:hover{
                color:white;
                background-color:rgb(172, 0, 0);
            }
            .view_qns input[type = "submit"]:active{
                color:rgb(172, 0, 0);
            }

        </style>
    </head>
    <body>
        <h1>Update Question</h1>
    <div class = "view_qns" style = "display:flex;">
            <form action = "" method="POST" autocomplete="off">
                <table  cellspacing = "0" >
                    <tr>
                        <th> Exam ID </th>
                        <td>
                            <input type = "text" value = "<?php echo $row['ex_id'] ?>"  name = "ex_id">
                        </td>
                    </tr>
                    <tr>
                        <th> Question </th>
                        <td>
                            <textarea name = "qns"><?php echo $row['qns'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th> Option A </th>
                        <td>
                            <textarea name = "opa"><?php echo $row['opA'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th> Option B </th>
                        <td>
                            <textarea name = "opb"><?php echo $row['opB'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th> Option C </th>
                        <td>
                            <textarea name = "opc"><?php echo $row['opC'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th> Option D </th>
                        <td>
                            <textarea name = "opd"><?php echo $row['opD'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th> Corr Ans </th>
                        <td>
                            <input type = "text" name = "corr_ans" value = "<?php echo $row['corr_ans'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th colspan = "2" style = "text-align:center;">
                            <input type = "submit" Value = "Update" name = "submit">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

