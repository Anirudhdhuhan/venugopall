<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Model\Blog;
use App\Model\Team;
use App\Model\Works;
use App\Model\Admin;
use App\Model\Gallery;
use App\Model\Position;
use App\Model\WorkArea;
use App\Model\WorkType;
use App\Model\PressNotes;
use App\Model\PatraVahar;
use App\Model\YoutubeURL;
use App\Model\WorkDivision;
use App\Model\GraduateVoter;
use App\Model\PressCoverage;
use App\Model\GalleryImages;
use App\Model\CulturalEvent;
use App\Model\Organization;
use App\Model\Molitics\Issues;
use App\Model\Molitics\Contacts;
use DB;
use App;
use View;
use Validator;
use Response;

class AdminController extends Controller {

    public function __construct() {
        $this->leader_id = config('user.candidate_id');
        $this->middleware('adminuser', array('on', array('post', 'get'), 'except' => array('index', 'getAdmin', 'getRegister', 'postRegister', 'postLogin', 'getLogout', 'allImages', 'uploadImages', 'gallary', 'makeCover', 'deleteImage', 'deleteGallery', 'editGallery')));
    }

    function BuildWhere($modifier = array()) {
        if (isset($_REQUEST['filterscount'])) {
            $filterscount = $_REQUEST['filterscount'];
            if ($filterscount > 0) {
                $where = " WHERE (";
                $tmpdatafield = "";
                $tmpfilteroperator = "";
                for ($i = 0; $i < $filterscount; $i++) {
                    $filtervalue = addslashes($_REQUEST["filtervalue" . $i]);
                    if ($filtervalue == 'true' or $filtervalue == 'false') {
                        $filtervalue = filter_var($filtervalue, FILTER_VALIDATE_BOOLEAN);
                    }

                    $filtercondition = $_REQUEST["filtercondition" . $i];
                    $filterdatafield = $_REQUEST["filterdatafield" . $i];

                    if (array_key_exists($filterdatafield, $modifier)) {
                        $filterdatafield = $modifier[$filterdatafield];
                    }

                    $filteroperator = $_REQUEST["filteroperator" . $i];
                    if ($tmpdatafield == "") {
                        $tmpdatafield = $filterdatafield;
                    } else if ($tmpdatafield <> $filterdatafield) {
                        $where .= ")AND(";
                    } else if ($tmpdatafield == $filterdatafield) {
                        if ($tmpfilteroperator == 0)
                            $where .= " AND ";
                        else
                            $where .= " OR ";
                    }

                    switch ($filtercondition) {
                        case "CONTAINS":
                            $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "%'";
                            break;

                        case "SECRET_EQUAL":
                            $where .= " id ='" . Common::getDecode_hash_id($filtervalue) . "' ";
                            break;

                        case "DOES_NOT_CONTAIN":
                            $where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue . "%'";
                            break;

                        case "EQUAL":
                            $where .= " " . $filterdatafield . " = '" . $filtervalue . "'";
                            break;

                        case "NOT_EQUAL":
                            $where .= " " . $filterdatafield . " <> '" . $filtervalue . "'";
                            break;

                        case "GREATER_THAN":
                            $where .= " " . $filterdatafield . " > '" . $filtervalue . "'";
                            break;

                        case "LESS_THAN":
                            $where .= " " . $filterdatafield . " < '" . $filtervalue . "'";
                            break;

                        case "GREATER_THAN_OR_EQUAL":
                            $where .= " " . $filterdatafield . " >= '" . $filtervalue . "'";
                            break;

                        case "LESS_THAN_OR_EQUAL":
                            $where .= " " . $filterdatafield . " <= '" . $filtervalue . "'";
                            break;

                        case "STARTS_WITH":
                            $where .= " " . $filterdatafield . " LIKE '" . $filtervalue . "%'";
                            break;

                        case "ENDS_WITH":
                            $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "'";
                            break;
                    }
                    if ($i == $filterscount - 1) {
                        $where .= ")";
                    }

                    $tmpfilteroperator = $filteroperator;
                    $tmpdatafield = $filterdatafield;
                }
                return $where;
            }
        }
    }

