$(function(){
    var productObject = $('#product');    
 
    // on change brand
    brandObject.on('change', function(){
        var brandId = $(this).val();
 
        productObject.html('<option value="">Select Part</option>');
        
 
        $.get('get_product.php?brand_id=' + brandId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                productObject.append(
                    $('<option></option>').val(item.id).html(item.name_th)
                );
            });
        });
    });