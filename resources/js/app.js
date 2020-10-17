//global.$ = global.jQuery = require('jquery');
import $ from 'jquery';
window.$ = window.jQuery = $;
window.Popper = require('popper.js');
/**
 * @desc Import Additional JS
 */
require('./bootstrap.min');
require('./slick');
require('./additional-methods');
require('./jquery.validate');
require('./import');
require('./script');


require('../../resources/js/plugins/datatables/datatables');
require('../../resources/js/plugins/theia-sticky-sidebar/ResizeSensor');
require('../../resources/js/plugins/theia-sticky-sidebar/theia-sticky-sidebar');

import 'jquery-ui/ui/widgets/datepicker.js';
// require('../../resources/js/sweetalert/sweetalert');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$( "#showr" ).click(function() {
    $(".div").first().show("fast", function showNext() {
        $(this).next(".div").show("fast", showNext);
    });
});

$( "#hidr" ).click(function() {
    $(".div").hide(1000);
});

function toggleCountry(country_id){
    $(`#${country_id}`).slideToggle();
}
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
/**
 * @desc Registration Form Validation
 * @type {jQuery|HTMLElement}
 */
var $frm = $("#frm"),
    $frmDish = $("#frmDish"),
    $registrationFrm = $('#registrationFrm'),
    $frmShopProduct = $("#frmShopProduct"),
    validate = ($.fn.validate !== undefined);

// Update store form validation
if ($frm.length > 0 && validate) {
    $frm.validate({
        rules:{
            business_name: {
                required: true,
            },
            business_description: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                integer: true
            },
            password: {
                alphanumeric: true,
                nowhitespace: true
            },
            confirmed: {
                alphanumeric: true,
                nowhitespace: true,
                equalTo: "#input-password"
            },
            business_type: {
                required: true,
            },
            category: {
                required: true,
            },
            city: {
                required: true,
            },
            country: {
                required: true,
            },
            street: {
                required: true,
                nowhitespace: true,
            },
            postal_code: {
                required: true,
                nowhitespace: true,
                integer: true
            },

        },
        messages: {
            business_name: {
                required: "Campo obligatorio",
            },
            business_description: {
                required: "Campo obligatorio",
            },
            email: {
                required: "Campo obligatorio",
                email: "Ingresa un correo electrónico valido"
            },
            mobile: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                integer: "Ingresa un número de teléfono valido"
            },
            country: {
                required: "Campo obligatorio",
            },
            city: {
                required: "Campo obligatorio",
            },
            street: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
            },
            street_number: {
                required: "Campo obligatorio",
            },
            postal_code: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                integer: "Ingresa un número de teléfono valido"
            },
            business_type: {
                required: "Campo obligatorio",
            },
            category: {
                required: "Campo obligatorio",
            },
            password: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
            },
            confirmed: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                equalTo: "Las contraseñas no coinciden"
            }

        }
    });
}
// Business User form validation
if ($registrationFrm.length > 0 && validate) {
    $registrationFrm.validate({
        rules:{
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            businessname: {
                required: true,
            },
            business_description: {
                required: true,
            },
            confirmed: {
                required: true,
            },
            acceptcheckbox: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                integer: true
            },
            password: {
                alphanumeric: true,
                nowhitespace: true
            },
            cnfmpassword: {
                alphanumeric: true,
                nowhitespace: true,
                equalTo: "#input-password"
            },
            business_type: {
                required: true,
            },
            category: {
                required: true,
            },
            city: {
                required: true,
            },
            country: {
                required: true,
            },
            street: {
                required: true,
            },
            street_number: {
                required: true,
            },
            postal_code: {
                required: true,
                nowhitespace: true,
                integer: true
            },


        },
        messages: {
            firstname: {
                required: "Campo obligatorio",
            },
            lastname: {
                required: "Campo obligatorio",
            },
            businessname: {
                required: "Campo obligatorio",
            },
            email: {
                required: "Campo obligatorio",
                email: "Ingresa un correo electrónico valido"
            },
            mobile: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                integer: "Ingresa un número de teléfono valido"
            },
            country: {
                required: "Campo obligatorio",
            },
            city: {
                required: "Campo obligatorio",
            },
            street: {
                required: "Campo obligatorio",
            },
            street_number: {
                required: "Campo obligatorio",
            },
            postal_code: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                integer: "Ingresa un número de teléfono valido"
            },
            business_type: {
                required: "Campo obligatorio",
            },
            category: {
                required: "Campo obligatorio",
            },
            password: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
            },
            cnfmpassword: {
                required: "Campo obligatorio",
                nowhitespace: "Ingresa un Código Postal Valid",
                equalTo: "Las contraseñas no coinciden"
            },
            confirmed: {
                required: "Campo obligatorio",
            },
            acceptcheckbox: {
                required: "Campo obligatorio",
            },

        }
    });
}

