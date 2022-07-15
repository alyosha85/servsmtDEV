<?php

use App\Http\Controllers\InvAbItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/', 'TicketController@index')->name('home');

//! video //
Route::get('/video','TicketController@video')->name('video');
Route::get('/video_index','TicketController@video_index')->name('video_index');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles','RoleController');
  Route::resource('users','UserController'); //add to User Modal protected $guard_name = 'web';
  Route::resource('permissions','PermissionController');
});


// one time query from temp to inv_ab_item table
Route::get('/sync','TempInvAbItemController@index')->name('sync');
// query last InvNumber
Route::get('/auto','InvLastNumberController@index')->name('auto');
Route::get('/search_missing_label','InvAbItemController@missing_search')->name('search_missing');

//*************************************************   Inventory Index  *********************************************************************/
Route::get('/inventory','InvAbItemController@index')->name('inventory');

//***********************  machinelist Items   *********************************/
Route::get('/machinelist','InvAbItemController@machinelist')->name('machine_list');
Route::get('/machinelistall','InvAbItemController@machinelistall')->name('machine_list_all');

//***********************  Create Items   *********************************/
// create Address and room lists
Route::get('/item/create','InvAbItemController@create')->name('item.create');
Route::post('/item','InvAbItemController@store')->name('item.store');
//*********  PDF Upload   ***********/
Route::post('dropzone/upload_pdf', 'InvAbItemController@upload_pdf')->name('dropzone.upload_pdf');
Route::get('dropzone/fetch_pdf', 'InvAbItemController@fetch_pdf')->name('dropzone.fetch_pdf');
Route::get('dropzone/delete_pdf', 'InvAbItemController@delete_pdf')->name('dropzone.delete_pdf');

///***********************  Create Items Manuall   *************************/
Route::get('/item/create_man','InvAbItemController@create_man')->name('item.create_man');
Route::post('/item_man','InvAbItemController@storeMan')->name('item.storeMan');
//*******************  PDF Upload Man  ********************/
Route::post('dropzone/upload_pdf_man', 'InvAbItemController@upload_pdf_man')->name('dropzone.upload_pdf_man');
Route::get('dropzone/fetch_pdf_man', 'InvAbItemController@fetch_pdf_man')->name('dropzone.fetch_pdf_man');
Route::get('dropzone/delete_pdf_man', 'InvAbItemController@delete_pdf_man')->name('dropzone.delete_pdf_man');

//*********************  Edit Items   **************************************/
Route::get('/search_edit','InvAbItemController@search_edit')->name('search_edit');
Route::post('search_check_edit','InvAbItemController@searchCheckEdit')->name('search_check_edit');
Route::patch('/item/update','InvAbItemController@update')->name('item.update');

//*********************  Rename Items   **************************************/
Route::get('/search_rename','InvAbItemController@search_rename')->name('search_rename');
Route::post('search_check_rename','InvAbItemController@searchCheckrename')->name('search_check_rename');
Route::patch('/item/updaterename','InvAbItemController@updateRename')->name('item.updaterename');


//Route::post('autocompleterename','InvAbItemController@autocompleteRename')->name('autocompleteRename');

//*********************  Move Items   **************************************/
Route::get('/search_move','InvAbItemController@search_move')->name('search_move');
Route::post('search_check_move','InvAbItemController@searchCheckMove')->name('search_check_move');
Route::post('/item_move_store','InvAbItemController@movestore')->name('item_move_store');
Route::get('/item_move_log_index','InvAbItemController@movelogindex')->name('item_move_log_index');
Route::get('/isClassRoom','InvAbItemController@isClassRoom')->name('isClassRoom');

//*********************  Move Items   **************************************/
Route::get('/item/move','InvAbItemController@move')->name('item.move');
Route::post('/moveToTeil','InvAbItemController@moveToTeil')->name('moveToTeil'); //move to teilnehmer folder

//*********************  Invalidation Items  Ausmusterung  *****************/
Route::get('/search','InvAbItemController@search')->name('search');
Route::post('search_check','InvAbItemController@searchCheck')->name('search_check');
Route::post('/invalid','InvAbItemController@invalid')->name('invalid');

//*****************************  PrintLabel  ****************************************/
Route::get('/print/{printinvnr}/{anzahl}','InvAbItemController@printlabel')->name('printlabel');
Route::get('/printmissing/{printinvnr}','InvAbItemController@printmissinglabel')->name('printmissinglabel');

//*****************************  Print Listen  **************************************/
Route::get('/item/listen','InvAbItemController@listen')->name('item.listen');
Route::post('/room_listen','InvAbItemController@items_in_room_listen')->name('items_in_room_listen');

