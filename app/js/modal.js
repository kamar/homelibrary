// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  // setTimeout(window.location.replace("http://homelibrary.me"), 100)
  setTimeout(window.history.go(-1), 100)
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    // setTimeout(window.location.replace("http://homelibrary.me"), 100);
    setTimeout(window.history.go(-1), 100)
  }
}
// When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }
document.body.onload = function() {
  modal.style.display = "block";
}