import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import Swiper from 'swiper/bundle';
window.Swiper = Swiper;

import select2 from 'select2';
select2();
import "/node_modules/select2/dist/css/select2.css";
import '/node_modules/intl-tel-input/build/css/intlTelInput.css';

import 'swiper/css';
import './bootstrap';
import '../css/app.css';
import '../css/project/style.css';

import intlTelInput from 'intl-tel-input';

import '/node_modules/intl-tel-input/build/js/utils.js';

const itiFields = $(".iti-phone");
const itiErrorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
$.each(itiFields, function(index, item) {

    let iti = intlTelInput(item, {
        onlyCountries: ["bd"],
        autoInsertDialCode:false,
        separateDialCode: true,
        allowDropdown: false,
        hiddenInput: "full_" + $(item).attr("name"),
    });

    $(item).on("keyup", function(event) {
        // console.log(event);
        if(!iti.isValidNumber()) {
            let errorCode = iti.getValidationError();
            // console.log(itiErrorMap[errorCode]);
        }else {
            // console.log("Valid Number");
        }
    });

});