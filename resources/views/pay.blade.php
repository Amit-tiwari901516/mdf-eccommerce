<x-frontend.layout>


    <section class="container-fluid inner-Page">
        <div class="card-panel">
            <div class="media wow fadeInUp" data-wow-duration="1s">
                <div class="companyIcon">
                </div>
                <div class="media-body">

                    <div class="container my-5">
                        <x-response></x-response>
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Payment</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6" style="border-radius: 5px; padding: 10px;">
                                <div class="panel panel-primary">
                                    <div class="creditCardForm">
                                        <div class="payment">
                                            <form id="payment-card-info" method="post"
                                                action="{{ route('dopay.online') }}">
                                                @csrf

                                                <div class="row">
                                                    <div class="form-group col-md-8" id="card-number-field">
                                                        <label for="cardNumber">Card Number</label>
                                                        <input type="text" class="form-control" id="cardNumber"
                                                            name="cardNumber">
                                                    </div>
                                                    <div class="form-group CVV col-md-4">
                                                        <label for="cvv">CVV</label>
                                                        <input type="number" class="form-control" id="cvv"
                                                            name="cvv">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">Card Holder Name</label>
                                                        <input type="text" class="form-control" id="cvv"
                                                            name="owner">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="amount">Amount</label>
                                                        <input type="number" class="form-control" id="amount"
                                                            name="amount" min="1"
                                                            value="{{ session('summaryBillingDetails')['cart_total'] ? session('summaryBillingDetails')['cart_total'] : session('billingDetails')['cart_total'] }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-3" id="expiration-date">
                                                        <label>Expiration Month/Year</label><br />

                                                        <div class="d-flex">
                                                            <select class="form-control" id="expiration-month"
                                                                name="expiration-month"
                                                                style="float: left; width: 100px; margin-right: 10px;">
                                                                @foreach ($months as $k => $v)
                                                                    <option value="{{ $k }}"
                                                                        {{ old('expiration-month') == $k ? 'selected' : '' }}>
                                                                        {{ $v }}</option>
                                                                @endforeach
                                                            </select>
                                                            <select class="form-control col-6" id="expiration-year"
                                                                name="expiration-year"
                                                                style="float: left; width: 100px;">

                                                                @for ($i = date('Y'); $i <= date('Y') + 15; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Billing Address must be exactly as it
                                                            appears on credit card statement</label>
                                                        <input type="text" name="address" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">City</label>
                                                        <input type="text" name="city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Postal/Zip Code</label>
                                                        <input type="text" name="postal_code" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Province/State</label>
                                                        <input type="text" name="state" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Country</label>
                                                        <input type="text" name="country" class="form-control">
                                                    </div>
                                                </div>
                                        </div>

                                        <br />
                                        <div class="form-group" id="pay-now">
                                            <button type="button" class="btn btn-success themeButton"
                                                id="confirm-purchase">Confirm Payment</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5" style="background: lightblue; border-radius: 5px; padding: 10px;">
                            <h3>Sample Data</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            Owner
                                        </th>
                                        <td>
                                            Simon
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            CVV
                                        </th>
                                        <td>
                                            123
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Card Number
                                        </th>
                                        <td>
                                            4111 1111 1111 1111
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Amount
                                        </th>
                                        <td>
                                            99
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Expiration Date
                                        </th>
                                        <td>
                                            {{ date('M') . '-' . (date('Y') + 2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="clearfix"></div>
    </section>

    <x-frontend.section name='scripts'>
        <script>
            $("#confirm-purchase").click(function() {

                // e.preventDefault();
                // alert("hello");
                let ccn = $("input[name='cardNumber']").val();
                let cvv = $("input[name='cvv']").val();
                let owner = $("input[name='owner']").val();
                let address = $("input[name='address']").val();
                let city = $("input[name='city']").val();
                let postal_code = $("input[name='postal_code']").val();
                let country = $("input[name='country']").val();
                let state = $("input[name='state']").val();

                if (ccn == '') {
                    alert("Please enter Credit Card Number");
                } else if (cvv == '') {
                    alert("Please enter CVV");
                } else if (owner == '') {
                    alert("Please enter Card Holder Name");
                } else if (address == '') {
                    alert("Please enter Address");
                } else if (city == '') {
                    alert("Please enter City");
                } else if (postal_code == '') {
                    alert("Please enter Postal Code");
                } else if (country == '') {
                    alert("Please enter Country");
                } else if (state == '') {
                    alert("Please enter State");
                } else {

                    $('form').submit();
                }


            });
        </script>
    </x-frontend.section>

</x-frontend.layout>
