<?php  
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $base = "project";
    $conn = mysqli_connect($host, $user, $pass, $base);

    if($conn->connect_error){
        die("Unable to connect with the database");
    }
?>

<html>
    <head>
        <title>Dashboard</title>
        <script type = "text/javascript" src = "main.js"></script>
        <link rel = "stylesheet" href = "admin_dash.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class = "logo">
            <img class = "logo_img" src = "images/culogo.png" alt = "Logo not found">
            <img class = "logo_img2" src = "images/naac-logo.png" alt = "Logo not found">
        </div>
        <div class="navigation">
            <nav>
                <ul>
                    <li class = "act"><i class = "fa fa-home" ></i><a href = "admin_dash.php">Home</a></li>
                    <li><i class = "fa fa-question-circle" ></i><a href = "#">Questions</a>
                        <div class = "sub_nav">
                            <ul>
                                <li><a href = "Add_Qns.html" >Add Questions</a></li>
                                <li><a href = "View_Qns.php" >View Questions</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><i class = "fa fa-bell" ></i><a href = "#">Timing</a>
                        <div class = "sub_nav">
                            <ul>
                                <li><a href = "Set_Timing.html" >Set Timing</a></li>
                                <li><a href = "Mod_Timing.php" >Modify Timing</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><i class = "fa fa-user-secret" ></i><a href = "#">Users</a>
                        <div class = "sub_nav">
                            <ul>
                                <li><a href = "Add_User.html" >Add Users</a></li>
                                <li><a href = "View_Users.php" >View Users</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <input type = "button" value = "Logout" onclick = "exit()">
                </script>
            </nav>
        </div>
        <!--    Now from here all the process will be start    -->
        <div class = "bdy" >
            <h2><u>Today's Exams</u></h2><center>
            <table border = "1" cellspacing = "0" cellpadding= "15" width = "800" height = "20">
                <tr>
                    <th>Exam ID</th>
                    <th> Start Time </th>
                    <th> End Time </th>
                    <th> Duration </th>
                    <th>Status</th>
                </tr>
                <?php
                    date_default_timezone_set("Asia/kolkata");
                    $d = date("Y-m-d");
                    $sql = "select * from timing where doe = '$d'";
                    $rs = $conn->query($sql);
                    if(!$rs){
                        die ("unable to fetch data");
                    }
                    else{
                        if(mysqli_num_rows($rs) > 0){
                            while($row  = mysqli_fetch_assoc($rs)){
                                echo "<tr><td>" . $row['ex_id'] ."</td>";
                                echo "<td>" . $row['timing'] ."</td>";
                                echo "<td>" . $row['end_timing'] ."</td>";
                                echo "<td>" . $row['duration'] . "</td>";

                                $str1 = $row['doe'] . " " . $row['timing'] . ":00";
                                $str2 = $row['doe'] . " " . $row['end_timing'] . ":00";
                                $startTime = new DateTime($str1);
                                $endTime = new DateTime($str2);
                                //Here time between will have to find
                                if(new DateTime() >= $startTime && new DateTime() <= $endTime){
                                    echo "<td style = 'color:green;font-weight:bold;'> Active </td></tr>";
                                }else{
                                    echo "<td style = 'color:red;font-weight:bold;'> Inactive </td></tr>";
                                }
                            }
                        }else{
                            echo "
                                <tr>
                                    <td colspan = '5'><font color = 'red'> No test today </td>
                                </tr>
                            ";
                        }
                    }
                ?>
            </table>
            </center>
        </div>
    </body>
</html>