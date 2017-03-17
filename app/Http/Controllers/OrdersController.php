<?php

namespace App\Http\Controllers;

use App\Http\Models\OrdersModel;
use Illuminate\Http\Request;
use Redirect;

class OrdersController extends Controller
{
	 /**
	 * @this function is use to list all orders
     * @param none
     * @return returns view
     */
    public function orders_list()
    {
        $orders = OrdersModel::getAllOrders();
		return view('pages.orders')->with('orders', $orders);
    }
	/**
	 * @this function is use to view single order details
     * @param takes Request $request as parameter
     * @return returns view
     */
    public function order_detail(Request $request)
    {
        $order_id = $request->segment('3');
		$order_keeper = OrdersModel::getOrderDetail($order_id);
		if($order_keeper['code'] == 200)
        {
            $order_detail = $order_keeper['result'];
            return view('pages.order-detail')->with('orderDetail', $order_detail);
        }
        else
        {
           return redirect::to('/404');
        }
    }
	/**
	 * @this function is use to delete order
     * @param takes Request $request as parameter
     * @return redirects page
     */
    public function delete_order(Request $request)
    {
        $order_id = $request->segment('3');
		$status = OrdersModel::delOrder($order_id);
		return redirect::to('/orders')->withMessage($status['message']);
    }
	/**
	 * @this function is use to change order status
     * @param takes Request $request as parameter
     * @return redirects page
     */
    public function update_order_status(Request $request)
    {
        $data = $request->all();
		$order_id = $request['order_id'];
        $order_status = $request['order_status'];
		$status = OrdersModel::updateOrderStatus($order_id, $order_status);
		return Redirect::to('/orders/order-detail/'.$order_id.'')->withMessage($status['message']);
    }
}
