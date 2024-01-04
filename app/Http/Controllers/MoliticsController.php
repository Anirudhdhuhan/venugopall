<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Model\Molitics\Events;

use Validator;
use stdclass;
use Response;
use View;
use Hash;
use DB;
use App;

class MoliticsController extends Controller
{
	public function __construct()
	{
		//
	}

	public function event()
	{
		dd(Events::all());
	}

	public function pictureForm()
	{
		return View::make('demo_upload');
	}

	public function pictureUpload()
	{
		$file = Input::file('file');
		$name = $file->getClientOriginalName();
		$path = $file->getRealPath();
		$ext = getExtension($name);
		$new_name = "1189_".time();
		$imgn = $new_name . "." . $ext;
		$file->move(TEMP_IMAGE_PATH,$imgn);

		$s3 = App::make('aws')->createClient('s3');
		$output = $s3->putObject(array(
						'Bucket'     	=> S3_BUCKET,
						'Key'        	=> PHOTO_GALLERY . '/' . $imgn,
						'SourceFile' 	=> TEMP_IMAGE_PATH . '/' . $imgn,
						'ACL'        	=> 'public-read',
						'CacheControl' 	=> 'max-age=' . S3_IMAGES_CACHE_TIME,
					));
	}
}