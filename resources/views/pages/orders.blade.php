@extends('layouts.index')

{{--Title refer to current page title which user viewing--}}
@section('title','Orders')

@section('main-section')
<div class="row">
    <div class="col-xs-12 dashboard-header">
        <h1 class="dash-title">Orders List</h1>
    </div> 
</div> 
<div class="row">
     <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Orders</h3>
                {{--Check If Session has any status message regarding update/delete of orders --}}
                @if (Session::has('message'))
                    <div class="submit-msg">{{ Session::get('message') }}</div>
                @endif
            </div>
            <div class="panel-body m-t-0">
                <div class="table-responsive">
                    <div id="order-table_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dataTables_length" id="order-table_length">
                            <label>Show 
                                <select name="order-table_length" aria-controls="order-table" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                 </select> 
                                 entries
                            </label>
                        </div>
                        <table id="order-table" class="table table-striped dataTable no-footer" role="grid"
                               aria-describedby="order-table_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="order-table" rowspan="1"
                                    colspan="1" style="width: 23px;" aria-sort="ascending"
                                    aria-label="#: activate to sort column descending">Order ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1"
                                    colspan="1" style="width: 105px;"
                                    aria-label="Reference: activate to sort column ascending">Order Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1"
                                    colspan="1" style="width: 143px;"
                                    aria-label="Customer: activate to sort column ascending">Order Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="order-table" rowspan="1"
                                    colspan="1" style="width: 101px;"
                                    aria-label="Delivery: activate to sort column ascending">Total Amount
                                </th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 64px;"
                                    aria-label="Action">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--Check if orders has then show--}}
                            @if(!empty($orders))
    						@foreach($orders as $orderDetail)
                                <?php $orderDate = explode(' ',$orderDetail->order_date); ?>
                                <tr role="row">
                                <td class="sorting_1">{{ $orderDetail->order_id }}</td>
                                <td>{{  $orderDate[0] }}</td>
                                <td>{{ $orderDetail->order_status }}</td>
                                <td>${{ $orderDetail->order_total }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-edit bg-purple hidden-xs hidden-sm" href="{{ URL('/orders/order-detail/'.$orderDetail->order_id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="btn btn-delete btn-xs bg-red hidden-xs hidden-sm" href="{{ URL('/orders/delete-order/'.$orderDetail->order_id) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="btn-group table-editor visible-xs visible-sm">
                                       <button type="button" class="btn bg-purple circle-xs dropdown-toggle" data-toggle="dropdown">
                                       <i class="fa fa-caret-down"></i>
                                       </button>
                                        <ul class="dropdown-menu slidedown">
                                            <li><a href="{{ URL('/orders/order-detail/'.$orderDetail->order_id) }}"> View</a></li>
                                            <li><a href="{{ URL('/orders/delete-order/'.$orderDetail->order_id) }}"> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr role="row">
                                    <td align="center" colspan="5">No Order Found</td></tr>
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