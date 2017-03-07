<?php
Route::group(['namespace' => 'Oauth'], function() {
    Route::get('oauth/client/index', 'OauthController@client')->name('admin.oauth.client.index');
    Route::get('oauth/client/search', 'OauthController@clientSearch')->name('admin.oauth.client.search');
    Route::get('oauth/client/create', 'OauthController@clientCreate')->name('admin.oauth.client.create');
    Route::get('oauth/client/{client_id}', 'OauthController@clientDetail')->name('admin.oauth.client.detail');
    Route::post('oauth/client/create', 'OauthController@clientCreate')->name('admin.oauth.client.create');
    Route::post('oauth/client/{client_id}', 'OauthController@clientDetail')->name('admin.oauth.client.detail');
    Route::delete('oauth/client/{client_id}', 'OauthController@clientDetail')->name('admin.oauth.client.delete');

    Route::get('oauth/client/{client_id}/endpoint', 'OauthController@clientEndpointSearch')->name('admin.oauth.client.endpoint');
    Route::post('oauth/client/{client_id}/endpoint/create', 'OauthController@clientEndpointCreate')->name('admin.oauth.client.endpoint.create');
    Route::delete('oauth/client/{client_id}/endpoint/{endpoint_id}', 'OauthController@clientEndpointDetail')->name('admin.oauth.client.endpoint.delete');

    Route::get('oauth/group/index', 'OauthController@group')->name('admin.oauth.group.index');
    Route::get('oauth/group/search', 'OauthController@groupSearch')->name('admin.oauth.group.search');
    Route::get('oauth/group/create', 'OauthController@groupCreate')->name('admin.oauth.group.create');
    Route::get('oauth/group/{group_id}', 'OauthController@groupDetail')->name('admin.oauth.group.detail');
});
