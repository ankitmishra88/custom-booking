jQuery(function($){
$(document).ready(function(){
console.log(dates);
$("#cd_datepicker").datepicker({
minDate:0,
dateFormat: "dd-mm-yy",
 beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
if(type=='0'){
console.log(0);
        return [ dates.indexOf(string) == -1 ];
}
else if(type=="1"){
console.log(1);
        return [ !(dates.indexOf(string) == -1) ]
}
else{ console.log("no condittion"); return [true];}
    }
});
let submit=$('.single_add_to_cart_button')[0];
$("#cd_book").html(submit);
})

})