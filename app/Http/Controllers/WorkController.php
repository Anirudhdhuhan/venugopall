<?php
namespace App\Http\Controllers;

use URL;
use View;
use Request;
use stdclass;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;

use DB;
use App\Model\Works;
use App\Model\WorkArea;
use App\Model\WorkType;
use App\Model\WorkDivision;

class WorkController extends Controller
{
	public function __construct()
	{
		// 
	}

	public function getWorks()
	{
		$area = WorkArea::get();
		$type = WorkType::get();
		$division = WorkDivision::get();

		$works = Works::select('id', 'title', 'description', 'work_area', 'work_type', 'work_devision', 'images', 'posted_by', 'date','position','mp_fund');
		if(Input::get('area') && Input::get('area')!=3)
		{
			$works->where('work_area', '=', Input::get('area'));
		}
		if(Input::get('type'))
		{
			$works->where('work_type', '=', Input::get('type'));
		}
		if(Input::get('division'))
		{
			$works->where('work_devision', '=', Input::get('division'));
		}
		if(Input::get('area')==3)
		{
			$works->where('mp_fund', '=', 1);
		}

		$works = $works->orderBy('position','asc')->get();
		foreach($works as $row)
		{
			$images_array = array();
			if($row->images)
			{
				foreach(explode(',', $row->images) as $img)
				{
					$img = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $img;
					$images_array[] = $img;
				}
			}
			$row->images = isset($images_array[0]) ? $images_array[0] : '';
		}

		if(Input::get('ajax-filter'))
		{
			return view('includes.works_partials', array('works' => $works));
		}
		return View::make('work-list', array('works' => $works, 'area' => $area, 'type' => $type, 'division' => $division));
	}

	public function workDetails($id)
	{
		$work = Works::where('id', '=', $id)->firstorfail();
		$images_array = array();
		if($work->images)
		{
			foreach(explode(',', $work->images) as $row)
			{
				$row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
				$images_array[] = $row;
			}
		}
		
		$work->images = $images_array;
		return View::make('complete-work-detail', array('work' => $work));
	}

	public function allWorkers()
	{
		$team = DB::table('team as tm')->leftjoin('position as po','po.id','=','tm.position')->select('tm.*','po.title');
		$team = $team->paginate(9);
		$images_array = array();
	
		foreach($team as $row)
		{
			$row->image = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->image;
			$images_array[] = $row->image;
		}
		
		return View::make('workers',array('team' => $team));
	}
}