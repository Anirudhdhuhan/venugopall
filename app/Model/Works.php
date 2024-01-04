<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
	protected $guarded = array('id');
	protected $table = 'works';
	public $timestamps = true;
}