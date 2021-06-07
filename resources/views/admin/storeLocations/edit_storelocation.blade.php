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
								<h4>Store Location</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Store Locations</li>
								</ol>
							</nav>
						</div>
					</div>
				</div
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Store Locations</h4>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="{{ url('edit-storelocation/'.$storelocationDetails->id) }}" name="edit_storelocation" id="edit_storelocation">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Store_id</label>
                        <div class="col-sm-12 col-md-5">
                        <select id="store_id" class="form-control" name="store_id" required>
                          <?php echo $stores_dropdown; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Latitude</label>
                        <div class="col-sm-12 col-md-5">
                          <input class="form-control" type="text" value="{{ $storelocationDetails->lat }}" name="lat" id="lat">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-12 col-md-2 col-form-label">Longitude</label>
                      <div class="col-sm-12 col-md-5">
                        <input class="form-control" type="text" value="{{ $storelocationDetails->lng }}" name="lng" id="lng">
                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <div class="col-sm-12 col-md-7">
                          <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Update Store Location">
                      </div>
                  </div>
                </form>
            </div>
            @include('layouts.adminLayout.admin_footer')
		</div>
	</div>


@endsection
