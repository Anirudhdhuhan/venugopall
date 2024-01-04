<?php

namespace App\Http\Controllers;

use App\Model\Molitics\News;

class NewsController extends Controller {

    public function __construct() {
        $this->leader_id = config('user.candidate_id');
    }

    public function allNews() {

        $news = News::whereRaw('FIND_IN_SET(' . $this->leader_id . ',candidate_leader)')
                ->orderBy('approved_at', 'DESC')
                ->paginate(16);
        foreach ($news as $row) {
            $row->image = NEWS_IMG . $row->image;
            $row->content = strip_tags($row->content);
            $row->approved_at = action_time($row->approved_at);
        }
        return view('news', array('news' => $news));
    }

    public function getNewsDetails($id, $title) {
        $news = News::where('id', '=', $id)
                ->orderBy('id', 'DESC')
                ->get();

        foreach ($news as $row) {
            $row->approved_at = action_time($row->approved_at);
            $row->image = NEWS_IMG . $row->image;
        }

        $latest_news = News::whereRaw('FIND_IN_SET(' . $this->leader_id . ',candidate_leader)')
                ->where('id', '!=', $id)
                ->orderBy('id', 'DESC')
                ->take(3)
                ->get();

        foreach ($latest_news as $row) {
            $row->approved_at = action_time($row->approved_at);
            $row->image = NEWS_IMG . $row->image;
        }
        return view('newsdetail', array('news' => $news[0], 'latest_news' => $latest_news));
    }

}
