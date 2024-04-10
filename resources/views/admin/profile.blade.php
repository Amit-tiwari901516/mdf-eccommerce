<x-layout>
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Hello World</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('texteditor/trix.css') }}">

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
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Change Password</h6>
                        </div>
                        <div class="card-body">

                            <x-response></x-response>

                            <form method="POST" action="{{ route('changePassword', auth()->user()) }}" class="mt-4">
                                @csrf
                                @method('PATCH')

                                {{-- Password --}}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10 d-flex flex-row">
                                        <input type="password" class="form-control mr-2" name="password"
                                            placeholder="Password">
                                        <input type="password" class="form-control ml-2" name="password_confirmation"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-primary m-auto form-control"><i
                                            class="fa fa-paper-plane"></i> Chnage Password</button>
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
