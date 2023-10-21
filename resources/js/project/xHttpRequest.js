import { helpers } from './helpers';

export const xHttpRequest = {

    send: function(form) {
        let formData = new FormData(form);
        return new Promise(function(resolve, exception) {
            let xHttp = new XMLHttpRequest();
            xHttp.open(form.getAttribute("method"),form.getAttribute("action"));
            xHttp.onload = (response) => {
                if(response.target.readyState == 4 && response.target.status == 200) {
                    // Success
                    resolve(response.target);
                }else {
                    // Error Response
                    exception(response.target);
                }
            };
            xHttp.send(formData);
        });
    },
};