const input_copies_standard = document.getElementById('copies_standard')

function fill_available(){
    var $copies_standard = document.getElementById('copies_standard').value
    if ($copies_standard > 0){
        document.getElementById('copies_avail').value = $copies_standard
    }
}

function disable_mnu(){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    document.getElementById(page).setAttribute("class", disabled)
}

// input_copies_standard.addEventListener('change', fill_available)
document.addEventListener("load", disable_mnu)