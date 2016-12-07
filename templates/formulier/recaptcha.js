/** 
 * Hieronder een script die we draaien voor de recaptcha ivm meerdere recaptcha's  op 1 pagina.
 * Dat is hiermee mogelijk.
 */
var recaptchaloaded = false;
function loadRecaptcha(){
    if(recaptchaloaded===false){
        recaptchaloaded = true;
        if($(".google-recaptcha").length>0){
         $(".google-recaptcha").each(function(i,e){
             //console.log(i,e);
             grecaptcha.render(e,$(e).data());
         });   
        }
        
    }
}


