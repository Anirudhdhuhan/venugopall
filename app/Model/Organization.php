<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Organization extends Model
{
	protected $guarded = array('id');
	protected $table = 'organization';
	public $timestamps = false;
}