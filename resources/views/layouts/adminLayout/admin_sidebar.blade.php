<?php $url = url()->current(); ?>
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ url('admin/dashboard') }}">
            <img src="{{ asset('vendors/images/zion.png') }}" alt="">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ url('/dashboard') }}" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Vendor</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/add-vendor') }}">Add Vendor</a></li>
                        <li><a href="{{ url('/view-vendors') }}">View Vendors</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Stores</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/add-store') }}">Add Store</a></li>
                        <li><a href="{{ url('/view-stores') }}">View Stores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Store Location</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/add-storelocation') }}">Add Store Location</a></li>
                        <li><a href="{{ url('/view-storelocations') }}">View Store Locations</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Products</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/add-product') }}">Add Product</a></li>
                        <li><a href="{{ url('/view-products') }}">View Products</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
{{-- sidebar-menu --}}
