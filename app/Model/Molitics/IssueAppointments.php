<?php

namespace App\Model\Molitics;

use Illuminate\Database\Eloquent\Model;

class IssueAppointments extends Model
{
    protected $connection = 'molitics';
    protected $guarded = array('id');
    protected $table = 'issue_appointments';
}
