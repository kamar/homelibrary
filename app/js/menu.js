function testme() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) {
    current[0].className = current[0].className.remove("active");
  }
  // current[0].className = current[0].className.replace(" active", "");
  this.className.add("active");
}

var btns = [];
// Get all buttons with class="btn" inside the container
btns = document.getElementsByClassName("btn");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", testme);
} 