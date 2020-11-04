<?php

namespace App\Repositories;
use App\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{

    /**
    * 
    */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
    * 
    */
    public function allCategory(){
        return Category::latest()->paginate(5);
    }

    /**
    * 
    */
    public function save(array $data)
    {
        $form_data = array(
            'name'       =>   $data['category_name'],
            'slug'       =>   $data['category_slug']
        );

        $categorySave = Category::create($form_data);
        return $categorySave;
    }

    /**
    * 
    */
    public function update($id, array $data)
    {
        $form_data = array(
            'name'       =>   $data['category_name'],
            'slug'       =>   $data['category_slug']
        );

        return Category::whereId($id)->update($form_data);  
        
    }

        /**
    * 
    */
    public function delete($id)
    {
        $data = Category::findOrFail($id);
        return $data->delete();

    }


}