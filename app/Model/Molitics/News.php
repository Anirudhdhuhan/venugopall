<?php
namespace App\Model\Molitics;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $connection = 'molitics';
	protected $guarded = array('id');
	protected $table = 'news_feed';
}