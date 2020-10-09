!function ($) {
    "use strict";
    // businessType

    var $frm = $("#frm"),
        validate = ($.fn.validate !== undefined);
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
                businessType: {
                    required: true,
                },
                businessTypeParentCategory: {
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

            }
        });
    }
    $('select[name="businessType').on('change', function() {
        var businessType = $('select[name="businessType"]').find(":selected").val();
        console.log(businessType);
        $.ajax({
            url: myLabel.parentCategory,
            dataType: 'json',
            method: 'POST',
            data: {
                businessType: businessType,
                _token: myLabel.token,
            },
            beforeSend: function() {
                $('select[name="businessType"]').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
            },
            complete: function() {
                $('.fa-spin').remove();
            },
            success: function(json) {
                console.log(json);
                // if (json['postcode_required'] == '1') {
                //     $('input[name=\'postcode\']').parent().parent().addClass('required');
                // } else {
                //     $('input[name=\'postcode\']').parent().parent().removeClass('required');
                // }
                var html = '';
                html = '<option value="">select option</option>';

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

                $('select[name="businessTypeParentCategory"]').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $('select[name="businessType"]').trigger('change');

    // businessTypeParentCategory
    $('select[name="businessTypeParentCategory').on('change', function() {
        var businessTypeParentCategory = $('select[name="businessTypeParentCategory"]').find(":selected").val();
        $.ajax({
            url: myLabel.childCategory,
            dataType: 'json',
            method: 'POST',
            data: {
                businessTypeParentCategory: businessTypeParentCategory,
                _token: myLabel.token,
            },
            beforeSend: function() {
                $('select[name="businessTypeParentCategory"]').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
            },
            complete: function() {
                $('.fa-spin').remove();
            },
            success: function(json) {
                console.log(json);
                var html = '';
                html = '<option value="">select option</option>';

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

                $('select[name="businessTypeChildCategory"]').html(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });


    setTimeout(function () {
        $('select[name="businessTypeParentCategory"]').trigger('change');
    },300)

}(window.jQuery);

