<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use stdClass;
use App\Model\Gallery;
use App\Model\GalleryImages;

class GalleryController extends Controller {

    public function __construct() {
        //
    }

    public function getGalleries() {
        $allGalleries = Gallery::where('published', '=', 1)->orderBy('created_at', 'DESC')->get();
        foreach ($allGalleries as $row) {
            $date = $row->updated_at->format('Y-m-d H:i:s');
            $row->date = action_time($date);
            $row->cover = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->cover;
            unset($row->updated_at);
            unset($row->created_at);
        }

        return view('photo_gallery', array('allGalleries' => $allGalleries));
    }

    public function getImages($id) {
        $images = GalleryImages::where('gallery', '=', $id)->get();
        $gallery = Gallery::where('id', '=', $id)->first();
        foreach ($images as $row) {
            $row->image = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $row->image;
        }

        $meta = new stdClass;
        $meta->heading = $gallery->name;
        $meta->image = S3_BASE_URL . '/' . S3_BUCKET . '/' . PHOTO_GALLERY . '/' . $gallery->cover;
        $meta->id = $id;
        $meta->url = 'http://ashoktanwar.com.net/images/' . $id;
        $meta->content = $gallery->name;

        return view('photo_inner_gallery', array('images' => $images, 'gallery' => $gallery, 'meta' => $meta));
    }

}
