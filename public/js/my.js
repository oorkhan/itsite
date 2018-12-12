function onTypeChange () {
    var selectedType = $("#type").find(":selected").text();
    if (selectedType == 'System Unit') 
    {
        var sysUnitForm = '<div class="form-group"><input type = "hidden" name = "cpuKey" ><label for="cpu">CPU</label>'+
        '<input name="cpuVal" type="text" class="form-control" id="cpu" placeholder="cpu"></div>'+
        '<div class="form-group"><input type = "hidden" name = "ramKey" ><label for="ram">RAM</label>' +
        '<input name="ramVal" type="text" class="form-control" id="ram" placeholder="ram"></div>'; 
    } else if (selectedType == 'Printers')
    {
        var sysUnitForm = '<div class="form-group"><input type = "hidden" name = "cartrigeKey" ><label for="cartrige">Cartrige</label>' +
        '<input name="cartrigeVal" type="text" class="form-control" id="cartrige" placeholder="cartrige"></div>';
    }
    else{
        sysUnitForm = 'hello';
    }
   
    $("#features").html(sysUnitForm);
};