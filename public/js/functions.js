$(document).ready(function() {
    $('#vzdrzevanjeProgramov_fakultete').change(function(){
        var id = $(this).val();

        $('#vzdrzevanjeProgramov_programi').children().each(function() {
            if ($(this).attr('data-fakulteta') == -1) {
                $(this).show();
                $(this).prop('selected', true);
            } else if ($(this).attr('data-fakulteta') == id) {
                $(this).show();
                $(this).prop('selected', false);
            } else {
                $(this).prop('selected', false);
                $(this).hide();
            }
        });
    });

    $('#vzdrzevanjeProgramov_programi').change(function() {
        var id = $(this).val();
        var steviloMest;
        $('#vzdrzevanjeProgramov_programi').children().each(function() {
            if ($(this).val() == id) {
                steviloMest = $(this).attr('data-mesta');
                steviloMestOmejitev = $(this).attr('data-mesta_omejitev');
                nacin = $(this).attr('data-nacin');
                vrsta = $(this).attr('data-vrsta');
                omejitev = $(this).attr('data-omejitev');
            }
        });
        $('#stevilo_vpisnih_mest').val(steviloMest);
        $('#stevilo_mest_omejitev').val(steviloMestOmejitev);

        if (vrsta == 'Univerzitetni') {
            $('#vrsta_studija').val('un');
        } else {
            $('#vrsta_studija').val('vs');
        }
        if (nacin == 'Izredni') {
            $('#nacin_studija').val('izredni');
        } else {
            $('#nacin_studija').val('redni');
        }
        if (omejitev == 1) {
            $('#omejitev').val("da");
        } else {
            $('#omejitev').val("ne");
        }
    });
});