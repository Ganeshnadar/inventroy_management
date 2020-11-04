<?php 

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function find($id);

    public function allProduct();

    public function allCategory();
    
    public function save(array $data);
    
    public function update($id, array $data);
    
    public function delete($id);
}