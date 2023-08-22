var currentIndex = 0; // Declare currentIndex as a global variable
var images; // Declare images as a global variable

function changeImageAutomatically() {
    currentIndex = (currentIndex + 1) % images.length;
    showImage(currentIndex);
}

function showImage(index) {
    images.removeClass('active').css('z-index', -10);
    images.eq(index).addClass('active').css('z-index', 10);
}

$(document).ready(function(){
    images = $('.slider-inner img'); // Assign images here

    $('.rarrow').on('click', function () {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    });

    $('.larrow').on('click', function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    });

    // Automatically change image every 2 seconds
    setInterval(changeImageAutomatically, 5000); // Change image every 5 seconds
});
