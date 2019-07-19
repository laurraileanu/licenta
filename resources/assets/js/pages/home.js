
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
    var tables=[];
    $(document).on('click','._table.available', function(){
        $(this).toggleClass('active');
        let id=$(this).data('table-id');
        let table = tables.find((table)=>{
            return table.id===id;
        });
        table.selected=$(this).hasClass('active');
    });
    function resetTable(table){
        table.removeClass('active');
        table.removeClass('available');
        table.removeClass('unavailable');
    }
    $("form#search-table").submit(function (e){
        let form = $(this);
        let map= $("#restaurant-map");

        map.addClass('d-none');
        e.preventDefault();
        axios.get('/tables/available', {
            params: {
                date:form.find(`input[name="date"]`).val(),
                time:form.find(`input[name="time"]`).val(),
                guests:form.find(`input[name="guests"]`).val()
            }
        })
        .then(function (response) {
            // console.log(response);
            let map= $("#restaurant-map");
            tables = response.data.tables;
            let availableTables= tables.filter((table)=>{
                return table.status==='available';
            }).length;
            map.find('#head-text').text(`Mese disponibile pentru  ${form.find(`input[name="guests"]`).val()} persoane pe ${form.find(`input[name="date"]`).val()} la ${form.find(`input[name="time"]`).val()}`);

            tables.forEach((table)=>{
                table.DOM= $(`a[data-table-id="${table.id}"]`).first();
                resetTable(table.DOM);
                table.DOM.addClass(table.status);
            });
            map.removeClass('d-none');
        })
        .catch(function (error) {
            let errors = error.response.data.errors;

            Object.keys(errors).forEach((error)=>{
                Notify(errors[error][0], null, null, 'danger');
            });
        })
    });
    $("#reserve").click((e)=>{
        let form = $("#search-table").first();
        let selectedTables= tables.filter((table)=>{
            if (table.selected){
                return true;
            }
        });

        selectedTables = selectedTables.map((table)=>{
            return table.id;
        });
        // console.log(selectedTables.length);
        if (selectedTables.length===0){
            Notify('selecteaza o masa',null,null,'danger');
            return false;
        }
        axios.post('/tables/reserve', {
                date:form.find(`input[name="date"]`).val(),
                time:form.find(`input[name="time"]`).val(),
                guests:form.find(`input[name="guests"]`).val(),
                selectedTables:selectedTables
        })
        .then(function (response) {
            window.location=response.data.redirect;
        })
        .catch(function (error) {
            console.log(error);
            let errors = error.response.data.errors;

            Object.keys(errors).forEach((error)=>{
                Notify(errors[error][0], null, null, 'danger');
            });
        });
    });
});



