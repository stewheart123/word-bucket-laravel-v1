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
  
        breakpoints: {
          1024: {
            spaceBetween: 20,
            slidesPerView: 4,
            grid: {
              rows: 2,
            }
          },
          540: {
            spaceBetween: 20,
            slidesPerView: 2,
            grid: {
              rows: 2,
            }
          },
          320: {
            spaceBetween: 10,
            slidesPerView: 1,
            grid: {
              rows: 3,
            }
          }
        }
});