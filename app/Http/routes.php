<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// define('STATIC_BASE_URL', URL::to('/'));
define('STATIC_BASE_URL', 'http://localhost:8000');



define('S3_BUCKET', 'dalitcongress');

define('S3_BASE_URL', 'https://s3-ap-southeast-1.amazonaws.com');
define('CDN_BASE_URL', 'https://molitics.s3.amazonaws.com');


define('MOLITICS_BASE_URL', 'http://molitics.net/website/');
define('CANDIDATE_AUTH_KEY', 'EyTp5qMs478Kho214DznIEwwFPvu7stpYWlR');

define('PHOTO_GALLERY', 'photo-gallery');
define('S3_IMAGES_CACHE_TIME', 60 * 60 * 24 * 365 * 5);
define('TEMP_IMAGE_PATH', public_path() . '/temp_image');
define('TEMP_VIDEO_PATH', public_path() . '/temp_video');
define('DUMMY_GALLERY_IMAGE', URL::to('/') . '/images/' . 'dummy-image.jpg');
define('DUMMY_NEWS_PIC', STATIC_BASE_URL . '/images/dummy_news_image.jpg');
define('CANDIDATE_IMAGE_DIR_DISPLAY', 'https://molitics.s3.amazonaws.com/images/candidate-image/');
define('VIDEO_PATH', S3_BASE_URL . '/' . S3_BUCKET . '/dalit_congress_video/');
//news type
define('REGIONAL_NEWS', 1);
define('NATIONAL_NEWS', 2);
define('GLOBAL_NEWS', 3);

// Image Links
define('NEWS_IMG', 'https://s3-ap-southeast-1.amazonaws.com/molitics/images/news/');
define('EVENT_IMG', 'http://molitics.net/event_image/');

define('SMS_API_USERNAME', 'MOLITS');
define('SMS_API_PASSWORD', '9f976e767aXX');
//define('VERIFICATION_ID', 'MOLITS');
define('VERIFICATION_ID', 'SENOTP');

//biztech credentials.
define('SMS_BIZTECH_URL', 'https://49.50.67.32/smsapi/jsonapi.jsp?');
define('SMS_BIZTECH_USERNAME', 'MOLITICS');
define('SMS_BIZTECH_PASSWORD', 'MOLITICS');


Route::get('/', 'HomeController@getIndex');
Route::get('/news-details/{NewsId}', 'HomeController@getNewsDetails');
Route::get('/event-details/{EventId}', 'HomeController@getEventDetails');
Route::get('video_gallery', 'HomeController@allVideo');
Route::get('/press_coverage', 'HomeController@getPresscoverage');
Route::get('/press_coverage/{id}', 'HomeController@getPresscoverageimage');
Route::get('/patravyavahar', 'HomeController@getPatravyavahar');
Route::get('/patravyavahar/{id}', 'HomeController@getPatravyavaharimage');
Route::get('/blog-list', 'HomeController@getBloglist');
Route::get('/blog/{id}', 'HomeController@getBlogdetail');
Route::get('/press_notes', 'HomeController@getPressnoteslist');
Route::get('/press_notes/{id}', 'HomeController@getPressnotesdetail');
Route::get('/culturalevent', 'HomeController@getCulturaleventlist');
Route::get('/culturalevent/{id}', 'HomeController@getCulturaleventdetail');

Route::get('profile', function () {
    return view('profile');
});

Route::get('priorities', function () {
    return view('priorities');
});

Route::get('/news', 'NewsController@allNews');
Route::get('/news/{id}/{title}', '\App\Http\Controllers\NewsController@getNewsDetails');
Route::get('/event_schedule', 'EventController@getEvents');
Route::get('/event_schedule/{id}', 'EventController@getEvents');
Route::get('/photo_gallery', 'GalleryController@getGalleries');
Route::get('/appointment/{state_id}', 'Appointment@index');



Route::group(array('prefix' => 'work'), function () {
    Route::get('/list', 'WorkController@getWorks');
    Route::get('/details/{id}', 'WorkController@workDetails');
});

Route::get('social-connect', function () {
    return view('social-connect');
});

Route::get('/images/{id}', 'GalleryController@getImages');

Route::get('slider', function () {
    return view('slider');
});

Route::get('/contact_us', 'HomeController@contactUs');
Route::get('about_journey', function () {
    return view('about_journey');
});
Route::get('achievements', function () {
    return view('achievements');
});

Route::group(array('prefix' => 'molitics'), function () {
    Route::get('events', '\App\Http\Controllers\MoliticsController@event');
    Route::get('picture', '\App\Http\Controllers\MoliticsController@pictureForm');
    Route::post('picture', '\App\Http\Controllers\MoliticsController@pictureUpload');
});

