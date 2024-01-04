<?php

namespace App\Http\Controllers;

use View;
use Cache;
use Twitter;
use stdclass;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;
use DB;
use App;
use Session;
use Mail;
use App\Model\Otp;
use App\Model\Gallery;
use App\Model\Blog;
use App\Model\PressNotes;
use App\Model\PatraVahar;
use App\Model\YoutubeURL;
use App\Model\Subscribe;
use App\Model\GraduateVoter;
use App\Model\Organization;
use App\Model\PressCoverage;
use App\Model\CulturalEvent;
use App\Model\Eassy;
use App\Model\Video;
use App\Model\MplusUsers;

use App\Model\Molitics\Mp;
use App\Model\Molitics\Mla;
use App\Model\Molitics\News;
use App\Model\Molitics\Events;
use App\Model\Molitics\Issues;
use App\Model\Molitics\Village;
use App\Model\Molitics\Contacts;
use App\Model\Molitics\District;
use App\Model\Molitics\StateList;
use App\Model\Molitics\Candidates;



class HomeController extends Controller {

    public function __construct() {
        $this->leader_id = config('user.candidate_id');
        $this->middleware('csrf', ['only' => 'issueVerification']);
    }

    public function getIndex() {
        
        Session::put('clicked_link', 'home');
        $status = DB::table('molitics.mplus_users')->where('entity_id', '=', $this->leader_id)->select('status')->orderBy('id', 'DESC')->first();
        $news = News::whereRaw('FIND_IN_SET(' . $this->leader_id . ',candidate_leader)')
                ->whereRaw('deleted_at is NULL')
                ->orderBy('approved_at', 'DESC')
                ->paginate(3);
        foreach ($news as $row) {
            $row->image = NEWS_IMG . $row->image;
            $row->content = strip_tags($row->content);
            $row->approved_at = action_time($row->approved_at);
        }

        $events = Events::leftJoin('state_list', function($join) {
                    $join->on('state_list.id', '=', 'candidate_events.state');
                })
                ->leftJoin('state_district_mapping', function($join) {
                    $join->on('state_district_mapping.id', '=', 'candidate_events.district');
                })
                ->leftJoin('state_mla_mapping', function($join) {
                    $join->on('state_mla_mapping.id', '=', 'candidate_events.mla_constituency');
                })
                ->leftJoin('state_mp_mapping', function($join) {
                    $join->on('state_mp_mapping.id', '=', 'candidate_events.mp_constituency');
                })
                ->leftJoin('village_mla_mapping', function($join) {
                    $join->on('village_mla_mapping.id', '=', 'candidate_events.village');
                })
                ->where('candidate', '=', $this->leader_id)
                ->where('event_type', '!=', 8)
                ->where('date', '>=', Date('Y-m-d'))
                ->select('candidate_events.id', 'candidate_events.coordinators', 'address', 'name', 'date', 'time', 'state_list.state', 'state_district_mapping.district', 'state_mla_mapping.constitutency as mla', 'state_mp_mapping.constitutency as mp', 'village_mla_mapping.village')
                ->orderBy('date', 'ASC')
                ->orderBy('time', 'ASC')
                ->take(4)
                ->get();
        foreach ($events as $row) {
            $contact = $row->coordinators;
            $contact = Contacts::select('name', 'contact1')->find($contact);
            if ($contact) {
                $row->contact_name = $contact->name;
                $row->contact_number = $contact->contact1;
            }

            $locArray = array();
            $locArray[] = $row->address;
            $locArray[] = $row->mla;
            $locArray[] = $row->mp;
            $locArray = array_filter($locArray);
            $row->location1 = count($locArray) ? implode(',', $locArray) . ',' : '';

            $locArray = array();
            $locArray[] = $row->district;
            $locArray[] = $row->state;
            $locArray = array_filter($locArray);
            $row->location2 = implode(',', $locArray);

            $date = date("D, d M Y", strtotime($row->date));
            $row->date = $date;

            $time = date("g:i a", strtotime($row->time));
            $row->time = $time;
        }

        $stateArray = array();
        $state = StateList::orderBy('state', 'ASC')->get();
        $stateArray[''] = 'Select State';
        foreach ($state as $row) {
            $stateArray[$row->id] = $row->state;
        }

        $districtArray = array();
        $district = District::where('state', '=', 35)->orderBy('district', 'ASC')->get();
        $districtArray[''] = 'Select District';
        foreach ($district as $row) {
            $districtArray[$row->id] = $row->district;
        }

        $mlaArray = array();
        $mla = Mla::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
        $mlaArray[''] = 'Select MLA Constituency';
        foreach ($mla as $row) {
            $mlaArray[$row->id] = $row->constitutency;
        }

        $mpArray = array();
        $mp = Mp::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
        $mpArray[''] = 'Select MP Constituency';
        foreach ($mp as $row) {
            $mpArray[$row->id] = $row->constitutency;
        }

        $video = YoutubeURL::orderBy('id', 'desc')->skip(0)->take(2)->get();
        # recent activities
        $base = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/';
        $allGalleries = Gallery::where('published', '=', 1)
                ->select('name','id','created_at',DB::raw('IF(cover IS NULL, "'.DUMMY_GALLERY_IMAGE.'", CONCAT("' . $base . '",cover)) as cover'))
                ->orderBy('created_at', 'DESC')->take(3)->get();
        return view('home', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(), 'news' => $news, 'events' => $events, 'stateArray' => $stateArray, 'districtArray' => $districtArray, 'mpArray' => $mpArray, 'mlaArray' => $mlaArray, 'video' => $video, 'status' => $status,'allGalleries' => $allGalleries));
    }

    public function getNewsDetails($NewsId) {
        $news = News::whereRaw('FIND_IN_SET(' . $this->leader_id . ',display_web_news)')
                ->where('id', $NewsId)
                ->select('id', 'heading', 'image', 'content', 'approved_at')
                ->first();

        $news->heading = strip_tags($news->heading);
        $news->content = strip_tags($news->content);
        $news->approved_at = action_time($news->approved_at);
        $news->image = NEWS_IMG . $news->image;
        return view('partials.news_modal', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'news' => $news));
    }

    public function getEventDetails($EventId) {
        $event = Events::leftJoin('state_list', function($join) {
                    $join->on('state_list.id', '=', 'candidate_events.state');
                })
                ->leftJoin('state_district_mapping', function($join) {
                    $join->on('state_district_mapping.id', '=', 'candidate_events.district');
                })
                ->leftJoin('state_mla_mapping', function($join) {
                    $join->on('state_mla_mapping.id', '=', 'candidate_events.mla_constituency');
                })
                ->leftJoin('state_mp_mapping', function($join) {
                    $join->on('state_mp_mapping.id', '=', 'candidate_events.mp_constituency');
                })
                ->leftJoin('village_mla_mapping', function($join) {
                    $join->on('village_mla_mapping.id', '=', 'candidate_events.village');
                })
                ->where('candidate', '=', $this->leader_id)
                ->where('event_type', '!=', 8)
                ->where('candidate_events.id', '=', $EventId)
                ->select('candidate_events.id', 'candidate_events.image', 'candidate_events.description', 'candidate_events.coordinators', 'address', 'name', 'date', 'time', 'state_list.state', 'state_district_mapping.district', 'state_mla_mapping.constitutency as mla', 'state_mp_mapping.constitutency as mp', 'village_mla_mapping.village')
                ->orderBy('date', 'ASC')
                ->first();

        $contact = $event->coordinators;
        $contact = Contacts::select('name', 'contact1')->find($contact);
        if ($contact) {
            $event->contact_name = $contact->name;
            $event->contact_number = $contact->contact1;
        }

        if ($event->image)
            $event->image = EVENT_IMG . $event->image;
        else
            $event->image = '/images/news-page-big-img.jpg';

        $locArray = array();
        $locArray[] = $event->address;
        $locArray[] = $event->mla;
        $locArray[] = $event->mp;
        $locArray = array_filter($locArray);
        $event->location1 = count($locArray) ? implode(',', $locArray) . ',' : '';

        $locArray = array();
        $locArray[] = $event->district;
        $locArray[] = $event->state;
        $locArray = array_filter($locArray);
        $event->location2 = implode(',', $locArray);

        $date = date("D, d M Y", strtotime($event->date));
        $event->date = $date;

        $time = date("g:i a", strtotime($event->time));
        $event->time = $time;
        return view('partials.event_modal', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'event' => $event));
    }

    public function issueVerification() {
        $contact = Input::get('contact');
        $otp = rand(99999, 999999);
        $data = Otp::where('contact', '=', $contact)->first();
        if (!$data) {
            $data = new Otp;
            $data->contact = $contact;
        }

        $data->otp = $otp;
        $data->save();

        $arr['otp'] = $otp;
        $mobile = '91' . $contact;
        $view = View::make('sms.issue_verification', $arr);
        $message = $view->render();
        send_sms($mobile, $message);
        return;
    }

    public function issueVerificationCheck() {
        $otp = Input::get('otp');
        $contact = Input::get('contact');

        $otp = Otp::where('contact', '=', $contact)->where('otp', '=', $otp)->first();
        if ($otp) {
            $success = 1;
            $otp->delete();
        } else {
            $success = 0;
        }
        return $success;
    }

    public function getLocations($state) {
        $mlaArray = array();
        $mla = Mla::where('state', '=', $state)->orderBy('constitutency', 'ASC')->get();
        foreach ($mla as $row) {
            $mla = new stdclass;
            $mla->key = $row->constitutency;
            $mla->value = $row->id;
            $mlaArray[] = $mla;
        }

        $mpArray = array();
        $mp = Mp::where('state', '=', $state)->orderBy('constitutency', 'ASC')->get();
        foreach ($mp as $row) {
            $mp = new stdclass;
            $mp->key = $row->constitutency;
            $mp->value = $row->id;
            $mpArray[] = $mp;
        }

        $districtArray = array();
        $district = District::where('state', '=', $state)->orderBy('district', 'ASC')->get();
        foreach ($district as $row) {
            $district = new stdclass;
            $district->key = $row->district;
            $district->value = $row->id;
            $districtArray[] = $district;
        }

        $data['mla'] = $mlaArray;
        $data['mp'] = $mpArray;
        $data['district'] = $districtArray;
        $response['data'] = $data;
        return Response::json($response);
    }

    public function postvillagelist() {
        $constituency_id = Input::get('constituency_id');
        $villageArray = array();
        $village = Village::where('constituency', '=', $constituency_id)->orderBy('village', 'ASC')->get();
        foreach ($village as $row) {
            $villageArray[$row->id] = $row->village;
        }

        $response['villageArray'] = $villageArray;

        return $response;
    }

    public function addIssue(\Illuminate\Http\Request $request) {
        $name = Input::get('name');
        $topic = Input::get('topic');
        $contact = Input::get('contact');
        $issue_mp = Input::get('issue-mp');
        $issue_mla = Input::get('issue-mla');
        $issue_village = Input::get('issue-village');
        $issue_state = Input::get('issue-state');
        $issue_district = Input::get('issue-district');
        $issue_description = Input::get('issue-description');
        
        $volunteer = Contacts::where('contact1', '=', $contact)->where('candidate', '=', $this->leader_id)->first();
        if (!$volunteer) {
            $volunteer = new Contacts;
            $volunteer->name = $name;
            $volunteer->contact1 = $contact;
            $volunteer->candidate = $this->leader_id;
            $volunteer->contact_type = 1;
            $volunteer->state = $issue_state;
            $volunteer->district = $issue_district;
            $volunteer->mla = $issue_mla;
            $volunteer->mp = $issue_mp;
            $volunteer->village = $issue_village;
            $volunteer->save();
        }

        $issue = new Issues;
        $issue->candidate = $this->leader_id;
        $issue->name = $topic;
        $issue->description = $issue_description;
        $issue->state = $issue_state;
        $issue->district = $issue_district;
        $issue->mp_constituency = $issue_mp;
        $issue->mla_constituency = $issue_mla;
        $issue->coordinators = $volunteer->id;
        $issue->created_by = 'website';
        $issue->village = $issue_village;
        $issue->action = 1;
        $issue->save();
        $mobile = '91' . $contact;
        $view = View::make('sms.joining_issue_message');
        $message = $view->render();
        send_sms($mobile, $message, VERIFICATION_ID);
        return;
    }

    public function addEssay() {
        parse_str($_POST["data"], $_POST);
        Mail::send('emails.eassy', $_POST, function ($message) {
            $message->from('President@dalitcongress.com', 'Essay Contest');
            $message->subject("Eassy Contest");
            $message->to('President@dalitcongress.com');
        });

        $essay = new Eassy;
        $essay->name = $_POST['name'];
        $essay->profession = $_POST['profession'];
        $essay->address = $_POST['address'];
        $essay->state = $_POST['eassy_state'];
        $essay->city = $_POST['eassy_district'];
        $essay->email = $_POST['email'];
        $essay->mobile = $_POST['mobile'];
        $essay->essay = $_POST['essay'];
        $essay->save();
        return;
    }

    public function addVideo() {
        $file = Input::file('videofile');
        $image_array = array();
        if ($file) {
            $new_name = rand(100, 999) . '_' . time();
            $s3 = App::make('aws')->createClient('s3');
            $s3_output = $s3->putObject(array(
                'Bucket' => S3_BUCKET,
                'Key' => 'dalit_congress_video/' . $new_name . '.' . $file->getClientOriginalExtension(),
                'SourceFile' => $file->getRealPath(),
                'ACL' => 'public-read',
                'CacheControl' => 'max-age=' . S3_IMAGES_CACHE_TIME,
                'ContentType' => 'audio/mpeg',
            ));
        }
        $_POST['video_url'] = VIDEO_PATH . $new_name . '.' . $file->getClientOriginalExtension();
        Mail::send('emails.video', $_POST, function ($message) {
            $message->from('President@dalitcongress.com', 'Video Contest');
            $message->subject("Eassy Contest");
            $message->to('President@dalitcongress.com');
        });

        $essay = new Video;
        $essay->name = $_POST['name'];
        $essay->profession = $_POST['profession'];
        $essay->address = $_POST['address'];
        $essay->state = $_POST['eassy_state'];
        $essay->city = $_POST['eassy_district'];
        $essay->email = $_POST['email'];
        $essay->mobile = $_POST['mobile'];
        $essay->video = $new_name . '.' . $file->getClientOriginalExtension();
        $essay->save();
        return;
    }

    public function contactUs() {
        Session::put('clicked_link', 'join_the_movement');
        $state = StateList::orderBy('state', 'ASC')->get();
        $stateArray[''] = 'Select State';
        foreach ($state as $row) {
            $stateArray[$row->id] = $row->state;
        }

        $districtArray = array();
        $district = District::where('state', '=', 35)->orderBy('district', 'ASC')->get();
        $districtArray[''] = 'Select District';
        foreach ($district as $row) {
            $districtArray[$row->id] = $row->district;
        }

        $mlaArray = array();
        $mla = Mla::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
        $mlaArray[''] = 'Select MLA Constituency';
        foreach ($mla as $row) {
            $mlaArray[$row->id] = $row->constitutency;
        }

        $mpArray = array();
        $mp = Mp::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
        $mpArray[''] = 'Select MP Constituency';
        foreach ($mp as $row) {
            $mpArray[$row->id] = $row->constitutency;
        }

        return view('contact_us', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(), 'stateArray' => $stateArray, 'districtArray' => $districtArray, 'mlaArray' => $mlaArray, 'mpArray' => $mpArray));
    }

    public function addVolunteer() {
        $contact = Contacts::where('candidate', '=', $this->leader_id)->where('contact1', '=', Input::get('phone_no'))->first();
        if (!$contact) {
            $contact = new Contacts;
            $contact->name = Input::get('name');
            $contact->candidate = $this->leader_id;
            $contact->contact1 = Input::get('phone_no');
            $contact->contact_type = 1;
            $contact->state = Input::get('state');
            $contact->district = Input::get('district');
            $contact->mla = Input::get('mla');
            $contact->mp = Input::get('mp');
            $contact->save();
            $mobile = '91' . $contact->contact1;
            $view = View::make('sms.joining_contact_message');
            $message = $view->render();
            // send_sms($mobile, $message, VERIFICATION_ID);
            $message = 'You are heartly welcomed to our Family :)';
            return $message;
        } else {
            $message = 'You are already a part of our Family :)';
            return $message;
        }
    }

    public function allVideo() {
        Session::put('clicked_link', 'media');
        $video = YoutubeURL::orderby('id', 'desc')->select('videourl', 'title');
        $video = $video->paginate(9);

        return View::make('videolists', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'video' => $video));
    }

    public function getPresscoverage() {
        $press = PressCoverage::orderBy('created_at', 'DESC')->paginate(9);

        return view('press_coverages', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'press' => $press));
    }

    public function getPresscoverageimage($id) {
        $press = PressCoverage::where('id', '=', $id)->first();

        $images_array = array();
        foreach (explode(',', $press->image) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $press->image = $images_array;
        return view('inner_press_coverage', array('press' => $press, 'images' => $press->image));
    }

    public function getPatravyavahar() {
        $patra = PatraVahar::orderBy('created_at', 'DESC')->paginate(9);

        return view('patravyavahar', array('patra' => $patra));
    }

    public function getPatravyavaharimage($id) {
        $patra = PatraVahar::where('id', '=', $id)->first();

        $images_array = array();
        foreach (explode(',', $patra->image) as $row) {
            $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
            $images_array[] = $row;
        }

        $patra->image = $images_array;
        return view('inner_patravyavahar', array('patra' => $patra, 'images' => $patra->image));
    }

    public function getBloglist() {
        $blog = Blog::orderBy('created_at', 'DESC')->paginate(9);
        $images_array = array();
        foreach ($blog as $row) {
            $images_array = array();
            if ($row->images) {
                foreach (explode(',', $row->images) as $img) {
                    $img = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $img;
                    $images_array[] = $img;
                }
            }
            $row->images = isset($images_array[0]) ? $images_array[0] : '';
        }

        return view('blog_list', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'blog' => $blog));
    }

    public function getBlogdetail($id) {
        $blog = Blog::where('id', '=', $id)->first();
        $images_array = array();
        if ($blog->images) {
            foreach (explode(',', $blog->images) as $row) {
                $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
                $images_array[] = $row;
            }
        }

        $blog->images = $images_array;

        $recent_blog = Blog::where('id', '!=', $id)->orderBy('id', 'desc')->skip(0)->take(4)->get();
        foreach ($recent_blog as $row) {
            $images_array = array();
            if ($row->images) {
                foreach (explode(',', $row->images) as $img) {
                    $img = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $img;
                    $images_array[] = $img;
                }
            }
            $row->images = isset($images_array[0]) ? $images_array[0] : '';
        }
        return view('blog', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'blog' => $blog, 'recent_blog' => $recent_blog));
    }

    public function getPressnoteslist() {
        $press = PressNotes::orderBy('created_at', 'DESC')->paginate(9);
        $images_array = array();
        foreach ($press as $row) {
            $images_array = array();
            if ($row->images) {
                foreach (explode(',', $row->images) as $img) {
                    $img = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $img;
                    $images_array[] = $img;
                }
            }
            $row->images = isset($images_array[0]) ? $images_array[0] : '';
        }

        return view('press_notes_list', array('press' => $press));
    }

    public function getPressnotesdetail($id) {
        $press = PressNotes::where('id', '=', $id)->first();
        $images_array = array();
        if ($press->images) {
            foreach (explode(',', $press->images) as $row) {
                $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
                $images_array[] = $row;
            }
        }

        $press->images = $images_array;

        return view('press_notes', array('press' => $press));
    }

    public function getCulturalEventlist() {
        $cultural = CulturalEvent::orderBy('created_at', 'DESC')->paginate(9);
        $images_array = array();
        foreach ($cultural as $row) {
            $images_array = array();
            if ($row->images) {
                foreach (explode(',', $row->images) as $img) {
                    $img = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $img;
                    $images_array[] = $img;
                }
            }
            $row->images = isset($images_array[0]) ? $images_array[0] : '';
        }

        return view('cultural_event_list', array('cultural' => $cultural));
    }

    public function getCulturaleventdetail($id) {
        $cultural = CulturalEvent::where('id', '=', $id)->first();
        $images_array = array();
        if ($cultural->images) {
            foreach (explode(',', $cultural->images) as $row) {
                $row = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row;
                $images_array[] = $row;
            }
        }

        $cultural->images = $images_array;

        return view('cultural_event_detail', array('cultural' => $cultural));
    }

    public function getKeyDetailPage($key) {
        Session::put('clicked_link', 'key_issue');
        $issues = [
            1 => [
                'title'=>'Atrocities against Dalits',
                'image'=>'/images/Dalit-atrocities.png',
            ],
            2=> [
                'title'=>'Leadership Development in Dalits',
                'image'=>'/images/issueone.jpg',
            ],
            3=> [
                'title'=>'Strengthen the voice of Dalits',
                'image'=>'/images/desktop.jpg',
            ],
            4=> [
                'title'=>'Political Awareness',
                'image'=>'/images/pinc2.jpg',
            ],
        ];

        $issue= $issues[$key];
    

        return view('keydetail', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'issue'=> $issue, 'key' => $key));
    }

    public function subscribe_user()
    {
        $email = Input::get('email');
        $is_alredy_subscribe = Subscribe::where('email', '=', $email)->first();
        if($is_alredy_subscribe)
        {
            echo '2';die;
        }
        if($email)
        {
            $subscribe = new Subscribe;
            $subscribe->email = $email;
            $subscribe->save();
            echo '1';die;
        }
        else{
            echo '0';die;
        }
    }

    public function graduate_user(Request $request)
    {

        $graduate_user = new GraduateVoter;
        $graduate_user->name = Input::get('name');
        $graduate_user->email = Input::get('email');
        $graduate_user->mobile = Input::get('mobile');
        $graduate_user->qualifications = Input::get('qualifications');
        $graduate_user->constituency = Input::get('constituency');
        $graduate_user->save();

        if($request->ajax()){
            return ['success'=>true];
        }
        session()->flash('msg', 'Successfully done the operation.'); return back();
    }

    public function organisation($state) {
        Session::put('clicked_link', 'organisation');
        if ($state == "all") {
            $leaders = Organization::orderBy('created_at', 'DESC')->get();
        } else {
            $leaders = Organization::where('state_name', '=', $state)->orderBy('created_at', 'DESC')->get();
        }
        return view('organisation', array('leaders' => $leaders));
    }

    public function getMission()
    {
        Session::put('clicked_link', 'mission');
        return view('mission',array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate()));
    }

    public function getKnowMore() {
        Session::put('clicked_link', 'know-more');

        $news = News::whereRaw('FIND_IN_SET(' . $this->leader_id . ',candidate_leader)')
                ->orderBy('approved_at', 'DESC')
                ->paginate(3);
        foreach ($news as $row) {
            $row->image = NEWS_IMG . $row->image;
            $row->content = strip_tags($row->content);
            $row->approved_at = action_time($row->approved_at);
        }

        return view('know-more', array('office'=>$this->getOffice(),'candidate'=>$this->getCandidate(),'news' => $news));
    }

}
