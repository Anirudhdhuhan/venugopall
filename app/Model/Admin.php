<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $guarded = array('id');
	protected $table = 'admin';
}
