<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UuidTrait;

class Category extends Model
{
    use SoftDeletes, UuidTrait;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $primaryKey = "id";

    protected $keyType = "string";
    // protected $table = 'categories';


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'string',
        'name'  =>  'string',
        'slug'  =>  'string',
    ];
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'slug'
    ];
    

    /**
     * Each category has many products
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

}
