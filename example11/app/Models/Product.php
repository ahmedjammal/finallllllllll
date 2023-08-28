<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //  protected $table="my_products";
    use HasFactory;
    // protected $primaryKey='product_id';
    // protected $fillable=['product_name','product_price'];
    protected $guarded=[];
    // public $timestamps=false;

    function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function users()
    {
    return $this->belongsToMany(User::class,'order_user');
    }
}