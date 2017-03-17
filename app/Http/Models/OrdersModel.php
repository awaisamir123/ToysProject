<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrdersModel extends Model
{
	/**
	 * @desc this function is use to get all orders
     * @param  none
     * @return return result as array
     */
    public static function getAllOrders()
    {
        $result = DB::table('orders')
            ->get()->all();
		return $result;
    }
/**
	 * @desc this function is use to get single order detail
     * @param takes order id as parameter
     * @return return result as array / error meessage
     */
    public static function getOrderDetail($order_id)
    {
        $order_has = OrdersModel::getOrderCount($order_id);
		if($order_has != '') {
            $result = DB::table('orders as or')
                ->join('order_item as ori', 'ori.order_id', '=', 'or.order_id')
                ->leftJoin('products as pro', 'pro.product_id', '=', 'ori.product_id')
                ->where('or.order_id', $order_id)
                ->get()->all();

            $statusData = array(
                'code' => '200',
                'result' => $result
            );
        }
        else
        {
            $statusData = array(
                'code' => '404',
                'Message' => 'Order not exist'
            );
        }
		return $statusData;
    }
	/**
	 * @desc this function is use to delete order
     * @param  takes order id as paramter
     * @return return statusData array as success / error messge 
     */
    public static function delOrder($order_id)
    {
        $order_status = OrdersModel::getOrderCount($order_id);
        if($order_status != '') {
            $result = DB::table('orders')
                ->where('order_id', $order_id)
                ->delete();

            if($result > 0)
            {
                $result = DB::table('order_item')
                    ->where('order_id', $order_id)
                    ->delete();

                if($result > 0)
                {
                    $statusData = array(
                        'code' => '200',
                        'message' => 'Order deleted successfully'
                    );
                }
            }
            else
            {
                $statusData = array(
                    'code' => '403',
                    'message' => 'Problem in order deletion.'
                );
            }
        }
        else{
            $statusData = array(
                'code' => '404',
                'message' => 'Order Not found'
            );
        }
        return $statusData;
    }
	/**
	 * @desc this function is use to update order status
     * @param  takes order id and order status to be change as parameter
     * @return return statusData array as success / error messge 
     */
    public static function updateOrderStatus($order_id, $order_status)
    {
        $order_count = OrdersModel::getOrderCount($order_id);
		$data = array('order_status' => $order_status);

        if($order_count != '') {
            if($order_status != '')
            {
                $result = DB::table('orders')
                    ->where('order_id', $order_id)
                    ->update($data);

                if($result > 0)
                {
                    $statusData = array(
                        'code' => '200',
                        'message' => 'Status Updated successfully to '.$order_status
                    );
                }
                else
                {
                    $statusData = array(
                        'code' => '403',
                        'message' => 'Status not update. Note: update only happened when status change.'
                    );
                }
            }
            else
            {
                $statusData = array(
                    'code' => '200',
                    'message' => 'Status must not be empty'
                );
            }
		}
        else{
            $statusData = array(
                'code' => '404',
                'message' => 'Order not found'
            );
        }
        return $statusData;
    }
	/**
	 * @desc this function is use to get order couts
     * @param  takes order id as parameter
     * @return return query result
     */
    public static function getOrderCount($id)
    {
        $result = DB::table('orders')->where('order_id', $id)->count();
		 return $result;
    }
}
