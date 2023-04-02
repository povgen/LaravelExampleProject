<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use SoftDeletes;

    protected $fillable
    	= [
    		'title',
    		'slug',
    		'parent_id',
    		'description',
    	];

    public function parentCategory()
    {
    	return $this->belongsTo(ProductCategory::class, 'parent_id', 'id')->withTrashed();
    }

    public function childCategory() {
        return ProductCategory::where('parent_id', $this->id)->get();
    }

    public function isChild($childCategory) {
        if ($childCategory->parent_id == 0)
            return false;
        elseif($childCategory->parentCategory->id == $this->id) {
            return true;
        } else {
            return $this->isChild($childCategory->parentCategory);
        }
    }

    public function getWay() {
        $item = $this;
        $arr = [
            $item
        ];
        while ($item->parent_id != 0) {
            $item = $item->parentCategory;
            array_push($arr, $item);
        }
        return array_reverse ($arr);
    }
}
