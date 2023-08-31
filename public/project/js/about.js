// Get the login button and the login modal
const loginButton = document.getElementById("login-button");
const loginField = document.getElementById("login-field");

// When the user clicks the login button, display the login modal
loginButton.addEventListener("click", () => {
  // Lower the visibility of the main page
  document.body.style.opacity = "0.5";
  // Display the login modal
  loginField.style.display = "block";
});

// When the user clicks the "X" button, hide the login modal
const closeButton = document.querySelector(".close");
closeButton.addEventListener("click", () => {
  // Restore the visibility of the main page
  document.body.style.opacity = "";
  // Hide the login modal
  loginField.style.display = "none";
});
//////////////////////////////////
let swiper;
document.addEventListener("DOMContentLoaded", function() {
 swiper = new Swiper(".mySwiper2", {
 
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
navigation: {
  nextEl: ".swiper-button-next",
  prevEl: ".swiper-button-prev",
},

pagination: {
  el: ".swiper-pagination",
  type: "progressbar",
},  autoplay: {
  delay: 3000,
},
breakpoints: {
  // when window width is >= 320px
  320: {
    autoplay:false,
    slidesPerView: 1,
    spaceBetween: 20
  },
  // when window width is >= 480px
  480: {

    slidesPerView: 1,
    spaceBetween: 30
  },
  // when window width is >= 640px
  640: {

   
    slidesPerView: 3,
    spaceBetween: 40,
  }
}
});

});
