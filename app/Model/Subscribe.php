<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
	protected $guarded = array('id');
	protected $table = 'subscribe';
}