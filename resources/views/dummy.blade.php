<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // check which button is going to submit the form
    $('.orderFormSubmitBtn').click(function(e) {
        e.preventDefault();
        $("#wishlistModel").modal('show');
    });

    $("#validataWishlist").click(function() {
        var name = $('#val_wishlist_name').val();
        var id = '{{ auth()->id() }}';
        $.ajax({
            type: 'get',
            url: "{{ route('ajaxValidateWishlistName') }}",
            data: {
                id: id,
                name: name,
                cart: 0
            },
            success: (response) => {
                if (response.success == true) {
                    let msg = 'Wishlist already exists. Do you want to add number (' +
                        response.number + ') to wishlist name?';
                    if (confirm(msg) == true) {
                        $('#wishlist_name').val(name + ' (' + response.number + ')');
                        $('#__orderEditForm').submit();
                    }

                } else {
                    $('#wishlist_name').val(name);
                    $('#__orderEditForm').submit();
                }

                $("#wishlistModel").modal('hide');

            },
            error: function(errors) {
                console.log(errors);
            }

        });
    });

    // ajax form validation 
    $('#__orderEditForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxOrderValidation') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response.success == true) {
                    this.submit();
                } else {
                    $('#wishlist_name').val('');
                    $('#ajax-error').empty();
                    response.errors.forEach(function(error, index) {
                        $('#ajax-error').append(
                            '<div style="background: #FF5733; padding: 5px 10px; color:white;">' +
                            error + '</div>'
                        );

                        $('html, body').animate({
                            scrollTop: $("#ajax-error").offset().top
                        }, 10);
                    });

                }
            },
            error: function(errors) {
                console.log(errors);
            }

        });
    });


    function changeUnit(el) {
        let unit = $(el).val();

        $.ajax({
            url: "{{ route('changeUnit') }}",
            method: 'get',
            data: {
                unit: unit
            },
            success: function(result) {
                location.reload();
            },
            errors: function(error) {
                console.log(error);
            }
        });

    }




    function addNewItem() {
        let id = $('input[name="id[]"]:last').val();
        $.ajax({
            url: "{{ route('addNewItem') }}?count=" + $("#newItems").children().length,
            method: 'get',
            data: {
                id: id
            },
            success: function(result) {
                $('#newItems').append(result);
            },
            errors: function(error) {
                console.log(error);
            }
        });
    }

    function removeItem(elm) {
        let item = $(elm).closest('.v-blocks');
        item.remove();
    }

    // Add image on select
    function getSelectedProduct(el) {
        let div = $(el).closest('.col-12');
        let ProductImageDiv = div.siblings('.showProductImageDiv');

        $.ajax({
            url: "{{ route('getProductImage') }}",
            method: 'get',
            data: {
                id: $(el).val(),
            },
            success: function(result) {
                ProductImageDiv.html(result.html);

                if (result.type == 1) {

                    div.siblings('.designDiv').find("input[type='file']").attr('required', 'true');
                    div.siblings('.designDiv').find("textarea").attr('required', 'true');
                    div.siblings('.widthDiv').css('visibility', 'hidden');
                    div.siblings('.heightDiv').css('visibility', 'hidden');
                    div.siblings('.depthDiv').css('visibility', 'hidden');
                } else {
                    div.siblings('.designDiv').find("input[type='file']").removeAttr('required');
                    div.siblings('.designDiv').find("textarea").removeAttr('required');
                    div.siblings('.widthDiv').css('visibility', 'visible');
                    div.siblings('.heightDiv').css('visibility', 'visible');
                    div.siblings('.depthDiv').css('visibility', 'visible');

                }

            },
            errors: function(error) {
                console.log(error);
            }
        });
    }

    function showProductImage(el) {
        let div = $(el).closest('.selected-product-show');
        let image = div.siblings('.indexPageProductImage');
        let attr = image.attr('hidden');
        if (typeof attr !== 'undefined' && attr !== false) {
            image.removeAttr('hidden');
        } else {
            image.attr('hidden', 'true');
        }
    }
</script>
