<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class YoutubeURL extends Model {

    protected $guarded = array('id');
    protected $table = 'videourl';

    public function getVideourlAtAttribute($value) {
        if (filter_var($value, FILTER_VALIDATE_URL) === FALSE) {
            return $value;
        } else {
            if (($pos = strpos($value, "?v=")) !== FALSE) { 
                return substr($value, $pos+1);
            }
        }
    }

}
