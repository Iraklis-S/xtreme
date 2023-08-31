document.addEventListener("DOMContentLoaded", function() {
  let swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    autoplay: {
      delay: 3000,
    },
  
  });
});