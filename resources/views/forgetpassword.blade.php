<x-layout bodyClass="bg-gradient-primary">
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Hello World</title>
    </x-section>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        @if (Session::has('message'))
                                            <p class="alert alert-success mb-4" role="alert">
                                                {{ Session::get('message') }}
                                            </p>
                                        @else
                                            <p class="mb-4">We get it, stuff happens. Just enter your email address
                                                below
                                                and we'll send you a link to reset your password!</p>
                                        @endif

                                    </div>
                                    <form action="{{ route('forget.password.post') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account?
                                            Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <x-section name="scripts">
        <!-- Some JS and styles -->

    </x-section>
</x-layout>
