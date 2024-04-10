<x-frontend.layout>



    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="product-breadcrumb other-page">
                        <span> <a href="{{ route('place.order.edit') }}">Order</a> » <a href="{{ route('cart') }}" class="pb-c-page">Cart</a>
                            » <a href="{{ route('checkout') }}" class="pb-c-page">Billing/Shipping</a>
                            » <a href="{{ route('summary') }}" class="pb-c-page">Order Summary</a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end: row -->

            <x-response></x-response>
            @php
                $values = explode('/', $basicData['brand_logo']);
            @endphp
            @if (!is_null($basicData))
                <div class="cart-top-con">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="c-t-l-con">
                            <h4>COMMON OPTIONS TO ALL ITEMS:</h4>
                            <ul>
                                <li>{{ $basicData['bottom_thickness_grain_direction_option'] }}
                                </li>
                                <li>{{ $basicData['back_notch_drill_undermount_slide_option'] }}
                                </li>
                                <li>{{ $basicData['front_notch_undermount_slide_option'] }}</li>
                                <li>{{ $basicData['bracket_option'] }}</li>
                            </ul>
                            <h5>Brand with Your Logo</h5>
                            <ul>
                                <li>
                                    {{ empty($basicData['logo_branded']) ? 'N/a' : $basicData['logo_branded'] }}
                                </li>
                                @if (!empty($basicData['brand_logo']))
                                    <li>
                                        <div>
                                            {{-- <img src="{{ asset($basicData['brand_logo']) }}" alt=""
                                                    width="200px" height="200px"> --}}
                                            <a href="{{ asset($basicData['brand_logo']) }}">
                                                {{ $values[count($values) - 1] }}</a>

                                        </div>
                                    </li>
                                @endif
                            </ul>


                        </div>

                        <div class="text-danger">
                            @if (custom()->online_sequence_code == 1)
                                <strong>Codes:</strong> <br>
                                {{ $basicData['bottom_thickness_grain_direction_code'] == 'None' ? '' : $basicData['bottom_thickness_grain_direction_code'] . ',' }}
                                {{ $basicData['back_notch_drill_undermount_slide_code'] == 'None' ? '' : $basicData['back_notch_drill_undermount_slide_code'] . ',' }}
                                {{ $basicData['front_notch_undermount_slide_code'] == 'None' ? '' : $basicData['front_notch_undermount_slide_code'] . ',' }}
                                {{ $basicData['bracket_code'] == 'None' ? '' : $basicData['bracket_code'] . ',' }}
                                {{ $basicData['logo_branded_code'] == 'None' ? '' : $basicData['logo_branded_code'] }}
                            @endif
                        </div>

                    </div>
                    <!-- end: row -->
                </div>
            @endif



            <div class="cart-pro-table">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Item</td>
                                    <td>Image</td>
                                    <td>Attachment</td>
                                    <td>Product/Admin Codes</td>
                                    <td>Notes</td>
                                    <td>Unit Price</td>
                                    <td>Qty</td>
                                    <td>Ext. Price</td>
                                </tr>

                                @php
                                    $i = 1;
                                    $cubicMesurement = 0;
                                    $totalWeight = 0;
                                @endphp
                                @forelse ($items as $item)
                                    @php
                                        $attachment = explode('/', $item['design']);
                                        $price = $comman_options_total + $item['price'];
                                        $itemCubicMesurement = ($item['quantity'] * ($item['height'] * $item['width'] * $item['depth'])) / 1728;
                                        $cubicMesurement = $cubicMesurement + $itemCubicMesurement;
                                        $weight = $itemCubicMesurement * 10;
                                        $totalWeight = $totalWeight + $weight;
                                        $itemPrice = ($item['price'] + $comman_options_total ) + ( $item['price']* custom()->markup_price) / 100;
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset($item['product_image']) }}" alt=""
                                                width="100" height="100">
                                        </td>
                                        <td>{{ $attachment[count($attachment) - 1] }}</td>
                                        <td>
                                            <div class="c-p-t-codes">
                                                @if (custom()->online_sequence_code == 1)
                                                    <p>
                                                        {{ $item['product_code'] }}
                                                    </p>
                                                @endif
                                                <p>Height: {{ $item['height'] }}</p>
                                                <p>Width: {{ $item['width'] }}</p>
                                                <p>Depth: {{ $item['depth'] }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="c-p-t-notes">
                                                <h6>{{ $item['note'] ? $item['note'] : 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td>$ {{ $itemPrice }}</td>
                                        <td>{{ $item['quantity'] }}
                                        </td>
                                        <td>$ {{ $itemPrice * $item['quantity'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">No Order Yet</td>
                                    </tr>
                                @endforelse




                            </table>
                        </div>

                    </div>
                </div>
                <!-- end: row -->
            </div>

            <form method="POST" action="{{ route('payStore') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="c-p-btm-form">
                            {{-- <div class="form-group row">
                            <label for="shippingcity" class="col-md-2 col-form-label">Shipping to
                                City:</label>
                            <div class="col-md-10">
                                <div class="all-dev">
                                    <select class="form-select" id="shippingcity" name="city" readonly>
                                        <option value="{{ $billingDetails['city'] }}">{{ $billingDetails['city'] }}
                                        </option>
                                    </select>
                                </div>

                                <p class="city-notes">*If City is not listed, please call us at
                                    905.282.1722
                                </p>
                            </div>
                        </div> --}}
                            <div class="form-group row">
                                <label for="shippingcity" class="col-md-2 col-form-label">Shipping to
                                    City:</label>
                                <div class="col-md-10">
                                    <div class="all-dev">
                                        <select class="form-select" id="shippingcity" name="city" required>
                                            <option selected disabled>Drop down menu with available
                                                cities
                                                <span>(alphabetic
                                                    order)</span>
                                            </option>
                                            @foreach ($cities as $city)
                                                <option
                                                    {{ old('city', @$billingDetails['city']) == $city->city ? 'selected' : '' }}
                                                    value="{{ $city->city }}">{{ $city->city }}
                                                </option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <p class="city-notes">*If City is not listed, please call us at
                                        905.282.1722
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="from-md-txt">
                                        <h5>Total Cubic Measurements <span>(10 lbs/p3)</span></h5>
                                        <ul>
                                            <li>Total :
                                                {{ $billingDetails['total_cubic_measurement'] }} </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="from-md-txt">
                                        <h5>Total Weight</h5>
                                        <ul>
                                            <li>Lbs =
                                                {{ $billingDetails['total_weight_lbs'] }}
                                            </li>
                                            <li>Kg =
                                                {{ $billingDetails['total_weight_kg'] }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group c-p-txtarea">
                                <label for="cftxtarea"><b>Additional Notes:</b></label>
                                <textarea name="additional_note" class="form-control" id="cftxtarea" readonly> {{ $billingDetails['additional_note'] }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="c-p-btm-info">
                            <ul>
                                <li>Total Items <span>{{ $billingDetails['quantity'] }}</span></li>
                                <li>Items Total <span>$ {{ $billingDetails['total'] }}</span></li>
                                <li>Delivery <span
                                        class="__deliveryFee">{{ $billingDetails['delivery_fee'] ? $billingDetails['delivery_fee'] : '??' }}</span>
                                </li>
                                <li>Courier <span
                                        class="courier">{{ $billingDetails['courier'] ? $billingDetails['courier'] : '??' }}</span>
                                </li>
                                <li>Subtotal <span class="__subtotal"> $
                                        {{ $summaryBillingDetails['subtotal'] ? $summaryBillingDetails['subtotal'] : ($billingDetails['subtotal'] ? $billingDetails['subtotal'] : $billingDetails['total']) }}</span>
                                </li>
                                <li>Taxes (ON 13%) <span class="__taxes">
                                        {{ $summaryBillingDetails['taxes'] ? $summaryBillingDetails['taxes'] : ($billingDetails['taxes'] ? $billingDetails['taxes'] : round($billingDetails['total'] * 0.13, 2)) }}</span>
                                </li>
                                <li><b>CART Total</b> <span class="__cartTotal">$
                                        {{ $summaryBillingDetails['cart_total'] ? $summaryBillingDetails['cart_total'] : ($billingDetails['cart_total'] ? $billingDetails['cart_total'] : $billingDetails['total'] + round($billingDetails['total'] * 0.13, 2)) }}</span>
                                </li>

                                {{-- input fields --}}
                                <input type="hidden" name="total" value="{{ $billingDetails['total'] }}"
                                    step="0.01" class="__priceInp">
                                <input type="hidden" name="comman_options_total" value="{{ $comman_options_total }}"
                                    step="0.01">
                                <input type="hidden" name="total_cubic_measurement"
                                    value="{{ round($cubicMesurement, 2) }}" step="0.01">
                                <input type="hidden" name="quantity" value="{{ $billingDetails['quantity'] }}"
                                    step="0.01">
                                <input type="hidden" name="total_weight_kg"
                                    value="{{ round($totalWeight * 0.45359237, 2) }}" step="0.01">
                                <input type="hidden" name="total_weight_lbs" class="__totalWeight"
                                    value="{{ round($totalWeight, 2) }}" step="0.01">
                                <input type="hidden" name="delivery_fee" class="__deliveryFeeInp" step="0.01">
                                <input type="hidden" name="subtotal" class="__subtotalInp" step="0.01">
                                <input type="hidden" name="taxes" class="__taxesInp" step="0.01">
                                <input type="hidden" name="cart_total" class="__cartTotalInp" step="0.01">
                                <input type="hidden" name="courier" class="__courierInp">
                            </ul>
                            <div class="c-p-info-btn">
                                <button type="submit" value="wishlist" class="btn-dovetail wishlist-btn"
                                    id="addToWishlist">Add to Wishlist</button>
                                <button type="button" id="proceed" class="btn btn-success">PROCEED TO PAYMENT
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- end: container -->
        {{-- wishlist model form --}} 
        <!-- Back Notch Modal -->
        <div class="modal fade backnotch_modal" id="wishlistModel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row row">
                            <label class="col-4">Wishlist Name:</label>
                            <input type="text" id="val_wishlist_name" class="input-control col-6">
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" id="validataWishlist">Save to
                            Wishlist</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===================================== --}}
        <div class="modal fade backnotch_modal" id="shipping-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row row">
                            <h3>Call Belmont Doors for pricing and save your product in wishlist </h3>
                        </div>

                        <div class="modal-body">
                            <div class="form-row row">
                                <label class="col-4">Wishlist Name:</label>
                                <input type="text" id="val_wishlist_name1" class="input-control col-6">
                            </div>
                            <button type="button" class="btn btn-sm btn-primary" id="add-wishlist">OK</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-frontend.section name='scripts'>
        <script>
            // Scripts goes here
            $("#proceed").click(function() {

                let city = $('#shippingcity').val();
                if (city == 'other') {
                    $("#shipping-modal").modal('show');


                    $("#add-wishlist").click(function() {
                        let name = $('#val_wishlist_name1').val();
                        let id = '{{ auth()->id() }}';

                        $.ajax({
                            type: 'get',
                            url: "{{ route('ajaxValidateWishlistName') }}",
                            data: {
                                id: id,
                                name: name,
                                cart: 0
                            },
                            success: (response) => {
                                console.log(response);

                                saveToWishlist(name);
                                $("#shipping-modal").modal('hide');

                            },
                            error: function(errors) {
                                console.log(errors);
                            }

                        });
                    });

                } else {
                    $('form').submit();
                }
            });

            $('#shippingcity').change(function() {
                let city = $(this).val();
                let weight = $('.__totalWeight').val();
                let price = $('.__priceInp').val();
                localStorage.setItem('shipping_city', city);

                $.ajax({
                    url: "{{ route('delivery.price') }}",
                    method: 'get',
                    data: {
                        city: city,
                        weight: weight,
                        price: price
                    },
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        console.log(obj);
                        $('.__deliveryFee').html('$' + obj.deliveryFee);
                        $('.__deliveryFeeInp').val(obj.deliveryFee);
                        $('.__subtotal').html('$' + obj.subtotal);
                        $('.courier').html(obj.courier);
                        $('.__subtotalInp').val(obj.subtotal);
                        $('.__taxes').html('$' + obj.taxes);
                        $('.__taxesInp').val(obj.taxes);
                        $('.__cartTotal').html('$' + obj.cartTotal)
                        $('.__cartTotalInp').val(obj.cartTotal)
                        $('.__courierInp').val(obj.courier)

                    },
                    errors: function(error) {
                        console.log(error);
                    }
                });

            });

            $('#addToWishlist').click(function(e) {
                e.preventDefault();
                $("#wishlistModel").modal('show');
            });

            $("#validataWishlist").click(function() {
                let name = $('#val_wishlist_name').val();
                let id = '{{ auth()->id() }}';
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
                                name = name + ' (' + response.number + ')';
                            }
                            else
                            {
                                return;
                            }

                        }
                        saveToWishlist(name);
                        $("#wishlistModel").modal('hide');

                    },
                    error: function(errors) {
                        console.log(errors);
                    }

                });
            });

            function saveToWishlist(name) {
                var id = '{{ auth()->id() }}';
                var delivery_fee = $("input[name='delivery_fee']").val();
                let city = $("select[name='city']").val();
                let courier = $("input[name='courier']").val();
                let cart_total = $("input[name='cart_total']").val();
                let taxes = $("input[name='taxes']").val();
                let subtotal = $("input[name='subtotal']").val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('ajaxValidateWishlistName') }}",
                    data: {
                        id: id,
                        name: name,
                        cart: 1,
                        delivery_fee: delivery_fee,
                        city: city,
                        courier: courier,
                        cart_total: cart_total,
                        taxes: taxes,
                        subtotal: subtotal

                    },
                    success: (response) => {
                        if (response.success == true) {
                            window.location.href = "{{ route('index') }}";
                        }
                    },
                    error: function(errors) {
                        console.log(errors);
                    }

                });
            }

            $(document).ready(function() {

                $('#country').val(localStorage.shipping_city);
                // $('#country').val('NB');

            })
        </script>
    </x-frontend.section>

</x-frontend.layout>
