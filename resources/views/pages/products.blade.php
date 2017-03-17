@extends('layouts.index')
{{--Title refer to current page title which user viewing--}}
@section('title','Products')

@section('main-section')
<div class="row">
    <div class="col-xs-12 dashboard-header">
        <h1 class="dash-title">Products List</h1>
        <div class="breadcrumb">
            <a class="btn btn-md bg-purple" href="{{URL::route('add-product')}}">Add Shopping Product</a>
        </div>
    </div> 
</div> 
<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Products</h3>
                {{--Check If Session has any status message regarding update/delete of products --}}
                @if (Session::has('message'))
                    <div class="submit-msg">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="panel-body m-t-0">
                <div class="table-responsive">
                    <div id="product-list_wrapper" class="dataTables_wrapper no-footer">
                        <table id="product-list" class="table table-striped dataTable no-footer" role="grid"
                               aria-describedby="product-list_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="product-list"
                                    rowspan="1" colspan="1" style="width: 45px;" aria-sort="ascending"
                                    aria-label="#: activate to sort column descending">Product ID#
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 205px;"
                                    aria-label="Product Name: activate to sort column ascending">Serial Number
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 101px;"
                                    aria-label="Model: activate to sort column ascending">Product Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 134px;"
                                    aria-label="Quantity: activate to sort column ascending">Size
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 149px;"
                                    aria-label="Status: activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 101px;"
                                    aria-label="Price: activate to sort column ascending">Price
                                </th>
                                 <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 101px;"
                                    aria-label="Price: activate to sort column ascending">Image
                                </th>
                                 <th class="sorting" tabindex="0" aria-controls="product-list" rowspan="1"
                                    colspan="1" style="width: 101px;"
                                    aria-label="Price: activate to sort column ascending">Description
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 91px;"
                                    aria-label="Action">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--Check if products has then show--}}
                            @if(!empty($products))
                                @foreach($products as $productDetail)
                                    <tr role="row" class="">
                                    <td class="sorting_1">{{$productDetail->product_id}}</td>
                                    <td>{{$productDetail->serial_number}}</td>
                                    <td>{{$productDetail->product_name}}</td>
                                    <td>{{$productDetail->size}}</td>
                                    <td>@if(count($productDetail->stock) > 0) <span class="label label-success">In Stock</span>  @else
                                    <span class="label label-warning">Not available</span>  @endif </td>
                                    <td>${{$productDetail->price}}</td>
                                    <td><img src="{{ URL::asset('/images/products/'.$productDetail->main_image.'')}}" width="70px" /></td>
                                     <td>{{$productDetail->text_description}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ URL('/products/edit-product/'.$productDetail->product_id) }}" class="btn btn-xs btn-edit bg-purple hidden-xs hidden-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="{{ URL('/products/delete-product/'.$productDetail->product_id) }}" class="btn btn-delete btn-xs bg-red hidden-xs hidden-sm"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="btn-group table-editor visible-xs visible-sm">
                                             <button type="button"
                                                    class="btn bg-purple circle-xs dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <i class="fa fa-caret-down"></i></button>
                                            <ul class="dropdown-menu slidedown">
                                                <li><a href="{{ URL('/products/edit-product/'.$productDetail->product_id) }}"> Edit</a></li>
                                                <li><a href="{{ URL('/products/delete-product/'.$productDetail->product_id) }}"> Delete</a></li>
                                            </ul> <!-- /slidedown -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr role="row">
                                    <td align="center" colspan="9">No Product Found</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div> 
@endsection