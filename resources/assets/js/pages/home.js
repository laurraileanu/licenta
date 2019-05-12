$(document).ready(function(){

    $('#guests').keypress(function(){
        var keycode = event.keyCode;
        if (keycode > 48 && keycode < 57){
            return true;
        } else {
            return false;
        }
    });

    // datepicker stuff
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#date').datepicker.dates['ro'] = {
        days: ["Duminica","Luni", "Marti", "Miercuri", "Joi", "Vineri", "Sambata", "Duminica"],
        daysShort: ["Dum","Lun", "Mar", "Mie", "Joi", "Vin", "Sam", "Dum"],
        daysMin: ["Du","Lu", "Ma", "Mi", "Jo", "Vi", "Sa", "Du"],
        months: ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noembrie", "Decembrie"],
        monthsShort: ["Ian", "Feb", "Mar", "Apr", "Mai", "Iun", "Iul", "Aug", "Sep", "Oct", "Noe", "Dec"],
        today: "Astazi"
    };
    $('#date').datepicker({
        language: 'ro',
        format: "dd/mm/yyyy",
        todayHighlight: true,
        startDate: today,
        autoclose: true,
        weekStart: 1
    });
    $('#date').datepicker('setDate', today);
    // end of datepicker

    $('#timepicker').datetimepicker({
        format: 'HH:mm'
    });
});

