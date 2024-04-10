<x-frontend.layout>


    {{-- Login Page --}}
    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-form">
                        <x-response></x-response>
                        <form id="form-login" action="{{ route('login') }}" method="post" class="sn-form sn-form-boxed">
                            @csrf
                            <div class="sn-form-inner">

                                <div class="single-input">
                                    <label for="login-form-email">Email address *</label>
                                    <input type="text" name="email" id="login-form-email">
                                </div>
                                <!-- end: Email -->

                                <div class="single-input">
                                    <label for="login-form-password">Password *</label>
                                    <input type="password" name="password" id="login-form-password">
                                </div>
                                <!-- end: Password -->

                                <div class="single-input">
                                    <a href="{{ route('register') }}">Not Registered? Click Here</a>
                                </div>
                                <!-- end: Registered -->

                                <div class="single-input">
                                    <a href="{{ route('forget.password.get') }}">Forgot Password? Click Here</a>
                                </div>
                                <!-- end: Forgot Password -->

                            </div>
                            <button id="login" type="submit" class="sn-button sn-button-dark">
                                Login
                            </button>
                            <!--end: sn-form-inner -->
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
