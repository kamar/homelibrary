window.addEventListener("load", book_details);

  function book_details(){
    for (let book of document.getElementsByClassName("book-wrap")) {
      book.addEventListener("click", function(){
        var id = this.dataset.id,
            name = this.getElementsByClassName("book-title")[0].innerHTML,
            desc = this.getElementsByClassName("book-desc")[0].childNodes[1].innerHTML;
            // desc = this.getElementById("numpages").childNodes[1].innerHTML;
            // desc = this.getElementById("numpages").childNodes[1].innerHTML;
        alert(`You have selected - ISBN: ${id}\n TITLE: ${name}\n PAGES: ${desc}`);
      });
    }
  }