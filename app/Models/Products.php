<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name',
        'variants',
        'product_categories',
        'product_images'
    ];

    public function gambar()
    {
         // jika ada data dari product_images dan juga file yang di folder public images books itu ada
        // yang sesuai dengan namanya
        // maka kita akan memangiil file nya di dalam image book nama foto

        if ($this->product_images && file_exists(public_path('/uploads/products/' . $this->product_images))) {
            return asset('/uploads/products/' . $this->product_images);
        } else {
            return asset('/uploads/products/no_image.png');
        }
    }

    public function hapusgambar()
    {
        if ($this->product_images && file_exists(public_path('image/books' . $this->product_images))) {
            return unlink('/uploads/products' . $this->product_images);
        }
    }


}
