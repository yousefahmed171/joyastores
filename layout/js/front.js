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

    //Hide Placeholder On Form Focus

   $('[placeholder]').focus(function() {

    $(this).attr('data-text', $(this).attr('placeholder'));


    $(this).attr('placeholder', '');

    }).blur(function(){

        $(this).attr('placeholder', $(this).attr('data-text'));

    });

    $('.injs').focus(function(){

        $(this).prev().css({'opacity':'1' , 'transition':'0.3s ease-in-out'});

    }).blur(function(){

        $(this).prev().css({'opacity':'0' , 'transition':'0.3s ease-in-out'});
    });
});


/*$('.navbar .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});*/

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
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();
});

$('.product-option input[type="radio"]').change(function () {
    "use strict";
    $(this).parents('.product-option').siblings().removeClass("active");
    $(this).parents('.product-option').addClass("active");
});