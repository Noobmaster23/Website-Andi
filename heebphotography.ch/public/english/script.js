// calls the slideshow fuction, which changes the image, every 5 seconds
var slideshow_interval = setInterval(slideshow(), 5000);

// changes the image
function slideshow() {
	alert("help");
	// when the document has fully loaded, begin with slideshow
	if (document.readyState == "complete") {
		alert("1");
		// gets every slide image
		var slides = document.getElementsByClassName("slides");
		// finds the slide image which is currently shown
		for (let index = 0; index < slides.length; index++) {
			if (slides[index].style.opasity == 1) {
				current_slide = slides[index];
			}
		}
		alert("2");
		// select a new slide image
		var new_slide = current_slide;
		while (new_slide == current_slide) {
			new_slide = slides[Math.floor(Math.random() * slides.length)];
		}
		alert("3");
		// lets the current slide disappear and shows the new slide slide
		current_slide.style.opasity = 0;
		new_slide.style.opasity = 1;
	}
	alert("hi");
}