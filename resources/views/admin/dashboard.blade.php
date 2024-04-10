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
                  <!--  <div class="card shadow mb-4">
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
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Bracket</th>
                                            <th>Quantity</th>
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
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price }}</td>
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
                    </div>    -->



                    {{-- Select Options --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Index Page Select Options</h6>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('select.option') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Option</label>
                                    <input type="text" name="option" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Option For</label>
                                    <select name="for" class="form-control">
                                        <option disabled selected>--SELECT--</option>
                                        <option value="0">Bottom Thickness</option>
                                        <option value="1">Back Notch</option>
                                        <option value="2">Front Notch</option>
                                        <option value="3">Bracket</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Create Option</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Option</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>For</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Option</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>For</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($selectOptions as $option)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $option->option }}</td>
                                                <td>{{ $option->code }}</td>
                                                <td>${{ $option->price }}</td>
                                                <td>
                                                    @if ($option->for == 0)
                                                        {{ __('Bottom Thickness ') }}
                                                    @elseif ($option->for == 1)
                                                        {{ __('Back Notch') }}
                                                    @elseif ($option->for == 2)
                                                        {{ __('Front Notch') }}
                                                    @else
                                                        {{ __('Bracket') }}
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center align-items-center"
                                                    style="gap: 3px" width="100%">
                                                    <button onClick="editOption({{ @$option->id }})" type="button"
                                                        class="btn btn-primary btn-sm">Edit
                                                    </button>
                                                    <form action="{{ route('select.option.destroy', $option->id) }}"
                                                        class="mb-0" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="3">No Data Here</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 flex">
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Custom Options</h6>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('custom') }}" method="POST">
                                @csrf
                                <div class="font-weight-bold">
                                    Code:
                                </div>
                                <div class="form-group">
                                    <label for="">Online Sequence</label>
                                    <input type="hidden" name="online_sequence_code" value="0">
                                    <input type="checkbox" class="mr-3" name="online_sequence_code" value="1"
                                        {{ custom()->online_sequence_code == 1 ? 'checked' : '' }}>
                                    <label for="">Sales Order</label>
                                    <input type="hidden" name="sales_order_code" value="0">
                                    <input type="checkbox" class="mr-3" name="sales_order_code" value="1"
                                        {{ custom()->sales_order_code == 1 ? 'checked' : '' }}>
                                    <label for="">Purchase Order</label>
                                    <input type="hidden" name="purchase_order_code" value="0">
                                    <input type="checkbox" class="mr-3" name="purchase_order_code" value="1"
                                        {{ custom()->purchase_order_code == 1 ? 'checked' : '' }}>
                                    <label for="">Packing Slip</label>
                                    <input type="hidden" name="packing_slip_code" value="0">
                                    <input type="checkbox" class="mr-3" name="packing_slip_code" value="1"
                                        {{ custom()->packing_slip_code == 1 ? 'checked' : '' }}>
                                </div>

                                <div class="form-group">
                                    <label for="">Markup Percetage</label>
                                    <input type="number" name="markup_price" value="{{ custom()->markup_price }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


                <p id="openModal" data-toggle="modal" data-target="#editOption"></p>
                <div class="modal fade" id="editOption" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Option</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('select.updateOption') }}" method="post">
                                    @csrf
                                    <input name="id" type="hidden" value="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Option</label>
                                                <input type="text" class="form-control" name="edit_option"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" class="form-control" name="edit_code" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Price</label>
                                                <input type="text" class="form-control" name="edit_price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 class_access">
                                            <label for="">Option For</label>
                                            <select name="edit_for" class="form-control" required>
                                                <option disabled selected>--SELECT--</option>
                                                <option value="0">Bottom Thickness</option>
                                                <option value="1">Back Notch</option>
                                                <option value="2">Front Notch</option>
                                                <option value="3">Bracket</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


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
