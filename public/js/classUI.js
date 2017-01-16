$(document).ready(function () {
    
    if($("input[name=guarding_required]:checked").val()=="No"){
    $("#guarding_status").hide();
    }
    
    $("input[name=guarding_required]").on("change", function() {
        if($("input[name=guarding_required]:checked").val()=="Yes"){
            $("#guarding_status").show();
        }
        else{
            $("#guarding_status").hide();
            $("#guarding_status input").val("");
        }
    });
    
    if($("input[name=radiation_status]:checked").val()=="No"){
    $("#radiation_type").hide();
    }
    
    $("input[name=radiation_status]").on("change", function() {
        if($("input[name=radiation_status]:checked").val()=="Yes"){
            $("#radiation_type").show();
        }
        else{
            $("#radiation_type").hide();
            $("#radiation_type input").val("");
        }
    });
    
    
    if($("input[name=refrigerant]:checked").val()=="No"){
    $("#refrigerant_type").hide();
    $("#refrigerant_amount").hide();
    }
    
    $("input[name=refrigerant]").on("change", function() {
        if($("input[name=refrigerant]:checked").val()=="Yes"){
            $("#refrigerant_type").show();
            $("#refrigerant_amount").show();
        }
        else{
            $("#refrigerant_type").hide();
            $("#refrigerant_type input").val("");
            $("#refrigerant_amount").hide();
            $("#refrigerant_amount input").val("");
        }
    });
    
});