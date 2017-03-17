@extends('layouts.index')
{{-- title pass here from controller--}}
{{--Title refer to current page title which user viewing--}}
@section('title', $title)
@section('main-section')
<div class="row">
    <div class="col-xs-12 dashboard-header">
        <h1 class="dash-title">{{$title }}</h1>
    </div>
</div> <!-- /row -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="panel-body m-t-0">
                {{--Check If Session has any status message regarding edit/update of a product --}}
                @if (Session::has('message'))
                    <div class="submit-msg">{{ Session::get('message') }}</div>
                @endif
                <form action="{{ URL::route('product-store') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group marginTop">
                        <label for="product_name">Product Name</label>
                        <input type="text" value="{{ ($current_product == '') ? old('product_name') : $productRecord->product_name }}" class="form-control" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_number">Product Serial Number</label>
                        <input type="text" class="form-control" name="serial_number" value="{{ ($current_product == '') ? old('serial_number') : $productRecord->serial_number }}" required>
                    </div>
                    <div class="form-group">
                        <label>Product Size</label>
                        <select class="form-control" name="size">
                            <option value="S" {{ (\App\Http\Models\ProductModel::objectCheck($productRecord,'size') == 'S') ? 'selected' : '' }}>Small</option>
                            <option value="M" {{ (\App\Http\Models\ProductModel::objectCheck($productRecord,'size') == 'M') ? 'selected' : '' }}>Medium</option>
                            <option value="L" {{ (\App\Http\Models\ProductModel::objectCheck($productRecord,'size') == 'L') ? 'selected' : '' }}>Large</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Stock</label>
                        <input type="text" class="form-control" name="stock" value="{{ ($current_product == '') ? old('stock') : $productRecord->stock }}" required />
                        @if ($errors->has('stock'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('stock') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" name="price" value="{{ ($current_product == '') ? old('price') : $productRecord->price }}" required>
                        @if ($errors->has('price'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="text_description" required>{{ ($current_product == '') ? old('text_description') : \App\Http\Models\ProductModel::objectCheck($productRecord, 'text_description')}}</textarea>
                    </div>
                    <div class="form-group">
                        @if(\App\Http\Models\ProductModel::objectCheck($productRecord,'main_image'))
                        <div class="row" style="margin-left: 10px">
                            <img src="{{ URL::asset('/images/products/'.\App\Http\Models\ProductModel::objectCheck($productRecord, 'main_image')) }}" width="400" />
                        </div>
                            <label>
                                <a href="javascript:void(0)" class="pickme">Change Featured Image</a>
                            </label>
                            <input type="file" name="main_image" />
                        @else
                            <label>Featured Image</label>
                            <input type="file" name="main_image" required />
                        @endif
                        @if ($errors->has('main_image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('main_image') }}</strong>
                            </span>
                        @endif
                    </div>
					<div class="form-group">
                        <label>Product Status</label>
                        <select class="form-control" name="product_status">
                            <option value="1" {{ (\App\Http\Models\ProductModel::objectCheck($productRecord,'product_status') == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (\App\Http\Models\ProductModel::objectCheck($productRecord,'product_status') == 0) ? 'selected' : '' }}>Deactivate</option>
                        </select> 
                    </div>

                    <button type="submit" class="btn btn-md bg-purple"><span>{{ ($title == 'Add' ? 'Save' : 'Update') }}</span></button>
                    <input type="hidden" name="product_id" value="{{$current_product}}" />
                    {{csrf_field()}}
                </form>
			 </div>
        </div> 
    </div>
</div>
@endsection