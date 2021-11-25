
<html>
    <head>
        <title>
            &#9999; Best Of Luck
        </title>
        <link rel = "stylesheet" href = "main.css">
        <script type = "text/javascript" src = "main.js"></script>
    </head>
    <body onload = "setInterval(timer, '1000') + load_qns()" onblur = "mistake()">
        <div class = "top-bar" >
            <label id = "name">Chandigarh University</label>
            <input type = "Button" value = "Logout" id = "logout" onclick = "logout()">
            <label id = "time_left" ></label>
            <label id = "total_qns" style = "font-size:25px;"></label>
        </div>
        <div class = "main-window">
           
            <div class="qns">
                <label id = "qno">  </label> .
                <label id = "qns"> </label>
            </div>
            <div class = "opt">
                <input type = "radio" name = "ans" id = "A">
                <label for = "A" id = "op1"> </label>              
                <br><input type = "radio" name = "ans" id = "B">
                <label for = "B" id = "op2"> </label>  
                <br><input type = "radio" name = "ans" id = "C">
                <label for = "C" id = "op3"> </label>
                <br><input type = "radio" name = "ans" id = "D">
                <label for = "D" id = "op4" > </label>
                <br><br>
                <p id = "ins" style="color:red;font-size:20px;display:none;"></p>
            </div>
        </div>
        <div class = "last">
            <input type ="button" value = "Next" id = "next" name = "next" onclick="Next()">
            <input type = "submit" value = "Submit" id = "submit" onclick="final()">
        </div>
<script>
    function logout(){
        window.location.href = "User_login.php";
    }
    var Marks = 0;
    function checkAnswer(){
        var Ans = "Q";
        if(document.getElementById("A").checked){
            Ans = "A";
            document.getElementById("A").checked = false;
        }
        if(document.getElementById("B").checked){
            Ans = "B";
            document.getElementById("B").checked = false;
        }
        if(document.getElementById("C").checked){
            Ans = "C";
            document.getElementById("C").checked = false;
        }
        if(document.getElementById("D").checked){
            Ans = "D";
            document.getElementById("D").checked = false;
        }
        return Ans;
    }
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "Mukesh@2001";
    $db = "Project";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if($conn->connect_error){
        echo "Unable to connect with database";
    }
    $id = $_GET['ex_id'];
    ?>
    var arr = [['qns', 'opA', 'opB', 'opC', 'opD', 'corr_ans']
        <?php
            $rs = $conn->query("select * from question where ex_id = '$id'");
            if(mysqli_num_rows($rs) > 0 ){
                while($row = mysqli_fetch_assoc($rs)){
                    echo ", ['$row[qns]', '$row[opA]', '$row[opB]', '$row[opC]', '$row[opD]', '$row[corr_ans]']";
                }
            }
        ?>
    ];
    var N = arr.length;
    N = N - 1;
    document.getElementById("total_qns").innerHTML = "Total Qns : " + N;
    var qno = 1;
    function load_qns(){
        document.getElementById("qno").innerHTML = qno;
        document.getElementById("qns").innerHTML = arr[qno][0];
        document.getElementById("op1").innerHTML = arr[qno][1];
        document.getElementById("op2").innerHTML = arr[qno][2];
        document.getElementById("op3").innerHTML = arr[qno][3];
        document.getElementById("op4").innerHTML = arr[qno][4];
    }
    function Next(){
        var getAns = checkAnswer();
        if(getAns === "Q"){
            document.getElementById("ins").innerHTML = "Please Select a Option !";
            document.getElementById("ins").style.display = "flex";
            return;
        }
        document.getElementById("ins").style.display = "none";
        var Corr_Ans = arr[qno][5];
        if(Corr_Ans === getAns){
            Marks++;
        }
        qno++;
        if(qno === N){
            document.getElementById("next").style.display = "none";
        }
        load_qns();
    }
    function final(){
        var getAns = checkAnswer();
        if(getAns === "Q"){
            document.getElementById("ins").innerHTML = "Please Select a Option !";
            document.getElementById("ins").style.display = "flex";
            return;
        }
        document.getElementById("ins").style.display = "none";
        var Corr_Ans = arr[qno][5];
        if(Corr_Ans === getAns){
            Marks++;
        }
        window.location.href = "result.html#" + Marks;
    }

    // Now timer part
    
    var min = <?php 
        $rs = $conn->query("select duration from timing where ex_id = '$id'");
        $TIMING = mysqli_fetch_assoc($rs);
        echo $TIMING['duration'];
    ?>;
    min = min - 1;
    var sec = 60;
    function timer(){
        //var t = new Date();
        if(sec === 0 ){
            min = min - 1;
            sec = 59;
        }else{
            sec = sec - 1;
        }
        if(min == 0 && sec == 0){
            window.location.href = "result.html#" + Marks;
        }
        document.getElementById("time_left").innerHTML ="Time left : " + min + ":" + sec;
        // t.toLocaleTimeString();
    }
    // Now count mistake part
    var MTK = 0;// Count no of mistakes made on clicking the another tab

    function mistake(){
        MTK = MTK + 1;
        if(MTK < 3){
            alert("You have Entered another tab " + MTK +" times\n\nOtherwise you will be disqualified");
        }else if(MTK === 3){
            window.location.href = "result.html#" + Marks;
        }
    }
</script>
    </body>
</html>