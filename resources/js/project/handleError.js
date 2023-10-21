import { helpers } from "./helpers";

export const exception = {
    errorElementClass: "error-message",
    errorElementParentClass: "input-wrapper",
    errorItemClass: "error-item",

    error: function(errors, placeElement = null, status_code) {
        if(placeElement == false || placeElement == null) {
            return false; // place element couldn't find  
        }

        let errorItemClass = this.errorItemClass;

        let errorsMarkup = "";
        let errorMessageIndex = 1;
        $.each(errors, function(index, message) {

            let commaMarkup = `<span>,</span>`;
            if(errorMessageIndex == Object.keys(errors).length) {
                commaMarkup = "";
            }
            errorsMarkup += `<p class="${errorItemClass}"> ${message}${commaMarkup}</p>`;

            errorMessageIndex++;
        });

        $(placeElement).html(errorsMarkup);
    },

    throw: function(response, event = null) {

        let errorPlaceElement = exception.errorElementFixer(event);
        let errorMessages = exception.errorResponseFixer(response, errorPlaceElement);

        return this.error(errorMessages, errorPlaceElement, response.status);
    },

    errorElementFixer: function(clue) { // clue can be an event, DOM Element
        if(clue == null) {
            return null;
        }

        // IF Have Any Clue
        if(clue instanceof $.Event) { // if clue is an event
            let targetElement = clue.target;
            return this.getErrorElement(targetElement);
        }

        clue = $(clue);
        return this.generateErrorElement(clue, false);
    },

    errorResponseFixer: function(response, errorPlaceElement = null) { // get only error message from error response
        let responseText = response.responseText;

        if(helpers.isJson(responseText)) {
            errorPlaceElement.removeClass("unknown");
            let errorMessages = JSON.parse(responseText);
            return errorMessages.errors;
        }

        if(errorPlaceElement) {
            errorPlaceElement.addClass("unknown");
        }

        return [responseText];
    },

    getErrorElementFromParent: function(targetElement) {
        let errorPlaceElement = $(targetElement).parents('.' + this.errorElementParentClass).find('.' + this.errorElementClass);
        return errorPlaceElement;
    },

    getErrorElement: function(targetElement) {
        if($(targetElement).hasClass(this.errorElementClass)) { // this is error element declared form HTML markup
            return targetElement;
        }

        let findErrorElementFromParent = this.getErrorElementFromParent(targetElement);

        if(findErrorElementFromParent.length > 0) {
            return findErrorElementFromParent.first();
        }

        // if not find any error element or if not predefined any error element- we need to generate a new error element
        return this.generateErrorElement(targetElement) // generate a new error element under error parent element
    },

    generateErrorElement: function(targetElement, parentClass = true) {

        let errorParentElement = targetElement;
        let extraClassForError = "generated";
        if(parentClass == true) {
            extraClassForError = "";
            errorParentElement = $(targetElement).parents("." + this.errorElementParentClass);
        }else {

            if(errorParentElement.find("." + this.errorElementClass).length > 0) { // already has error element
                return errorParentElement.find("." + this.errorElementClass);
            }   
        }

        if(errorParentElement.length > 0) {
            errorParentElement.append(`<div class="${this.errorElementClass} ${extraClassForError}"></div>`);
            return errorParentElement.find("." + this.errorElementClass);
        }

        return false; // can't find any error place clue;
    },
}