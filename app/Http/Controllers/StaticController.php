<?php

namespace App\Http\Controllers;

use View;
use Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;
use App\Model\Bearers;

class StaticController extends Controller {

    public function __construct() {
        // 
    }

    public function uploadData() {
        $file = Input::file('file');
        $csv = array_map('str_getcsv', file($file));
        unset($csv[0]);
        foreach ($csv as $row) {
            $bearers = new Bearers;
            $bearers->name = $row[1];
            $bearers->post1 = $row[2];
            $bearers->post1_name = $row[3];
            $bearers->post2_name = $row[4];
            $bearers->contact = $row[5];
            $bearers->place = $row[6];
            $bearers->fb = $row[7];
            $bearers->twitter = $row[8];
            $bearers->save();
        }
    }

}