//********************************    Items Inventory  ******************************/
Route::get('/item/inventur','InvAbItemController@inventur')->name('item.inventur');     //Item Inventur
Route::post('/room_inventur','InvAbItemController@roomInventur')->name('roomInventur'); //room Inventur
Route::get('room/inventur/{invnr?}','InvAbItemController@getinvnr')->name('getinvnr');  //list add item in Inventur room listlist
Route::post('/inventur_store_final','InvAbItemController@inventurStoreFinal')->name('inventurStoreFinal'); //store
Route::post('/auto_change_location','InvAbItemController@autoChangeLocation')->name('autoChangeLocation'); //auto change room

Route::post('/send_unordered_computers','InvAbItemController@sendUnorderedComputers')->name('sendUnorderedComputers'); //send unordered computers
Route::get('/print_inventur','InvAbItemController@printinventur')->name('printinventur');


Route::get('/inventoryblade','InvAbItemController@inventoryblade')->name('inventoryblade');


//******************************************  Settings  ******************************************************/
Route::get('/settings','SettingController@index')->name('setting_index');
/* Add City */
Route::post('/create_city','PlaceController@addCity')->name('addCity');
/* Add Location City list *AJAX* */
Route::get('/settings/cityList','LocationController@cityList')->name('settings.cityList');
Route::get('/settings/cityAddressList','InvRoomController@cityAddressList')->name('settings.cityAddressList');
/* Add Location City ROOM  (Add - Save )*/
Route::post('/create_address','LocationController@addLocation')->name('addLocation');
Route::post('/create_room','InvRoomController@addRoom')->name('addRoom');

/* Role index */
Route::get('/settings/roleList','RoleController@index')->name('settings.roleList');
/* users index */
Route::get('/settings/usersList','UserController@index')->name('settings.usersList');
/* first page */
Route::get('/settings/firstpage/{id}/edit','SettingController@firstpage')->name('settings.firstpage'); 
Route::patch('/settings/firstpage/{id}','SettingController@firstupdate')->name('settings.firstupdate'); 
/* Publish News */
//******************************************  News  ******************************************************/
Route::get('/settings/publish/popup/1','NewsController@show')->name('popup.show');
Route::PUT('/popup_update/1','NewsController@update')->name('popup.update'); 
Route::get('/news.popup.checks','NewsController@news_check')->name('news.popup.check');

//! Adress book // 
//******************************************  Address Book  ******************************************************/
Route::get('/settings/addressbook','InvAbItemController@addressbook')->name('settings.addressbook');
Route::get('/settings/addressbook/{id}/edit/','InvAbItemController@addressbook_edit')->name('settings.addressbook_edit');
Route::patch('/settings/addressbook/addressbook_update/{id}','InvAbItemController@addressbook_update')->name('settings.addressbook_update');


//******************************************  Profile  ******************************************************/
Route::get('/profile','UserController@profile')->name('profile');

//******************************************  Matrix  ******************************************************/
Route::get('/matrix/berlin','Matrix\BerlinController@index')->name('matrix.berlin');

//******************************************  Contact  ******************************************************/
Route::get('/contacts','ContactController@index')->name('contact.index'); 
Route::post('/contacts/location','ContactController@contacts_phones_in_location')->name('contacts_phones_in_location');
Route::post('/contacts/room','ContactController@contacts_phones_in_room')->name('contacts_phones_in_room');


Route::post('/address', 'ContactController@dynamicAddresses')->name('address'); //generate address list from Cities list
Route::post('/rooms', 'ContactController@dynamicrooms')->name('rooms'); // generate rooms list from addresses list

Route::post('/searchbyname','ContactController@searchByName')->name('searchByName'); //search contact by name
Route::post('/searchbyusername','ContactController@searchByUsername')->name('searchByUsername'); //search contact by username


//******************************************  Ticket  ******************************************************/
Route::get('/usertickets','TicketController@usertickets')->name('ticket.usertickets'); 
Route::get('/userticketshistory','TicketController@userticketshistory')->name('ticket.userticketsdone'); 
Route::get('/ticket.index','TicketController@index')->name('ticket.index'); //duplicate
Route::post('/problem_type','TicketController@problem_type')->name('problem_type'); 
Route::post('/dependant_forms','TicketController@dependant_forms')->name('forms'); 
Route::post('/problem_type_machine','TicketController@problem_type_machine')->name('problem_type_machine'); 
Route::post('/form_store','TicketController@store')->name('form_store'); 
Route::get('/ticket/address','TicketController@address')->name('ticket.address');
Route::get('/ticket/allRead','TicketController@allRead')->name('allRead');
Route::get('/individual/{$id}','TicketController@individualtickets')->name('ticket.ownticket'); 
Route::get('/mammach','TicketController@mammach')->name('ticket.mammach'); 
Route::get('/basti','TicketController@basti')->name('ticket.basti'); 
Route::get('/ara','TicketController@ara')->name('ticket.ara'); 
Route::get('/rolf','TicketController@rolf')->name('ticket.rolf'); 


