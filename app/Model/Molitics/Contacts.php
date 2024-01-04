<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'candidate_contacts';
}