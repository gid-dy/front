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
								<h4>Vendor</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Vendor</li>
								</ol>
							</nav>
						</div>
					</div>
				</div
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Vendor</h4>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.add-vendor') }}" novalidate="novalidate">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Country</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="country" id="country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Region</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="region" id="region">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Avatar</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="avatar" id="avatar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-7">
                            <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
			@include('layouts.adminLayout.admin_footer')
		</div>
	</div>


@endsection
