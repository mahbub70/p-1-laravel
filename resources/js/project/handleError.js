import { helpers } from "./helpers";

export const exception = {
    errorElementClass: "error-message",
    errorElementParentClass: "input-wrapper",
    errorItemClass: "error-item",

    error: function(errors, placeElement = null) {
        if(placeElement == false || placeElement == null) {
            return false; // place element couldn't find  
        }

        console.log(errors);

        let errorsMarkup = "";
        $.each(errors, function(index, message) {
            errorsMarkup += `<p class="${this.errorItemClass}"> ${message} </p>`;
        });

        $(placeElement).html(errorsMarkup);

        // console.log(errors, placeElement);
    },

    throw: function(response, event = null) {
        let errorMessages = exception.errorResponseFixer(response);
        let errorPlaceElement = exception.errorElementFixer(event);
        return this.error(errorMessages, errorPlaceElement);
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
    },

    errorResponseFixer: function(response) { // get only error message from error response
        let responseText = response.responseText;

        if(helpers.isJson(responseText)) {
            let errorMessages = JSON.parse(responseText);
            return errorMessages.errors;
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

    generateErrorElement: function(targetElement) {
        let errorParentElement = $(targetElement).parents("." + this.errorElementParentClass);
        if(errorParentElement.length > 0) {
            errorParentElement.append(`<div class="${this.errorElementClass}"></div>`);
            return errorParentElement.find("." + this.errorElementClass);
        }

        return false; // can't find any error place clue;
    },
}