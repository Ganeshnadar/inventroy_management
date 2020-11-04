<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UuidTrait;

class Product extends Model
{

use SoftDeletes, UuidTrait;

/**
 * Indicates if the IDs are auto-incrementing.
 *
 * @var bool
 */
public $incrementing = false;

protected $keyType = "string";
protected $table = 'products';

/**
 * The attributes that should be cast to native types.
 *
 * @var array
 */
protected $casts = [
    'id'            => 'string',
    'name'          => 'string',
    'photo'         => 'string',
    'qty'           => 'integer',
    'category_id'   => 'string',
    'price'         => 'integer',
    'is_active'     => 'boolean'
];

protected $primaryKey = "id";

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
 protected $fillable = [
    'name', 'photo', 'qty', 'category_id', 'price', 'is_active'
];


/**
 * Get Category where this product Belongs
 */
public function category() {
    return $this->belongsTo(Category::class);
}

}
