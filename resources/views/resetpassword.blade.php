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
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                    </div>
                                    <form action="{{ route('reset.password.post') }}" method="POST" class="user">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="password" class="form-control"
                                                    name="password" required autofocus>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="password-confirm" class="form-control"
                                                    name="password_confirmation" required autofocus>
                                                @if ($errors->has('password_confirmation'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>
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
