<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $guarded = array('id');
	protected $table = 'blog';
}