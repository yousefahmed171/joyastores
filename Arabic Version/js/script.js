$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});

$('.product-option input[type="radio"]').change(function () {
    "use strict";
    $(this).parents('.product-option').siblings().removeClass("active");
    $(this).parents('.product-option').addClass("active");
});


/*$('.navbar .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});*/

$(document).ready(function () {
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
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

function openNav() {
    document.getElementById("mySidenav").style.width = "275px";
    document.getElementById("mySidenav").style.left = "0";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.left = "-50px";
}


$(function() {
    $( ".slider-range" ).slider({
        range: true,
        animate: "fast",
        min: 0,
        max: 3000,
        values: [ 0, 3000 ],
        slide: function( event, ui ) {
            $( ".amount" ).val( "جنيه" + ui.values[ 0 ] + " - جنيه" + ui.values[ 1 ] );
            }
        });
        $( ".amount" ).val( "جنيه" + $( ".slider-range" ).slider( "values", 0 ) +
        " - جنيه" + $( ".slider-range" ).slider( "values", 1 ) );
});

$(".carousel").swiperight(function(e) {
    $(this).carousel('next');
    e.preventDefault();
return false;
});

$(".carousel").swipeleft(function(e) {
    $(this).carousel('prev');
    e.preventDefault();
return false;
});


function openSearch() {
    document.getElementById("myNav").style.height = "100%";
}

function closeSearch() {
    document.getElementById("myNav").style.height = "0%";
}

