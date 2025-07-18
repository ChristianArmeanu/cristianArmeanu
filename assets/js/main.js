AOS.init({
    delay: 500,
    duration: 1000,
    once: true
})

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


      jQuery('.menu-header a').on('click', function () {
        //event.preventDefault();
    
        var targetId = jQuery(this).attr('href');
        var targetElement = jQuery(targetId);
    
        if (targetElement.length) {
          var offset = 0;
          var targetPosition = targetElement.offset().top + offset;
    
          jQuery('html, body').animate({
            scrollTop: targetPosition
          }, 750); // Ajustează durata animației după preferințe
        }
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



//This code changes the title of the application form for each role applied for. 
//While this is a feature I have only commented this code out rather than deleting
//I have left this code in as it maybe useful for changing the title of froms on different sites
    // if(jQuery('.component--application-form'))
    //     jQuery('.job_role input').attr('value', jQuery('.the--role h1').text())


    // jQuery('.component--application-form i.fa-times-circle').on('click', function(){
    //     jQuery(this).parent().toggleClass('open')
    // })
})