//****************************************  Ticket Computer  *************************************************/
Route::get('/ticket.computer_all','TicketController@computer_all')->name('computer_all'); 
Route::get('/ticket.software_request','TicketController@softwareRequest')->name('softwareRequest'); 
Route::get('/ticket.peripheral_request','TicketController@peripheralRequest')->name('peripheralRequest'); 
Route::get('/ticket.hardware_request','TicketController@hardwareRequest')->name('hardwareRequest'); 
Route::get('/ticket.pc_problems','TicketController@pc_problems')->name('pc_problems'); 
Route::get('/ticket.printer','TicketController@printer_in_out')->name('printer_in_out');  //! same page in PC / Laptops and Drucker
Route::get('/ticket.other','TicketController@other')->name('other'); 
Route::post('/ticket.printer_search_inroom','TicketController@printer_in_room')->name('printer_in_room'); //! AJAX find the printer  

//****************************************  Ticket Printer  *************************************************/
Route::get('/ticket.printer_all','TicketController@printer_all')->name('printer_all'); 
Route::get('/ticket.scanner','TicketController@scanner')->name('scanner'); 
Route::get('/ticket.function','TicketController@functuality')->name('functuality'); 
Route::get('/ticket.errors','TicketController@errors')->name('errors'); 
//****************************************  Ticket Telephone  *************************************************/
Route::get('/ticket.telephone_all','TicketController@telephone_all')->name('telephone_all');
Route::get('/ticket.tel_problems','TicketController@tel_problems')->name('tel_problems'); 
Route::get('/ticket.tel_changes','TicketController@tel_changes')->name('tel_changes'); 
Route::post('/ticket.tel_search_inroom','TicketController@tel_in_room')->name('tel_in_room');      //! find the Telephone 

//****************************************  Ticket Users  *************************************************/
Route::get('/ticket.users_all','TicketController@users_all')->name('users_all'); 
Route::get('/ticket.employee','TicketController@employee')->name('users_employee'); 
Route::get('/ticket.users_others','TicketController@users_others')->name('users_others');
Route::get('/ticket.participant','TicketController@participant')->name('users_participant'); 
Route::post('/ticket.participant.store','TicketController@store_participant')->name('store_participant'); //! store participant dynamic table 
Route::get('donwload_muster', 'TicketController@download_muster')->name('download_muster');
Route::post('/participant.username', 'TicketController@participant_username_update')->name('participant_username_update'); //! ajax update usernames in participant table
Route::post('/ticket.force_delete/{myTicket}','TicketController@forceDelete')->name('ticket.forceDelete');

//****************************************  Ticket Admins  *************************************************/
Route::get('/opentickets','TicketController@opentickets')->name('ticket.opentickets'); 
Route::get('/unassignedtickets','TicketController@unassignedtickets')->name('ticket.unassigned'); 
Route::get('/tickethistory','TicketController@tickethistory')->name('ticket.history'); 
Route::get('/ticket/{myTicket}','TicketController@show')->name('ticket.show'); 
Route::post('/ticket.delete/{myTicket}','TicketController@destroy')->name('ticket.delete'); 
Route::post('/ticket.restore/{myTicket}','TicketController@restore')->name('ticket.restore'); 
Route::post('/ticket/assignTo','TicketController@assignedTo')->name('ticket.assignedTo');
Route::post('/ticket/priority','TicketController@ticketPriority')->name('ticket.ticketPriority');
Route::post('/ticket/status','TicketController@ticketStatus')->name('ticket.ticketStatus');
Route::post('/ticket/admin_notes','TicketController@admin_notes')->name('ticket.admin_notes');


//****************************************  Ticket Web  *************************************************/
Route::get('/ticket.web_all','TicketController@web_all')->name('web_all');
Route::get('/ticket.terminal_tn','TicketController@terminal_tn')->name('terminal_tn');
Route::get('/ticket.bbb','TicketController@bbb')->name('bbb');
Route::get('/ticket.vtiger','TicketController@vtiger')->name('vtiger');
Route::get('/ticket.firmenvz','TicketController@firmenvz')->name('firmenvz');
Route::get('/ticket.smt','TicketController@smt')->name('smt');

//! Participant table
Route::get('participants/test','ParticipantTicketTableController@index2');
Route::resource('participants','ParticipantTicketTableController');



//! Project
Route::resource('projects', 'ProjectController');
Route::get('projects/{project}/jobs/create','JobController@create')->name('job.create');
Route::post('projects/{project}/jobs','JobController@store')->name('job.store');





