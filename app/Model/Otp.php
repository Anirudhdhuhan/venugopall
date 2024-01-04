<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
	protected $guarded = array('id');
	protected $table = 'otp';
}