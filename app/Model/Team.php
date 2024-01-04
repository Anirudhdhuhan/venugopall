<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $guarded = array('id');
	protected $table = 'team';
}