<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','IndexController@index')->name('get.index');
Route::get('/detail/{id}','DetailController@index')->name('get.detail');
Route::get('/freecash', 'FreecashController@index')->name('get.freecash');
Route::post('/addcustomer','CustomerController@storeCustomer')->name('post.addcustomer');
Route::get('/login','HomeController@getLogin')->name('get.login');
Route::post('/postlogin','HomeController@login')->name('post.login');
Route::get('/logout', 'HomeController@logout')->name('get.logout');
Route::post('/postpartner', 'PartnerController@store')->name('post.partner');
Route::post('/checkemail','CustomerController@checkEmail')->name('post.email.customers');

//admin
Route::group(['prefix' => 'admin','middleware' => ['checklogin']], function() {
	Route::get('/', function() {return view('admin.index');})->name('get.index.admin');
	Route::post('/change-pass/{id}', 'HomeController@changePassword')->name('admin.change_password');
	//User
	Route::group(['prefix' => 'user','middleware' => ['checkadmin']], function() {
	    Route::get('/','UserController@index')->name('admin.user.index');
	    Route::get('/recycle','UserController@recycle')->name('admin.user.recycle');
	    Route::get('/adduser', 'UserController@getCreate')->name('admin.user.get_create');
	    Route::post('/postadduser','UserController@store')->name('admin.user.post_create');
	    Route::get('/detailuser/{id}','UserController@show')->name('admin.user.show');
	    Route::get('/deleterecyle/{id}','UserController@deleteRecycle')->name('admin.user.get_delete_recycle');
	    Route::get('/undouser/{id}','UserController@undo')->name('admin.user.get_undo');
	    Route::delete('/delete/{id}','UserController@destroy')->name('admin.user.delete');
	    Route::get('/edit/{id}','UserController@getEdit')->name('admin.user.get_edit');
	    Route::post('/postedit/{id}','UserController@edit')->name('admin.user.post_edit');
	});
	// House
	Route::group(['prefix' => 'house','middleware' => ['checkadmin']], function() {
		Route::get('/recycle','HouseController@recycle')->name('admin.house.recycle');
		Route::get('/house/undohouse/{id}','HouseController@undo')->name('admin.house.undo');
		Route::get('/house/deleterecyle/{id}','HouseController@deleteRecycle')->name('admin.house.delete.recycle');
		Route::put('/{house_id}/image/{image_id}', "HouseController@putUpdateImage")->name('admin.house.update_image');
		Route::resource('house','HouseController',['as' => 'admin']);
	});
	// Customer
    Route::get('/customers/recycle', 'CustomerController@getRecycle')->name('admin.customers.recycle');
    Route::put('/customers/recycle/{id}', 'CustomerController@putRestore')->name('admin.customers.recycle_restore');
    Route::delete('/customers/recycle/{id}', 'CustomerController@deletePermanently')->name('admin.customers.recycle_delete_permanently');
  	Route::get('/customers/note','CustomerController@getNoteCustomer')->name('admin.customers.getnotecustomer');
	Route::resource('customers', 'CustomerController', ['as' => 'admin']);
	//Customer Task
	Route::resource("customerTasks", "CustomerTaskToDoController", ['as' => 'admin']);
	//Customer Note
	Route::post('customernote/search',"CustomerNoteController@search")->name('admin.customernote.search');
	Route::post('customernote/delete/note',"CustomerNoteController@delete")->name('admin.customernote.delete');
	Route::resource("customernote", "CustomerNoteController", ['as' => 'admin']);

	// About Us
	Route::get('/aboutus','AboutUsController@edit')->name('admin.aboutus.edit');
	Route::put('/aboutus','AboutUsController@update')->name('admin.aboutus.update');

	//Setup
	Route::resource("setups", "SetUpController", ['as' => 'admin']);
	
	// Partner
	Route::post('/partner/add', 'PartnerController@addPartner')->name('admin.partner.addPartner');
	Route::get('/partner/edit/view','PartnerController@edit_partner_view')->name('admin.partner.editview');
	Route::put('/partner/update/view','PartnerController@update_partner_view')->name('admin.partner.updateview');
	Route::get('/partner/deleterecyle/{id}','PartnerController@deleteRecycle')->name('admin.partner.delete.recycle');
	Route::get('/partner/recycle','PartnerController@recycle')->name('admin.partner.recycle');
	Route::get('/partner/undopartner/{id}','PartnerController@undo')->name('admin.partner.undo');
	Route::get('/partner/note','PartnerController@getNotePartner')->name('admin.partner.getnotepartner');
	Route::resource("partner", "PartnerController", ['as' => 'admin']);
	Route::resource("partnerTasks", "PartnerTaskToDosController", ['as' => 'admin']);

	//Partner Note
	Route::post('partnernote/search',"PartnerNoteController@search")->name('admin.partnernote.search');
	Route::post('partnernote/delete/note',"PartnerNoteController@delete")->name('admin.partnernote.delete');
	Route::resource("partnernote", "PartnerNoteController", ['as' => 'admin']);

	//Tasks to do
	Route::group(['prefix' => 'tasks','middleware' => ['checkadmin']], function() {
	    Route::get('/recycle', 'TasktodoController@getRecycle')->name('admin.tasks.recycle');
	    Route::put('/recycle/{id}', 'TasktodoController@putRestore')->name('admin.tasks.recycle_restore');
	    Route::delete('/recycle/{id}', 'TasktodoController@deletePermanently')->name('admin.tasks.recycle_delete_permanently');
		Route::resource("tasks", "TasktodoController", ['as' => 'admin']);
	});
});