<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class PressNotes extends Model
{
	protected $guarded = array('id');
	protected $table = 'press_notes';
}