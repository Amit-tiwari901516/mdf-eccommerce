<x-layout>
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Hello World</title>
    </x-section>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-topbar></x-topbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="card shadow mb-4 col-md-10 m-auto">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">User Update</h6>
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary d-inline float-right"><i
                                    class="fa fa-list"></i> Users</a>
                        </div>
                        <div class="card-body">

                            <x-response></x-response>

                            <form method="POST" action="{{ route('user.update', $user) }}">
                                @method('PATCH')
                                @csrf


                                {{-- General Details --}}
                                <h5 class="text-bold text-dark">General Details</h5>
                                <hr>

                                {{-- Email --}}
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="email@example.com" value="{{ $user->user_email }}">
                                    </div>
                                </div>

                                {{-- Phone Number --}}
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="number" name="phone" value="{{ $user->user_phone }}"
                                            class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>

                                {{-- Billing Details --}}
                                <h5 class="text-bold text-dark">Billing Details</h5>
                                <hr>
                                {{-- Billing Name --}}
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Billing Name</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="text" class="form-control mr-2" name="billing_fname"
                                            placeholder="First Name" value="{{ $user->user_billing_fname }}">
                                        <input type="text" class="form-control ml-2" name="billing_lname"
                                            placeholder="Last Name" value="{{ $user->user_billing_lname }}">
                                    </div>
                                </div>

                                {{-- Billing Company --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing Company</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="text" name="billing_company" placeholder="Company"
                                            class="form-control" value="{{ $user->user_billing_company }}">
                                    </div>
                                </div>

                                {{-- Billing PO --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing PO</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="text" placeholder="PO" name="billing_po" class="form-control"
                                            value="{{ $user->user_billing_po }}">
                                    </div>
                                </div>

                                {{-- Billing Tax --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing Tax</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="text" placeholder="Tax" name="billing_tax" class="form-control"
                                            value="{{ $user->user_billing_tax }}">
                                    </div>
                                </div>

                                {{-- Billing Address --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing Address</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <textarea name="billing_address" class="form-control" placeholder="Billing Address" rows="4">{{ $user->user_billing_address }}</textarea>
                                    </div>
                                </div>

                                {{-- Billing city --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing City</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="text" class="form-control mr-2" name="billing_city"
                                            placeholder="City" value="{{ $user->user_billing_city }}">
                                        <input type="text" class="form-control ml-2" name="billing_postalcode"
                                            placeholder="Postal Code" value="{{ $user->user_billing_postal }}">
                                    </div>
                                </div>


                                {{-- Billing Phone Number --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing Phone</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="number" placeholder="Billing Phone Number" name="billing_phone"
                                            class="form-control" value="{{ $user->user_billing_phone }}">
                                    </div>
                                </div>

                                {{-- Billing Email --}}
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Billing Email</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="email" placeholder="Billing Email" name="billing_email"
                                            class="form-control" value="{{ $user->user_billing_email }}">
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-warning m-auto form-control"><i
                                            class="fa fa-pencil"></i> Update</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <x-footer></x-footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <x-section name="scripts">
        <!-- Some JS and styles -->



    </x-section>
</x-layout>