    public function getHome() {
        $gallery_count = Gallery::count();
        $images_count = GalleryImages::count();
        $video_count = YoutubeURL::count();
        return view('admin.home', array('gallery_count' => $gallery_count, 'images_count' => $images_count, 'video_count' => $video_count));
    }

    public function index() {
        return view('admin.admin');
    }

    public function postLogin() {
        $validator = Validator::make(Input::all(), [
                    'email' => 'required',
                    'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('admin')->withErrors($validator)->withInput();
        } else {
            $admin_user = Admin::where('email', '=', Input::get('email'))
                    ->where('password', '=', Input::get('password'))
                    ->first();

            if ($admin_user) {
                Session::put('admin_user', $admin_user->name);
                Session::get('admin_user');
                return redirect('/admin/home');
            } else {
                return redirect('admin')->withInput()->with('error', 'Incorrect Email or Password.');
            }
        }
    }

    public function getGallary() {
        $allGalleries = Gallery::orderBy('id', 'DESC')->get();
        foreach ($allGalleries as $row) {
            $date = $row->updated_at->format('Y-m-d H:i:s');
            $row->date = action_time($date);

            $row->cover = $row->cover ? S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->cover : DUMMY_GALLERY_IMAGE;
            unset($row->updated_at);
            unset($row->created_at);
        }
        return View::make('admin.photo_gallery', array('allGalleries' => $allGalleries));
    }

    public function gallary($id = null) {
        if ($id)
            $images = Gallery::findorfail($id);
        else
            $images = new Gallery;

        $images->name = Input::get('name');
        $images->published = Input::get('published');
        $images->save();

        $allGalleries = Gallery::orderBy('id', 'DESC')->get();
        dd($allGalleries);
        foreach ($allGalleries as $row) {
            $date = $row->updated_at->format('Y-m-d H:i:s');
            $row->date = action_time($date);

            $row->cover = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->cover;
            unset($row->updated_at);
            unset($row->created_at);
        }

        return view('admin.home', array('allGalleries' => $allGalleries));
    }

    public function editGallery() {
        $gallery = Gallery::where('id', '=', Input::get('gallery_id'))->first();
        return view('admin.edit_gallery', array('gallery' => $gallery));
    }

    public function galleryImages($id) {
        $images = GalleryImages::where('gallery', '=', $id)->get();
        foreach ($images as $row) {
            $row->image = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->image;
        }

        return view('admin.gallery_images', array('images' => $images, 'id' => $id));
    }

    public function uploadImages($id) {
        $files = Input::file('images');
        $file_count = count($files);
        $uploadcount = 0;
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $path = $file->getRealPath();
            $ext = getExtension($name);
            $new_name = "1189_" . $id . "_" . str_random(4) . time();
            $imgn = $new_name . "." . $ext;
            $file->move(TEMP_IMAGE_PATH, $imgn);

            $s3 = App::make('aws')->createClient('s3');
            $output = $s3->putObject(array(
                'Bucket' => S3_BUCKET,
                'Key' => PHOTO_GALLERY . '/' . $imgn,
                'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                'ACL' => 'public-read',
                'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
            ));
            $image = new GalleryImages;
            $image->name = '';
            $image->image = $imgn;
            $image->gallery = $id;
            $image->save();
            unlink(TEMP_IMAGE_PATH . '/' . $imgn);
        }
        return redirect('/admin/gallery/' . $id);
    }

    public function makeCover() {
        $image = Input::get('image');
        $gallery = Input::get('gallery');

        $image = GalleryImages::find($image);
        $gallery = Gallery::find($gallery);

        $gallery->cover = $image->image;
        $gallery->save();
        return;
    }

    public function deleteImage() {
        $image = GalleryImages::find(Input::get('image'));
        $s3 = App::make('aws')->createClient('s3');
        $s3->deleteMatchingObjects(S3_BUCKET, PHOTO_GALLERY . '/' . $image->image);
        $image->delete();
        return;
    }

    public function deleteGallery() {
        $image = GalleryImages::where('gallery', '=', Input::get('image'))->get();
        foreach ($image as $row) {
            $s3 = App::make('aws')->createClient('s3');
            $s3->deleteMatchingObjects(S3_BUCKET, PHOTO_GALLERY . '/' . $row->image);
            $row->delete();
        }

        $gallery = Gallery::find(Input::get('image'));
        $gallery->delete();
        return;
    }

