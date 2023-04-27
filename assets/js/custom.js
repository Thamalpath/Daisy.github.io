// Product View & Cart
$(document).ready(function() {

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 0) {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.AddToCartBtn').click(function(e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var pro_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "pro_id": pro_id,
                "pro_qty": qty,
                "scope": "add"
            },
            success: function(response) {
                console.log(response)
                if (response == 201) {
                    alertify.success("Product added to cart");
                } else if (response == "existing") {
                    alertify.success("Product already added");
                } else if (response == 401) {
                    alertify.success("Login to continue");
                } else if (response == 500) {
                    alertify.success("Something went wrong");
                }
            }
        });
    });

    // $(document).on('click', 'updateQty', function() {
    //     var qty = $(this).closest('.product_data').find('.input-qty').val();
    //     var pro_id = $(this).closest('.product_data').find('.prodId').val();

    //     $.ajax({
    //         method: "POST",
    //         url: "functions/handlecart.php",
    //         data: {
    //             "pro_id": pro_id,
    //             "pro_qty": qty,
    //             "scope": "update"
    //         },
    //         success: function(response) {
    //             //alert(response);
    //         }
    //     });
    // });

    // $(document).on('click', '.deleteItems', function() {
    //     var cart_id = $(this).val();
    //     alert(cart_id);

    //     $.ajax({
    //         method: "POST",
    //         url: "functions/handlecart.php",
    //         data: {
    //             "cart_id": cart_id,
    //             "scope": "delete"
    //         },
    //         success: function(response) {
    //             if (response == 200) {
    //                 alertify.success("Item deleted successfully");
    //                 $('#mycart').load(location.href + "#mycart");
    //             } else {
    //                 alertify.success(response);
    //             }
    //         }
    //     });
    // });
});





// Filter Products

// $(document).ready(function() {
//     var totalRecord = 0;
//     var category = getCheckboxValues('category');
//     var sub_category = getCheckboxValues('sub_category');
//     $.ajax({
//         type: 'POST',
//         url: "load_products.php",
//         dataType: "json",
//         data: { totalRecord: totalRecord, category: category, sub_category: sub_category },
//         success: function(data) {
//             $("#results").append(data.product);
//             totalRecord++;
//         }
//     });
//     $(window).scroll(function() {
//         scrollHeight = parseInt($(window).scrollTop() + $(window).height());
//         if (scrollHeight == $(document).height()) {
//             if (totalRecord <= totalData) {
//                 loading = true;
//                 $('.loader').show();
//                 $.ajax({
//                     type: 'POST',
//                     url: "load_products.php",
//                     dataType: "json",
//                     data: { totalRecord: totalRecord, category: category, sub_category: sub_category },
//                     success: function(data) {
//                         $("#results").append(data.product);
//                         $('.loader').hide();
//                         totalRecord++;
//                     }
//                 });
//             }
//         }
//     });

//     function getCheckboxValues(checkboxClass) {
//         var values = new Array();
//         $("." + checkboxClass + ":checked").each(function() {
//             values.push($(this).val());
//         });
//         return values;
//     }
//     $('.sort_rang').change(function() {
//         $("#search_form").submit();
//         return false;
//     });
//     $(document).on('click', 'label', function() {
//         if ($('input:checkbox:checked')) {
//             $('input:checkbox:checked', this).closest('label').addClass('active');
//         }
//     });
// });