Route::group(array('prefix' => 'admin'), function () {
    Route::get('/', 'AdminController@index');
    Route::post('login', 'AdminController@postLogin');
    Route::get('home', 'AdminController@getHome');
    Route::get('logout', 'AdminController@getLogout');
    Route::post('images/{id}', 'AdminController@uploadImages');
    Route::post('make-cover', 'AdminController@makeCover');
    Route::post('delete-image', 'AdminController@deleteImage');
    Route::post('delete-gallery', 'AdminController@deleteGallery');

    Route::get('gallery', 'AdminController@getGallary');
    Route::get('gallery/{id}', 'AdminController@galleryImages');
    Route::post('gallary', 'AdminController@gallary');
    Route::post('gallary/{id}', 'AdminController@gallary');
    Route::post('edit-gallery', 'AdminController@editGallery');

    Route::get('works', 'AdminController@getWorks');
    Route::post('add-work', 'AdminController@addWork');
    Route::get('worklist', 'AdminController@getWorklist');
    Route::post('deletework', 'AdminController@postDeletework');
    Route::get('editviewwork', 'AdminController@getEditviewwork');
    Route::post('editworksave', 'AdminController@postEditworksave');
    Route::get('editworkimage', 'AdminController@getEditworkimage');
    Route::post('imagesave', 'AdminController@postImageSave');


    Route::get('video', 'AdminController@getVideourl');

    Route::post('/contactdownload', 'AdminController@postContactdownload');
    Route::post('/joindownload', 'AdminController@postJoindownload');



    Route::post('add-videourl', 'AdminController@addVideo');
    Route::get('videolist', 'AdminController@getVideolist');
    Route::post('deletevideo', 'AdminController@postDeletevideo');
    Route::get('editviewvideo', 'AdminController@getEditviewvideo');
    Route::post('editvideosave', 'AdminController@postEditvideosave');
    Route::post('viewvideo', 'AdminController@postViewvideo');

    Route::get('issues', 'AdminController@getIssuesurl');
    Route::get('issuelist', 'AdminController@getIssuelist');
    Route::post('viewissue', 'AdminController@postViewissue');

    Route::get('join-us', 'AdminController@getJoinUsurl');
    Route::get('joinuslist', 'AdminController@getJoinUslist');
    Route::post('viewjoinus', 'AdminController@postViewjoinus');

    Route::get('team', 'AdminController@getTeam');
    Route::post('add-team', 'AdminController@addTeam');
    Route::get('teamlist', 'AdminController@getTeamlist');
    Route::post('deleteteam', 'AdminController@postDeleteteam');
    Route::get('editviewteam', 'AdminController@getEditviewteam');
    Route::post('editteamsave', 'AdminController@postEditteamsave');
    Route::get('editteamimage', 'AdminController@getEditteamimage');
    Route::post('teamimagesave', 'AdminController@postImageteamSave');
    Route::post('viewteam', 'AdminController@postViewteam');

    Route::get('presscoverage', 'AdminController@getPresscoverage');
    Route::post('add-presscoverage', 'AdminController@addPresscoverage');
    Route::get('presscoveragelist', 'AdminController@getPresscoveragelist');
    Route::post('deletepresscoverage', 'AdminController@postDeletepresscoverage');
    Route::get('editviewpresscoverage', 'AdminController@getEditviewpresscoverage');
    Route::post('editpresscoveragesave', 'AdminController@postEditpresscoveragesave');
    Route::post('viewpresscoverage', 'AdminController@postViewpresscoverage');

    Route::get('patravahar', 'AdminController@getPatravahar');
    Route::post('add-patravahar', 'AdminController@addPatravahar');
    Route::get('patravaharlist', 'AdminController@getPatravaharlist');
    Route::post('deletepatravahar', 'AdminController@postDeletepatravahar');
    Route::get('editviewpatravahar', 'AdminController@getEditviewpatravahar');
    Route::post('editpatravaharsave', 'AdminController@postEditpatravaharsave');
    Route::post('viewpatravahar', 'AdminController@postViewpatravahar');

    Route::get('press_notes', 'AdminController@getPressnotes');
    Route::post('add-press_notes', 'AdminController@addPressnotes');
    Route::get('organization', 'AdminController@getOrganization');
    Route::post('add-organization_leader', 'AdminController@addOrganizationLeader');
    Route::get('organizationlist', 'AdminController@getOrganizationlist');
    Route::get('press_noteslist', 'AdminController@getPressnoteslist');
    Route::post('deletepress_notes', 'AdminController@postDeletepress_notes');
    Route::get('editviewpress_notes', 'AdminController@getEditviewpress_notes');
    Route::post('editpress_notessave', 'AdminController@postEditpress_notessave');
    Route::get('editpress_notesimage', 'AdminController@getEditpress_notesimage');
    Route::post('press_notesimagesave', 'AdminController@postNotesImageSave');
    Route::post('viewpress_notes', 'AdminController@postViewpress_notes');

    Route::get('blog', 'AdminController@getBlog');
    Route::post('add-blog', 'AdminController@addBlog');
    Route::get('bloglist', 'AdminController@getBloglist');
    Route::post('deleteblog', 'AdminController@postDeleteblog');
    Route::get('editviewblog', 'AdminController@getEditviewblog');
    Route::post('editblogsave', 'AdminController@postEditblogsave');
    Route::get('editblogimage', 'AdminController@getEditblogimage');
    Route::post('blogimagesave', 'AdminController@postBlogImageSave');
    Route::post('viewblog', 'AdminController@postViewblog');
    Route::get('addblog', 'AdminController@getAddblog');

    Route::get('culturalevent', 'AdminController@getCulturalevent');
    Route::post('add-culturalevent', 'AdminController@addCulturalevent');
    Route::get('culturaleventlist', 'AdminController@getCulturaleventlist');
    Route::post('deleteculturalevent', 'AdminController@postDeleteculturalevent');
    Route::get('editviewculturalevent', 'AdminController@getEditviewculturalevent');
    Route::post('editculturaleventsave', 'AdminController@postEditculturaleventsave');
    Route::get('editculturaleventimage', 'AdminController@getEditculturaleventimage');
    Route::post('culturaleventimagesave', 'AdminController@postCulturalImageSave');
    Route::post('viewculturalevent', 'AdminController@postViewculturalevent');

    // subscribe list
    Route::get('subscribe', 'AdminController@getSubscribe');
    Route::get('subscribelist', 'AdminController@getSubscribelist');
    Route::get('graduatevoter', 'AdminController@getGraduatevoter');
    Route::get('graduate_list', 'AdminController@getGraduatelist');
});