    public function getLogout() {
        Session::forget('admin_user');
        return redirect('/admin');
    }

    public function getWorks() {
        $area = WorkArea::get();
        $type = WorkType::get();
        $division = WorkDivision::get();
        $position = array(
            '' => 'Select display position',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
        );
        return View::make('admin.works', array('area' => $area, 'type' => $type, 'division' => $division, 'position' => $position));
    }

    public function addWork() {

        $work_title = Input::get('work_title');
        $work_description = Input::get('work_description');
        $work_area = Input::get('work_area');
        $work_type = Input::get('work_type');
        $work_division = Input::get('work_division');
        $work_date = Input::get('work_date');
        if (Input::get('mp_fund') == 'on' || Input::get('mp_fund') == '1') {
            $mp_fund = 1;
        } else {
            $mp_fund = 0;
        }

        if (Input::get('position') > 0) {
            $position = Input::get('position');
            $position_check = Works::where('position', '>', $position)->get();
            foreach ($position_check as $row) {
                $row->position = $row->position + 1;
                $row->save();
            }
            $position_check = Works::where('position', '=', $position)->get();
            foreach ($position_check as $row) {
                $row->position = $row->position + 1;
                $row->save();
            }
        } else {
            $position = 10;
        }

        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_work_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $work = new Works;
        $work->title = $work_title;
        $work->description = $work_description;
        $work->work_area = $work_area;
        $work->work_type = $work_type;
        $work->work_devision = $work_division;
        $work->images = implode(',', $image_array);
        $work->date = $work_date;
        $work->mp_fund = $mp_fund;
        $work->position = $position;
        $work->posted_by = "Team Kalyan";
        $work->save();
        return redirect('/admin/works');
    }

