<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Model\Molitics\Candidates;
use DB;
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getCandidate(){
		$candidate_id=config('user.candidate_id');
        return Candidates::find($candidate_id);
    }
    public function getOffice(){
		$candidate_id=config('user.candidate_id');
		// dd($candidate_id);
		
		$today_date = date('yy-m-d');
		$office=\App\Model\Molitics\IssueAppointments::selectRaw(DB::raw('mplus_users.state,state_mla_mapping.id as mla_id,state_mla_mapping.constitutency as mla,state_mp_mapping.id as mp_id,state_mp_mapping.constitutency as mp'))
				->join('mplus_users', 'mplus_users.id', '=', 'issue_appointments.created_by')
				->leftJoin('state_mla_mapping', 'mplus_users.mla', '=', 'state_mla_mapping.id')
				->leftJoin('state_mp_mapping', 'mplus_users.mp', '=', 'state_mp_mapping.id')
				->where('issue_appointments.candidate', $candidate_id)
				->where('issue_appointments.status', 0)
				->whereRaw("cast(issue_appointments.created_at as date) = cast( '{$today_date}' as date)")         
				->groupBy('issue_appointments.created_by')
				->first();
		return $office;
	}
}
