(function($) {
    'use strict';

	/* =======================================
        For niceSelect
    =======================================*/
    $('select').niceSelect();

    /* =======================================
        Order Summary Show Hide
    =======================================*/

    $(".single-o-s-c.customer .single-o-s-c-top").click(function(){
      $(".c-box").toggle(300);
    });
    $(".single-o-s-c.payment .single-o-s-c-top").click(function(){
      $(".p-box").toggle(300);
    });
	

    /* =======================================
        Order Summary Gallery
    =======================================*/

    $('.o-s-main-gal').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          titleSrc: function(item) {
            return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
          }
        }
      });
  
 
     

})(jQuery);