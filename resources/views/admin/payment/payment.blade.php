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
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Payments</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Payment ID</th>
                                            <th>TRANSACTION ID</th>
                                            <th>Message</th>
                                            <th>AMOUNT</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Payment ID</th>
                                            <th>TRANSACTION ID</th>
                                            <th>Message</th>
                                            <th>AMOUNT</th>
                                            <th>DATE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         @php($i = 1)
                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>#{{ $payment->order_id }}</td>
                                                <td>{{ $payment->transaction_id }}</td>
                                                {{-- <td>{{ $payment->response_code == 1 ? 'Success' : 'error' }}</td> --}}
                                                <td>{{ $payment->message == 1 ? 'Success' : 'error' }}</td>
                                                <td>${{ $payment->amount }}</td>
                                                <td>{{ $payment->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Orders Found</td>
                                            </tr>
                                        @endforelse
                                        <tr></tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                               
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
