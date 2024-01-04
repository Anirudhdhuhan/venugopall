<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $guarded = array('id');
	protected $table = 'gallery';
}	