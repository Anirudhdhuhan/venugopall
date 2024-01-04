<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'candidate_issues';
}