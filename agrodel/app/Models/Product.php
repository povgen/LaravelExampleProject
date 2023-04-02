<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductCategory;


class Product extends Model
{
     use SoftDeletes;

    protected $fillable
    	= [
    		'title',
    		'slug',
    		'category_id',
    		'description',
    		'vendor_code',
    		'image_url',
    		'price',
    		'availabl',
    	];

    public function category() 
    {
        return $this->belongsTo(ProductCategory::class)->withTrashed();
    }

    // public function category()
    // {
    //     $category = $this->belongsTo(ProductCategory::class);
    //     if (empty($category->title)) {
    //         $item = $this->belongsTo(ProductCategory::class)->withTrashed();
    //         // dd($this->_category());
    //         $item->title = "категория удалена";
    //         return $item ;
    //     } 


    //     return $category;
    // }
}
