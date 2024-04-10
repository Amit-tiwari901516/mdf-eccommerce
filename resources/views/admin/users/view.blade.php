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
                            <h6 class="m-0 font-weight-bold d-inline text-primary">Users</h6>
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary d-inline float-right"><i
                                    class="fa fa-list"></i> Users</a>
                        </div>

                        <div class="card-body">
                            {{-- User Details --}}
                            <table class="table">
                                <tr>
                                    <th>Email</td>
                                    <td>{{ $user->user_email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</td>
                                    <td>{{ $user->user_phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Name</td>
                                    <td>{{ $user->user_billing_fname ?? 'N/A' }}&nbsp;{{ $user->user_billing_lname }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Billing Company</td>
                                    <td>{{ $user->user_billing_company ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing PO</td>
                                    <td>{{ $user->user_billing_po ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Tax</td>
                                    <td>{{ $user->user_billing_tax ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Address</td>
                                    <td>{{ $user->user_billing_address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing City</td>
                                    <td>{{ $user->user_billing_city ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Postal</td>
                                    <td>{{ $user->user_billing_postal ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Email</td>
                                    <td>{{ $user->user_billing_email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Billing Phone</td>
                                    <td>{{ $user->user_billing_phone ?? 'N/A' }}</td>
                                </tr>
                            </table>
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
