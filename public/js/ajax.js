$(document).ready(function () {

    $('.lab_number').click(function(e) {
        e.preventDefault();
        $('.lab_number').removeClass("active");
        $('#'+event.target.id).addClass("active");
        $('#equipment_inventory_list').load($(this).attr('href')+" #equipment_inventory_list");
        $('#equipment_info').empty();
    });
    
    $(document).on("click",".item",function(e){
        e.preventDefault();
        $('#equipment_info').empty();
        $('.item').removeClass("active");
        $('#'+event.target.id).addClass("active");
        $('#equipment_info').load($(this).attr('href')+" #equipment_info");    
        
        $(document).ajaxComplete(function() {
            set();
            $(document).unbind('ajaxComplete');
        });
    });
    

    
    $('.list-group-item').on('click', function() {
        $('.glyphicon', this)
            .toggleClass('glyphicon-chevron-right')
            .toggleClass('glyphicon-chevron-down');
        });
    
    function set(){
        $("#keywords").select2({
            placeholder: "  Select or add class keywords here.",
            tags: true
        });

        $("#measure_parameters").select2({
            placeholder: "  Select or add measure parameters here.",
            tags: true
        });

        $("#parts").select2({
            placeholder: "  Add worstation part numbers here.",
            tags: true
        });
        
        $.getScript( "js/itemUI.js" );
        $.getScript( "js/classUI.js" );
        
        if($("#alert").attr('id') != "alert"){
            $.getScript( "js/labUI.js" );
        };
    };
});
            
