@extends('layouts.index')
@section('title','Toys')
@section('main-section')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sale-bar">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="pull-left">Dashboard</h3>
            </div> 
            <div class="panel-body dashboard-panel m-t-10">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 stat-item">
                    <div class="panel">
                        <div class="panel-body dashboard-panel">
                            <div class="col-xs-9 left-content no-padding pull-left">
                                <h2>Total Orders</h2>
                                <div class="statistics" data-from="0" data-to="" data-speed="2500"
                                     data-refresh-interval="50">
                                    @php echo DB::table('orders')->count(); @endphp
                                </div>
                            </div>
                            <div class="col-xs-3 right-content no-padding pull-right">

                            </div>
                        </div> 
                        <div class="panel-footer">
                            <div class="date"></div>
                            <div class=""></div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 stat-item">
                    <div class="panel">
                        <div class="panel-body dashboard-panel">
                            <div class="col-xs-9 left-content no-padding pull-left">
                                <h2>Total Products</h2>
                                <div class="statistics" data-from="0" data-to="" data-speed="2500"
                                     data-refresh-interval="50">
                                    @php echo DB::table('products')->count(); @endphp
                                </div>
                            </div>
                            <div class="col-xs-3 right-content no-padding pull-right">

                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="date"></div>
                            <div class=""></div>
                        </div>
                    </div>
                </div>
             </div> 
        </div> 
    </div> 
</div> 
@endsection
