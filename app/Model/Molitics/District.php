<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'state_district_mapping';
}