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


                <div class="container-fluid">
                    <x-response></x-response>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Orders</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Bracket</th>
                                           
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Bracket</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($drawerOrder as $order)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order->bracket }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    <a href="" class="text-decoration-none text-body">

                                                        @if ($order->status == 0)
                                                            Pending
                                                        @elseif($order->status == 1)
                                                            Processing
                                                        @else
                                                            Completed
                                                        @endif
                                                    </a>
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
                            <div class="d-flex justify-content-center">
                                {{ $drawerOrder->links() }}
                            </div>
                        </div>
                    </div>



                   
                <!-- /.container-fluid -->



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
    <script>
        function editOption(e) {
            $id = e;

            $.ajax({
                type: 'POST',
                url: "{{ URL::to('/select/editOption') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $id
                },
                success: function(data) {
                    if (data.option) {
                        $("input[name*='id']").val(data.option['id']);
                        $("input[name*='edit_option']").val(data.option['option']);
                        $("input[name*='edit_code']").val(data.option['code']);
                        $("input[name*='edit_price']").val(data.option['price']);
                        $("select[name*='edit_for']").val(data.option['for']).attr('selected', 'selected');
                        $('#openModal').click();
                    } else {
                        alert(data.error);
                    }

                }
            });

        }
    </script>
</x-layout>
