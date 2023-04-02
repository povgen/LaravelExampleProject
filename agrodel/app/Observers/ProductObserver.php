<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    protected function setSlug(Product $product) 
    {
        if (empty($product->slug)) {
            $slug = str_slug($product->title);
            $i = 1;                

            if (!empty(Product::where('slug', $slug)->first())) {
                while (!empty(Product::where('slug', $slug.$i)->first())) 
                    $i++;
                $slug .= $i;
            }

            $product->slug = $slug;
        }
        if(!empty($product['availabl']))
            $product['availabl'] = 1;
        else
            $product['availabl'] = 0;

    }



    public function creating(Product $product)
    {
        $this->setSlug($product);
    }

    public function created(Product $product)
    {
        //
    }

    public function updating(Product $product)
    {
        $this->setSlug($product);
    }


    public function updated(Product $product)
    {
        if ($product->isDirty('image_url')) {
            $oldImghUrl = $product->getOriginal()['image_url'];

            $arr = explode('/',$oldImghUrl);
            $fileName = array_pop($arr);
            Storage::disk('public')->delete('/uploads/'.$fileName);
        }
    }

    /**
     * Handle the product  "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {

        //Удаление изображения, но пока закоментил т.к. иначе товар при восстановлении будет без картинки

        // $arr = explode('/',$product->image_url);
        // $fileName = array_pop($arr);
        // Storage::disk('public')->delete('/uploads/'.$fileName);
    }


}
