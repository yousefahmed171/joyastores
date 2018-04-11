/*Start hid plese hoder*/

$(function () {
    
    'use strict';
       //Dashboard 
       $('.toggle-info').click(function(){
         
        $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);

        if($(this).hasClass('selected')){

            $(this).html('<i class=" fa fa-minus fa-lg"></i>');
        } else {

            $(this).html('<i class=" fa fa-plus fa-lg"></i>');
        }

       });
      // Calls the selectBoxIt method on your HTML select box

        $("select").selectBoxIt({
         
       
        // Uses the jQuery 'fadeIn' effect when opening the drop down
        showEffect: "fadeIn",
    
        // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
        showEffectSpeed: 400,
    
        // Uses the jQuery 'fadeOut' effect when closing the drop down
        hideEffect: "fadeOut",
    
        // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
        hideEffectSpeed: 400,

        autoWidth: false
    
      });
           
    //Hid placeholder on from focuc
    
    $('[placeholder]').focus(function () {
        
        $(this).attr('data-text', $(this).attr('placeholder'));
        
        $(this).attr('placeholder', '');
        
    }).blur(function () {
        
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
    /*End hid plese hoder*/
    
    
    /*Start Add Asterisk On Required Field */
    
    $('input').each(function () {
      
        if ($(this).attr('required') === 'required') {
           
            $(this).after('<span class ="asterisk">*</span>');
            
        }
        
        
    });
   /*End Add Asterisk On Required Field */
   /*Start Convert Password Field To Text Fild On Hover */ 
    
    var passField = $('.password');
    
    $('.show-pass').hover(function () {
  
        passField.attr('type', 'text');
        
    }, function(){
        
        passField.attr('type', 'password');
        
    });
   /*End Convert Password Field To Text Fild On Hover */ 
   /*Start Confirm message om button  */ 
   $('.confirm').click(function(){

      return confirm('Are You Sure Delete This ??') ;

   });
   /*End Confirm message on button  */ 

   /* category View Option */
    
   $('.cat h3').click(function () {
    
     $(this).next('.full-view').fadeToggle(200);

   });

    $('.option span').click(function(){
      
      $(this).addClass('active').siblings('span').removeClass('active');

      if($(this).data('view') === 'full' ){

        $('.cat .full-view').fadeIn(200); 

      } else {

       $('.cat .full-view').fadeOut(200);
      }
    });



});

//adel script

$(function () {
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();
});

$('.product-option input[type="radio"]').change(function () {
    "use strict";
    $(this).parents('.product-option').siblings().removeClass("active");
    $(this).parents('.product-option').addClass("active");
});

$(function () {
    "use strict";
    $('.pop').on('click', function () {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
    });
    
});


/*$('.navbar .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});*/
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function () {
    "use strict";
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
});

function nextTab(elem) {
    "use strict";
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    "use strict";
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

function openNav() {
    "use strict";
    document.getElementById("mySidenav").style.width = "275px";
    document.getElementById("mySidenav").style.left = "0";
}

function closeNav() {
    "use strict";
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.left = "-50px";
}


$(function () {
    "use strict";
    $(".slider-range").slider({
        range: true,
        animate: "fast",
        min: 0,
        max: 3000,
        values: [ 0, 3000 ],
        slide: function (event, ui) {
            $(".amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $(".amount").val("$" + $(".slider-range").slider("values", 0) +
        " - $" + $(".slider-range").slider("values", 1));
});

$(".carousel").swiperight(function (e) {
    "use strict";
    $(this).carousel('prev');
    e.preventDefault();
    return false;
});

$(".carousel").swipeleft(function (e) {
    "use strict";
    $(this).carousel('next');
    e.preventDefault();
    return false;
});


function openSearch() {
    "use strict";
    document.getElementById("myNav").style.height = "100%";
}

function closeSearch() {
    "use strict";
    document.getElementById("myNav").style.height = "0%";
}

$(window).scroll(function () {
    
    "use strict";
    
    if ($(window).scrollTop() > 40 && $(window).width() < 992) {
        $(".primary-nav").addClass("fixed");
    } else {
        $(".primary-nav").removeClass("fixed");
    }
});

$(window).scroll(function () {
    
    "use strict";
    
    if ($(window).scrollTop() > 64 && $(window).width() < 992) {
        
        $(".filter-fixed").addClass("fixed-filter");
        
    } else {
            
        $(".filter-fixed").removeClass("fixed-filter");
            
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

function openNav() {
    document.getElementById("mySidenav").style.width = "225px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}



