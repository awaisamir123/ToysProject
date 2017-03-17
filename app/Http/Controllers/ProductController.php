<?php

namespace App\Http\Controllers;
use App\Http\Models\ProductModel;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class ProductController extends Controller
{
    /**
	 * @this function is use to show add / edit product view
     * @params takes Request $request as parameter
     * @return returns view
     */
    public function add_edit_product(Request $request)
    {
        $product = $request->segment(3);
		$title = ($request->is('products/add-product'))? 'Add':'Edit';
        $productRecordStatus = ProductModel::getProductDetail($product);
        $productRecord = array();
        if($productRecordStatus['code'] == 200)
        {
            $productRecord = $productRecordStatus['result'][0];
        }
		$dataToView['title'] = $title . ' Product';
        $dataToView['current_product'] = $product;
		return view('pages.add-edit-product', $dataToView)->with('productRecord', $productRecord);
    }

    /**
	 * @this function is use to add / update product
     * @param Request $request
     * @return redirects page 
     */
    public function product_store(Request $request)
    {
        $data = $request->except('_token');
		$rule = array(
            'product_name' => 'required',
            'serial_number' => 'required',
            'size' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'text_description' => 'required',
            'product_status' => 'required',
        );
		$data = $request->except(array('_token', 'main_image', 'product_id'));
        $image = $request->file('main_image');
		$product_id = $request->input('product_id');
		
		$validator = Validator::make($data, $rule);
		if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        else {
            $statusData = ProductModel::addEditProducts($data, $image, $product_id);

            if($statusData['status_code'] == 200)
            {
                return Redirect::to($statusData['redirect'])
                    ->withMessage($statusData['status_message']);
            }
            else
            {
                return Redirect::to($statusData['redirect'])
                    ->withMessage($statusData['status_message']);
            }
		}
    }

    /**
	 * @this function is use to delete product
     * @param takes Request $request as parameter
     * @return returns view
     */
    public function delete_product(Request $request)
    {
        $product_id = $request->segment('3');
		$status = ProductModel::delProduct($product_id);

        return Redirect::route('products-list')
            ->withMessage($status['message']);
    }

    /**
	 * @this function is use for product listing
	 *param takes no parameter
     * @return $this (Products Page view with products list from database)
     */
    public function show()
    {
        $products = ProductModel::getAllProducts();
        return view('pages.products')->with('products', $products);
    }

}
