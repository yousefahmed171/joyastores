/*global ,$*/

$(function () {
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();


    $('.product-option input[type="radio"]').change(function () {
        $(this).parents('.product-option').siblings().removeClass("active");
        $(this).parents('.product-option').addClass("active");
    });

    $('.pop').on('click', function () {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
    });

      //Hide Placeholder On Form Focus

    $('[placeholder]').focus(function () {

        $(this).attr('data-text', $(this).attr('placeholder'));


        $(this).attr('placeholder', '');

    }).blur(function () {

        $(this).attr('placeholder', $(this).attr('data-text'));

    });

    $('.injs').focus(function () {

        $(this).prev().css({'opacity': '1', 'transition': '0.3s ease-in-out'});

    }).blur(function () {

        var placeholder = $('input.injs').val().length;

        if (placeholder > 0) {
            $(this).prev().css({'opacity': '1', 'transition': '0.3s ease-in-out'});
        } else {
            $(this).prev().css({'opacity': '0', 'transition': '0.3s ease-in-out'});
        }
    });

    $('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
        var $total = navigation.find('li').length,
            $current = index + 1,
            $percent = ($current / $total) * 100;
        $('#rootwizard .progress-bar').css({width: $percent + '%'});
    }});

    window.prettyPrint && prettyPrint();
    
    $(function () {
        $(".slider-range").slider({
            range: true,
            animate: "fast",
            min: 0,
            max: 3000,
            values: [ 0, 3000 ],
            slide: function (event, ui) {
                $(".amount").val("EGP " + ui.values[0] + " - EGP " + ui.values[1]);
            }
        });
        $(".amount").val("EGP " + $(".slider-range").slider("values", 0) +
            " - EGP " + $(".slider-range").slider("values", 1));
    });

    $(function () {
        $(".slider-range").slider({
            range: true,
            animate: "fast",
            min: 0,
            max: 3000,
            values: [ 0, 3000 ],
            slide: function (event, ui) {
                $(".amount").val("EGP " + ui.values[0] + " - EGP " + ui.values[1]);
            }
        });
        $(".amount").val("EGP " + $(".slider-range").slider("values", 0) +
            " - EGP " + $(".slider-range").slider("values", 1));
    });

    $(".carousel").swiperight(function (e) {
        $(this).carousel('prev');
        e.preventDefault();
        return false;
    });
    
    $(".carousel").swipeleft(function (e) {
        $(this).carousel('next');
        e.preventDefault();
        return false;
    });

    $(".carousel").swiperight(function (e) {
        $(this).carousel('prev');
        e.preventDefault();
        return false;
    });
    
    $(".carousel").swipeleft(function (e) {
        $(this).carousel('next');
        e.preventDefault();
        return false;
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 40 && $(window).width() < 992) {
            $(".primary-nav").addClass("fixed");
        } else {
            $(".primary-nav").removeClass("fixed");
        }
    });
    
    $(window).scroll(function () {
        if ($(window).scrollTop() > 64 && $(window).width() < 992) {
            
            $(".filter-fixed").addClass("fixed-filter");
            
        } else {
                
            $(".filter-fixed").removeClass("fixed-filter");
                
        }
    });

    $(function () {
        var action;
        $(".number-spinner button").mousedown(function () {
            var btn = $(this),
                input = btn.closest('.number-spinner').find('input');
            btn.closest('.number-spinner').find('button').prop("disabled", false);
    
            if (btn.attr('data-dir') == 'up') {
                action = setInterval(function () {
                    if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                        input.val(parseInt(input.val()) + 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            } else {
                action = setInterval(function () {
                    if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                        input.val(parseInt(input.val()) - 1);
                    } else {
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            }
        }).mouseup(function () {
            clearInterval(action);
        });
    });

    if ($("#rootwizard .navbar-inner ul li:last-child").hasClass(".active")) {

        $("ul.pager .dir-btn:last-child li:lastchild a").css({'display':'none'});

    }

    $('.carousel').carousel({
        interval: 10000
    });
});

function openNav() {
    document.getElementById("mySidenav").style.width = "275px";
    document.getElementById("mySidenav").style.left = "0";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.left = "-50px";
}

function openSearch() {
    document.getElementById("myNav").style.height = "100%";
}

function closeSearch() {
    document.getElementById("myNav").style.height = "0%";
}


// ajax 


$(document).ready(function () {

    // Delete 
    $('.delete').click(function () {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];

        // AJAX Request
        $.ajax({
            url: 'delete-ajax.php',
            type: 'POST',
            data: { id: deleteid },
            success: function (response) {

                // Removing row from HTML Table
                $(el).closest('tr').css('background', 'tomato');
                $(el).closest('tr').fadeOut(800, function () {
                    $(this).remove();
                });

            }
        });

    });

});





    $(document).ready(function (){

        $('.delete').click(function () {

            $.ajax({
                url: 'delete-ajax.php',
                type: 'POST',
                data: { usname: username },

                success: function (result) {
                    $('.msg').html(result);
                }

            })
        });

    });


