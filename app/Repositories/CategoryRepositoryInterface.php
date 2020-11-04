<?php 

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function find($id);

    public function allCategory();
    
    public function save(array $data);
    
    public function update($id, array $data);
    
    public function delete($id);
}