<html>
    <head>
        <title>View Question</title>
        <script type = "text/javascript" src = "main.js"></script>
        <link rel = "stylesheet" href = "View_Qns.css">
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
                    <li ><i class = "fa fa-home" ></i><a href = "admin_dash.php">Home</a></li>
                    <li class = "act"><i class = "fa fa-question-circle" ></i><a href = "#">Questions</a>
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
                    <li ><i class = "fa fa-user-secret" ></i><a href = "#">Users</a>
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
        <!--    Now from here all the process will be start    -->
        <div class = "view">
            <form method = "GET" action = "">
            Exam ID : <input type="text" placeholder="Enter Exam ID" autocomplete="off" id = "ex_id" name = "ex_id" required>
            <input type = "submit" value = "Search" name = "search">
        </form>
        </div>
        <div class = "cont" id = "cont"><center>
            <table border = "1" cellspacing = "0" cellpadding = "15">
                <tr>
                    <th> Question </th>
                    <th> Option A </th>
                    <th> Option B </th>
                    <th> Option C </th>
                    <th> Option D </th>
                    <th> Corr Ans </th>
                    <th> Delete   </th>
                    <th> Update   </th>
                </tr>
                <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "Mukesh@2001";
                        $base = "project";
                        $conn = mysqli_connect($host, $user, $pass, $base);

                        if($conn->connect_error){
                            die("Unable to connect with the database");
                        }
                        if(isset($_GET['search']) || isset($_GET['ex_id'])){
                            echo "
                                <script> document.getElementById('cont').style.display = 'inline-block'</script>
                            ";
                        $id = $_GET['ex_id'];
                        $sql = "select * from question where ex_id = '$id'";
                        $rs = $conn->query($sql);

                        if(!$rs){
                            die("Unable to fetch data");
                        }else{
                            if(mysqli_num_rows($rs) > 0){
                               while($row = mysqli_fetch_assoc($rs)){
                                    echo "
                                        <tr>
                                            <td> ".$row['qns']."</td>
                                            <td> ".$row['opA']."</td>
                                            <td> ".$row['opB']."</td>
                                            <td> ".$row['opC']."</td>
                                            <td> ".$row['opD']."</td>
                                            <td> ".$row['corr_ans']."</td>
                                            <td>
                                                <a href = 'Del_Qns.php?qn=$row[qno]&id=$row[ex_id]' onclick = 'return check()' id = 'del'>Delete </a>
                                            </td>
                                            <td>
                                                <a href = 'Mod_Qns.php?qn=$row[qno]&id=$row[ex_id]' onclick = 'return check()' id = 'upd'> Update </a>
                                            </td>
                                        </tr>
                                    ";
                               }
                            }else{
                                echo "
                                    <tr><td colspan = '8'> No Question Found </td></tr>
                                ";
                            }
                        }
                    }else{
                        echo "
                            <tr><td colspan = '8'> No Question Found </td></tr>
                        ";
                    }
                ?>
            </table></center>
            <script>
                function check(){
                    return confirm("Are you sure ?");
                }
                </script>
        </div>
    </body>
</html>