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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Product</h6>
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary d-inline float-right"><i
                                    class="fa fa-list"></i> Products</a>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-body">
                                    <div class="d-flex my-3">
                                        <div class="m-3" style="width: 150px; height:150px">
                                            <img class="card-img-top m-3" src="{{ asset($product->image) }}"
                                                alt="Card image cap">
                                        </div>

                                    </div>
                                    <p>{{ $product->image }}</p>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }} ( {{ $product->code }})</h5>
                                            <p class="card-text">{{ substr($product->description, 0, 20) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted"><b>Price</b>${{ $product->price }}</small>
                                        </div>
                                    </div>
                                </div>
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



    </x-section>
</x-layout>
