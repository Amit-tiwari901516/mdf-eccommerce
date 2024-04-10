<x-frontend.layout>


    {{-- Dashboard Page --}}
    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="product-breadcrumb other-page">
                        <span class="text-center">
                            To Order, click on “Shop” in menu above.
                        </span>
                    </div>
                </div>
            </div>
            <!-- end: row -->

            <div class="my-account-section">
                <x-response></x-response>

                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills">
                        <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-dashboard">Dashboard</button>
                        <button class="nav-link" id="v-pills-order-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-order">Orders</button>
                        <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-payment">Payments</button>
                        <button class="nav-link" id="v-pills-wishlist-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-wishlist">Wishlist ({{ $totalWishlists }})</button>
                        <button class="nav-link" id="v-pills-billing-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-billing">Billing Details</button>
                        <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-account">Account Details</button>
                        <button class="nav-link logout-user"> <a href="{{ route('logout') }}">Logout</a></button>
                    </div>
                    <!-- End: tab-nav-link -->

                    <!-- Start: tab-content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Start: Dashboard -->
                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel">
                            <div class="myaccount-dashboard">
                                <p>Hello
                                    <b>{{ auth()->user()->user_billing_fname . ' ' . auth()->user()->user_billing_lname }}</b>
                                    (not you? <a href="{{ route('logout') }}">Sign out</a>)
                                </p>
                                <p>From My Account dashboard, you can view your orders, payments and edit billing,
                                    password and account
                                    details.</p>
                            </div>
                        </div>
                        <!-- End: Dashboard -->

                        <!-- Start: order -->
                        <div class="tab-pane fade order-tab" id="v-pills-order" role="tabpanel">
                            <h4 class="small-title">MY ORDERS</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>My ORDER ID</th>
                                            <th>Total</th>
                                            <th style="width:20%">DATE</th>
                                            <th>View/Download</th>
                                        </tr>


                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>#{{ $order->order_id }}</td>
                                                <td style="text-align: left;">
                                                    $ {{ $order->total }}
                                                </td>
                                                <td>{{ $order->created_at }}</td>

                                                <td>
                                                    @php
                                                        $type = explode('/', $order->sales_invoice)[2];
                                                    @endphp
                                                    <a href="{{ route('download.pdf', ['orderId' => $order->order_id, 'type' => $type]) }}"
                                                        target="_blank" class="add-to-cart-button"><span>sales
                                                            order</span></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Orders Found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End: order -->

                        <!-- Start: payment -->
                        <div class="tab-pane fade payment-tab" id="v-pills-payment" role="tabpanel">
                            <h4 class="small-title">Payments Details</h4>
                            <!-- Start: Payment Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>TRANSACTION ID</th>
                                            <th>Message</th>
                                            <th>AMOUNT</th>
                                            <th>DATE</th>
                                        </tr>

                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td>#{{ $payment->order_id }}</td>
                                                <td>{{ $payment->transaction_id }}</td>
                                                {{-- <td>{{ $payment->response_code == 1 ? 'Success' : 'error' }}</td> --}}
                                                <td>{{ $payment->message == 1 ? 'Success' : 'error' }}</td>
                                                <td>${{ $payment->amount }}</td>
                                                <td>{{ $payment->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Orders Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end: Payment Table -->
                        </div>
                        <!-- End: payment -->

                        <!-- Start: wishlist -->
                        <div class="tab-pane fade wishlist-tab" id="v-pills-wishlist" role="tabpanel">
                            <h4 class="small-title">Your Wishlist</h4>
                            <form method="POST" action="{{ route('wishlist.remove') }}">
                                @csrf
                                <button class="sn-button" id="deleteAllButton" style="margin-bottom: 10px;">Delete
                                    Selected</button>
                                <!-- Start: wishlist Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Check</th>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>CREATED ON</th>
                                                <th>ACTION</th>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @forelse ($wishlists as $wishlist)
                                                <tr>
                                                    <th><input type="checkbox" name="wishlist[]"
                                                            value="{{ $wishlist->id }}" id="selectAll"></th>
                                                    <th>{{ $i++ }}</th>
                                                    <th>{{ $wishlist->name }}</th>
                                                    <th>{{ $wishlist->created_at }}</th>
                                                    <th><a href="{{ route('continue.order', $wishlist->id) }}">Continue
                                                            Order</a>
                                                    </th>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4"></td>
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- end: wishlist Table -->
                        </div>
                        <!-- End: wishlist -->

                        <!-- Start: billing -->
                        <div class="tab-pane fade billing-tab" id="v-pills-billing" role="tabpanel">
                            <form id="form-billing" method="POST"
                                action="{{ route('account.billing.details.update') }}">
                                @csrf

                                <div class="sn-form">
                                    <div class="sn-form-inner">

                                        <div class="single-input single-input-half ">
                                            <label for="billing_firstname">First Name *</label>
                                            <input type="text" name="first_name"
                                                value="{{ $user->user_billing_fname }}" id="billing_firstname"
                                                required="">
                                        </div>
                                        <!-- end: irst Name  -->

                                        <div class="single-input single-input-half ">
                                            <label for="billing_lastname">Last Name *</label>
                                            <input type="text" name="last_name"
                                                value="{{ $user->user_billing_lname }}" id="billing_lastname"
                                                required="">
                                        </div>
                                        <!-- end: Last Name -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_companyname">Company Name*</label>
                                            <input type="text" name="company"
                                                value="{{ $user->user_billing_company }}" id="billing_companyname"
                                                required="">
                                        </div>
                                        <!-- end: Company -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_address">Address*</label>
                                            <input type="text" name="address"
                                                value="{{ $user->user_billing_address }}" id="billing_address"
                                                required="">
                                        </div>
                                        <!-- end: City -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_city">City*</label>
                                            <input type="text" name="city" id="billing_city" required=""
                                                value="{{ $user->user_billing_city }}">
                                        </div>
                                        <!-- end: City -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_country">Province/State/Country *</label>
                                            <select name="country" id="billing_country" class="form-control">
                                                <option disabled="">Select</option>
                                                <option value="AB"
                                                    {{ $user->user_billing_country == 'AB' ? 'selected' : '' }}>AB
                                                    (CA)</option>
                                                <option value="BC"
                                                    {{ $user->user_billing_country == 'BC' ? 'selected' : '' }}>BC
                                                    (CA)</option>
                                                <option value="MB"
                                                    {{ $user->user_billing_country == 'MB' ? 'selected' : '' }}>MB
                                                    (CA)</option>
                                                <option value="NB"
                                                    {{ $user->user_billing_country == 'NB' ? 'selected' : '' }}>NB
                                                    (CA)</option>
                                                <option value="NL"
                                                    {{ $user->user_billing_country == 'NL' ? 'selected' : '' }}>NL
                                                    (CA)</option>
                                                <option value="NT"
                                                    {{ $user->user_billing_country == 'NT' ? 'selected' : '' }}>NT
                                                    (CA)</option>
                                                <option value="NS"
                                                    {{ $user->user_billing_country == 'NS' ? 'selected' : '' }}>NS
                                                    (CA)</option>
                                                <option value="NU"
                                                    {{ $user->user_billing_country == 'NU' ? 'selected' : '' }}>NU
                                                    (CA)</option>
                                                <option value="ON"
                                                    {{ $user->user_billing_country == 'ON' ? 'selected' : '' }}>ON
                                                    (CA)</option>
                                                <option value="PE"
                                                    {{ $user->user_billing_country == 'PE' ? 'selected' : '' }}>PE
                                                    (CA)</option>
                                                <option value="QC"
                                                    {{ $user->user_billing_country == 'QC' ? 'selected' : '' }}>QC
                                                    (CA)</option>
                                                <option value="SK"
                                                    {{ $user->user_billing_country == 'SK' ? 'selected' : '' }}>SK
                                                    (CA)</option>
                                                <option value="YT"
                                                    {{ $user->user_billing_country == 'YT' ? 'selected' : '' }}>YT
                                                    (CA)</option>
                                                <option value="AL"
                                                    {{ $user->user_billing_country == 'AL' ? 'selected' : '' }}>AL
                                                    (US)</option>
                                                <option value="AK"
                                                    {{ $user->user_billing_country == 'AK' ? 'selected' : '' }}>AK
                                                    (US)</option>
                                                <option value="AZ"
                                                    {{ $user->user_billing_country == 'AZ' ? 'selected' : '' }}>AZ
                                                    (US)</option>
                                                <option value="AR"
                                                    {{ $user->user_billing_country == 'AR' ? 'selected' : '' }}>AR
                                                    (US)</option>
                                                <option value="CA"
                                                    {{ $user->user_billing_country == 'CA' ? 'selected' : '' }}>CA
                                                    (US)</option>
                                                <option value="CO"
                                                    {{ $user->user_billing_country == 'CO' ? 'selected' : '' }}>CO
                                                    (US)</option>
                                                <option value="CT"
                                                    {{ $user->user_billing_country == 'CT' ? 'selected' : '' }}>CT
                                                    (US)</option>
                                                <option value="DE"
                                                    {{ $user->user_billing_country == 'DE' ? 'selected' : '' }}>DE
                                                    (US)</option>
                                                <option value="FL"
                                                    {{ $user->user_billing_country == 'FL' ? 'selected' : '' }}>FL
                                                    (US)</option>
                                                <option value="GA"
                                                    {{ $user->user_billing_country == 'GA' ? 'selected' : '' }}>GA
                                                    (US)</option>
                                                <option value="HI"
                                                    {{ $user->user_billing_country == 'HI' ? 'selected' : '' }}>HI
                                                    (US)</option>
                                                <option value="ID"
                                                    {{ $user->user_billing_country == 'ID' ? 'selected' : '' }}>ID
                                                    (US)</option>
                                                <option value="IL"
                                                    {{ $user->user_billing_country == 'IL' ? 'selected' : '' }}>IL
                                                    (US)</option>
                                                <option value="IN"
                                                    {{ $user->user_billing_country == 'IN' ? 'selected' : '' }}>IN
                                                    (US)</option>
                                                <option value="IA"
                                                    {{ $user->user_billing_country == 'IA' ? 'selected' : '' }}>IA
                                                    (US)</option>
                                                <option value="KS"
                                                    {{ $user->user_billing_country == 'KS' ? 'selected' : '' }}>KS
                                                    (US)</option>
                                                <option value="KY"
                                                    {{ $user->user_billing_country == 'KY' ? 'selected' : '' }}>KY
                                                    (US)</option>
                                                <option value="LA"
                                                    {{ $user->user_billing_country == 'LA' ? 'selected' : '' }}>LA
                                                    (US)</option>
                                                <option value="ME"
                                                    {{ $user->user_billing_country == 'ME' ? 'selected' : '' }}>ME
                                                    (US)</option>
                                                <option value="MD"
                                                    {{ $user->user_billing_country == 'MD' ? 'selected' : '' }}>MD
                                                    (US)</option>
                                                <option value="MA"
                                                    {{ $user->user_billing_country == 'MA' ? 'selected' : '' }}>MA
                                                    (US)</option>
                                                <option value="MI"
                                                    {{ $user->user_billing_country == 'MI' ? 'selected' : '' }}>MI
                                                    (US)</option>
                                                <option value="MN"
                                                    {{ $user->user_billing_country == 'MN' ? 'selected' : '' }}>MN
                                                    (US)</option>
                                                <option value="MS"
                                                    {{ $user->user_billing_country == 'MS' ? 'selected' : '' }}>MS
                                                    (US)</option>
                                                <option value="MO"
                                                    {{ $user->user_billing_country == 'MO' ? 'selected' : '' }}>MO
                                                    (US)</option>
                                                <option value="MT"
                                                    {{ $user->user_billing_country == 'MT' ? 'selected' : '' }}>MT
                                                    (US)</option>
                                                <option value="NE"
                                                    {{ $user->user_billing_country == 'NE' ? 'selected' : '' }}>NE
                                                    (US)</option>
                                                <option value="NV"
                                                    {{ $user->user_billing_country == 'NV' ? 'selected' : '' }}>NV
                                                    (US)</option>
                                                <option value="NH"
                                                    {{ $user->user_billing_country == 'NH' ? 'selected' : '' }}>NH
                                                    (US)</option>
                                                <option value="NJ"
                                                    {{ $user->user_billing_country == 'NJ' ? 'selected' : '' }}>NJ
                                                    (US)</option>
                                                <option value="NM"
                                                    {{ $user->user_billing_country == 'NM' ? 'selected' : '' }}>NM
                                                    (US)</option>
                                                <option value="NY"
                                                    {{ $user->user_billing_country == 'NY' ? 'selected' : '' }}>NY
                                                    (US)</option>
                                                <option value="NC"
                                                    {{ $user->user_billing_country == 'NC' ? 'selected' : '' }}>NC
                                                    (US)</option>
                                                <option value="ND"
                                                    {{ $user->user_billing_country == 'ND' ? 'selected' : '' }}>ND
                                                    (US)</option>
                                                <option value="OH"
                                                    {{ $user->user_billing_country == 'OH' ? 'selected' : '' }}>OH
                                                    (US)</option>
                                                <option value="OK"
                                                    {{ $user->user_billing_country == 'OK' ? 'selected' : '' }}>OK
                                                    (US)</option>
                                                <option value="OR"
                                                    {{ $user->user_billing_country == 'OR' ? 'selected' : '' }}>OR
                                                    (US)</option>
                                                <option value="PA"
                                                    {{ $user->user_billing_country == 'PA' ? 'selected' : '' }}>PA
                                                    (US)</option>
                                                <option value="RI"
                                                    {{ $user->user_billing_country == 'RI' ? 'selected' : '' }}>RI
                                                    (US)</option>
                                                <option value="SC"
                                                    {{ $user->user_billing_country == 'SC' ? 'selected' : '' }}>SC
                                                    (US)</option>
                                                <option value="SD"
                                                    {{ $user->user_billing_country == 'SD' ? 'selected' : '' }}>SD
                                                    (US)</option>
                                                <option value="TN"
                                                    {{ $user->user_billing_country == 'TN' ? 'selected' : '' }}>TN
                                                    (US)</option>
                                                <option value="TX"
                                                    {{ $user->user_billing_country == 'TX' ? 'selected' : '' }}>TX
                                                    (US)</option>
                                                <option value="UT"
                                                    {{ $user->user_billing_country == 'UT' ? 'selected' : '' }}>UT
                                                    (US)</option>
                                                <option value="VT"
                                                    {{ $user->user_billing_country == 'VT' ? 'selected' : '' }}>VT
                                                    (US)</option>
                                                <option value="VA"
                                                    {{ $user->user_billing_country == 'VA' ? 'selected' : '' }}>VA
                                                    (US)</option>
                                                <option value="WA"
                                                    {{ $user->user_billing_country == 'WA' ? 'selected' : '' }}>WA
                                                    (US)</option>
                                                <option value="WV"
                                                    {{ $user->user_billing_country == 'WV' ? 'selected' : '' }}>WV
                                                    (US)</option>
                                                <option value="WI"
                                                    {{ $user->user_billing_country == 'WI' ? 'selected' : '' }}>WI
                                                    (US)</option>
                                                <option value="WY"
                                                    {{ $user->user_billing_country == 'WY' ? 'selected' : '' }}>WY
                                                    (US)</option>
                                            </select>
                                        </div>
                                        <!-- end: Country -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_po">Po</label>
                                            <input type="text" name="po"
                                                value="{{ $user->user_billing_po }}" id="billing_po" required="">
                                        </div>

                                        <div class="single-input single-input-half">
                                            <label for="billing_tax">Tax</label>
                                            <input type="text" name="tax"
                                                value="{{ $user->user_billing_tax }}" id="billing_tax"
                                                required="">
                                        </div>

                                        <div class="single-input single-input-half">
                                            <label for="billing_postalcode">Postalcode / Zip *</label>
                                            <input type="text" name="postal_code"
                                                value="{{ $user->user_billing_postal }}" id="billing_postalcode"
                                                required="">
                                        </div>
                                        <!-- end: Postalcode -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_phone">Phone *</label>
                                            <input type="text" name="phone"
                                                value="{{ $user->user_billing_phone }}" id="billing_phone"
                                                required="">
                                        </div>
                                        <!-- end: Phone -->

                                        <div class="single-input single-input-half">
                                            <label for="billing_email">Email *</label>
                                            <input type="email" name="email"
                                                value="{{ $user->user_billing_email }}" id="billing_email"
                                                required="">
                                        </div>
                                        <!-- end: Email -->
                                    </div>
                                </div>

                                <!-- End: form-billing -->

                                <button type="submit" id="save-billing" class="sn-button">
                                    Save
                                </button>
                                <!-- End: Save Button -->
                            </form>

                        </div>
                        <!-- End: billing -->

                        <!-- Start: account -->
                        <div class="tab-pane fade account-tab" id="v-pills-account" role="tabpanel">
                            <div class="myaccount-details">
                                <form id="form-update" class="sn-form" method="POST"
                                    action="{{ route('account.basic.details.update') }}">
                                    @csrf
                                    <div class="sn-form-inner">
                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname">User Name*</label>
                                            <input type="text" name="user_name" value="{{ $user->user_name }}"
                                                id="account-details-firstname">
                                        </div>
                                        <!-- end: First Name -->

                                        <!-- end: Last Name -->

                                        <div class="single-input single-input-half">
                                            <label for="account-details-firstname"> Phone*</label>
                                            <input type="number" name="user_phone" value="{{ $user->user_phone }}"
                                                id="account-details-firstname">
                                        </div>
                                        <!-- end: Phone  -->

                                        <div class="single-input single-input-half">
                                            <label for="account-details-email">Email*</label>
                                            <input type="email" name="user_email" value="{{ $user->user_email }}"
                                                id="account-details-email" readonly>
                                        </div>
                                        <!-- end: Email -->

                                        <div class="single-input">
                                            <label for="account-details-newpass">Old Password </label>
                                            <input type="password" value="" name="old_password"
                                                id="account-details-newpass">
                                        </div>
                                        <!-- end: Old Password  -->

                                        <div class="single-input">
                                            <label for="account-details-newpass">New Password </label>
                                            <input type="password" name="password" id="account-details-newpass">
                                        </div>

                                        {{-- Confirm Password --}}
                                        <div class="single-input">
                                            <label for="account-details-newpass">Confirm Password </label>
                                            <input type="password" name="password_confirmation"
                                                id="account-details-newpass">
                                        </div>
                                        <!-- end: New Password -->
                                    </div>
                                    <!-- end: form -->

                                    <div class="single-input">
                                        <button type="submit" class="sn-button sn-button-dark"
                                            id="update"><span>SAVE
                                                CHANGES</span></button>
                                    </div>
                                    <!-- end: SAVE Button -->
                                </form>

                            </div>
                            <!-- End: myaccount-details -->
                        </div>
                        <!-- End: account -->

                    </div>
                    <!-- End: tab-content -->
                </div>
                <!-- End: .d-flex .align-items-start -->

            </div>
            <!-- end: my-account-section -->
        </div>
        <!-- end: container -->
    </section>


    <x-frontend.section name='scripts'>

    </x-frontend.section>

</x-frontend.layout>
