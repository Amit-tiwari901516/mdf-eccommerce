<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
   
    {{-- Product --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productDrop"
            aria-expanded="true" aria-controls="productDrop">
            <i class="fas fa-users"></i>
            <span>Product</span>
        </a>
        <div id="productDrop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product.create') }}">Add Product</a>
                <a class="collapse-item" href="{{ route('product.index') }}">Product List</a>
            </div>
        </div>
    </li>

    {{-- Bulk Price --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#PriceDrop"
            aria-expanded="true" aria-controls="PriceDrop">
            <i class="fas fa-users"></i>
            <span>Price</span>
        </a>
        <div id="PriceDrop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bulk-prices.create') }}">Add Price</a>
                <a class="collapse-item" href="{{ route('bulk-prices.index') }}">Price List</a>
            </div>
        </div>
    </li>

    {{-- City and Courier --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cityDrop" aria-expanded="true"
            aria-controls="cityDrop">
            <i class="fas fa-users"></i>
            <span>City & Courier</span>
        </a>
        <div id="cityDrop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('city.create') }}">Add City</a>
                <a class="collapse-item" href="{{ route('city.index') }}">City List</a>
            </div>
        </div>
    </li>

    {{-- Order --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orderDrop" aria-expanded="true"
            aria-controls="orderDrop">
            <i class="fas fa-users"></i>
            <span>Order</span>
        </a>
        <div id="orderDrop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('order')}}">All Orders</a>
               
            </div>
        </div>
    </li>
   
    {{-- Payment --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#paymentDrop" aria-expanded="true"
            aria-controls="paymentDrop">
            <i class="fas fa-users"></i>
            <span>Payment</span>
        </a>
        <div id="paymentDrop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('paymentindex') }}">Payments</a>
              
            </div>
        </div>
    </li>

    {{-- Customer --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Customer</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.create') }}">Add Customer</a>
                <a class="collapse-item" href="{{ route('user.index') }}">Customer List</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
