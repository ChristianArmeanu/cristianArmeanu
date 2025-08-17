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
  easing: 'ease-in-out-cubic', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});


jQuery(function(){
    
 // Toggle pentru mobile menu
  jQuery(".mobile-menu-toggle").on("click", function () {
    jQuery(this).toggleClass("active");
    jQuery("#menu-header").toggleClass("active");
    jQuery("body").toggleClass("menu-open");
  });

  // Dacă e sub 992px și se dă click pe un link, închidem meniul
  if (window.matchMedia("(max-width: 992px)").matches) {
    jQuery(".links").on("click", function () {
      jQuery(".mobile-menu-toggle").removeClass("active");
      jQuery("#menu-header").removeClass("active");
      jQuery("body").removeClass("menu-open");
    });
  }

  // Adaugă clasa current_page_item pe link-ul selectat
  jQuery(".menu a").on("click", function () {
    jQuery(".menu li").removeClass("current_page_item"); // scoate de la toate
    jQuery(this).parent("li").addClass("current_page_item"); // pune pe li-ul activ
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


    // Custom project slider
});


// when scroll put background on nav
document.addEventListener('DOMContentLoaded', function() {
  const nav = document.querySelector('#app-header');
  const logo = document.querySelector('.logo');
  function checkNavBackground() {
    // Verifică lățimea ecranului (desktop vs. mobil)
    const isMobile = window.innerWidth <= 600; // poți ajusta pragul la nevoie
    const scrollThreshold = isMobile ? 50 : 250;

    if (window.scrollY > scrollThreshold) {
      nav.style.backgroundColor = '#111';
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

const intro = document.getElementById('intro');

if (intro) {
  setTimeout(function() {
    intro.classList.add('fade-out');
    setTimeout(() => {
      intro.style.display = 'none';
      document.body.style.overflow = 'auto';
    }, 750);
  }, 2400);

  intro.addEventListener('click', function() {
    this.classList.add('fade-out');
    setTimeout(() => {
      this.style.display = 'none';
      document.body.style.overflow = 'auto';
    }, 700);
  });
}





// Enquiry Popup


jQuery(document).ready(function($){
  $('a[href="#enquiry"]').on('click', function(e){
    e.preventDefault();
    console.log('Deschidem pop-up');  // pentru test
    openEnquiryPopup();
  });

  if (window.location.hash === '#enquiry') {
    openEnquiryPopup();
  }

  $('#popup-overlay, #popup-enquiry .close-popup').on('click', function(){
    closeEnquiryPopup();
  });

  $(document).on('keyup', function(e) {
    if (e.key === "Escape") {
      closeEnquiryPopup();
    }
  });

  function openEnquiryPopup() {
    $('#popup-overlay').addClass('active');
    $('#popup-enquiry').addClass('active');
  }

  function closeEnquiryPopup() {
    $('#popup-overlay').removeClass('active');
    $('#popup-enquiry').removeClass('active');
  }
});





// Change the background image on listing-wrapper once you change the image on the slide


jQuery(document).ready(function($) {
  const $wrap = $(".project-section .listing-wrapper");
  if (!$wrap.length) return;

  // helperi
  const withOverlay = (url) =>
    `linear-gradient(rgba(0,0,0,.1), rgba(0,0,0, .1)), url('${url}')`;

  const imgFromSlide = ($slide) =>
    $slide.data("bg") || $slide.find("img").attr("src") || "";

  // starea curentă: care layer e activ? ("a" sau "b")
  let activeLayer = "a";

  function setInitialBg(url){
    // setează prima imagine pe layerul A și îl face vizibil
    $wrap.css("--bg-a", withOverlay(url));
    $wrap.removeClass("bg-b").addClass("bg-a");
    activeLayer = "a";
  }

  function crossfadeTo(url){
    if (!url) return;
    // scriem pe layerul inactiv, apoi comutăm clasa pentru fade
    if (activeLayer === "a"){
      $wrap.css("--bg-b", withOverlay(url));
      // trigger crossfade: A -> B
      requestAnimationFrame(() => {
        $wrap.removeClass("bg-a").addClass("bg-b");
        activeLayer = "b";
      });
    } else {
      $wrap.css("--bg-a", withOverlay(url));
      // trigger crossfade: B -> A
      requestAnimationFrame(() => {
        $wrap.removeClass("bg-b").addClass("bg-a");
        activeLayer = "a";
      });
    }
  }

  function setBgFromIndex(slick, index){
    const $slide = $(slick.$slides[index]);
    const url = imgFromSlide($slide);
    if (!$wrap.hasClass("bg-a") && !$wrap.hasClass("bg-b")){
      setInitialBg(url);
    } else {
      crossfadeTo(url);
    }
  }

  // leagă-te de evenimentele Slick (init + afterChange)
  $wrap.on("init", function (e, slick) {
    setBgFromIndex(slick, slick.currentSlide);
  });

  $wrap.on("afterChange", function (e, slick, current) {
    setBgFromIndex(slick, current);
  });

  // inițializează Slick (configul tău)
  if (!$wrap.hasClass("slick-initialized")) {
    $wrap.slick({
      autoplay: false,
      infinite: true,
      dots: false,
      arrows: true,
      fade: true,
      speed: 950,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
    });
  } else {
    // dacă era deja inițializat, setează imediat background-ul curent
    const slick = $wrap.slick("getSlick");
    setBgFromIndex(slick, slick.currentSlide);
  }
});
