@extends('layouts.adminLayout.admin_design')
@section('content')
    <div class="main-container">
		  <div class="pd-ltr-20 xs-pd-20-10">
			  <div class="min-height-200px">
          @if (Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
          @endif
          @if (Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li style="list-style-type:none;">{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Store</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Stores</li>
								</ol>
							</nav>
						</div>
					</div>
				</div
      </div>
      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-blue h4">View Stores</h4>
        </div>
        <div class="pb-20">
          <table class="data-table table stripe hover nowrap">
            <thead>
              <tr>
                <th class="table-plus datatable-nosort">Store Id</th>
                <th>Vendor_id</th>
                <th>Name</th>
                <th>Image</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($stores as $store)
                <tr>
                  <td>{{ $store->id }}</td>
                  <td>{{ $store->vendor_id }}</td>
                  <td>{{ $store->name }}</td>
                  <td>
                    @if(!empty($store->image))
                        <img src="{{ asset ('/images/backend_images/stores/'.$store->image) }}" style= "width:70px;">
                    @endif
                </td>
                  <td>
                    <div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ url('/edit-store/'.$store->id) }}"><i class="dw dw-edit2"></i> Edit</a>
                        <a rel={{ "$store->id" }} rel1="delete-store" href="javascript:" class="dropdown-item deleteRecord"><i class="dw dw-delete-3"></i>Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
			</div>
			@include('layouts.adminLayout.admin_footer')
		</div>
	</div>


@endsection
