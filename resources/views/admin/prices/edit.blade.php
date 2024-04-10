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


                    <div class="card shadow mb-4 m-auto">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Bulk Prices Edit</h6>
                            <a href="{{ route('bulk-prices.index') }}"
                                class="btn btn-sm btn-primary d-inline float-right"><i class="fa fa-list"></i>
                                All Prices</a>
                        </div>
                        <div class="card-body">

                            <x-response></x-response>

                            <div class="row">
                                <form method="POST" action="{{ route('bulk-prices.update', $data) }}"
                                    enctype="multipart/form-data" class="col-8 mr-2">
                                    @csrf

                                    @method('PATCH')


                                    {{-- Specie --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Specie</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="specie"
                                                placeholder="Specie" value="{{ $data->specie }}">
                                        </div>
                                    </div>

                                    {{-- Thicknessss --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Thickness</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="text" name="thickness" class="form-control"
                                                placeholder="Thickness" value="{{ $data->thickness }}">
                                        </div>
                                    </div>

                                    {{-- Width --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Width</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="number" name="width" class="form-control"
                                                placeholder="Width" value="{{ $data->width }}">
                                        </div>
                                    </div>

                                    {{-- Height --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Height</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="number" name="height" class="form-control"
                                                placeholder="Height" value="{{ $data->height }}">
                                        </div>
                                    </div>

                                    {{-- Depth --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Depth</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="number" name="depth" class="form-control"
                                                placeholder="Depth" value="{{ $data->depth }}">
                                        </div>
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="text" name="price" class="form-control"
                                                placeholder="Price" value="{{ $data->price }}">
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

    <x-section name="scripts">
        <!-- Some JS and styles -->

        <script type="text/javascript" src="{{ URL::asset('texteditor/trix.js') }}"></script>

    </x-section>
</x-layout>
