<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_images';

	protected $fillable = [
	   'book_id', 'image','is_active'
	];

	public $timestamps = false;
}