/**
 * Onchange Category and Sub-category
 */
$('#SubCategoryOption').hide();
$('select[name="business_type').on('change', function() {
    var businessType = $('select[name="business_type"]').find(":selected").val();
    if(businessType == 2) {
        $('#SubCategoryOption').hide();
    } else {
        $('#SubCategoryOption').show();
    }

    $.ajax({
        url: myLabel.parentCategory,
        dataType: 'json',
        method: 'POST',
        data: {
            businessType: businessType,
        },
        beforeSend: function() {
            $('select[name="business_type"]').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
        },
        complete: function() {
            $('.fa-spin').remove();
        },
        success: function(json) {
            var html = '';
            html = '<option value="">'+myLabel.selectOption+'</option>';

            if (json['businessTypeParentCategory'] && json['businessTypeParentCategory'] != '') {
                for (var i = 0; i < json['businessTypeParentCategory'].length; i++) {
                    html += '<option value="' + json['businessTypeParentCategory'][i]['name'] + '"';
                    //console.log(json['states'][i]['id']);
                    if (json['businessTypeParentCategory'][i]['name'] == myLabel.businessTypeParentCategory) {

                        html += ' selected="selected"';
                    }

                    html += '>' + json['businessTypeParentCategory'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value="0" selected="selected">Empty</option>';
            }

            $('select[name="category"]').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
$('select[name="business_type"]').trigger('change');

// businessTypeParentCategory
$('select[name="category').on('change', function() {
    var businessTypeParentCategory = $('select[name="category"]').find(":selected").val();
    $.ajax({
        url: myLabel.childCategory,
        dataType: 'json',
        method: 'POST',
        data: {
            businessTypeParentCategory: businessTypeParentCategory,
        },
        beforeSend: function() {
            $('select[name="category"]').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
        },
        complete: function() {
            $('.fa-spin').remove();
        },
        success: function(json) {
            var html = '';
            html = '<option value="">'+myLabel.selectOption+'</option>';

            if (json['businessTypeChildCategory'] && json['businessTypeChildCategory'] != '') {
                for (var i = 0; i < json['businessTypeChildCategory'].length; i++) {
                    html += '<option value="' + json['businessTypeChildCategory'][i]['name'] + '"';
                    if (json['businessTypeChildCategory'][i]['name'] == myLabel.businessTypeChildCategory) {
                        html += ' selected="selected"';
                    }
                    html += '>' + json['businessTypeChildCategory'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value="0" selected="selected">Empty</option>';
            }

            $('select[name="subcategory"]').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
setTimeout(function () {
    $('select[name="category"]').trigger('change');
},300)


// Business User form validation
if ($frmDish.length > 0 && validate) {
    $frmDish.validate({
        rules:{
            name: {
                required: true,
            },
            type: {
                required: true,
            },
            size: {
                required: true,
            },
            price: {
                required: true,
                decimal: true
            },
            description: {
                required: true,
            }


        },
        messages: {
            name: {
                required: "Campo obligatorio",
            },
            size: {
                required: "Campo obligatorio",
            },
            type: {
                required: "Campo obligatorio",
            },
            price: {
                required: "Campo obligatorio",
                decimal: "Ingresa un número de teléfono valido"
            },
            description: {
                required: "Campo obligatorio",
            }

        }
    });
    $frmDish.on('submit', function(e) {
        //console.log(this);
        // adding rules for inputs with class 'comment'
        $('input.image').each(function() {

            $(this).rules("add", {
                    required: true,
                    accept: true,
                    messages : {
                        required : 'Campo obligatorio',
                        accept: "Ingrese un valor con un mimetype.jpg / png / jpeg válido" }
                })

            });

        });
}


/**
 * Add More Image Functionality
 */
$(document).on('click', '.addImage', function (e) {
    var html = '';
    html = '<tr id="image-row' + myLabel.imageRow + '">';
    html += '  <td class="text-left"><img src="'+myLabel.placeholder+'" alt="" title="" data-placeholder="'+myLabel.placeholder+'" /><input type="hidden" name="images[' + myLabel.imageRow + '][image]" value="" id="input-image' + myLabel.imageRow + '" /></td>';
    html += '  <td class="text-left"><input type="file" accept="image/*" name="images[' + myLabel.imageRow + '][image]" value="'+myLabel.imageRow+'" class="form-control image" id="input-sort_order' + myLabel.imageRow + '"  required></td>';
    html += '  <td class="text-left"><button type="button" data-row ="' + myLabel.imageRow + '" data-toggle="tooltip" title="'+myLabel.removeText+'" class="btn btn-danger delete"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images tbody').append(html);
    myLabel.imageRow++;
});
/**
 * @desc Delete Image from add more
 */
$(document).on('click', '.delete', function(e) {
    var row         = $(this).attr('data-row');
    var id          = $(this).attr('data-id');
    var $button     = $(this);
    if(id) {

        $.ajax({
            url: $(this).attr('data-url'),
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id
            },
            beforeSend: function() {
                $button.prop('disabled', true);
            },
            complete: function() {
                $button.prop('disabled', false);
            },
            success: function(res) {
               // console.log(res);
                $('#image-row' + row).remove();
               // toastr.success('Have fun storming the castle!', 'Miracle Max Says')
            }
        });
    } else {
        $('#image-row' + row).remove();
    }

});






/** Add Product Page Onchange category and sub-category **/

$('select[name="category_id').on('change', function() {
    var businessTypeParentCategory = $('select[name="category_id"]').val();

    $.ajax({
        url: myLabel.childCategory,
        dataType: 'json',
        method: 'POST',
        data: {
            businessTypeParentCategory: businessTypeParentCategory,
        },
        beforeSend: function() {
            $('select[name="category"]').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
        },
        complete: function() {
            $('.fa-spin').remove();
        },
        success: function(json) {
            var html = '';
            html = '<option value="">'+myLabel.selectOption+'</option>';

            if (json['businessTypeChildCategory'] && json['businessTypeChildCategory'] != '') {
                for (var i = 0; i < json['businessTypeChildCategory'].length; i++) {
                    html += '<option value="' + json['businessTypeChildCategory'][i]['id'] + '"';
                    if (json['businessTypeChildCategory'][i]['id'] == myLabel.businessTypeChildCategory) {
                        html += ' selected="selected"';
                    }
                    html += '>' + json['businessTypeChildCategory'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value="0" selected="selected">Empty</option>';
            }

            $('select[name="subcategory_id"]').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
$('select[name="category_id"]').trigger('change');
$('[data-toggle="tooltip"]').tooltip();
var i=1;
var j=1;
$(document).on('click',"#addcolor", function(e) {

    i++;
    var color = `'color_${i}'`;
    $("#dyn_colors").append(
        '<div style="display: flex" class="mb-2" id='+color+'><input type="text" class="form-control " name="colors[]"><button data-color='+color+' class="delete-color"  type="button" style="background: red;border:none;outline:none;color:white" '+myLabel.removeText+'>'+myLabel.removeText+'</button></div>'
    );
}).on('click',"#addsize", function() {
    j++;
    var size = `'size_${j}'`;
    $("#dyn_sizes").append(
        '<div style="display: flex" class="mb-2" id='+size+'><input type="text" class="form-control " name="sizes[]"><button data-size='+size+' type="button" class="delete-size" style="background: red;border:none;outline:none;color:white" '+myLabel.removeText+'>'+myLabel.removeText+'</button></div>'
    );
}).on('click', '.delete-color',function(e) {
    var color         = $(this).attr('data-color');
    $('#' + color).remove();
}).on('click', '.delete-size',function(e) {
    var size         = $(this).attr('data-size');
    $('#' + size).remove();
});


// Update store form validation
if ($frmShopProduct.length > 0 && validate) {
    $frmShopProduct.validate({
        rules:{
            category_id: {
                required: true,
            },
            product_price: {
                required: true,
                decimal: true
            },
            product_brand: {
                required: true,
            },
            product_name: {
                required: true,

            },
            product_quantity: {
                required: true,
                integer: true
            }

        },
        messages: {
            category_id: {
                required: "Campo obligatorio",
            },
            product_price: {
                required: "Campo obligatorio",
                decimal: "Ingresa un número de teléfono valido"
            },
            product_brand: {
                required: "Campo obligatorio",
            },
            product_name: {
                required: "Campo obligatorio",
            },
            product_quantity: {
                required: "Campo obligatorio",
                integer: "Ingresa un número de teléfono valido"
            }

        }
    });
    $frmShopProduct.on('submit', function(e) {
        //console.log(this);
        // adding rules for inputs with class 'comment'
        $('input.image').each(function() {

            $(this).rules("add", {
                required: true,
                accept: true,
                messages : {
                    required : 'Campo obligatorio',
                    accept: "Ingrese un valor con un mimetype.jpg / png / jpeg válido" }
            })

        });

    });
}
/**
 * Add More Image Functionality
 */
$(document).on('click', '.addProductImage', function (e) {
    var html = '';
    html = '<tr id="image-row' + myLabel.imageRow + '">';
    html += '  <td class="text-left"><img src="'+myLabel.placeholder+'" alt="" title="" data-placeholder="'+myLabel.placeholder+'" /><input type="hidden" name="images[' + myLabel.imageRow + '][image]" value="" id="input-image' + myLabel.imageRow + '" /></td>';
    html += '  <td class="text-left"><input type="file" accept="image/*" name="images[' + myLabel.imageRow + '][image]" value="'+myLabel.imageRow+'" class="form-control image" id="input-sort_order' + myLabel.imageRow + '"  required></td>';
    html += '  <td class="text-left"><button type="button" data-row ="' + myLabel.imageRow + '" data-toggle="tooltip" title="Remove" class="btn btn-danger delete"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images tbody').append(html);
    myLabel.imageRow++;
});
/**
 * @desc Delete Image from add more
 */
$(document).on('click', '.delete', function(e) {
    var row         = $(this).attr('data-row');
    var id          = $(this).attr('data-id');
    var $button     = $(this);
    if(id) {

        $.ajax({
            url: $(this).attr('data-url'),
            type: 'POST',
            dataType: "JSON",
            data: {
                id: id
            },
            beforeSend: function() {
                $button.prop('disabled', true);
            },
            complete: function() {
                $button.prop('disabled', false);
            },
            success: function(res) {
               // console.log(res);
                $('#image-row' + row).remove();
                //toastr.success('Have fun storming the castle!', 'Miracle Max Says')
            }
        });
    } else {
        $('#image-row' + row).remove();
    }

});
