const input_copies_standard = document.getElementById('copies_standard')

function fill_available(){
    var $copies_standard = document.getElementById('copies_standard').value
    if ($copies_standard > 0){
        document.getElementById('copies_avail').value = $copies_standard
    }
}

input_copies_standard.addEventListener('change', fill_available)