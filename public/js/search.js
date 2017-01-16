$(document).ready(function () {
    $("#field").on("change",function() {
        $(".hideable").hide(); 
        $(".hideable *").prop( "disabled", true );
        if($('#field').val() == "guarding_required:equipment_model"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "safety_pm_status:equipment_model"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "lead_battery_acid:equipment_model"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "radiation_status:equipment_model"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "refrigerant:equipment_model"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "available:equipment_item"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "off_site:equipment_item"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "qualified:equipment_item"){
            $("#radio_select").show();
            $("#radio_select *").prop("disabled", false);
           }
        else if($('#field').val() == "parameter_id:model_parameters"){
            $("#parameters_select").show();
            $("#parameters_select *").prop("disabled", false);
           }
        else if($('#field').val() == "keyword_id:model_keywords"){
            $("#keywords_select").show();
            $("#keywords_select *").prop("disabled", false);
           }
        else if($('#field').val() == "name:parts"){
            $("#parts_select").show();
            $("#parts_select *").prop("disabled", false);
           }
        else if($('#field').val() == "current_location_id:equipment_item"){
            $("#lab_select").show();
            $("#lab_select *").prop("disabled", false);
           }
        else{
            $("#text_field").show();
            $("#text_field *").prop("disabled", false);
        }
    }).change();
});