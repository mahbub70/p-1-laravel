import {localGeo} from './geo';
import { exception } from './handleError';
import { helpers } from './helpers';
import { xHttpRequest } from './xHttpRequest';

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

// Declare Global Variable
window.localGeo = localGeo; // location related
window.globalException = exception; // handle error exception
window.xHttpRequest = xHttpRequest; // handle XMLHttpRequest

/**
 * Make request using XMLHttpRequest
 */
let xmlHttpRequestForms = $(".x-http-r-send");
$.each(xmlHttpRequestForms, function(index, form) {

    $(form).on("submit", function(event) {
        event.preventDefault();
        $(form).find("button[type=submit]").addClass("pointer-events-none").prop("disabled","true");

        xHttpRequest.send(form).then((response) => {

            if(helpers.isJson(response.responseText)) {
                response = JSON.parse(response.responseText);
            }

            let nextPageURL = response?.data?.next_page_url;
            if(nextPageURL) return window.location.href = nextPageURL;

        }).catch((response) => {
            
            exception.throw(response, form);

            setTimeout(() => {
                $(form).find("button[type=submit]").removeClass("pointer-events-none").removeAttr("disabled");
            }, 1000);
        });
    });

});

// Register OTP input START
$('.otp-input').on('keydown paste', function(event){
    if($(this).attr('type','number')) {
        let value =  event.key || event.originalEvent.clipboardData.getData('text');
        if(isNaN(value)) {
            if(event.key != 'v' && event.key != 'Backspace') {
               return false; 
            }
        }else {
            let valueArray = value.split('');
            if(event.type === 'keydown') {
                $(this).val(event.key);
                event.preventDefault();
                $(this).next('.otp-input').focus();
            }

            if(event.type === 'paste') {
                event.preventDefault();
                let element = $(this).nextAll();
                for(let i = 0; i < valueArray.length; i++) {
                    if(i == 0) {
                        $(this).val(valueArray[0]);
                        if( i < valueArray.length - 1) {
                            if(element[i] != undefined) {
                                element[i].focus();
                            }
                        }
                    }else {
                        if(element[i-1] != undefined) {
                            element[i-1].value = valueArray[i];
                            if( i < valueArray.length - 1) {
                                if(element[i] != undefined) {
                                    element[i].focus();
                                }
                            }
                        }
                        
                    }
                    
                }
            }
        }

        if(event.key === 'Backspace') {
            if($(this).val() == ''){
                $(this).prev('.otp-input').focus();
            }else {
                $(this).val('');
                event.preventDefault();
            }
        }

    }else {
        return false;
    }
});
// Register OTP input END