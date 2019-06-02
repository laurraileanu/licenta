$(document).ready(function(){

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


    //timepicker stuff
    $('#timepicker').datetimepicker({
        format: 'HH:mm'
    });
    // end fo timepicker stuff

    
    $('#guests').keypress(function(){
        var keycode = event.keyCode;
        if (keycode > 48 && keycode < 57){
            return true;
        } else {
            return false;
        }
    });
    //quantity buttons
    $('.qunatity-buttons button').click(function(){
        var inputVal =  parseInt($('#guests').val()),
            t = $(this);
        if( t.hasClass('plus')){
            $('#guests').attr('value', inputVal + 1);
        } else {
            $('#guests').attr('value', inputVal - 1);
            if(inputVal < 3) {
                Notify("Este nevoie de cel putin o persoana pentru a face o rezervare!", null, null, 'danger');
                $('#guests').attr('value', 1);
            }
        }

    });
    
    $(document).on('click','._table.available', function(){
        $(this).toggleClass('active');
    });
});



//scripturi de sters
$('#search').click(function(){
    $('#restaurant-map').removeClass('d-none');
});