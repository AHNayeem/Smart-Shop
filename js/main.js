// $(document).ready(function(){
//     // Activate Carousel
//     $("#myCarousel").carousel();
    
//     // Enable Carousel Indicators
//     $(".item1").click(function(){
//         $("#myCarousel").carousel(0);
//     });
//     $(".item2").click(function(){
//         $("#myCarousel").carousel(1);
//     });
//     $(".item3").click(function(){
//         $("#myCarousel").carousel(2);
//     });
//     $(".item4").click(function(){
//         $("#myCarousel").carousel(3);
//     });
    
//     // Enable Carousel Controls
//     $(".left").click(function(){
//         $("#myCarousel").carousel("prev");
//     });
//     $(".right").click(function(){
//         $("#myCarousel").carousel("next");
//     });
// });

/*-----------------------------------------------------------------------------------*/
/*  MODAL TOVAR VIEW
/*-----------------------------------------------------------------------------------*/
// $(window).load(function() {
//     (function(){
//         var container = $( "#modal-body" );
//         var $items = $('.open-project-link');
//         index = $items.length;
//         $('.open-project-link').click(function(){
//             $('#modal-body').addClass('modal-active');
//             if ($(this).hasClass('active')){
//             } 
//             else { 
//                 lastIndex = index;
//                 index = $(this).index();
//                 $items.removeClass('active');
//                 $(this).addClass('active');
    
//                 var myUrl = $(this).find('.open-project').attr("data-url") + " .tover_view_page"; 
          
//                 $('#tovar_content').animate({opacity:0},function(){
//                     $("#tovar_content").load(myUrl,function(e){
                        
//                         //Tovar View Carousel
//                         $('#carousel1').flexslider({
//                             animation: "slide",
//                             controlNav: false,
//                             directionNav: false,
//                             animationLoop: false,
//                             slideshow: false,
//                             direction: "vertical",
//                             asNavFor: '#slider1'
//                         });
//                         $('#slider1').flexslider({
//                             animation: "fade",
//                             controlNav: false,
//                             directionNav: false,
//                             animationLoop: false,
//                             slideshow: false,
//                             sync: "#carousel1"
//                         });
                        
//                         jQuery('#carousel1 .slides li').click(function(){
//                             $('#carousel1 .slides li').removeClass('flex-active-slide');
//                             $(this).addClass('flex-active-slide');
//                             return false;
//                         });
                        
//                         //fancySelect
//                         $('.basic').fancySelect();
                        
//                     });
//                     $('#tovar_content').animate({opacity:1});
//                 });
                
            
//                 //Project Page Open
//                 $('#modal-body').show(function(){
//                     $('#tovar_content');}).show(2000,function(){
//                         $('.element_fade_in').each(function (){
//                             $(this).appear(function(){
//                                 $(this).delay(100).animate({opacity:1,right:"0px"},1000);
//                             }); 
//                         });
//                     });
//             } return false;       
//         });
    
//         //Project Page Close
//         $(document).on('click', '#tover_view_page_close, .close_block', function(event) {
//             $('#tovar_content').animate({opacity:0}, 400,function(){    
//                 $('#modal-body').removeClass('modal-active').hide(400);
//             });
            
//             $items.removeClass('active');
//             return false;
//         });
    
//     })();
// });


jQuery(document).ready(function ($) {
    "use strict";
   // Product zoom
    $('#product-zoom').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });

    var gallery = $('#gal1');
    gallery.find('a').hover(function () {

        var smallImage = $(this).attr("data-image");
        var largeImage = $(this).attr("data-zoom-image");
        var ez = $('#product-zoom').data('elevateZoom');

        ez.swaptheimage(smallImage, largeImage);
    }); 
});

/* user profile */

$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-warning").addClass("btn-default");
    /* $(".tab").addClass("active"); */ /* instead of this do the below */
    $(this).removeClass("btn-default").addClass("btn-warning");   
});
});