const input_copies_standard = document.getElementById('copies_standard')

function fill_available(){
    var $copies_standard = document.getElementById('copies_standard').value
    if ($copies_standard > 0){
        document.getElementById('copies_avail').value = $copies_standard
    }
}

function val_form(){
    if (document.forms["newbook"]["isbn"].value == "") and (document.forms["newbook"]["isbn10"].value == "");{
        document.getElementsByClassName("form_error").item(3).innerHTML = "* Το πεδίο πρέπει να είναι συμπληρωμένο."

        return false
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