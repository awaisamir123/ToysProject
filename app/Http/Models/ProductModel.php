<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
	/**
	 * @desc this function is use to add / edit product
     * @param  takes three parameters
     * @return return statusData array  
     */
    public static function addEditProducts($data, $image, $product_id = '')
    {
        if($product_id == '')
        {
            $operation = DB::table('products')->insert($data);
            if ($operation > 0) {
                $product_id = DB::getPdo()->lastInsertId();
                $image_status = ProductModel::fileUpload($image);

                if($image_status['status_code'] == 200)
                {
                    $image_status = $image_status['file'];
					$operation = DB::table('products')
                        ->where('product_id', $product_id)
                        ->update(
                            array(
                                'main_image' => $image_status
                            )
                        );
					$statusData = array(
                        "status_code" => 200,
                        "status_message" => "Product created successfully",
                        "redirect" => 'products/edit-product/'.$product_id
                    );
                }
                else
                {
                    $statusData = array(
                        "status_code" => 403,
                        "status_message" => "Problem in Product creation",
                        "redirect" => 'products-list',
                    );
                }
            }
        }
        else
        {
            $operation = DB::table('products')
                ->where('product_id', $product_id)
                ->update($data);

                if($image) {
                    $image_status = ProductModel::fileUpload($image);
                    $image_status = $image_status['file'];
                    $operation = DB::table('products')
                        ->where('product_id', $product_id)
                        ->update(
                            array(
                                'main_image' => $image_status
                            )
                        );
                }
            if ($operation > 0) {
                $statusData = array(
                    "status_code" => 200,
                    "status_message" => "Data updated. ",
                    "redirect" => 'products/edit-product/'.$product_id
                );
            }
            else
            {
                $statusData = array(
                    "status_code" => 403,
                    "status_message" => "Data not updated. Check if you change any new update.",
                    "redirect" => 'products/edit-product/'.$product_id
                );
            }
        }
        return $statusData;
    }
	/**
	 * @desc this function is use to add / edit product
     * @param  takes product id alias id as parameter 
     * @return return statusData array as message  
     */
    public static function getProductDetail($id)
    {
        $record_has = ProductModel::totalProduct($id);
        if($record_has != '') {
            $result = DB::table('products')
                ->where('product_id', $id)
                ->get()->all();

            $statusData = array(
                'code' => 200,
                'result' => $result
            );
        }
        else
        {
            $statusData = array(
                'code' => 404,
                'Message' => 'Product not exist.'
            );
        }
		 return $statusData;
	 }

    public static function delProduct($id)
    {
        $status = ProductModel::totalProduct($id);
        if($status != '') {
            $result = DB::table('products')
                ->where('product_id', $id)
                ->delete();

            if($result == 1)
            {
                $statusData = array(
                    'code' => '200',
                    'message' => 'Product deleted successfully.'
                );
            }
            else
            {
                $statusData = array(
                    'code' => '403',
                    'message' => 'Problem in product deletion.'
                );
            }
        }
        else{
            $statusData = array(
                'code' => '404',
                'message' => 'Desired Product Not found.'
            );
        }
        return $statusData;
    }
	/**
	 * @desc this function is use to upload image file
     * @param  takes $file as parameter
     * @return return statusData array as message  
     */
    public static function fileUpload($files)
    {
        $ufcDateTime = date('ymdhis');
        $statusData = array();

        $fileResult = '';
        $result = '';
        if($files) {
            $file_count = count($files);

            $uploadcount = 0;
            if($file_count > 1) {
                foreach ($files as $file) {
                    $destinationPath = $tempRealPath = ProductModel::tempRealPath() . '/images/products';
                    $filename = $file->getClientOriginalName();
                    $fileNameModified = str_replace(' ', '-', strtolower($ufcDateTime . $filename));
                    $upload_success = $file->move($destinationPath, $fileNameModified);
                    $uploadcount++;
                    $fileNames[] = $fileNameModified;
                }
            }
            else
            {
                $destinationPath = $tempRealPath = ProductModel::tempRealPath() . '/images/products';
                $filename = $files->getClientOriginalName();
                $fileNameModified = str_replace(' ', '-', strtolower($ufcDateTime . $filename));
                $upload_success = $files->move($destinationPath, $fileNameModified);
            }

            if($uploadcount == $file_count && $file_count >1){
                $statusData = array(
                    "status_code" => 200,
                    "status_msg" => "File Uploaded",
                    "files" => $fileNames
                );
            }
            elseif($upload_success){
                $statusData = array(
                    "status_code" => 200,
                    "status_msg" => "File Uploaded",
                    "file" => $fileNameModified
                );
            }
            else {
                $statusData = array(
                    "status_code" => 403,
                    "status_msg" => "File not uploaded"
                );
            }

        } 
        return $statusData;
    }
	
    public static function tempRealPath()
    {
        return realpath(base_path().'/../');
    }
	/**
	 * @desc this function is use to get all products
     * @param  none
     * @return returns query result
     */
    public static function getAllProducts()
    {
        $result = DB::table('products')->get()->all();
		return $result;
    }
	/**
	 * @desc this function is use to get products count
     * @param  product id as parameter
     * @return returns query result
     */
    public static function totalProduct($id)
    {
        $result = DB::table('products')->where('product_id', $id)->count();
		return $result;
    }
	
    public static function objectCheck($variable, $name)
    {
        $value = (isset($variable->$name) && $variable->$name != '') ? $variable->$name : '';
        return $value;
    }
}
