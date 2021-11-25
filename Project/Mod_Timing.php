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
        <title>Modify Timing</title>
        <script type = "text/javascript" src = "main.js"></script>
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel = "stylesheet" href = "Mod_Timing.css">
    </head>
    <body>
        <div class = "logo">
            <img class = "logo_img" src = "images/culogo.png" alt = "Logo not found">
            <img class = "logo_img2" src = "images/naac-logo.png" alt = "Logo not found">
        </div>
        <div class="navigation">
            <nav>
                <ul>
                    <li ><i class = "fa fa-home" ></i><a href = "admin_dash.php">Home</a></li>
                    <li><i class = "fa fa-question-circle" ></i><a href = "#">Questions</a>
                        <div class = "sub_nav">
                            <ul>
                                <li><a href = "Add_Qns.html" >Add Questions</a></li>
                                <li><a href = "View_Qns.php" >View Questions</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class = "act"><i class = "fa fa-bell" ></i><a href = "#">Timing</a>
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
            </nav>
        </div>
        <!-- Now from here everything will be start--->
        <div class = "find" id = "fnd">
            <form action = "" method = "POST" autocomplete="off">
                <input type = "text" id = "ex_id" name = "ex_id" placeholder="Enter Exam ID" required>
                <input type = "submit" id = "findId" name = "findId" value = "Get Details" onclick = "enable()">
            </form>
        </div>
        <?php
            if(isset($_POST['findId']) || isset($_POST['submit'])){
                $id = $_POST['ex_id'];

                if(isset($_POST['submit'])){
                    $date = $_POST['date'];
                    $strTime = $_POST['strTime'];
                    $endTime = $_POST['endTime'];
                    $dur = $_POST['dur'];

                    $sql = "update timing set doe = '$date', timing = '$strTime', end_timing = '$endTime', duration = '$dur' where ex_id = '$id'";
                    $rs = $conn->query($sql);
                    if($rs){
                        echo "
                            <script> alert('Timing Updated Successfully') </script>
                        ";
                    }else{
                        echo "
                            <script> alert('Unable to update timing') </script>
                        ";
                    }
                }


                $sql = "select * from timing where ex_id = '$id'";
                $rs = $conn->query($sql);
        
                if($rs){
                    if(mysqli_num_rows($rs)>0){
                        $row = mysqli_fetch_assoc($rs);
                        echo "
                        <div class = 'test' >
                        <form autocomplete = 'off' method = 'post' action = ''>
                            <table cellspacing = '0'>
                                <tr>
                                    <th>Exam ID</th>
                                    <td>
                                        <input type = 'text' id = 'ex_id' name = 'ex_id' value = '$row[ex_id]' readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Exam Date</th>
                                    <td>
                                        <input type = 'text' id = 'date' name = 'date' value = '$row[doe]' readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <td>
                                        <input type = 'text' id = 'strTime' name = 'strTime' value = '$row[timing]' readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>End Time</th>
                                    <td>
                                        <input type = 'text' id = 'endTime' name = 'endTime' value = '$row[end_timing]' readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>
                                        <input type = 'number' id = 'dur' name = 'dur' value = '$row[duration]' readonly>
                                    </td>
                                </tr>
                                <tr style = 'text-align:center'>
                                    <th colspan = '2'>
                                        <input type = 'button' id = 'en' onclick = 'enable()' Value = 'Update'>
                                        <input type = 'submit' id = 'submit' name = 'submit' Value = 'Update Record' style = 'display:none;' >
                                    </th>
                                </tr>
                            </table>
                        </form>            
                    </div>
                        ";
                        
                    }else{
                        echo "
                            <script> alert('No data Found') </script>
                        ";
                    }
                }else{
                    echo "Unable to fetch data";
                }   
            }        
        ?>        
        <script>
            function enable(){
                document.getElementById("date").readOnly = false;
                document.getElementById("strTime").readOnly = false;
                document.getElementById("endTime").readOnly = false;
                document.getElementById("dur").readOnly = false;
                document.getElementById("en").style.display = "none";
                document.getElementById("submit").style.display = "inline-flex";
            }
        </script>
    </body>
</html>