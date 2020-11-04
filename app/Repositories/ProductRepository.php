<?php

namespace App\Repositories;
use App\Product;
use App\Category;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface{

    /**
    * 
    */
    public function find($id)
    {
        return Product::findOrFail($id);
    }

    /**
    * 
    */
    public function allProduct(){
        return Product::latest()->with('category')->paginate(5);
    }

        /**
    * 
    */
    public function allCategory(){
        return Category::all();
    }

    /**
    * 
    */
    public function save(array $data)
    {
        $image = $data['image'];
        $product_status = ($data['product_status'] == 'on')? true : false;

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'name'          =>   $data['product_name'],
            'photo'         =>   $new_name,
            'qty'           =>   $data['product_quantity'],
            'category_id'   =>   $data['category'],
            'price'         =>   $data['product_price'],
            'is_active'     =>   $product_status,
        );

        return Product::create($form_data);
    }

    /**
    * 
    */
    public function update($id, array $data)
    {
        $new_name = $data['hidden_image'];
        $product_status = ($data['product_status'] == 'on')? true : false;

        if(isset($data['image']) && $data['image'] != ''){
            $image = $data['image'];
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        }

        $form_data = array(
            'name'          =>   $data['product_name'],
            'photo'         =>   $new_name,
            'qty'           =>   $data['product_quantity'],
            'category_id'   =>   $data['category'],
            'price'         =>   $data['product_price'],
            'is_active'     =>   $product_status,
        );
  
        return Product::whereId($id)->update($form_data);
        
    }

        /**
    * 
    */
    public function delete($id)
    {
        $data = Product::findOrFail($id);
        return $data->delete();

    }


}