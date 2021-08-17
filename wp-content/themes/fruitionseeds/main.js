
/*
 *
 */

(function($) {

  $(document).ready(function() {

    if($('#notice').length) initNotice();

    $('button.link').click(function(){
      document.location = $(this).data('link');
    });

    if($('body').hasClass('home')) initHome();

    if($('body').hasClass('tax-product_cat')) initCategoryArchive();

    if($('body').hasClass('single-product')) initProductPage();

    if($('body').hasClass('page-template-page-learn')) initLearnPage();

    if($('body').hasClass('single-webinar')) initWebinarSingle();

    if($('body').hasClass('post-type-archive-webinar')
      || $('body').hasClass('post-type-archive-sfwd-courses')
      || $('body').hasClass('page-template-page-learn-archives')) initLearnArchive();

    if($('.post-archive').length) initBlogArchive();

    if($('.btn-join .login-link').length) initFormButtons();

    if($('body').hasClass('single-sfwd-lessons')) initLessonSingle();

    if($('body').hasClass('single-sfwd-courses')) initCourseSingle();

    if($('body').hasClass('single-guide')) initGuideSingle();

    if($('body').is('.term-plant-now, .tax-guide_type') || $('.plant-now-tabs')) initDialogs();

    if($('body').is('.term-plant-now') || $('.plant-now-tabs')) initTabs();

    if($('body').hasClass('page-template-page-flourish')) initFlourish();

    initSearch();

    if($('body').hasClass('search')) initSearchResults();

    if($('.wp-block-cb-carousel').length) initReusableBlockSlider();

    if($('.fruition-course-form').length) initSignUpForm();

    if( $('.guides .carousel').length ) initCarousel($('.guides .carousel'), 4);

    //if( $('#growing-guide ').length ) initCarousel($('.guides .carousel'), 4);

  });

  function initCourseSingle(){
    $('#congratulations .close, #congrats-overlay').click(function(){
      $('#congratulations, #congrats-overlay').fadeOut();
    });
  }

  //
  // This is used to fill in a div with a register/login button OR a course enrollment button
  // The div will be put into the Wordpress edit screens
  //

  function initSignUpForm(){
    $('.fruition-course-form').each(function(){
      var course = $(this).attr('course');
      $(this).html( $('#course_signup').html() );
      $(this).find('#register-redirect').val('/learn/courses/' + course + '#do_enroll');
      $(this).find('#login-redirect').val('/learn/courses/' + course + '#do_enroll');
      $(this).find('.take-course a').attr('href', '/learn/courses/' + course + '#do_enroll');
      initFormButtons();
    });
  }

  function initSearchResults(){
    $('.search_type').click(function(){
      var selected = $(this).attr('id');
      updateUrlAndGo('search_type', selected );
    });

    $('input#search-terms').blur(function(){
      $('input#search-terms').hide();
      $('h1.page-title').show();
      $('.search-link').hide();
    });

    $('h1.page-title').click(function(){
      $('h1.page-title').hide();
      $('.search-link').show();
      $('input#search-terms').show().focus().select();
    });

    $('input#search-terms').keyup(function(e){
      if(e.keyCode == 13){
        updateUrlAndGo('s', encodeURIComponent($('input#search-terms').val()));
      }
    });

    $('.search-link').click(function(){
      updateUrlAndGo('s', encodeURIComponent($('input#search-terms').val()));
    });

    $('#sort-by').change(function(){
      updateUrlAndGo('sort', $(this).find('option:selected').val());
    });

    function updateUrlAndGo(key, value){
      var url = new URL(document.location.href);
      var search_params = url.searchParams;
      search_params.set(key, value);
      url.search = search_params.toString();
      document.location = url.toString();
    }
  }

  function initLessonSingle(){
    $( $('.ld-content-actions')[0].outerHTML ).insertAfter('.ld-lesson-status');
    $('.ld-content-actions').eq(0).addClass('top-row');
    $('.ld-content-actions').eq(1).addClass('bottom-row');

  }

  function initBlogArchive(){
    $('.learn-product-categories').change(function(){
      document.location = document.location.origin + document.location.pathname + '?product_cat=' + $('.learn-product-categories').val();
    });
  }

  function initLearnArchive(){
    $('.learn-categories').change(function(){
      document.location = document.location.origin + document.location.pathname + '?category=' + $('.learn-categories').val();
    });
  }

  function initFormButtons(){
    $('.form-wrapper').each(function(){
      var wrapper = this;
      $(wrapper).find('.login-link').click(function(){
        $(wrapper).find('form#register').slideUp();
        $(wrapper).find('form#login').slideDown();
      });
      $(wrapper).find('.register-link').click(function(){
        $(wrapper).find('form#login').slideUp();
        $(wrapper).find('form#register').slideDown();
      });
      $(wrapper).find('.close-link').click(function(){
        $(wrapper).find('form#login').slideUp();
        $(wrapper).find('form#register').slideUp();
      });
    });
  }

  function initTabs(){
    $( '#tabs' ).tabs().addClass( 'ui-tabs-vertical ui-helper-clearfix' );
    $( '#tabs li' ).removeClass( 'ui-corner-top' ).addClass( 'ui-corner-left' );
    $( '.ui-tabs-panel' ).each( function(){ $(this).css('min-height', $('#tabs').outerHeight() ); } );
  }

  function initReusableBlockSlider(){
    var settings = $('.wp-block-cb-carousel').data('slick');
    settings.autoplay = true;
    $('.wp-block-cb-carousel').slick('unslick').slick(settings);
  }

  function initSearch(){
    $('li.search a').click(function(e){
      e.preventDefault();
      $('.search-overlay').fadeIn();
    });
    $('.search-overlay .screen').click(function(){
      $('.search-overlay').fadeOut();
    });
  }

  function initNotice(){
    if( Cookies.get('notice-closed') == 'true' ){
      $('#notice').remove();
    } else {
      if( $('#notice').hasClass('closeable') ){
        $('#notice span.close').click(function(){
          $('#notice').slideUp();
          Cookies.set('notice-closed', 'true')
        });
      }
      if( $('#notice').hasClass('clickable') ){
        $('#notice').click(function(){
          document.location = $(this).data('link');
        });
      }
    }
  }

  function initCarousel(element, numberToShow){
    $(element).slick({
      infinite: true,
      slidesToShow: numberToShow,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: numberToShow-1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: numberToShow-2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }

  function initFlourish(){
    $('.carousel').slick({
      dots: true,
      autoplay: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  }

  function initHome(){
    $('#slider .linked').click(function(){
      document.location = $(this).data('link');
    });

    $('#slider').slippry({
      prevText: '<i class="fas fa-chevron-left"></i>',
      nextText: '<i class="fas fa-chevron-right"></i>'
    });

    $('.categories .carousel').slick({
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // $('.guides .carousel').slick({
    //   infinite: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 1,
    //   prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    //   nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    //   responsive: [
    //     {
    //       breakpoint: 768,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //       }
    //     }
    //   ]
    // });
  }

  function initLearnPage(){
    $('#slider .linked').click(function(){
      document.location = $(this).data('link');
    });

    $('#slider').slippry({
      prevText: '<i class="fas fa-chevron-left"></i>',
      nextText: '<i class="fas fa-chevron-right"></i>'
    });

    $('.categories .carousel').slick({
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // $('.guides .carousel').slick({
    //   infinite: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 1,
    //   prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    //   nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    //   responsive: [
    //     {
    //       breakpoint: 768,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //       }
    //     }
    //   ]
    // });

    // $('.carousel').slick({
    //   infinite: true,
    //   slidesToShow: 4,
    //   slidesToScroll: 1,
    //   prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    //   nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    //   responsive: [
    //     {
    //       breakpoint: 1024,
    //       settings: {
    //         slidesToShow: 4,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 768,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 1
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: 'unslick'
    //     }
    //   ]
    // });
  }

  function initCategoryArchive(){
    $('.categories-wrapper .header').click(function(){
      $(this).toggleClass('open');
      $(this).siblings('.list').slideToggle();
    });
    $('.categories-wrapper .list .item').click(function(){
      var type = $(this).parent('.list').data('type');
      var value = $(this).data('value');
      console.log('filter: type is ' + type + ' and value is ' + value);
    });
  }

  function initWebinarSingle(){
    initCarousel($('.carousel'), 4);
    initDialogs();
  }

  function initGuideSingle(){
    initCarousel($('.carousel'), 4);
    initDialogs();
  }

  function initDialogs(){
    $('.dialog-btn').each(function(){
      var index = $(this).data('number');
      var id = $(this).attr('id');

      $(this).click(function(){
        $('.overlay').fadeIn();
        $('#' + id.replace('btn','div')).fadeIn();
      });

    });
    $('.overlay').click(function(){
      $(this).fadeOut();
      $('.dialog-div:visible').fadeOut();
    });
    $('.dialog-div').click(function(){
      $(this).fadeOut();
      $('.overlay').fadeOut();
    });
  }

  function initProductPage(){
    initDialogs();

    $('li#tab-title-additional_resources').click(function(){
      initCarousel($('#related-courses .carousel'), 3);
      initCarousel($('#related-webinars .carousel'), 3);
      initCarousel($('#related-blogs .carousel'), 3);
    });

    $('.woocommerce-rating').click(function(){
      $('li#tab-title-reviews a').click();
      $('html,body').animate({
         scrollTop: $("li#tab-title-reviews").offset().top - 50
      });
    });

    var thumbs = $('.product-image-slider #thumbnails').slippry({
      slippryWrapper: '<div class="slippry_box thumbnails" />',
      transition: 'horizontal',
      speed: 200,
      pager: false,
      auto: false,
      onSlideBefore: function (el, index_old, index_new) {
        $('.product-image-slider .thumbs a').removeClass('active');
        $('.product-image-slider .thumbs a').eq(index_new).addClass('active');
      }
    });

    $('.product-image-slider .thumbs a').click(function () {
      thumbs.goToSlide($(this).data('slide'));
      return false;
    });

    $('.product-image-slider .sy-controls').remove();

    $('.woocommerce-product-table tbody tr').each(function(){
      $(this).find('.qty').change(function(){
        $('.quantity[data-vid="' + $(this).data('vid') + '"]').val( $(this).val() );
      });
    });

    $('.product-image-slider .thumb-box .thumbs').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },{
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },{
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        }
      ]
    });

  }

})(jQuery);
