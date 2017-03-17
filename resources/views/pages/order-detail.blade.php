@extends('layouts.index')

{{--Title refer to current page title which user viewing  --}}
@section('title','Order Detail')

@section('main-section')
<div class="panel panel-primary">
    <div class="panel-body">
        @if (Session::has('message'))
            <div class="submit-msg">{{ Session::get('message') }}</div>
        @endif
        <div class="row invoice-list">
            <div class="col-lg-4 col-sm-4">
                <div class="panel-heading"><h4>Order Info</h4></div>
                <ul class="list-unstyled no-padding">
                    <?php $orderDate = explode(' ', $orderDetail[0]->order_date); ?>
                    <li>Order Number : <strong>{{$orderDetail[0]->order_id}}</strong></li>
                    <li>Order Date : {{$orderDate[0]}}</li>
                    <li>Order Current Status : <span id="currentStatus">{{$orderDetail[0]->order_status}}<span></span></span></li>
                </ul>
            </div>
            <form method="post" action="{{ URL::to('/orders/update-order-status') }}">
                {{ csrf_field() }}
                <div class="col-lg-4 col-sm-4">
                    <div class="panel-heading"><h4>Change This Order State</h4></div>
                    <select name="order_status">
                        <option value="">Select Order Status</option>
                        <option value="Pending" {{ ($orderDetail[0]->order_status == 'Pending') ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="Completed" {{ ($orderDetail[0]->order_status == 'Completed') ? 'selected' : '' }}>
                            Completed
                        </option>
                    </select>
                    <button type="submit" class="btn btn btn-info btn-xs">Update Status</button>
                </div>
                	<input type="hidden" name="order_id" value="{{$orderDetail[0]->order_id}}"/>
            </form>
            <div class="col-lg-4 col-sm-4">
                <span id="spanOrderState" class="spanResut"
                      style="display:none;background-color:green;color:white;padding:5px 50px;position:relative;top:10px;"></span>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Item</th>
                <th></th>
                <th class="">Quantity</th>
                <th class="">Unit Cost</th>
                <th></th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($orderDetail))
                @foreach($orderDetail as $orderDetails)
                    <tr>
                        <td>{{$orderDetails->product_name}}</td>
                        <td></td>
                        <td class="">{{$orderDetails->quantity}}</td>
                        <td class="">{{$orderDetails->price}}</td>
                        <td></td>
                        <td>{{ $orderDetails->quantity * $orderDetails->price }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection