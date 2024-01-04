<?php

namespace App\Http\Controllers;

use URL;
use View;
use Request;
use stdclass;
use Illuminate\Support\Facades\Input;
use App\Model\Molitics\Events;
use App\Model\Molitics\Contacts;

class EventController extends Controller {

    public function __construct() {
        // 
        
        $this->leader_id = config('user.candidate_id');
        $this->middleware('csrf', ['only' => 'issueVerification']);
    }
public function getEvents()
    {

        // $upcomint_event = json_decode(file_get_contents(MOLITICS_BASE_URL . 'events/' . CANDIDATE_AUTH_KEY));

        // $upcoming = $upcomint_event->data;
$upcoming = Events::leftJoin('state_list', function($join) {
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
        foreach ($upcoming as $row) {
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
        $past_event = json_decode(file_get_contents(MOLITICS_BASE_URL . 'past-events/' . CANDIDATE_AUTH_KEY));

        $past = $past_event->data;
// dd($past);
        return view('event_schedule', array('upcomingEvents' => $upcoming, 'pastEvents' => $past));
    }
    

}
