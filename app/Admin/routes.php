<?php

Route::get('/information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

/*Route::get('/lang/{lang}/',['as' => 'admin.lang',function($lang){

        $session = Request::getSession();
        $session->put('lang', $lang);
        return redirect(config('sleeping_owl.url_prefix'));

}]);*/

/*Route::post('/news/export.json', ['as' => 'admin.news.export', function () {
	$response = new \Illuminate\Http\JsonResponse([
		'title' => 'Congratulation! You exported news.',
		'news' => App\Model\News5::whereIn('id', Request::get('id', []))->get()
	]);

	$response->setJsonOptions(JSON_PRETTY_PRINT);

	return $response;
}]);*/