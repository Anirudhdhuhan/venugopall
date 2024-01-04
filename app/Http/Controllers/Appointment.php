<?php

namespace App\Http\Controllers;

use App\IssueAppointments;

use Illuminate\Support\Facades\Input;

use App\Model\Otp;
use App\Model\Molitics\Events;
use App\Model\Molitics\Issues;
use App\Model\Molitics\Village;
use App\Model\Molitics\Contacts;
use App\Model\Molitics\District;
use App\Model\Molitics\StateList;
use App\Model\MplusUsers;
use App\Model\Video;
use App\Model\Molitics\Mp;
use App\Model\Molitics\Mla;
use App\Model\Molitics\Candidates;

use App\Model\YoutubeURL;
use App\Model\Gallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;
use View;

class Appointment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request, $state_id)
    {
        $candidate_id = config('user.candidate_id');
        $today_date = date('yy-m-d');
        $appointment = \App\Model\Molitics\IssueAppointments::selectRaw("
                issue_appointments.id as appointment_id,
                issue_appointments.candidate as candidate_id,
                candidates.name  as candidate_name,
                candidates.contact  as candidate_contact,
                candidate_issues.name issue_name,
                IFNULL(candidate_issues.issue_id, 'Not available')  as uin,
                issue_appointments.created_at as created_at,
                candidate_contacts.name as name,
                candidate_contacts.contact1 as phone,
                mplus_users.id as mplus_user_id,
                IFNULL(candidate_issues.assigned_to, 0) as assigned_to,
                candidate_issues.coordinators as coordinators
            ")
            ->join('mplus_users', 'mplus_users.id', '=', 'issue_appointments.created_by')
            ->join('candidate_issues', 'candidate_issues.id', '=', 'issue_appointments.issue_id')
            ->join('candidate_contacts', 'candidate_contacts.id', '=', 'candidate_issues.coordinators')
            ->join('candidates', 'candidates.id', '=', 'issue_appointments.candidate')
            ->where('mplus_users.state', $state_id);
            if($request->mla){
                $appointment=$appointment->where('mplus_users.mla', $request->mla);
            }               
            else if($request->mp){
                $appointment=$appointment->where('mplus_users.mp', $request->mp);
            }else{
                $appointment=$appointment->where('mplus_users.mla', 'N/A');
            }
                
            // ->where(function($q)use($request){
                
                    
            //     else if($request->mp)
            //         $q->where('mplus_users.mp', $request->mp);
			// })
            // ->where('mplus_users.mla', $mla)
            $appointment=$appointment->where('issue_appointments.candidate', $candidate_id)
            ->where('issue_appointments.status', 0)
            ->whereRaw("cast(issue_appointments.created_at as date) = cast( '{$today_date}' as date)")
            //            ->groupBy('candidate_issues.coordinators')
            ->orderBy('issue_appointments.id')
            ->get();

        $temp = [];
        $offices=\App\Model\Molitics\IssueAppointments::selectRaw(DB::raw('mplus_users.state,state_mla_mapping.id as mla_id,state_mla_mapping.constitutency as mla,state_mp_mapping.id as mp_id,state_mp_mapping.constitutency as mp'))
        ->distinct('state','mla_id','mp_id')
        ->join('mplus_users', 'mplus_users.id', '=', 'issue_appointments.created_by')
        ->leftJoin('state_mla_mapping', 'mplus_users.mla', '=', 'state_mla_mapping.id')
        ->leftJoin('state_mp_mapping', 'mplus_users.mp', '=', 'state_mp_mapping.id')
        ->where('issue_appointments.candidate', $candidate_id)
        ->where('issue_appointments.status', 0)
        ->whereRaw("cast(issue_appointments.created_at as date) = cast( '{$today_date}' as date)")         
        ->groupBy('issue_appointments.created_by')
        ->get();
        foreach ($appointment as $i=>$appoint) {

            $assigned_to_id = explode(',', str_replace(" ", "", $appoint->assigned_to));

            $assigned_user_detail = [];

            if (count($assigned_to_id)) {
                foreach (array_unique($assigned_to_id) as $id) {
                    if ($id) {
                        $user = MplusUsers::select('name', 'contact')->where('entity_id', $id)->first();
                        $assigned_user_detail[] = "({$user->name}, {$user->contact})";
                    } else {
                        $assigned_user_detail[] = "({$appoint->candidate_name}, {$appoint->candidate_contact})";
                    }
                }
                $appoint->assigned_to = implode(', ', $assigned_user_detail);

            } else {
                $appoint->assigned_to = "({$appoint->candidate_name}, {$appoint->candidate_contact})";
            }

            $temp[$appoint['coordinators']]['assigned_to'][] = $appoint->assigned_to;
            $temp[$appoint['coordinators']]['uin'][] = $appoint->uin;
            $temp[$appoint['coordinators']]['created_at'][] = $appoint->created_at;
            $temp[$appoint['coordinators']]['candidate_name'][] = $appoint->candidate_name;
            $temp[$appoint['coordinators']]['candidate_contact'][] = $appoint->candidate_contact;
            $temp[$appoint['coordinators']]['name'][] = $appoint->name;
            $temp[$appoint['coordinators']]['phone'][] = $appoint->phone ;



        }




        if ($request->input('is_ajax')) {
            // dd(array_values($temp));
            return json_encode(
                [
                    'appointment' => array_values($temp),
                    'offices'=>$offices,
                ]
            );
        }

        $status = DB::table('molitics.mplus_users')->where('entity_id', '=', $candidate_id)->select('status')->orderBy('id', 'DESC')->first();

        $stateArray = array();
		$state = StateList::orderBy('state', 'ASC')->get();
		$stateArray[''] = 'Select State';
		foreach($state as $row)
		{
			$stateArray[$row->id] = $row->state;
		}

		$districtArray = array();
		$district = District::where('state', '=', 35)->orderBy('district', 'ASC')->get();
		$districtArray[''] = 'Select District';
		foreach($district as $row)
		{
			$districtArray[$row->id] = $row->district;
		}

		$mlaArray = array();
		$mla = Mla::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
		$mlaArray[''] = 'Select MLA Constituency';
		foreach($mla as $row)
		{
			$mlaArray[$row->id] = $row->constitutency;
		}

		$mpArray = array();
		$mp = Mp::where('state', '=', 35)->orderBy('constitutency', 'ASC')->get();
		$mpArray[''] = 'Select MP Constituency';
		foreach($mp as $row)
		{
			$mpArray[$row->id] = $row->constitutency;
		}

        $video = YoutubeURL::orderBy('id','desc')->skip(0)->take(2)->get();
        ## recent activities
		$base = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/';
        $allGalleries = Gallery::where('published', '=', 1)
                ->select('name','id','created_at',DB::raw('IF(cover IS NULL, "'.DUMMY_GALLERY_IMAGE.'", CONCAT("' . $base . '",cover)) as cover'))
				->orderBy('created_at', 'DESC')->take(3)->get();
        return \view("appointment.appointment", [
            'isAppointmentPage'=>true,
            'appointment' => array_values($temp),
            'status' => $status,
            'offices'=>$offices,
            'stateArray' => $stateArray, 
            'districtArray' => $districtArray, 
            'mpArray' => $mpArray, 
            'mlaArray' => $mlaArray, 
            'video' => $video, 
            'allGalleries' => $allGalleries,
            'events' => $this->getEvents($candidate_id)
        ]);
    }


    private function getEvents($candidate_id)
    {
        $events = Events::leftJoin('state_list', function ($join) {
            $join->on('state_list.id', '=', 'candidate_events.state');
        })
            ->leftJoin('state_district_mapping', function ($join) {
                $join->on('state_district_mapping.id', '=', 'candidate_events.district');
            })
            ->leftJoin('state_mla_mapping', function ($join) {
                $join->on('state_mla_mapping.id', '=', 'candidate_events.mla_constituency');
            })
            ->leftJoin('state_mp_mapping', function ($join) {
                $join->on('state_mp_mapping.id', '=', 'candidate_events.mp_constituency');
            })
            ->leftJoin('village_mla_mapping', function ($join) {
                $join->on('village_mla_mapping.id', '=', 'candidate_events.village');
            })
            ->where('candidate', '=', $candidate_id)
            ->where('event_type', '!=', 8)
            ->where('date', '>=', Date('Y-m-d'))
            ->select('candidate_events.id', 'candidate_events.coordinators', 'address', 'name', 'date', 'time', 'state_list.state', 'state_district_mapping.district', 'state_mla_mapping.constitutency as mla', 'state_mp_mapping.constitutency as mp', 'village_mla_mapping.village')
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC')
            ->take(2)
            ->get();

        foreach ($events as $row) {

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

        return $events;
    }

    
    public function issueVerification()
    {
        // header( 'Content-Type: text/html; charset=utf-8' ); 
        $contact = Input::get('contact');
        $otp = rand(99999,999999);
        $data = Otp::where('contact', '=', $contact)->first();
        if(!$data)
        {
            $data = new Otp;
            $data->contact = $contact;
        }

        $data->otp = $otp;
        $data->save();

        $arr['otp'] = $otp;
        $mobile = '91' . $contact;
        $view = View::make('sms.issue_verification',$arr);
        $message = $view->render();
        send_sms($mobile,$message);
        return;
    }

    public function issueVerificationCheck()
    {
        $otp = Input::get('otp');
        $contact = Input::get('contact');

        $otp = Otp::where('contact', '=', $contact)->where('otp', '=', $otp)->first();
        if($otp)
        {
            $success = 1;
            $otp->delete();
        }
        else
        {
            $success = 0;
        }
        return $success;
    }

    public function getLocations($state)
    {
        $mlaArray = array();
        $mla = Mla::where('state', '=', $state)->orderBy('constitutency', 'ASC')->get();
        foreach($mla as $row)
        {
            $mla = new stdclass;
            $mla->key = $row->constitutency;
            $mla->value = $row->id;
            $mlaArray[] = $mla;
        }

        $mpArray = array();
        $mp = Mp::where('state', '=', $state)->orderBy('constitutency', 'ASC')->get();
        foreach($mp as $row)
        {
            $mp = new stdclass;
            $mp->key = $row->constitutency;
            $mp->value = $row->id;
            $mpArray[] = $mp;
        }

        $districtArray = array();
        $district = District::where('state', '=', $state)->orderBy('district', 'ASC')->get();
        foreach($district as $row)
        {
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

    public function postvillagelist()
    {
        $constituency_id=Input::get('constituency_id');
        $villageArray = array();        
        $village = Village::where('constituency', '=', $constituency_id)->orderBy('village', 'ASC')->get();
            foreach($village as $row)
            {
                $villageArray[$row->id] = $row->village;
            }
        
        $response['villageArray'] = $villageArray;
        
        return $response;
    }

    public function addIssue()
    {
        $otp = Input::get('otp');
        $name = Input::get('name');
        $topic = Input::get('topic');
        $contact = Input::get('contact');
        $issue_mp = Input::get('issue-mp');
        $issue_mla = Input::get('issue-mla');
        $issue_village = Input::get('issue-village');
        $issue_state = Input::get('issue-state');
        $issue_district = Input::get('issue-district');
        $issue_description = Input::get('issue-description');

        $volunteer = Contacts::where('contact1', '=', $contact)->where('candidate', '=', 17049)->first();
        if(!$volunteer)
        {
            $volunteer = new Contacts;
            $volunteer->name = $name;
            $volunteer->contact1 = $contact;
            $volunteer->candidate = 17049;
            $volunteer->contact_type = 1;
            $volunteer->state = $issue_state;
            $volunteer->district = $issue_district;
            $volunteer->mla = $issue_mla;
            $volunteer->mp = $issue_mp;
            $volunteer->village = $issue_village;
            $volunteer->save();
        }
/*
        $issue = new Issues;
        $issue->candidate = 17049;
        $issue->name = $topic;
        $issue->description = $issue_description;
        $issue->coordinators = $volunteer->id;
        $issue->created_by = 'website';
        $issue->save();
        $mobile = '91' .$contact;
        $view = View::make('sms.joining_issue_message');
        $message = $view->render();
        send_sms($mobile,$message,VERIFICATION_ID);
*/
        // header( 'Content-Type: text/html; charset=utf-8' ); 
        $issue = new Issues;
        $issue->candidate = 17049;
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
        send_sms($mobile, $message);
        return;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
