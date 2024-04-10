<x-frontend.layout>


    {{-- Register Page --}}
    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-form register-form">

                        <x-response></x-response>

                        <form method="post" action="{{ route('register') }}" class="sn-form sn-form-boxed"
                            id="form-register" enctype="multipart/form-data">
                            @csrf
                            <div class="sn-form-inner">
                                <div class="single-input">
                                    <label for="register-form-fname">First Name*</label>
                                    <input type="text" name="first_name" id="register-form-fname" required="">
                                </div>
                                <!-- end: First Name -->

                                <div class="single-input">
                                    <label for="register-form-lname">Last Name*</label>
                                    <input type="text" name="last_name" id="register-form-lname" required="">
                                </div>
                                <!-- end: Last Name -->

                                <div class="single-input">
                                    <label for="register-form-name">Phone*</label>
                                    <input type="number" name="phone" id="register-form-name" required="">
                                </div>
                                <!-- end: Phone -->

                                <div class="single-input">
                                    <label for="register-form-email">Email address* (PLEASE NOTE: Your E-Mail Address
                                        will be your unique
                                        Login Name and cannot be changed)
                                    </label>
                                    <input type="email" name="email" id="register-form-email" required="">
                                </div>
                                <!-- end: Email address -->

                                <div class="single-input">
                                    <label for="register-form-password">Password*</label>
                                    <input type="password" name="password" id="register-form-password"
                                        placeholder="Password must be atleast 8 characters and have atleast one number and character."
                                        required="">
                                </div>
                                <!-- end: Password -->

                                <div class="single-input">
                                    <label for="register-form-password">Confirm Password*</label>
                                    <input type="password" name="password_confirmation" id="register-form-password"
                                        required="">
                                </div>
                                <!-- end: Confirm Password  -->

                                <p>
                                    Already Registered? <a href="{{ route('login') }}">Login Here</a>
                                </p>
                                <!-- end: Login here -->
                            </div>

                            <button type="submit" class="sn-button sn-button-dark">
                                Register
                            </button>
                            <!-- end: sn-form-inner -->
                        </form>
                        <!-- end: form -->

                        <!-- end: button -->

                    </div>
                    <!-- end: login-form -->
                </div>
                <!-- end: col-sm-12 -->
            </div>
            <!-- end: row -->

            <!-- end: my-account-section -->
        </div>
        <!-- end: container -->
    </section>

    <x-frontend.section name='scripts'>

    </x-frontend.section>

</x-frontend.layout>
