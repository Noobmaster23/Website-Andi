function slideshow() {
  var slideIndex = 1;
  showSlides();
}

function showSlides() {

  var slides = document.getElementsByClassName("slide");
  //speichert alle slides in einem array    
  
  if (slideIndex > slides.length) { 
    slideIndex = 1;  
    //um Index zu resetten wenn er grösser als die Anzahl Bilder wird                                      
  }
  
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    //macht alle slides unsichtbar   
    slideIndex++;                    
  }


  slides[slideIndex - 1].style.display = "block";
  //macht eine Slide sichtbar

  setTimeout(showSlides, 2000);
}