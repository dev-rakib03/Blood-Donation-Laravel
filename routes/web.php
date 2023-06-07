<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//frontend
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\forgotpasswordController;
use App\Http\Controllers\frontend\aboutController;
use App\Http\Controllers\frontend\contactController;
use App\Http\Controllers\frontend\otherController;
use App\Http\Controllers\frontend\donorsController;
use App\Http\Controllers\frontend\bloodbankController;

//common
use App\Http\Controllers\common\canvasController;
use App\Http\Controllers\common\changepasswordController;
use App\Http\Controllers\common\profileController;
use App\Http\Controllers\common\myrequestController;
use App\Http\Controllers\common\proveController;
use App\Http\Controllers\common\bloodrequestController;

//message
use App\Http\Controllers\message\messageController;

//notification
use App\Http\Controllers\notification\notificationController;

//admin Controllers
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\adminNotificationController;
use App\Http\Controllers\admin\BloodController;
use App\Http\Controllers\admin\adminBloodBankController;
use App\Http\Controllers\admin\adminController;

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

//public
Route::get('/', [HomeController::class, 'index'] );
//about
Route::get('/massage-of-founder', [aboutController::class, 'massage_of_founder'] );
Route::get('/about-us', [aboutController::class, 'about_us'] );
Route::get('/our-pastners', [aboutController::class, 'our_partners'] );
//contact-us
Route::get('/contact-us', [contactController::class, 'index'] );
Route::post('/contact-us-post', [contactController::class, 'send_contact'] );
//Donors
Route::get('/donors', [donorsController::class, 'show_all'] );
Route::get('/donor-city-search', [donorsController::class, 'city_search'] );
//Blood Bank
Route::get('/blood-bank', [bloodbankController::class, 'show_all'] );
Route::get('/blood-bank-search', [bloodbankController::class, 'city_search'] );
//Other
Route::get('/terms-conditions', [otherController::class, 'terms_conditions'] );
Route::get('/privacy-policy', [otherController::class, 'privacy_policy'] );
Route::get('/how-to-find-donner', [otherController::class, 'how_to_find_donner'] );
//forgot pass
Route::post('/check-number-exist', [forgotpasswordController::class, 'numbercheck'] );
Route::post('/update-password-c', [forgotpasswordController::class, 'resetpass'] );
//registration
Route::get('/phone-verify', function () { return view('auth.phoneverify'); });

//check role
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 
	function () {
		if (Auth::user()->role_id=='1' || Auth::user()->role_id=='4') {
			return redirect('/admin/dashboard');
		}
		else{
			return redirect('/canvas');
		}
})->name('dashboard');


//common route
Route::group(['middleware' =>['auth:sanctum','verified']], function (){
	//Dashboard
	Route::get('/canvas',[canvasController::class, 'show_dashboard'] );
	//Dashboard
	Route::get('/change-password',[changepasswordController::class, 'index'] );
	Route::post('/update-password',[changepasswordController::class, 'update'] );
	//Dashboard
	Route::get('/edit-profile',[profileController::class, 'index'] );
	Route::post('/update-profile',[profileController::class, 'update'] );
	//myrequest
	Route::get('/send-blood-request/{donor_id}/{blood_group}/{needed_date}',[myrequestController::class, 'submit_request']);
	Route::get('/submit-prove/{req_id}',[proveController::class, 'submit_prove_show'] );
	Route::post('/submit-prove-form',[proveController::class, 'submitprove'] );	
	//bloodrequest
	Route::get('/blood-request',[bloodrequestController::class, 'index'] );
	Route::get('/cancle-blood-request/{id}',[bloodrequestController::class, 'cancle_request']);
	Route::get('/accpet-blood-request/{id}',[bloodrequestController::class, 'accpet_request']);
	//prove
	Route::get('/donated-list',[proveController::class, 'index'] );
	//message
	Route::get('/messages',[messageController::class, 'index'] );
		//active user
	Route::get('/message/activeuser', [messageController::class, 'show_activeuser']);
		//search chat user
	Route::post('/message/searchchatuser', [messageController::class, 'show_search_chat_user']);
		//user inbox
	Route::get('/message/chatbox/{user_id}', [messageController::class, 'show_user_chatbox']);
		//insert chat
	Route::post('/message/chatbox/insert-chat', [messageController::class, 'show_user_chatbox_insert_chat']);
		//get chat
	Route::post('/message/chatbox/get-chat', [messageController::class, 'show_user_chatbox_get_chat']);

	//make user active
	Route::get('make-active-user', [messageController::class, 'make_online']);

});

//notifications
Route::get('/notification-get-notify', [notificationController::class, 'show_noti']);
Route::get('/notification/seen', [notificationController::class, 'seen_noti']);



//user route
Route::group(['middleware' =>['auth:sanctum','verified','user']], function (){
	//myrequest
	Route::get('/my-request',[myrequestController::class, 'index'] );
	Route::get('/delete-blood-request/{id}',[myrequestController::class, 'delete_request']);
});


//bloodbank route
Route::group(['middleware' =>['auth:sanctum','verified','bloodbank']], function (){

});



//admin route
Route::group([ 'prefix'=>'admin','middleware' =>['auth:sanctum','verified', 'adminuser']], function (){

	//Dashboard
	Route::get('dashboard',[dashboardController::class, 'index'] );

	//Users
		//All users
	Route::get('all-users',[usersController::class, 'index'] );
		//add user
	Route::get('add-user',[usersController::class, 'add_user'] );
		//update profile
	Route::post('add-user-save',[usersController::class, 'save_add_user_profile'] );

		//All bloodbank
	Route::get('all-bloodbank',[adminBloodBankController::class, 'index'] );


	//Donation Proves
	Route::get('donation-proves',[BloodController::class, 'donationprovesshow'] );
		//donation prove single
	Route::get('prove-view/{id}',[BloodController::class, 'donationprovesshow_single'] );

		//donation prove reject
	Route::get('donation-prove-reject/{id}/{donor_id}',[BloodController::class, 'donation_prove_reject'] );
		//donation prove reject
	Route::get('donation-prove-accept/{id}/{donor_id}',[BloodController::class, 'donation_prove_accpet'] );

});

//admin route
Route::group([ 'prefix'=>'admin','middleware' =>['auth:sanctum','verified', 'admin']], function (){
	//Users
		//All admin
	Route::get('all-admin',[adminController::class, 'index'] );	

		//user-profile
	Route::get('user-profile/{id}',[usersController::class, 'user_profile'] );
		//update profile
	Route::post('update-profile',[usersController::class, 'edit_save_user_profile'] );
});

//admin route
Route::group(['middleware' =>['admin']], function (){
	\PWA::routes();
});


