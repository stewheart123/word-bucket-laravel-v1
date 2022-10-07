var swiper = new Swiper(".mySwiper", {
  slidesPerView: 4,
  grid: {
    rows: 2,
  },
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});