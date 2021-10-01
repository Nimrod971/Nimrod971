console.log('enter in persoAlert !\n');

window.alert = function(alertMessage) {
    console.log('alert box call\n');
    var alertBox = "";
    alertBox+="<div class='MsgAlert'>";
    alertBox+="<h1 class='title'>Notification</h1>";
    alertBox  +="<p><br>"+alertMessage+"</p>";
    alertBox  +="<input type='submit' value='OK' onclick='closeAlert();HideFond();' />";
    alertBox+="</div>";
    var Alertpanel = document.getElementById("alertPanel"); // On selection le div alertPanel deja présent dans la page (mais vide)
    Alertpanel.innerHTML = alertBox; // On le remplit de notre div
    Alertpanel.focus(); // On lui donne le focus
}

function closeAlert() {
    var alertBox =  document.getElementById("alertPanel"); // On selection le div present dans la page et remplit par nos soins
    alertBox.innerHTML =""; // Et on le vide de son contenue
    window.location = "home.php";
}
