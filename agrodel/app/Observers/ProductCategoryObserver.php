<?php

namespace App\Observers;

use App\Models\ProductCategory;

class ProductCategoryObserver
{
    protected function setSlug(ProductCategory $productCategory) 
    {
        if (empty($productCategory->slug)) {
            $slug = str_slug($productCategory->title);
            $i = 1;                

            if (!empty(ProductCategory::where('slug', $slug)->withTrashed()->first())) {
                while (!empty(ProductCategory::where('slug', $slug.$i)->withTrashed()->first())) 
                    $i++;
                $slug .= $i;
            }

            $productCategory->slug = $slug;
        }
    }

    public function creating(ProductCategory $productCategory)
    {
        $this->setSlug($productCategory);
    }

    public function updating(ProductCategory $productCategory)
    {
        $this->setSlug($productCategory);
    }



    /**
     * Handle the product category "created" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function created(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "updated" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function updated(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "deleted" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function deleted(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "restored" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function restored(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Handle the product category "force deleted" event.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return void
     */
    public function forceDeleted(ProductCategory $productCategory)
    {
        //
    }
}
