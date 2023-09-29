import {localGeo} from './geo';
import { exception } from './handleError';

$(window).on("resize",function(event) {
    fixHeaderMenuPadding();
});

$(document).ready(function() {
    fixHeaderMenuPadding();
    $('.basic-select2').select2();
});

function fixHeaderMenuPadding() {
    let headerMini = $(".header-mini");
    let nextElementPadding = 0;
    $.each($('header.header'), function(index,item) {
        nextElementPadding += $(item).outerHeight();
    });
    if($(window).width() >= 768) {
        $(".header-nav").next().css("padding-top",`${nextElementPadding}px`);
    }else {
        nextElementPadding = headerMini.outerHeight();
    }
    let headerMiniHeight = $(".header-mini").outerHeight();
    $(".header-nav").css('top',`${headerMiniHeight}px`);
    $(".header-nav").next().css("padding-top",`${nextElementPadding}px`);
}

$(document).on("click",".mobile-menu-btn",function() {
    $(".header-nav").toggleClass('active');
    let timeout = 0;
    $(".header-nav").hasClass("active") ? timeout = 0 : timeout = 400;
    setTimeout(() => {
        $(".header-nav").toggleClass(['invisible opacity-0']);
    }, timeout);
});

// Password Field Eye Button
let passwordFieldEyeBtn = $(".password-eye-btn");
$.each(passwordFieldEyeBtn,function(index,item) {

    if($(item).siblings("input").length > 0) {
        $(item).on("click",function() {
            let icon = $(item).find("i");
            if($(item).siblings("input").attr("type") == "password") {
                $(item).siblings("input").attr("type","text");
                $(icon).removeClass("fa fa-eye-slash").addClass("fa fa-eye");
            }else {
                $(item).siblings("input").attr("type","password");
                $(icon).removeClass("fa fa-eye").addClass("fa fa-eye-slash");
            }
        });
    }
});


/**
 * CSRF setup for laravel CSRF token
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.localGeo = localGeo;
window.globalException = exception;