Route::post('/subscribe-user', 'HomeController@subscribe_user');
Route::post('graduate-user', 'HomeController@graduate_user');
Route::get('/organisation/{state}', 'HomeController@organisation');

// Route::post('/issue-verification', 'HomeController@issueVerification');
// Route::get('/issue-verification-otp', 'HomeController@issueVerificationCheck');
// Route::post('/issue', 'HomeController@addIssue');

Route::get('/issue-verification', 'Appointment@issueVerification');
Route::get('/issue-verification-otp', 'Appointment@issueVerificationCheck');
Route::post('/issue', 'Appointment@addIssue');

Route::post('/essay', 'HomeController@addEssay');
Route::post('/video', 'HomeController@addVideo');
Route::get('/locations/{state}', 'HomeController@getLocations');
Route::post('/add-volunteer', 'HomeController@addVolunteer');
Route::post('villagelist', 'HomeController@postVillagelist');
Route::post('/static/upload-data', 'StaticController@uploadData');

Route::get('/key-issue/{id}', 'HomeController@getKeyDetailPage');
Route::get('/mission', 'HomeController@getMission');
Route::get('/know-more', 'HomeController@getKnowMore');
Route::get('newhome', function () {
    return view('newhome');
});
// Route::get('blog-list', function (){return view('blog-list');});
Route::get('event-detail', function () {
    return view('event-detail');
});
Route::get('index', function () {
    return view('index');
});
//Route::get('know-more', function (){return view('know-more');});
Route::get('indira-gandhi', function () {
    return view('indira-gandhi');
});
Route::get('gandhi', function () {
    return view('gandhi');
});
Route::get('ambedkar', function () {
    return view('ambedkar');
});
Route::get('terms', function () {
    return view('terms');
});
Route::get('privacy_policy', function () {
    return view('privacy_policy');
});
Route::get('samvidhan', function () {
    return view('samvidhan');
});
Route::get('buddha', function () {
    return view('buddha');
});
Route::get('appointment', function () {
    return view('appointment');
});
Route::get('dharni-portal', function () {
    return view('dharni-portal');
});



Route::get('lb', function () {
    'OK';
});

//Route::get('mission', function (){return view('mission');});

//Route::get('organisation', function (){return view('organisation');});

//Route::get('newslist', function (){return view('newslist');});
//Route::get('newsdetail', function (){return view('newsdetail');});
//Route::get('videolists', function (){return view('videolists');});
//Route::get('keydetail', function (){return view('keydetail');});
