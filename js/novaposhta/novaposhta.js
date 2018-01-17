function getCityIfLoginOpenMap(dataArea) {
    var area = dataArea.value;
    jQuery.ajax({
        type: "POST",
        url: "/novaposhta/ajax/getArea/",
        data: {'area_ref': area},
        dataType: "json",
        success: function (data) {
            jQuery(".city_desc").html("");
            var li_class = jQuery('' +
                '<label for="novaposhta_cities"' + ' class="required">'+'<em>' + '*' + '</em>'+
                'Виберіть Місто'+'</label>'+
                '<span class="input-box">'+
                '<select class="cities" name="shipping_novaposhta[city]" onchange="getWarehouseIfLoginOpenMap(this)"> ' +
                '<option>Виберіть місто..</option>'+
                '</select>'+'</span>');
            li_class.appendTo('.city_desc');

            jQuery.each(data.cities, function (index,value) {
                    var select_class = jQuery(
                        '<option value='+ value['Ref'] + '>' + value['Description'] +
                        '</option>'
                    );
                    select_class.appendTo('.cities');
            });
        }
    });
}
function getWarehouseIfLoginOpenMap(dataCity) {
    var city = dataCity.value;
    jQuery.ajax({
        type: "POST",
        url: "/novaposhta/ajax/getCity/",
        data: {'city_name': city},
        dataType: "json",
        success: function (data) {
            jQuery(".ware_desc").html("");
            var li_class = jQuery('' +
                '<label for="novaposhta_warehouses"' + ' class="required">'+'<em>' + '*' + '</em>'+
                'Виберіть Відділення'+'</label>'+
                '<select class="warehouses" name="shipping_novaposhta[warehouse]" > ' +
                '<option>Виберіть відділення..</option>'+
                '</select>');
            li_class.appendTo('.ware_desc');

            jQuery.each(data.warehouses, function (index,value) {
                var select_class = jQuery(
                    '<option value=' + value['Ref'] + '>'+ value['Description'] +
                    '</option>'
                );
                select_class.appendTo('.warehouses');
            });
        }
    });
}
