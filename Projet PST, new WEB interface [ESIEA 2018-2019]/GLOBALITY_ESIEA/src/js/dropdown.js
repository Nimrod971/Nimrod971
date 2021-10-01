function myFunction() {
    document.getElementById("newRegistration").classList.toggle("show");
}

window.onclick = function(event) {
  if ( !(event.target.matches('.btn-registration') || !event.target.matches('registration-content')) ) {

    var dropdowns = document.getElementsByClassName("registration-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
