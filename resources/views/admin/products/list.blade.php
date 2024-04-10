<x-layout>
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Users List</title>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Products</h6>
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary d-inline float-right"><i
                                    class="fa fa-plus"></i> Add Product</a>
                        </div>
                        <div class="card-body">
                            <x-response></x-response>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="id[]" value="{{ $product->id }}"
                                                        class="id">
                                                </td>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->code }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $product) }}" class="btn"><i
                                                            class="fa fa-pencil-alt"></i></a>
                                                    <a href="{{ route('product.show', $product) }}" class="btn"><i
                                                            class="fa fa-eye"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('product.destroy', $product) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn"><i class="fa fa-trash"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Data Available</td>
                                            </tr>
                                        @endforelse
                                        <tr></tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="form-group w-25">
                                <input type="number" name="price" class="form-control price"
                                    placeholder="Number of percent"><br>
                                <button type="button" id="increasePrice" class="btn btn-success">Increase
                                    Price</button>
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

        <script>
            $("#increasePrice").click(function() {
                let id = $('.id:checked').map(function(_, el) {
                    return $(el).val();
                }).get();
                let price = $(".price").val();
                let _token = "{{ csrf_token() }}";

                console.log(id);

                $.ajax({
                    url: "{{ route('increase.price') }}",
                    method: 'post',
                    data: {
                        id: id,
                        price: price,
                        _token: _token,
                    },
                    success: function(result) {
                        alert("Prices Are Updated");
                        location.reload();
                    },
                    errors: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    </x-section>
</x-layout>
