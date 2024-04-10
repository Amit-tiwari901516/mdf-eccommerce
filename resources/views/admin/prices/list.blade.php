<x-layout>
    <x-section name="styles">
        <!-- Some JS and styles -->
        <title>Prices List</title>
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
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Prices</h6>
                            <a href="{{ route('bulk-prices.create') }}"
                                class="btn btn-sm btn-primary d-inline float-right"><i class="fa fa-plus"></i> Add
                                New Price</a>
                        </div>
                        <div class="card-body">
                            <x-response></x-response>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Specie</th>
                                            <th>Thickness</th>
                                            <th>Height</th>
                                            <th>Width</th>
                                            <th>Depth</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Specie</th>
                                            <th>Thickness</th>
                                            <th>Height</th>
                                            <th>Width</th>
                                            <th>Depth</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($prices as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->specie }}</td>
                                                <td>{{ $data->thickness }}</td>
                                                <td>{{ $data->width }}</td>
                                                <td>{{ $data->height }}</td>
                                                <td>{{ $data->depth }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('bulk-prices.edit', $data->id) }}"
                                                        class="btn"><i class="fa fa-pencil-alt"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('bulk-prices.destroy', $data->id) }}"
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
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $prices->links() }}
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
