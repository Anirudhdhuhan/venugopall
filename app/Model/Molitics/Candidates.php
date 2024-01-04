<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'candidates';
}