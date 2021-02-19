const input_copies_standard = document.getElementById('copies_standard')

function fill_available(){
    var $copies_standard = document.getElementById('copies_standard').value
    if ($copies_standard > 0){
        document.getElementById('copies_avail').value = $copies_standard
    }
}

function val_form(){
    if (document.forms["newbook"]["isbn"].value == "" && document.forms["newbook"]["isbn10"].value == ""){
        document.getElementsByClassName("form_error").item(0).innerHTML = "* Το πεδίο ISBN ή ISBN10 πρέπει να είναι συμπληρωμένο."
        return false
    }

    if (document.forms["newbook"]["title"].value == "") {
        document.getElementsByClassName("form_error").item(1).innerHTML = "* Το πεδίο Title πρέπει να είναι συμπληρωμένο."
        return false
    }

    if (document.forms["newbook"]["publisher_id"].value == "") {
        document.getElementsByClassName("form_error").item(2).innerHTML = "* Το πεδίο Publisher πρέπει να είναι συμπληρωμένο."
        return false
    }

    if (document.forms["newbook"]["category_id"].value == "") {
        document.getElementsByClassName("form_error").item(3).innerHTML = "* Το πεδίο Category πρέπει να είναι συμπληρωμένο."
        return false
    }

    if (document.forms["newbook"]["eidos_grafis_id"].value == "") {
        document.getElementsByClassName("form_error").item(4).innerHTML = "* Το πεδίο πρέπει να είναι συμπληρωμένο."
        return false
    }
}

function toggle_inputs(status=true){
    var inputs = document.getElementsByTagName('input')
    for (i=1;i<inputs.length;i++){
        inputs[i].disabled = status
    }
}

function showHint(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "/dist/php/hints?q=" + str, true);
      xmlhttp.send();
    }
  }
// function active_mnu(){
//     // var path = window.location.pathname;
//     // var page = path.split("/").pop();

    
//     var current = document.getElementsByClassName('active')
//     if (current.length > 0) { 
//         current[0].className = current[0].className.replace("active", "")
//     }
//     // this.className += " active"
//     // document.getElementById(page).setAttribute("class", "active")
// }

// // input_copies_standard.addEventListener('change', fill_available)
// // document.addEventListener("load", active_mnu)