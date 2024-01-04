<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $guarded = array('id');
	protected $table = 'position';
}