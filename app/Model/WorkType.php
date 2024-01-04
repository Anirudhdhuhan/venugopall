<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
	protected $guarded = array('id');
	protected $table = 'work_type';
}