import { exception } from "./handleError";

export const localGeo = {

    getDistrictsOnDivision: function(URL, division_id) {
        return new Promise((resolve, exception) => {
            if(division_id == null || division_id == "") return false;
            $.post(URL,{
                division:division_id,
            },function(response){
                // success response
            }).done(function(response) {
                resolve(response);
            }).fail(function(response) {
                exception(response);
            });
        });
    },

};