<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $guarded = array('id');
	protected $table = 'user_video';
}
