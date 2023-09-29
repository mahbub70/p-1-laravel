export const helpers = {
    isJson: function(string) {
        try{
            JSON.parse(string);
        }catch(e) {
            return false;
        }
        return true;
    }
};