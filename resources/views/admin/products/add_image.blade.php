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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Add Product Image</h4>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/add-product-image/'.$productDetails->id) }}" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}" />
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
                            <label class="col-sm-12 col-md-5 col-form-label"><strong>{{ $productDetails->product_name }}</strong></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Product Code</label>
                            <label class="col-sm-12 col-md-5 col-form-label"><strong>{{ $productDetails->product_code }}</strong></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                            <div class="col-sm-12 col-md-5">
                                <input class="form-control" type="file" name="image[]" multiple="multiple">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-7">
                                <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="Add Image">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                  <h4 class="text-blue h4">View Images</h4>
                </div>
                <div class="pb-20">
                    <table class="table-bordered table stripe hover">
                        <thead>
                            <tr>
                                <th>Image Id</th>
                                <th>Product Id</th>
                                <th>Image</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productimages as $productimage)
                                <tr class="gradeX">
                                    <td>{{ $productimage->id }}</td>
                                    <td>{{ $productimage->product_id }}</td>
                                    <td>
                                        @if(!empty($productimage->image))
                                            <img src="{{ asset ('/images/backend_images/products/'.$productimage->image) }}" style= "width:70px;">
                                        @endif
                                    </td>
                                    <td class="center">
                                    <a rel="{{ $productimage->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
