export const localGeo = {
    getDistrictsOnDivision: function(URL, division_id) {
        if(division_id == null || division_id == "") return false;

        $.post(URL,{
            division:division_id,
        },function(response){

        }).done(function(response) {
            console.log(response);
        }).fail(function(response) {

        });
    },
};