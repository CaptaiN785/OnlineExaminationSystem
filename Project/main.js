function getScore(){
    var marks = window.location.hash.substring(1)
    document.getElementById("score").innerHTML = "You have scored " + marks + " Marks";
}
function logout(){
    window.location.href = "User_login.php";
}
function exit(){
    window.location.href = "login.html";
}