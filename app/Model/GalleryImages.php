<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
	protected $guarded = array('id');
	protected $table = 'gallery_images';
}