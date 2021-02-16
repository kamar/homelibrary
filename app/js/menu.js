function testme() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) {
    current[0].className = current[0].className.replace(" active", "");
  }
  // current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
}

var btns = '';
btns = document.getElementById("mymenu").getElementsByClassName("btn");
// Get all buttons with class="btn" inside the container

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", testme);
} 