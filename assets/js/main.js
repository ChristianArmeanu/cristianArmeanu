// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 0, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});


jQuery(function(){
    
  jQuery(".mobile-menu-toggle").on("click", function (e) {
    //e.preventDefault(); //
    jQuery(this).toggleClass("active");
    jQuery(".menu-header").toggleClass("active");
    jQuery("body").toggleClass("menu-open");
  });

  // Verificați dacă lățimea ecranului este sub un anumit prag (de exemplu, 768px) pentru a decide dacă sunteți pe un dispozitiv mobil
  // Verify if the screen width is below a certain threshold (e.g. 768px) to decide if you're on a mobile device
  if (window.matchMedia("(max-width: 768px)").matches) {
    // Adăugați un selector pentru linkurile din meniu, să presupunem că au clasa CSS '.menu-link'
    // Add a selector for the links in the menu, let's assume they have the CSS class '.menu-link'
    jQuery(".links").on("click", function () {
      jQuery(".mobile-menu-toggle").removeClass("active");
      jQuery(".menu-header").removeClass("active");
      jQuery("body").removeClass("menu-open");
    });
  }

  jQuery(".menu a").on("click", function () {
    jQuery(".menu a").removeClass("current-menu-item");
    jQuery(this).addClass("current-menu-item");
  });


    // Video playback
    jQuery('.media--container[data-type="video"]').attr('data-status', 'initial')
    jQuery('.media--container[data-type="video"] span').on('click', function(){
        const parent = jQuery(this).parent()
        if(jQuery(parent).attr('data-status') === 'playing'){
            jQuery('video', parent).get(0).pause()
            jQuery(parent).attr('data-status', 'paused')
        } else {
            jQuery('video', parent).get(0).play()
            jQuery(parent).attr('data-status', 'playing')
        }
    })

    
    if(jQuery('.block--listing'))
    jQuery('.block--listing .slick').slick({
        autoplay: false,
        infinite: true,
        dots: false,
        arrows: true,
        speed: 450,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1050,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true
                }
            },
        ]
    })

  //Hero Slider

  if (jQuery(".hero-slider").length > 0)
    jQuery(".hero-slider").slick({
        autoplay: true,
        arrows: false,
        dots: true,
        fade: false,
        cssEase: "linear",
        infinite: true,
        autoplaySpeed: 2500,
    });
  
    ////////////////////////////////


    //Cookie policy
    if(localStorage.getItem('cookie'))
        jQuery('#cookie').remove()

    jQuery('#cookie button').on('click', function(e){
        e.preventDefault()
        localStorage.setItem('cookie', 1)
        jQuery('#cookie').toggleClass('accepted pending')
    })
})


// when scroll put background on nav
document.addEventListener('DOMContentLoaded', function() {
  const nav = document.querySelector('#app-header');
  const logo = document.querySelector('.logo');
  function checkNavBackground() {
    // Verifică lățimea ecranului (desktop vs. mobil)
    const isMobile = window.innerWidth <= 600; // poți ajusta pragul la nevoie
    const scrollThreshold = isMobile ? 50 : 250;

    if (window.scrollY > scrollThreshold) {
      nav.style.backgroundColor = '#232946';
      logo.style.width = '100px'; // înălțimea nav-ului pe mobil
    } else {
      nav.style.backgroundColor = 'transparent';
      logo.style.width = '150px'; // înălțimea nav-ului pe desktop
    }
  }

  // Rulează la scroll și la resize (în caz că userul schimbă orientarea ecranului)
  window.addEventListener('scroll', checkNavBackground);
  window.addEventListener('resize', checkNavBackground);

  // Rulează o dată la load
  checkNavBackground();
});



// Intro 

  setTimeout(function() {
    const intro = document.getElementById('intro');
    intro.classList.add('fade-out');
    setTimeout(() => {
      intro.style.display = 'none';
      document.body.style.overflow = 'auto';
    }, 750);
  }, 2400);

  document.getElementById('intro').addEventListener('click', function() {
    this.classList.add('fade-out');
    setTimeout(() => {
      this.style.display = 'none';
      document.body.style.overflow = 'auto';
    }, 700);
  });