<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use stdclass;

class MplusUsers extends Model
{
    protected $guarded = array('id');
    protected $table = 'mplus_users';
    public $timestamps = true;
    protected $connection = 'molitics';

    public static function getProfile($user)
    {

        $state = StateList::where('id', '=', $user->state)->first();
        $district = DistrictMapping::where('id', '=', $user->district)->first();
        $mla = MlaConstitutency::where('id', '=', $user->mla)->first();
        $mp = MpConstitutency::where('id', '=', $user->mp)->first();

        $profile = new stdclass;
        $profile->auth_key = $user->auth_key;
        $profile->state = (int)$user->state;
        $profile->district = (int)$user->district;
        $profile->mla = (int)$user->mla;
        $profile->mp = (int)$user->mp;
        $profile->village = (int)$user->village;
        $profile->entity_id = (int)$user->entity_id;
        $profile->entity = (int)$user->entity;
        $profile->mplus_active = $user->is_active;

        $profile->state_name = $state->state;
        if ($district)
            $profile->district_name = $district->district;
        else
            $profile->district_name = '';

        if ($mla)
            $profile->mla_name = $mla->constitutency;
        else
            $profile->mla_name = '';

        if ($mp)
            $profile->mp_name = $mp->constitutency;
        else
            $profile->mp_name = '';


        if ($profile->entity == ENTITY_TYPE_CANDIDATE) {
            $candidate = Candidate::where('id', '=', $user->entity_id)->first();
            $party = PartyList::where('id', '=', $candidate->party)->first();
            $party_position = Position::where('position_id', '=', $candidate->position)->first();
            $profile->name = $candidate->name;
            $profile->email = $candidate->email;
            $profile->dob = $candidate->dob;
            $profile->contact = $candidate->contact;
            $profile->party = $party->party_name;
            $profile->party_position = $party_position->position_title;
            $profile->status = $candidate->status;
            $profile->status_pic = $candidate->status_pic ? S3_BASE_URL . '/' . S3_BUCKET . '/images/candidate-status/' . $candidate->status_pic : '';
            $profile->profile_pic = $candidate->profile_image ? CANDIDATE_IMAGE_DIR_DISPLAY . $candidate->profile_image : '';
            $profile->facebook_page_id = $candidate->fb;
            $profile->twitter_handler = $candidate->twitter;
            $profile->is_booth_manager = 0;
        } else if ($profile->entity == ENTITY_TYPE_PARTY) {
            $party = PartyList::where('id', '=', $user->entity_id)->first();
            $profile->name = $party->party_code;
            $profile->status = '';
            $profile->status_pic = '';
            $profile->profile_pic = $party->party_logo ? PARTY_LOGO_DIR_DISPLAY . $party->party_logo : '';
            $profile->facebook_page_id = '';
            $profile->twitter_handler = '';
            $profile->is_booth_manager = 0;
        } else if ($profile->entity == ENTITY_TYPE_WORKER) {

            $contact = CandidateContacts::where('contact1', '=', $user->contact)
                // ->where('created_by_entity', '=', $profile->entity)
                // ->where('created_by_id', '=', $profile->entity_id)
                ->first();

            $profile->name = $contact->name;
            $profile->status = '';
            $profile->status_pic = '';
            $profile->profile_pic = '';
            $profile->facebook_page_id = '';
            $profile->twitter_handler = '';
            $profile->is_booth_manager = $contact->booth ? 1 : 0;
            if ($contact->party_position) {
                $party_position = PartyPosition::where('id', '=', $contact->party_position)->first();
                $profile->party_position = $party_position->title;
            }

            if (strpos($user->permission_news, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_event, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_issue, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_contact, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_voters, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_users, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_status, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_analytics, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_fb, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }
            if (strpos($user->permission_twitter, '1') !== false && $profile->is_booth_manager == 1) {
                $profile->is_booth_manager = 0;
            }

        }
        return $profile;
    }

    public static function getPermissions($user)
    {
        $permissionObj = new stdclass;
        $newsObj = new stdclass;
        $eventObj = new stdclass;
        $issueObj = new stdclass;
        $contactObj = new stdclass;
        $votersObj = new stdclass;
        $usersObj = new stdclass;
        $statusObj = new stdclass;
        $analyticsObj = new stdclass;
        $fbObj = new stdclass;
        $twitterObj = new stdclass;
        $voiceObj = new stdclass;
        $smsObj = new stdclass;

        $newsObj->module_visiblity = true;
        $newsObj->view = strpos($user->permission_news, '1') !== false ? true : false;
        $newsObj->edit = strpos($user->permission_news, '2') !== false ? true : false;
        $newsObj->add = strpos($user->permission_news, '3') !== false ? true : false;
        $newsObj->delete = strpos($user->permission_news, '4') !== false ? true : false;
        if ($user->entity == ENTITY_TYPE_WORKER && $newsObj->view == false) {
            $newsObj->module_visiblity = false;
        }

        $eventObj->module_visiblity = true;
        $eventObj->view = strpos($user->permission_event, '1') !== false ? true : false;
        $eventObj->edit = strpos($user->permission_event, '2') !== false ? true : false;
        $eventObj->add = strpos($user->permission_event, '3') !== false ? true : false;
        $eventObj->delete = strpos($user->permission_event, '4') !== false ? true : false;
        if ($user->entity == ENTITY_TYPE_WORKER && $eventObj->view == false) {
            $eventObj->module_visiblity = false;
        }

        $issueObj->module_visiblity = true;
        $issueObj->view = strpos($user->permission_issue, '1') !== false ? true : false;
        $issueObj->edit = strpos($user->permission_issue, '2') !== false ? true : false;
        $issueObj->add = strpos($user->permission_issue, '3') !== false ? true : false;
        $issueObj->delete = strpos($user->permission_issue, '4') !== false ? true : false;
        if ($user->entity == ENTITY_TYPE_WORKER && $issueObj->view == false) {
            $issueObj->module_visiblity = false;
        }

        $contactObj->module_visiblity = true;
        $contactObj->view = strpos($user->permission_contact, '1') !== false ? true : false;
        $contactObj->edit = strpos($user->permission_contact, '2') !== false ? true : false;
        $contactObj->add = strpos($user->permission_contact, '3') !== false ? true : false;
        $contactObj->delete = strpos($user->permission_contact, '4') !== false ? true : false;
        if ($user->entity == ENTITY_TYPE_WORKER && $contactObj->view == false) {
            $contactObj->module_visiblity = false;
        }

        $votersObj->view = strpos($user->permission_voters, '1') !== false ? true : false;
        $votersObj->edit = strpos($user->permission_voters, '2') !== false ? true : false;
        $votersObj->add = strpos($user->permission_voters, '3') !== false ? true : false;
        $votersObj->delete = strpos($user->permission_voters, '4') !== false ? true : false;
        $votersObj->module_visiblity = true;
        $votersObj->is_booth_manager = 0;
        if ($user->entity == ENTITY_TYPE_WORKER) {
            $contact_details = CandidateContacts::where('id', '=', $user->entity_id)->first();
            if ($contact_details->booth) {
                $votersObj->is_booth_manager = 1;
                $votersObj->view = true;
                $votersObj->edit = true;
                $votersObj->add = true;
                $votersObj->delete = true;
                $votersObj->module_visiblity = true;
            } else {
                $votersObj->module_visiblity = false;
            }
        }

        $usersObj->module_visiblity = true;
        $usersObj->view = strpos($user->permission_users, '1') !== false ? true : false;
        $usersObj->edit = strpos($user->permission_users, '2') !== false ? true : false;
        $usersObj->add = strpos($user->permission_users, '3') !== false ? true : false;
        $usersObj->delete = strpos($user->permission_users, '4') !== false ? true : false;
        if ($user->entity == ENTITY_TYPE_WORKER && $usersObj->view == false) {
            $usersObj->module_visiblity = false;
        }

        $statusObj->module_visiblity = true;
        $statusObj->view = strpos($user->permission_status, '1') !== false ? true : false;
        $statusObj->edit = false;
        $statusObj->add = false;
        $statusObj->delete = false;
        if ($user->entity == ENTITY_TYPE_WORKER && $statusObj->view == false) {
            $statusObj->module_visiblity = false;
        }

        $analyticsObj->module_visiblity = true;
        $analyticsObj->view = strpos($user->permission_analytics, '1') !== false ? true : false;
        $analyticsObj->edit = false;
        $analyticsObj->add = false;
        $analyticsObj->delete = false;
        if ($user->entity == ENTITY_TYPE_WORKER && $analyticsObj->view == false) {
            $analyticsObj->module_visiblity = false;
        }

        $fbObj->module_visiblity = true;
        $fbObj->view = strpos($user->permission_fb, '1') !== false ? true : false;
        $fbObj->edit = false;
        $fbObj->add = false;
        $fbObj->delete = false;
        if ($user->entity == ENTITY_TYPE_WORKER && $fbObj->view == false) {
            $fbObj->module_visiblity = false;
        }

        $twitterObj->module_visiblity = true;
        $twitterObj->view = strpos($user->permission_twitter, '1') !== false ? true : false;
        $twitterObj->edit = false;
        $twitterObj->add = false;
        $twitterObj->delete = false;
        if ($user->entity == ENTITY_TYPE_WORKER && $twitterObj->view == false) {
            $twitterObj->module_visiblity = false;
        }

        $voiceObj->module_visiblity = true;
        $voiceObj->view = true;
        $voiceObj->edit = true;
        $voiceObj->add = true;
        $voiceObj->delete = true;
        if ($user->entity == ENTITY_TYPE_WORKER) {
            $voiceObj->module_visiblity = false;
            $voiceObj->view = false;
            $voiceObj->edit = false;
            $voiceObj->add = false;
            $voiceObj->delete = false;
        }

        $smsObj->module_visiblity = true;
        $smsObj->view = true;
        $smsObj->edit = false;
        $smsObj->add = false;
        $smsObj->delete = false;
        if ($user->entity == ENTITY_TYPE_WORKER) {
            $smsObj->module_visiblity = false;
            $smsObj->view = false;
            $smsObj->edit = false;
            $smsObj->add = false;
            $smsObj->delete = false;
        }

        $permissionObj->permission_news = $newsObj;
        $permissionObj->permission_event = $eventObj;
        $permissionObj->permission_issue = $issueObj;
        $permissionObj->permission_contact = $contactObj;
        $permissionObj->permission_voters = $votersObj;
        $permissionObj->permission_users = $usersObj;
        $permissionObj->permission_status = $statusObj;
        $permissionObj->permission_analytics = $analyticsObj;
        $permissionObj->permission_fb = $fbObj;
        $permissionObj->permission_twitter = $twitterObj;
        $permissionObj->permission_voice = $voiceObj;
        $permissionObj->permission_sms = $smsObj;
        return $permissionObj;
    }

    public static function setUserPermission()
    {
        return $rules = [
            'permission' => 'required'
        ];
    }

    public static function validateAllParams()
    {
        return $rules = [
            'permission_event' => 'required',
            'permission_issue' => 'required',
            'permission_contact' => 'required',
            'permission_news' => 'required',
            'permission_voters' => 'required',
            // 'permission_users'			=>	'required',
            // 'permission_status'			=>	'required',
            // 'permission_analytics'		=>	'required',
            'permission_fb' => 'required',
            'permission_twitter' => 'required'
        ];
    }

    public static function validateSubParams()
    {
        return $rules = [
            'view' => 'required|boolean',
            'edit' => 'required|boolean',
            'add' => 'required|boolean',
            'delete' => 'required|boolean'
        ];
    }

    public static function messages()
    {
        return $messages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'This :attribute has been already registered',
            'in' => 'The selected :attribute is invalid.',
            'boolean' => 'The :attribute field must be true or false.',
            'integer' => 'The :attribute must be an integer.',
            'json' => 'The :attribute must be an json.',
            'numeric' => 'The :attribute must be a number.',
            'required_if' => 'The :attribute field is required when :other is :value.',
            'required_with' => 'The :attribute field is required when :values is present.',
            'required_with_all' => 'The :attribute field is required when :values is present.',
            'between' => 'The :attribute field is required and value should be between 1-2.',
            'min' => [
                'numeric' => 'The :attribute must be at least :min.',
                'file' => 'The :attribute must be at least :min kilobytes.',
                'string' => 'The :attribute must be at least :min characters.',
                'array' => 'The :attribute must have at least :min items.',
            ],
            'max' => [
                'numeric' => 'The :attribute may not be greater than :max.',
                'file' => 'The :attribute may not be greater than :max kilobytes.',
                'string' => 'The :attribute may not be greater than :max characters.',
                'array' => 'The :attribute may not have more than :max items.',
            ],
        ];
    }
}