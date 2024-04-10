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


                    <div class="card shadow mb-4 m-auto">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">City Edit</h6>
                            <a href="{{ route('city.index') }}" class="btn btn-sm btn-primary d-inline float-right"><i
                                    class="fa fa-list"></i>
                                All Cities</a>
                        </div>
                        <div class="card-body">

                            <x-response></x-response>

                            <div class="row">
                                <form method="POST" action="{{ route('city.update', $city->id) }}"
                                    enctype="multipart/form-data" class="col-8 mr-2">
                                    @csrf

                                    @method('PATCH')


                                    {{-- City Name --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $city->city }}">
                                        </div>
                                    </div>

                                    {{-- Courier --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Courier</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="courier"
                                                value="{{ $city->courier }}">
                                        </div>
                                    </div>

                                    {{-- Min --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Min</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="min"
                                                value="{{ $city->min }}">
                                        </div>
                                    </div>

                                    {{-- 0 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">0</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="zero"
                                                value="{{ $city['zero'] }}">
                                        </div>
                                    </div>

                                    {{-- 500 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">500</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="five_hundred"
                                                value="{{ $city['500'] }}">
                                        </div>
                                    </div>

                                    {{-- 1000 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">1000</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="one_thousend"
                                                value="{{ $city['1000'] }}">
                                        </div>
                                    </div>

                                    {{-- 2000 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">2000</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="two_thousend"
                                                value="{{ $city['2000'] }}">
                                        </div>
                                    </div>

                                    {{-- 5000 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">5000</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="five_thousend"
                                                value="{{ $city['5000'] }}">
                                        </div>
                                    </div>

                                    {{-- 10000 --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">10000</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ten_thousend"
                                                value="{{ $city['10000'] }}">
                                        </div>
                                    </div>


                                    {{-- Submit Button --}}
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-warning m-auto"><i
                                                class="fa fa-paper-pencil"></i> Update</button>
                                    </div>

                                </form>
                            </div>

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
</x-layout>
