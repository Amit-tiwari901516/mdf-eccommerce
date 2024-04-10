<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>


    <!--invoice-->

    <section style="width:95%; margin:auto;">
        <table style="width:100%;" cellspacing="0">
            <thead>
                <tr>
                    <td colspan="4" style="width:62%; padding:10px 0; border-bottom:1px solid #ccc;">
                        <div>
                            <img src="{{ public_path('frontend/logo.jpg') }}" alt="">

                        </div>
                    </td>
                    <td colspan="1" style="width:38%; padding:10px 0; border-bottom:1px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> DOVETAIL
                            SALES ORDER #</div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            23-{{ $order_id }}-{{ $company }},
                            PO {{ $po }}-MAR-Other Areas-DSO </div>
                        {{-- <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Page 1 of 3
                        </div> --}}
                    </td>

                </tr>
            </thead>

        </table>



        <table cellspacing="0" style="width:100%;">
            <tbody>
                <tr>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:20%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Date Ordered
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Expected
                            Delivery
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Ship Via
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Payment
                    </td>



                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ date('y-m-d/h:s A') }} (EST)
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">{{ date('y-m-d') }}
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">Bourret Transport
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">Credit Card
                        </div>
                    </td>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width: 20%">
                    </td>


                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:15%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">INVOICE#

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">PO#

                        </div>

                    </td>


                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:20%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">{{ $order_id }}

                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">23-{{ $po }}--MAR-Other Areas
                        </div>

                    </td>

                </tr>


                <tr>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:15%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Billing

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Address
                        </div>

                    </td>



                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_first_name'] }} {{ $billingDetails['billing_last_name'] }}
                            {{ $billingDetails['billing_address'] }}
                        </div>


                    </td>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #008000;">
                            Payment Method
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #008000;">
                            Visa ending <br> with {{ $billingDetails['card_ending'] }}
                        </div>
                    </td>


                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:15%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Tel

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Cell
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Fax
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Email

                        </div>


                    </td>


                    <td style="vertical-align:top; padding:10px 0; border-bottom:1px solid #ccc; width:20%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_phone'] }}


                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_phone'] }}

                        </div>

                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">rory@
                        </div>

                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_email'] }}

                        </div>

                    </td>

                </tr>

                <tr>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc; width:15%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Shipping

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Address
                        </div>

                    </td>



                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_first_name'] }} {{ $billingDetails['shipping_last_name'] }}
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_address'] }}
                        </div>

                    </td>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc; width: 20%;">

                    </td>

                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc; width:15%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Tel

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Cell
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Fax
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Email

                        </div>


                    </td>


                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_phone'] }}


                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_phone'] }}

                        </div>

                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">rory@
                        </div>

                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_email'] }}

                        </div>

                    </td>

                </tr>


                <tr>
                    <td style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Additional
                            Notes

                        </div>

                    </td>

                    <td colspan="4" style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['additional_note'] }}

                        </div>


                    </td>
                </tr>

                <tr>

                    <td colspan="5" style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:10px; color: #77787b;">Common
                            Option For Premium Dove Tail Drawers
                        </div>

                        <div style="display: block;">

                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Unit Selection:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                Metric/{{ $basicData['unit'] }}
                            </div>
                        </div>
                        <div style="display: block;">

                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Thickness of Drawer Sides/Wood Species/Essence:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                5/8" Soft Maple
                            </div>
                        </div>


                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Bottom Thickness + Grain Direction/Epaisseur:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['bottom_thickness_grain_direction_option'] }}
                            </div>
                        </div>


                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Bottom Thickness + Grain Direction/Epaisseur:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['front_notch_undermount_slide_option'] }}
                            </div>
                        </div>

                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Back of the Drawer:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['back_notch_drill_undermount_slide_option'] }}
                            </div>
                        </div>
                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Installation of Undermount Slide Brackets:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['bracket_option'] }}
                            </div>
                        </div>


                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Logo Branded:
                            </div>

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['logo_branded'] }}
                            </div>
                        </div>

                        @php
                            $logo = explode('/', $basicData['brand_logo']);
                        @endphp
                        @if (!empty($basicData['brand_logo']))
                            <div style="display: block;">
                                <div
                                    style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                    Logo Attached:
                                </div>

                                <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                    <a href="{{ asset($basicData['brand_logo']) }}">
                                        {{ $logo[count($logo) - 1] }}</a>
                                </div>
                            </div>
                        @endif

                    </td>



                </tr>



            </tbody>

        </table>



        <table cellspacing="0" style="width:100%;">

            <thead>
                <tr style="text-align:left;">
                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Items
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Product
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Height
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Width
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Depth
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Unit Price
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Qty
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:10px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                            Extended
                            Price
                        </div>
                    </th>



                </tr>
            </thead>

            <tbody>


                @php
                    $i = 1;
                    
                @endphp
                @foreach ($items as $item)
                    @php
                        
                        $itemPrice = ($item['price'] * custom()->markup_price) / 100;
                    @endphp
                    <tr>

                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;">

                                {{ $i++ }}

                            </div>

                        </td>
                        <td style="vertical-align:top; padding:10px 0; ">
                            <div style="display: block;">
                                <div
                                    style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                    {{ $item['product_name'] }}
                                </div>
                            </div>
                            @if (!empty($item['note']))
                                <div style="display: block;">
                                    <div
                                        style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                        Notes:
                                    </div>

                                    <div
                                        style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                        {{ $item['note'] }}
                                    </div>
                                </div>
                            @endif
                            @if (custom()->sales_order_code == 1)
                                <div style="display: block;">
                                    <div
                                        style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                        Codes:
                                    </div>

                                    <div
                                        style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                        {{ $item['product_code'] . ',' }}
                                        {{ $basicData['bottom_thickness_grain_direction_code'] == 'None' ? '' : $basicData['bottom_thickness_grain_direction_code'] . ',' }}
                                        {{ $basicData['back_notch_drill_undermount_slide_code'] == 'None' ? '' : $basicData['back_notch_drill_undermount_slide_code'] . ',' }}
                                        {{ $basicData['front_notch_undermount_slide_code'] == 'None' ? '' : $basicData['front_notch_undermount_slide_code'] . ',' }}
                                        {{ $basicData['bracket_code'] == 'None' ? '' : $basicData['bracket_code'] . ',' }}
                                        {{ $basicData['logo_branded_code'] == 'None' ? '' : $basicData['logo_branded_code'] }}
                                    </div>
                                </div>
                            @endif
                            {{-- <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b padding:4px 10px;">
                                {{ $item['product_name'] }} <br>
                                @if (!empty($item['product_name']))
                                    <div
                                        style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                        Codes:
                                    </div>{{ $item['note'] }}
                                @endif
                                <br>
                                @if (custom()->code == 1)
                                    Code: {{ $item['product_code'] }},
                                    {{ $basicData['bottom_thickness_grain_direction_code'] == 'None' ? '' : $basicData['bottom_thickness_grain_direction_code'] }},
                                    {{ $basicData['back_notch_drill_undermount_slide_code'] == 'None' ? '' : $basicData['back_notch_drill_undermount_slide_code'] }},
                                    {{ $basicData['front_notch_undermount_slide_code'] == 'None' ? '' : $basicData['front_notch_undermount_slide_code'] }},
                                    {{ $basicData['bracket_code'] == 'None' ? '' : $basicData['bracket_code'] }},
                                    {{ $basicData['logo_branded_code'] == 'None' ? '' : $basicData['logo_branded_code'] }}
                                @endif
                            </div> --}}
                        </td>



                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                                {{ $item['height'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:10px 0;  ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding:4px 10px;">
                                {{ $item['width'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                                {{ $item['depth'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;"> $
                                {{ $itemPrice }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                                {{ $item['quantity'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:10px 0; ">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; padding:4px 10px;">
                                {{ $item['price'] * $item['quantity'] + custom()->markup_price }}
                            </div>
                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>

        <table cellspacing="0" style="width:100%">


            <tbody>
                <tr>

                    <td style="vertical-align:top; padding:10px 0; border-top:4px solid #ccc; width: 50%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Total
                            Weight:{{ $billingDetails['total_weight_lbs'] }}Lbs/{{ $billingDetails['total_weight_kg'] }}Kg


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Total Cubic Measurements(10lbs/p3):

                        </div>
                        <div>
                            <img src="{{ public_path('/frontend/logo.jpg') }}" alt="">


                        </div>
                    </td>

                    <td style="vertical-align:top; padding:10px 0;  border-top:4px solid #ccc;  width: 5%; "></td>
                    <td style="vertical-align:top; padding:10px 0;   border-top:4px solid #ccc;  width: 20%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Total Items:

                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Price:


                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Delivery


                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Subtotal

                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Taxes(on 13%)

                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            CART Total

                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #006600;">
                            PAID BY:

                        </div>
                    </td>


                    <td style="vertical-align:top; padding:10px 0;    border-top:4px solid #ccc;  width: 25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">

                            {{ $billingDetails['quantity'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">

                            $ {{ $billingDetails['total'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['delivery_fee'] }}


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['subtotal'] }}


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['taxes'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['cart_total'] }}

                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #006600;">
                            VISA

                        </div>




                    </td>

                </tr>



            </tbody>



            <tbody>



            </tbody>

        </table>


    </section>





</body>

</html>
