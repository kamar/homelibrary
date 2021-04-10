// const input_copies_standard = document.getElementById('copies_standard')

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

function goBack() {
    // window.history.back();
    history.go(-1);
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
      }
      xmlhttp.open("GET", "/dist/php/hints?q=" + str, true);
      xmlhttp.send();
    }
  }

function hideBooks(){
    document.getElementById('txtHint').innerHTML= "";
    document.getElementById('hidebooks').style.display = 'none';
    document.getElementById('authors_books').style.display = 'inline';
}

function showBooks(str){
    document.getElementById('authors_books').style.display = 'none';
    document.getElementById('hidebooks').style.display = 'inline';
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET","/dist/php/authorsbooks?q="+str,true);
        xmlhttp.send();
      }
    }

  function hideTrBooks(){
    document.getElementById('txtHint').innerHTML= "";
    document.getElementById('hidebooks').style.display = 'none';
    document.getElementById('translator_books').style.display = 'inline';
}

function showTrBooks(str){
  document.getElementById('translator_books').style.display = 'none';
  document.getElementById('hidebooks').style.display = 'inline';
  if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET","/dist/php/translatorsbooks?q="+str,true);
      xmlhttp.send();
    }
  }
    
  function hidePBooks(){
    document.getElementById('txtHint').innerHTML= "";
    document.getElementById('hidebooks').style.display = 'none';
    document.getElementById('publisher_books').style.display = 'inline';
}

function showPBooks(str){
  document.getElementById('publisher_books').style.display = 'none';
  document.getElementById('hidebooks').style.display = 'inline';
  if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET","/dist/php/publishersbooks?q="+str,true);
      xmlhttp.send();
    }
  }

  function hideRBooks(){
    document.getElementById('txtSuggestions').innerHTML= "";
    document.getElementById('hidebooks').style.display = 'none';
    document.getElementById('suggestions').style.display = 'inline';
}

function showRSuggestions(str){
  document.getElementById('suggestions').style.display = 'none';
  document.getElementById('hidebooks').style.display = 'inline';
  if (str == "") {
      document.getElementById("txtSuggestions").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtSuggestions").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET","/dist/php/readersuggest?q="+str,true);
      xmlhttp.send();
    }
  }

function getDetail(str) { 
  var element = document.getElementById('author_id');
  if (str.length == 0) { 
      document.getElementById("isbn").value = ""; 
      document.getElementById("isbn10").value = "";
      document.getElementById("title").value = "";
      document.getElementById('publisher_id').value = 1;
      document.getElementById('year').value = "";
      document.getElementById('pages').value = "";
      document.getElementById('back_page').value = "";
      document.getElementById('category_id').value = 1;
      document.getElementById('translated').checked = "";
      document.getElementById('translator_id').value = 0;
      document.getElementById('eidos_grafis_id').value = 1;
      document.getElementById('copies_standard').value = "";
      document.getElementById('copies_avail').value = "";
      document.getElementById('in_stock').checked = "";
      for (var i = 0; i < element.length; i++){
        element.options[i].selected = false;
      }
      document.getElementById('spanselectedItems').innerText = "";
      return; 
  } 
  else { 
      
      // Creates a new XMLHttpRequest object 
      var xmlhttp = new XMLHttpRequest(); 
      xmlhttp.onreadystatechange = function () { 

          // Defines a function to be called when 
          // the readyState property changes 
          if (this.readyState == 4 &&  
                  this.status == 200) { 
                
              // Typical action to be performed 
              // when the document is ready 
              var myObj = JSON.parse(this.responseText); 

              // Returns the response data as a 
              // string and store this array in 
              // a variable assign the value  
              // received to first name input field 
                
              document.getElementById("isbn").value = myObj[0]; 
              document.getElementById('isbn10').value = myObj[1];
              document.getElementById("title").value = myObj[2]; 
              document.getElementById('publisher_id').value = myObj[3];
              document.getElementById('year').value = myObj[4];
              document.getElementById('pages').value = myObj[5];
              document.getElementById('back_page').value = myObj[6];
              document.getElementById('category_id').value = myObj[7];
              document.getElementById('translated').checked = myObj[8];
              document.getElementById('translator_id').value = myObj[9];
              document.getElementById('eidos_grafis_id').value = myObj[10];
              document.getElementById('copies_standard').value = myObj[11];
              document.getElementById('copies_avail').value = myObj[12];
              document.getElementById('in_stock').checked = myObj[13];

              // Multiple authors.
              var au = myObj[14].split(", ");
              for (var i = 0; i < element.options.length;i++){
                element.options[i].selected = au.indexOf(element.options[i].value)>=0;
              } 

              var selectedItems = Array.from(element.selectedOptions).map(option => option.text);
              spanselectedItems.innerText = selectedItems.join(', ');
          } 
      }; 

        // xhttp.open("GET", "filename", true); 
        xmlhttp.open("GET", "/dist/php/getBook?isbn=" + str, true); 
          
        // Sends the request to the server 
        xmlhttp.send(); 
    } 
} 

function btnHideShow(ele){
  var id = ele.id;
  if (id == 'login'){
    document.getElementById('login').style.display = 'none';
    document.getElementById('registerme').style.display = 'none';
    document.getElementById('logout').style.display= 'inline';

  }
  else if (id = 'logout'){
    document.getElementById('logout').style.display = 'none';
    document.getElementById('login').style.display= 'inline';
    document.getElementById('registerme').style.display= 'inline';
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