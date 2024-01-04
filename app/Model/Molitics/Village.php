<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'village_mla_mapping';
}