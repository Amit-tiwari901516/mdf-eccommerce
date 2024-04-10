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
                    <td style="max-width:50%; padding:25px 0; border-bottom:1px solid #ccc;">
                        <img src="https://store.mdfcabinetdoors.ca/asset-header/Belmont-Doors-MDF-Kitchen-Cabinet-Doors-Drawers-Refacing-Logo-x135.png"
                            alt="logo" style="max-width:100%;">

                    </td>
                    <td style="max-width:50%; padding:25px 0; border-bottom:1px solid #ccc; text-align:right;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> DRAWER
                            PURCHASE ORDER #{{ $order_id }}</div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">21-30001-Stutt Kitchens Ltd,
                            PO 20-10793-MAR- Other Areas DPD </div>
                        {{-- <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Page 1 of 3
                        </div> --}}
                    </td>

                </tr>
            </thead>

        </table>



        <table cellspacing="0" style="width:100%;">
            <tbody>
                <tr>

                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Date Ordered
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Expected
                            Delivery
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Ship Via
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Payment


                    </td>



                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ date('y-m-d/h:s A') }} (EST)
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">2020-08-15
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">Bourret Transport
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">Credit Card
                        </div>

                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">INVOICE#

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">PO#

                        </div>

                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">{{ $order_id }}

                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">20-10793-MAR-Other Areas
                        </div>

                    </td>

                </tr>




                <tr>

                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Billing

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Address
                        </div>

                    </td>



                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_first_name'] }} {{ $billingDetails['billing_last_name'] }}
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['billing_address'] }}
                        </div>


                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Tel

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Cell
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Fax
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Email

                        </div>


                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:1px solid #ccc; width:25%;">
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

                    <td style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Shipping
                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Address
                        </div>

                    </td>



                    <td style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_first_name'] }} {{ $billingDetails['shipping_last_name'] }}
                        </div>
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['shipping_address'] }}
                        </div>


                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc; width:25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Tel

                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Cell
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Fax
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">Email

                        </div>


                    </td>


                    <td style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc; width:25%;">
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

                <tr hidden>
                    <td style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Additional
                            Notes

                        </div>

                    </td>

                    <td colspan="3" style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;">
                            {{ $billingDetails['additional_note'] }}

                        </div>


                    </td>
                </tr>

                <tr>

                    <td colspan="4" style="vertical-align:top; padding:25px 0; border-bottom:5px solid #ccc;">

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:10px; color: #77787b;">Common
                            Option
                            For Premium Dove Tail Drawers
                        </div>

                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Thickness of Drawer Sides/Wood Species/Essence:
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
                                {{ $basicData['back_notch_drill_undermount_slide_option'] }}
                            </div>
                        </div>


                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Back of the Drawer:
                            </div>
                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b; display:inline-block">
                                {{ $basicData['front_notch_undermount_slide_option'] }}
                            </div>
                        </div>

                        <div style="display: block;">
                            <div
                                style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; display:inline-block">
                                Installation of Undermount Slide Brackets
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

                    </td>



                </tr>



            </tbody>

        </table>



        <table cellspacing="0" style="width:100%;">

            <thead>
                <tr style="text-align:left;">
                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding: 10px;">
                            items
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding: 10px;">
                            Product
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:0px; color: #77787b;  "> Height/
                        </div>
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b; padding-bottom: 10px;">
                            Hauteur
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:0px; color: #77787b;  ">Depth/
                        </div>
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding-bottom:10px;">
                            Largeur
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:0px; color: #77787b;  ">Width/
                        </div>
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding-bottom: 10px;">
                            Profoundeur
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding: 10px;">
                            Unit Price
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding: 10px;">
                            Qty
                        </div>
                    </th>

                    <th style="vertical-align:top; padding:15px 0; border-bottom:5px solid #ccc;">
                        <div
                            style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;  padding: 10px;">
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

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $i++ }}
                            </div>
                        </td>
                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['product_name'] }}
                            </div>
                        </td>



                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['height'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['depth'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['width'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;"> $
                                {{ $item['price'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['quantity'] }}
                            </div>
                        </td>

                        <td style="vertical-align:top; padding:15px 0; border-bottom:1px solid #ccc;">

                            <div style="font-size:0.8rem; margin-bottom:4px; color: #77787b;  padding: 10px;">
                                {{ $item['product_price'] }}
                            </div>
                        </td>

                    </tr>
                @endforeach


            </tbody>

        </table>

        <table cellspacing="0" style="width:100%">


            <tbody>
                <tr>

                    <td style="vertical-align:top; padding:25px 0; border-top:5px solid #ccc; width: 60%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;"> Total
                            Weight:{{ $billingDetails['total_weight_lbs'] }}Lbs/{{ $billingDetails['total_weight_kg'] }}Kg


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            Total Cubic Measurements(10lbs/p3):

                        </div>
                        <img src="logo.jpg" alt="logo" style="max-width:100%; margin-top:2rem;">


                    </td>

                    <td style="vertical-align:top; padding:25px 0; border-top:5px solid #ccc; width: 15%;">
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


                    <td style="vertical-align:top; padding:25px 0; border-top:5px solid #ccc; width: 25%;">
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">

                            {{ $billingDetails['quantity'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">

                            ${{ $billingDetails['total'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['delivery_fee'] }}


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            ${{ $billingDetails['total'] }}


                        </div>
                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            $ {{ $billingDetails['taxes'] }}
                        </div>

                        <div style="font-size:0.8rem; font-weight:600; margin-bottom:4px; color: #77787b;">
                            ${{ $billingDetails['cart_total'] }}

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
