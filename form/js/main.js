$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
onStepChanging: function(e, currentIndex, newIndex){
if(currentIndex==0){
//alert($('#cd_slot').val());
if($('#cd_datepicker').val()==''||$('#cd_slot').val()==''){
	alert('To Fill Date and Time is must');
return false;
}
return true;
}
return true;			},
        enableFinishButton: false,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back',
            next : 'Next',
            finish: '',
            current : ''
        },
    });
    $("#date").datepicker({
        dateFormat: "MM - DD - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-chevron-down"></i>',
    });
});
