<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Bearers extends Model
{
	protected $guarded = array('id');
	protected $table = 'bearers';
}