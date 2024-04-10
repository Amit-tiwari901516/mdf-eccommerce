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
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Product Create</h6>
                            <a href="{{ route('product.index') }}"
                                class="btn btn-sm btn-primary d-inline float-right"><i class="fa fa-list"></i>
                                Products</a>
                        </div>
                        <div class="card-body">

                            <x-response></x-response>

                            <div class="row">
                                <form method="POST" action="{{ route('product.update', $product) }}"
                                    enctype="multipart/form-data" class="col-12 mr-2">
                                    @csrf

                                    @method('PATCH')

                                    {{-- Name --}}
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $product->name }}"
                                                name="name" placeholder="Product Name">
                                        </div>
                                    </div>

                                    {{-- Code --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="text" name="code" value="{{ $product->code }}"
                                                class="form-control" placeholder="Code">
                                        </div>
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="text" name="price" value="{{ $product->price }}"
                                                class="form-control" placeholder="Price">
                                        </div>
                                    </div>

                                    {{-- Type --}}
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Type</label>
                                        <input type="hidden" name="type" value="0">
                                        <div class="col-sm-10 d-flex flex-row">
                                            <input type="checkbox" name="type" value="1"
                                                {{ $product->type == 0 ? '' : 'checked' }}>&nbsp;
                                            <span>Custom Product</span>
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <input id="x" type="hidden" value="{{ $product->description }}"
                                                name="description">
                                            <trix-editor input="x" class="trix-content"></trix-editor>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($product->image) }}" id="selectedImage"
                                            style="width: 150px; height:150px;">
                                    </div>

                                    {{-- Image --}}
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-md-10">
                                            <input type="file" name="image" id="imgInp" class="form-control"
                                                accept="jpg,jpeg,png,svg">
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
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#selectedImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        </script>

    </x-section>
</x-layout>