    public function getWorklist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('works as wr')
                ->select('wr.*', 'wa.title as areaname', 'wt.title as type', 'wd.title as division')
                ->leftjoin('work_area as wa', 'wa.id', '=', 'wr.work_area')
                ->leftjoin('work_type as wt', 'wt.id', '=', 'wr.work_type')
                ->leftjoin('work_division as wd', 'wd.id', '=', 'wr.work_devision')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'wr.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {
            if ($row->mp_fund == 1)
                $row->mp_fund = "Yes";
            else
                $row->mp_fund = "No";
            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'areaname' => $row->areaname,
                'type' => $row->type,
                'division' => $row->division,
                'description' => $row->description,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'mp_fund' => $row->mp_fund,
                'position' => $row->position,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeletework() {
        $delete = Works::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewwork() {
        $work = Works::find(Input::get('work_id'));

        $position = array(
            '' => 'Select display position',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
        );

        $work_area_list = array('' => 'Select');
        $work_area = DB::table('work_area')->orderby('title')->get();
        foreach ($work_area as $value) {
            $work_area_list[$value->id] = $value->title;
        }

        $work_division_list = array('' => 'Select');
        $work_division = DB::table('work_division')->orderby('title')->get();
        foreach ($work_division as $value) {
            $work_division_list[$value->id] = $value->title;
        }

        $work_type_list = array('' => 'Select');
        $work_type = DB::table('work_type')->orderby('title')->get();
        foreach ($work_type as $value) {
            $work_type_list[$value->id] = $value->title;
        }

        return View::make('admin.edit_work', ['work' => $work, 'work_area_list' => $work_area_list, 'work_division_list' => $work_division_list, 'work_type_list' => $work_type_list, 'position_list' => $position]);
    }

    public function postEditworksave() {

        $work = Works::find(Input::get('work_id'));
        $work->title = Input::get('title');
        $work->description = Input::get('description');
        $work->work_area = Input::get('work_area');
        $work->work_type = Input::get('work_type');
        $work->work_devision = Input::get('work_devision');
        $work->date = Input::get('date');
        if (Input::get('mp_fund') == 'on' || Input::get('mp_fund') == '1') {
            $work->mp_fund = 1;
        } else {
            $work->mp_fund = 0;
        }

        if (Input::get('position') > 0) {
            $position = Input::get('position');
            $position_check = Works::where('position', '>', $position)->get();
            foreach ($position_check as $row) {
                $row->position = $row->position + 1;
                $row->save();
            }
            $position_check = Works::where('position', '=', $position)->get();
            foreach ($position_check as $row) {
                $row->position = $row->position + 1;
                $row->save();
            }
        } else {
            $position = 10;
        }

        $work->position = $position;

        $work->save();
        return Response::json(array('success' => 1));
    }

    public function getVideourl() {
        return View::make('admin.videourl');
    }
    
    public function getSubscribe() {
        return View::make('admin.subscribe-list');
    }

    public function getIssuesurl() {
        return View::make('admin.issueurl');
    }

    public function getJoinUsurl() {
        return View::make('admin.joinusurl');
    }

    public function addVideo() {
        $video = new YoutubeURL;
        $video->title = Input::get('title');
        $video->videourl = Input::get('videourl');
        $video->save();
        return redirect('/admin/video');
    }

    public function getJoinUslist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }
        $candidate_id = $this->leader_id;
        $contact_type = 1;
        $query = 'select candidate_contacts.id,candidate_contacts.name,candidate_contacts.contact1,candidate_contacts.created_at,candidate_contacts.updated_at,state_list.state,state_district_mapping.district,state_mla_mapping.constitutency as mla,state_mp_mapping.constitutency as mp from molitics.candidate_contacts 
        left join molitics.state_list on
        state_list.id = candidate_contacts.state
        left join molitics.state_district_mapping on
        state_district_mapping.id = candidate_contacts.district
        left join molitics.state_mla_mapping on
        state_mla_mapping.id = candidate_contacts.mla
        left join molitics.state_mp_mapping on
        state_mp_mapping.id = candidate_contacts.mp
        where candidate = "' . $this->leader_id . '" and contact_type="1"';

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . " order by " . $orderfield . " LIMIT $start, $pagesize";
        $all_issues = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';
        foreach ($all_issues as $row) {
            $rows[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'contact' => $row->contact1,
                'state' => $row->state,
                'district' => $row->district,
                'mla' => $row->mla,
                'mp' => $row->mp,
                'created_at' => $row->created_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function getIssuelist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }


        $query = DB::table('molitics.candidate_issues')
                ->select('candidate_issues.id', 'candidate_issues.name as issue_topic', 'candidate_issues.description', 'candidate_contacts.id as contact_id', 'candidate_contacts.contact1', 'candidate_issues.created_at', 'candidate_issues.updated_at', 'candidate_contacts.name', 'state_list.state', 'state_district_mapping.district', 'state_mla_mapping.constitutency as mla', 'state_mp_mapping.constitutency as mp', 'village_mla_mapping.village as village')
                ->leftJoin('molitics.candidate_contacts', function($join) {
                    $join->on('candidate_contacts.id', '=', 'candidate_issues.coordinators');
                })
                ->leftJoin('molitics.state_list', function($join) {
                    $join->on('state_list.id', '=', 'candidate_issues.state');
                })
                ->leftJoin('molitics.state_district_mapping', function($join) {
                    $join->on('state_district_mapping.id', '=', 'candidate_issues.district');
                })
                ->leftJoin('molitics.state_mla_mapping', function($join) {
                    $join->on('state_mla_mapping.id', '=', 'candidate_issues.mla_constituency');
                })
                ->leftJoin('molitics.state_mp_mapping', function($join) {
                    $join->on('state_mp_mapping.id', '=', 'candidate_issues.mp_constituency');
                })
                ->leftJoin('molitics.village_mla_mapping', function($join) {
                    $join->on('village_mla_mapping.id', '=', 'candidate_issues.village');
                })
                ->toSql();

        $where = $this->BuildWhere();
        $where = str_replace('id', 'id ', $where);

        // Just run query for filtering out news for current candidate only
        $candidate_id = config('user.candidate_id');
        if(!$where) {
            $where = "WHERE candidate_issues.candidate = {$candidate_id} ";
        } else {
            $where = "AND candidate_issues.candidate = {$candidate_id} ";
        }

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";

        $all_issues = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';
        foreach ($all_issues as $row) {
            $rows[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'topic' => $row->issue_topic,
                'description' => $row->description,
                'contact' => $row->contact1,
                'state' => $row->state,
                'district' => $row->district,
                'mla' => $row->mla,
                'mp' => $row->mp,
                'village' => $row->village,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function getVideolist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('videourl as vd')
                ->select('vd.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'vd.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'videourl' => $row->videourl,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeletevideo() {
        $delete = YoutubeURL::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewvideo() {
        $video = YoutubeURL::find(Input::get('video_id'));
        return View::make('admin.edit_video', ['video' => $video]);
    }

    public function postEditvideosave() {

        $video = YoutubeURL::find(Input::get('video_id'));
        $video->title = Input::get('title');
        $video->videourl = Input::get('videourl');

        $video->save();
        return redirect('/admin/video');
    }

    public function postViewvideo() {
        $video = YoutubeURL::find(Input::get('video_id'));
        return View::make('admin.view_video', ['video' => $video]);
    }

    public function postViewissue() {
        $data['issue'] = Issues::find(Input::get('video_id'));
        $data['contact_data'] = Contacts::where('id', '=', $data['issue']->coordinators)->first();
        return View::make('admin.view_issue', $data);
    }

    public function getEditworkimage() {
        $work = Works::find(Input::get('work_id'));
        return View::make('admin.image_work', ['work' => $work]);
    }

    public function postImageSave() {
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_work_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $work = Works::find(Input::get('work_id'));
        $work->images = implode(',', $image_array);
        $work->save();
        return redirect('/admin/works');
    }

    public function getTeam() {
        $position = Position::get();
        return View::make('admin.team', array('position' => $position));
    }

    public function addTeam() {

        $file = Input::file('team_image');
        $name = $file->getClientOriginalName();
        $path = $file->getRealPath();
        $ext = getExtension($name);
        $new_name = "1189_team_" . str_random(4) . time();
        $imgn = $new_name . "." . $ext;
        $file->move(TEMP_IMAGE_PATH, $imgn);
        $s3 = App::make('aws')->createClient('s3');
        $output = $s3->putObject(array(
            'Bucket' => S3_BUCKET,
            'Key' => PHOTO_GALLERY . '/' . $imgn,
            'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
            'ACL' => 'public-read',
            'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
        ));


        unlink(TEMP_IMAGE_PATH . '/' . $imgn);

        $team = new Team;
        $team->name = Input::get('name');
        $team->position = Input::get('position');
        $team->address = Input::get('address');
        $team->mobile = Input::get('mobile');
        $team->facebook = Input::get('facebook');
        $team->twitter = Input::get('twitter');
        $team->image = $imgn;

        $team->save();
        return redirect('/admin/team');
    }

    public function getTeamlist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('team as tm')
                ->select('tm.*', 'po.title as position_title')
                ->leftjoin('position as po', 'po.id', '=', 'tm.position')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'tm.id ', $where);
        $where = str_replace('position_title', 'po.position_title ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'position_title' => $row->position_title,
                'mobile' => $row->mobile,
                'address' => $row->address,
                'facebook' => $row->facebook,
                'twitter' => $row->twitter,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeleteteam() {
        $delete = Team::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewteam() {
        $team = Team::find(Input::get('team_id'));

        $position_list = array('' => 'Select');
        $position = DB::table('position')->orderby('title')->get();
        foreach ($position as $value) {
            $position_list[$value->id] = $value->title;
        }


        return View::make('admin.edit_team', ['team' => $team, 'position_list' => $position_list]);
    }

    public function postEditteamsave() {

        $team = Team::find(Input::get('team_id'));
        $team->name = Input::get('name');
        $team->position = Input::get('position');
        $team->mobile = Input::get('mobile');
        $team->address = Input::get('address');
        $team->facebook = Input::get('facebook');
        $team->twitter = Input::get('twitter');

        $team->save();
        return Response::json(array('success' => 1));
    }

    public function postImageteamSave() {
        $file = Input::file('team_image');

        $name = $file->getClientOriginalName();
        $path = $file->getRealPath();
        $ext = getExtension($name);
        $new_name = "1189_team_" . str_random(4) . time();
        $imgn = $new_name . "." . $ext;
        $file->move(TEMP_IMAGE_PATH, $imgn);
        $s3 = App::make('aws')->createClient('s3');
        $output = $s3->putObject(array(
            'Bucket' => S3_BUCKET,
            'Key' => PHOTO_GALLERY . '/' . $imgn,
            'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
            'ACL' => 'public-read',
            'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
        ));

        unlink(TEMP_IMAGE_PATH . '/' . $imgn);
        $team = Team::find(Input::get('team_id'));
        $team->image = $imgn;
        $team->save();
        return redirect('/admin/team');
    }

    public function postViewteam() {
        $team = Team::select('team.*', 'po.title as position_title')
                ->leftjoin('position as po', 'po.id', '=', 'team.position')
                ->where('team.id', '=', Input::get('team_id'))
                ->first();


        $team->image = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $team->image;

        return View::make('admin.view_team', ['team' => $team]);
    }

    public function getEditteamimage() {
        $team = Team::find(Input::get('team_id'));
        return View::make('admin.team_image', ['team' => $team]);
    }

    public function getPresscoverage() {
        return View::make('admin.press_coverage');
    }

    public function addPresscoverage() {
        $press_title = Input::get('press_title');
        $files = Input::file('press_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_press_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                //unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $press = new PressCoverage;
        $press->title = $press_title;
        $press->image = implode(',', $image_array);

        $press->save();
        return redirect('/admin/presscoverage');
    }

    public function getPresscoveragelist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('press_coverage as pr')
                ->select('pr.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'pr.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeletepresscoverage() {
        $delete = PressCoverage::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewpresscoverage() {
        $press = PressCoverage::find(Input::get('press_id'));

        return View::make('admin.edit_presscoverage', ['press' => $press]);
    }

    public function postEditpresscoveragesave() {

        $press = PressCoverage::find(Input::get('press_id'));
        $press->title = Input::get('title');
        $files = Input::file('press_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_press_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
            $press->image = implode(',', $image_array);
        }



        $press->save();
        return redirect('/admin/presscoverage');
    }

    public function postViewpresscoverage() {
        $press = PressCoverage::where('id', '=', Input::get('press_id'))
                ->first();

        $images_array = array();
        foreach (explode(',', $press->image) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $press->image = $images_array;

        return View::make('admin.view_press_coverage', ['press' => $press, 'image' => $press->image]);
    }

    public function getPatravahar() {
        return View::make('admin.patravahar');
    }

    public function addPatravahar() {
        $patra_title = Input::get('patra_title');
        $files = Input::file('patra_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_patra_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $patra = new PatraVahar;
        $patra->title = $patra_title;
        $patra->image = implode(',', $image_array);

        $patra->save();
        return redirect('/admin/patravahar');
    }

    public function getPatravaharlist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('patravahar as pr')
                ->select('pr.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'pr.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeletepatravahar() {
        $delete = PatraVahar::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewpatravahar() {
        $patra = PatraVahar::find(Input::get('patra_id'));

        return View::make('admin.edit_patravahar', ['patra' => $patra]);
    }

    public function postEditpatravaharsave() {

        $patra = PatraVahar::find(Input::get('patra_id'));
        $patra->title = Input::get('title');
        $files = Input::file('patra_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_patra_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
            $patra->image = implode(',', $image_array);
        }



        $patra->save();
        return redirect('/admin/patravahar');
    }

    public function postViewpatravahar() {
        $patra = PatraVahar::where('id', '=', Input::get('patra_id'))
                ->first();

        $images_array = array();
        foreach (explode(',', $patra->image) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $patra->image = $images_array;

        return View::make('admin.view_patravahar', ['patra' => $patra, 'image' => $patra->image]);
    }

    public function getPressnotes() {
        return View::make('admin.press_notes');
    }

    public function getOrganization() {
        return View::make('admin.organization');
    }

    public function addPressnotes() {
        $work_title = Input::get('work_title');
        $work_description = Input::get('work_description');
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_notes_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $work = new PressNotes;
        $work->title = $work_title;
        $work->description = $work_description;
        $work->images = implode(',', $image_array);
        $work->save();
        return redirect('/admin/press_notes');
    }

    public function addOrganizationLeader() {
        $user_name = Input::get('name');
        $address = Input::get('address');
        $position = Input::get('position');
        $email = Input::get('email');
        $phone_no = Input::get('phone_no');
        $images = Input::file('work_image');
        $state = Input::get('state');

        if ($images) {
            $name = $images->getClientOriginalName();
            $path = $images->getRealPath();
            $ext = getExtension($name);
            $new_name = "1189_notes_" . str_random(4) . time();
            $imgn = $new_name . "." . $ext;
            $images->move(TEMP_IMAGE_PATH, $imgn);
            $s3 = App::make('aws')->createClient('s3');
            $output = $s3->putObject(array(
                'Bucket' => S3_BUCKET,
                'Key' => PHOTO_GALLERY . '/' . $imgn,
                'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                'ACL' => 'public-read',
                'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
            ));
            $images = $imgn;
            //unlink(TEMP_IMAGE_PATH . '/' . $imgn);
        }

        $organization = new Organization;
        $organization->name = $user_name;
        $organization->address = $address;
        $organization->position = $position;
        $organization->email = $email;
        $organization->phone_no = $phone_no;
        $organization->images = $images;
        $organization->state_name = $state;
        $organization->save();
        return redirect('/admin/organization');
    }

    public function getPressnoteslist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('press_notes as pn')
                ->select('pn.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'pn.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeletepress_notes() {
        $delete = PressNotes::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewpress_notes() {
        $press_notes = PressNotes::find(Input::get('notes_id'));


        return View::make('admin.edit_press_notes', ['press_notes' => $press_notes]);
    }

    public function postEditpress_notessave() {

        $press_notes = PressNotes::find(Input::get('notes_id'));
        $press_notes->title = Input::get('title');
        $press_notes->description = Input::get('description');

        $press_notes->save();
        return Response::json(array('success' => 1));
    }

    public function getEditpress_notesimage() {
        $press_notes = PressNotes::find(Input::get('notes_id'));
        return View::make('admin.image_press_notes', ['press_notes' => $press_notes]);
    }

    public function postNotesImageSave() {
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_notes_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $press_notes = PressNotes::find(Input::get('notes_id'));
        $press_notes->images = implode(',', $image_array);
        $press_notes->save();
        return redirect('/admin/press_notes');
    }

    public function postViewpress_notes() {
        $press_notes = PressNotes::where('id', '=', Input::get('notes_id'))
                ->first();

        $images_array = array();
        foreach (explode(',', $press_notes->images) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $press_notes->images = $images_array;

        return View::make('admin.view_press_notes', ['press_notes' => $press_notes, 'images' => $press_notes->images]);
    }

    public function getBlog() {
        return View::make('admin.blog');
    }

    public function addBlog() {
        $work_title = Input::get('work_title');
        $work_description = Input::get('work_description');
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_blog_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $work = new Blog;
        $work->title = $work_title;
        $work->description = $work_description;
        $work->images = implode(',', $image_array);
        $work->save();
        return redirect('/admin/blog');
    }

    public function getBloglist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('blog as pn')
                ->select('pn.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'pn.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeleteblog() {
        $delete = Blog::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewblog() {
        $blog = Blog::find(Input::get('blog_id'));


        return View::make('admin.editblog', ['blog' => $blog]);
    }

    public function postEditblogsave() {

        $blog = Blog::find(Input::get('blog_id'));
        $blog->title = Input::get('title');
        $blog->description = Input::get('description');

        $blog->save();
        return redirect('/admin/blog');
    }

    public function getEditblogimage() {
        $blog = Blog::find(Input::get('blog_id'));
        return View::make('admin.image_blog', ['blog' => $blog]);
    }

    public function postBlogImageSave() {
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_blog_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $blog = Blog::find(Input::get('blog_id'));
        $blog->images = implode(',', $image_array);
        $blog->save();
        return redirect('/admin/blog');
    }

    public function postViewblog() {
        $blog = Blog::where('id', '=', Input::get('blog_id'))
                ->first();

        $images_array = array();
        foreach (explode(',', $blog->images) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $blog->images = $images_array;

        return View::make('admin.view_blog', ['blog' => $blog, 'images' => $blog->images]);
    }

    public function getAddblog() {
        return View::make('admin.add_blog');
    }

    public function getCulturalevent() {
        return View::make('admin.culturalevent');
    }

    public function addCulturalevent() {
        $work_title = Input::get('work_title');
        $work_description = Input::get('work_description');
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_cultural_event_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $work = new CulturalEvent;
        $work->title = $work_title;
        $work->description = $work_description;
        $work->images = implode(',', $image_array);
        $work->save();
        return redirect('/admin/culturalevent');
    }

    public function getCulturaleventlist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('cultural_event as ce')
                ->select('ce.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'ce.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function postDeleteculturalevent() {
        $delete = CulturalEvent::where('id', '=', Input::get('id'))->delete();
        return;
    }

    public function getEditviewculturalevent() {
        $culturalevent = CulturalEvent::find(Input::get('event_id'));


        return View::make('admin.edit_culturalevent', ['culturalevent' => $culturalevent]);
    }

    public function postEditculturaleventsave() {

        $culturalevent = CulturalEvent::find(Input::get('event_id'));
        $culturalevent->title = Input::get('title');
        $culturalevent->description = Input::get('description');

        $culturalevent->save();
        return Response::json(array('success' => 1));
    }

    public function getEditculturaleventimage() {
        $culturalevent = CulturalEvent::find(Input::get('event_id'));
        return View::make('admin.image_culturalevent', ['culturalevent' => $culturalevent]);
    }

    public function postCulturalImageSave() {
        $files = Input::file('work_image');

        $image_array = array();
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->getRealPath();
                $ext = getExtension($name);
                $new_name = "1189_cultural_event_" . str_random(4) . time();
                $imgn = $new_name . "." . $ext;
                $file->move(TEMP_IMAGE_PATH, $imgn);
                $s3 = App::make('aws')->createClient('s3');
                $output = $s3->putObject(array(
                    'Bucket' => S3_BUCKET,
                    'Key' => PHOTO_GALLERY . '/' . $imgn,
                    'SourceFile' => TEMP_IMAGE_PATH . '/' . $imgn,
                    'ACL' => 'public-read',
                    'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                ));

                $image_array[] = $imgn;
                unlink(TEMP_IMAGE_PATH . '/' . $imgn);
            }
        }

        $culturalevent = CulturalEvent::find(Input::get('event_id'));
        $culturalevent->images = implode(',', $image_array);
        $culturalevent->save();
        return redirect('/admin/culturalevent');
    }

    public function postViewculturalevent() {
        $culturalevent = CulturalEvent::where('id', '=', Input::get('event_id'))
                ->first();

        $images_array = array();
        foreach (explode(',', $culturalevent->images) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $culturalevent->images = $images_array;

        return View::make('admin.view_culturalevent', ['culturalevent' => $culturalevent, 'images' => $culturalevent->images]);
    }
    
    public function getSubscribelist() {
        $pagenum = Input::get('pagenum');
        $pagesize = Input::get('pagesize');
        $start = $pagenum * $pagesize;
        $orderfield = " ID DESC";
        if (isset($_GET['sortdatafield'])) {
            $sortfield = Input::get('sortdatafield');
            $sortorder = Input::get('sortorder');

            if ($sortfield != NULL) {
                if ($sortorder == "desc") {
                    $orderfield = $sortfield . " DESC";
                } else if ($sortorder == "asc") {
                    $orderfield = $sortfield . " ASC";
                }
            }
        }

        $query = DB::table('subscribe as vd')
                ->select('vd.*')
                ->toSql();
        $where = $this->BuildWhere();
        $where = str_replace('id', 'vd.id ', $where);

        $query = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $query);
        $query1 = $query . $where . " order by " . $orderfield . " LIMIT $start, $pagesize";
        //dd($query1);
        $newleads = DB::select($query1);
        $total_res = DB::select('SELECT FOUND_ROWS() as total');
        $rows = array();
        $display_type = '';

        foreach ($newleads as $row) {

            $rows[] = array(
                'id' => $row->id,
                'email' => $row->email,
                'created_at' => $row->created_at,
            );
        }

        $data = array();
        $data[] = array(
            'TotalRows' => $total_res[0]->total,
            'Rows' => $rows
        );
        echo json_encode($data);
    }

    public function getGraduatevoter() {
        return View::make('admin.graduate_list');
    }



    public function getGraduatelist() {
        $voter_register = GraduateVoter::orderBy('id', 'desc')->get();
        // return view('graduate_list', array('voter_register' => $voter_register));

        return view('admin.graduate_list', [
            'voter_register'=>$voter_register,
        ]);
    }
}
