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
									<li class="breadcrumb-item active" aria-current="page">Add Store Location</li>
								</ol>
							</nav>
						</div>
					</div>
				</div
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Store Location</h4>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.add-storelocation') }}" novalidate="novalidate">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Store Name</label>
                        <div class="col-sm-12 col-md-5">
                            <select class="selectpicker form-control" name="store_id" id="store_id" data-style="btn-outline-primary" data-size="5">
                                    <optgroup label="Select Store" data-max-options="2">
                                        @foreach($stores as $store)
                                            @if (old('store_id') == $store->id)
                                                <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                                            @else
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">lat</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="lat" id="lat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">lng</label>
                        <div class="col-sm-12 col-md-5">
                            <input class="form-control" type="text" name="lng" id="lng">
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
