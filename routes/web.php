<?php

use Illuminate\Support\Facades\Route;

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
Route::get('testinfo/voucher','testinfoController@voucher')->name('voucher');
Route::get('/','FrontendController@index');
Route::get('/doctor/appointment/{doctor_id}','FrontendController@doctor_appointment');
Route::POST('/doctor/appointment/online','FrontendController@onlineAppointmentStore')->name('appointment.online.store');
Route::get('about/{category_id?}','FrontendController@about');
Route::get('/contact','FrontendController@contact');
Route::post('/contact_post','FrontendController@contact_post');
Route::get('doctors','FrontendController@doctors');
Route::get('department_wise_doctor/{dept_id}','FrontendController@deptDoctor');
Route::get('single_department/{department_id}','FrontendController@single_dept');
Route::get('all_department','FrontendController@all_dept');
Route::get('latest_news','FrontendController@latest_news');
Route::post('/comment_post', 'FrontendController@commentpost');
Route::get('/news', 'FrontendController@news');

// ===========patient-dashboard===============
Route::get('/PatientDashboard', 'FrontendController@patient_dashboard');


Route::get('/all_blog','FrontendController@allblog');
Route::get('/latest_news/{blog_id}', 'FrontendController@latest_news');


//OnlineAppointmentController
Route::get('appointments','OnlineAppointmentController@appointments');
Route::post('appointment_post','OnlineAppointmentController@appointment_post');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact_message','HomeController@contact_message');


//-------blog start-------
Route::resource('blog', 'BlogController');
Route::get('blog_add', 'BlogController@blogadd');
Route::get('blog_delete/{blog_id}', 'BlogController@blogdelete');


// Header Menu Route & Controller
Route::get('/frontend','HeaderPartController@frontend');
Route::get('/add_menu','HeaderPartController@add_menu');
Route::get('/add_submenu','HeaderPartController@add_submenu');
Route::post('/frontend_post','HeaderPartController@frontendpost');
Route::get('/frontend_delete/{frontend_id}','HeaderPartController@frontenddelete');
Route::get('/frontend_edit/{frontend_id}','HeaderPartController@frontendedit');
Route::get('/submenu_edit/{sub_id}','HeaderPartController@subedit');
Route::get('/frontend_active/{frontend_id}','HeaderPartController@frontendactive');
Route::get('/sub_active/{sub_id}','HeaderPartController@subactive');
Route::post('/frontend_editpost','HeaderPartController@frontendeditpost');
Route::post('/sub_editpost','HeaderPartController@subeditpost');
Route::get('/submenu', 'HeaderPartController@submenu');
Route::get('/submenu_delete/{submenu_id}','HeaderPartController@submenudelete');

Route::post('/submenu_post', 'HeaderPartController@submenu_post');


// schedule start
Route::get('/schedule', 'ScheduleController@schedule');
Route::get('/addSchedule', 'ScheduleController@addSchedule');
Route::post('/schedulePost', 'ScheduleController@schedulePost');
Route::get('/scheduleView/{schedule_id}','ScheduleController@scheduleView');
Route::get('/scheduleEdit/{schedule_id}','ScheduleController@scheduleEdit');
Route::post('/scheduleEditPost','ScheduleController@scheduleEditPost');
Route::get('/scheduleDel/{schedule_id}','ScheduleController@scheduleDel');
Route::POST('schedule/fetchinfo','ScheduleController@fetch_doctor')->name('schedule.fetch_active');
Route::POST('schedule/controllactive','ScheduleController@activationTrigger')->name('schedule.activationcontroll');
Route::POST('schedule/docotor-fetch','ScheduleController@doctor_fetch')->name('schedule.doctor.fetch');
Route::get('schedule/department/{dept_id}','ScheduleController@schedule_dependent_department')->name('schedule.dept.index');
Route::get('schedule/doctor/{doctor_id}','ScheduleController@schedule_dependent_doctor')->name('schedule.doctor.index');
Route::get('schedule/day/{day_id}','ScheduleController@schedule_dependent_day')->name('schedule.day.index');
Route::POST('schedule/fetchinfo','ScheduleController@fetch_schedule')->name('schedule.data_fetch');
// schedule end




// appointment start
Route::get('/appointment','AppointmentController@appointment');
Route::get('/addAppointment','AppointmentController@addAppointment');
Route::post('/appointmentPost','AppointmentController@appointmentPost');
Route::get('/appView/{appointment_id}','AppointmentController@appView');
Route::get('/appEdit/{appointment_id}','AppointmentController@appEdit');
Route::post('/appEditPost','AppointmentController@appEditPost');
Route::get('/appointmentDel/{appointment_id}','AppointmentController@appointmentDel');
Route::get('/online_appointment','AppointmentController@online_appointment');
Route::get('/online_appointment_view/{onlineappointment_id}','AppointmentController@view');
Route::get('/online_appointment_confirm/{onlineappointment_id}','AppointmentController@confirm');
Route::get('/online_appointment_cancel/{onlineappointment_id}','AppointmentController@cancel');
Route::get('/online_appointment_delete/{onlineappointment_id}','AppointmentController@delete');
Route::get('/cancel_online_appointment','AppointmentController@canceled');
Route::get('/online_confirm/{onlineappointment_id}','AppointmentController@online_confirm');
Route::get('/confirm_online_appointment','AppointmentController@confirmed');
Route::get('/pending_online_appointment','AppointmentController@pendings');
Route::post('/appointment/getMobile/','AppointmentController@getMobile')->name('appointment.getMobile');
Route::POST('appointment/controllactive','AppointmentController@activationTrigger')->name('appointment.activationcontroll');

// appointment end

// prescription start
Route::get('/prescription', 'PrescriptionController@prescription');
Route::get('/onlyPrescription', 'PrescriptionController@onlyPrescription');
Route::get('/addPrescription', 'PrescriptionController@addPrescription');
Route::post('/prescriptionPost', 'PrescriptionController@prescriptionPost');
Route::get('/prescriptionEdit/{prescription_id}','PrescriptionController@prescriptionEdit');
Route::get('/prescriptionView/{prescription_id}','PrescriptionController@prescriptionView');
Route::post('/prescriptionEditPost','PrescriptionController@prescriptionEditPost');
Route::get('/prescriptionDel/{prescription_id}','PrescriptionController@prescriptionDel');
// prescription end

//Human Resources Section start
Route::get('/designation', 'HumanController@designation');
Route::post('/designationPost', 'HumanController@designationPost');
Route::get('/designationDel/{designation_id}', 'HumanController@designationDel');

Route::get('/employee', 'HumanController@employee');
Route::get('/employeeAdd', 'HumanController@employeeAdd');
Route::post('/employeePost', 'HumanController@employeePost');
Route::get('/employeeView/{employee_id}', 'HumanController@employeeView');
Route::get('/employeeEdit/{employee_id}', 'HumanController@employeeEdit');
Route::post('/employeeEditPost', 'HumanController@employeeEditPost');
Route::get('/employeeDel/{employee_id}', 'HumanController@employeeDel');

Route::get('/singleEmployee/{designation_id}', 'HumanController@singleEmployee');
//Human Resources Section End



//Departmment routes started
Route::resource('department','DepartmentController');
Route::get('/department/inactive/{id}','DepartmentController@inactive');
Route::get('/department/active/{id}','DepartmentController@active');
Route::get('department_delete/{id}','DepartmentController@department_delete');
//End Departmment routes

//Designation routes started

Route::resource('jobdesignation','HumanController');
Route::get('jobdesignation/delete/{id}','HumanController@deletejobdesignation')->name('jobdesignation.delete');
Route::POST('jobdesignation/fetch','HumanController@fetch')->name('designation.fetch');
Route::get('/designation_active/{sub_id}','HumanController@designationactive');

//End Designation routes




//Start Patient Routes
Route::resource('patient','PatientController');
Route::get('/patient_delete/{id}','PatientController@patient_delete');
//End Patient Routes

//Start Doctor Routes
Route::resource('doctor','DoctorController');
Route::get('DoctorRegister','DoctorController@doctor_register');
Route::post('/education','DoctorController@education');
Route::post('/experience_post','DoctorController@experience_post');
Route::POST('doctor/fetchinfo','DoctorController@fetch_doctor')->name('doctor.data_fetch');
Route::POST('doctor/controllactive','DoctorController@activationTrigger')->name('doctor.activationcontroll');

Route::get('doctor_delete/{id}','DoctorController@doctor_delete');
//End Doctor Routes


//Start Patient Document
Route::resource('patient_document','PatientDocumnetController');
Route::get('patient_document/edit/{id}','PatientDocumnetController@patient_document_edit');
Route::post('patient/document/update','PatientDocumnetController@patient_document_update');
Route::get('patient/document/view/{id}','PatientDocumnetController@document_view');
Route::get('patient/document/download/{patient_document}','PatientDocumnetController@document_download');
Route::get('patient/document/delete/{id}','PatientDocumnetController@patient_delete');

//End Patient Document


//Start Notice Board
Route::resource('notice_board','NoticeBoardController');
Route::get('notice/delete/{id}','NoticeBoardController@notice_delete');
Route::get('/notice/inactive/{id}','NoticeBoardController@inactive');
Route::get('/notice/active/{id}','NoticeBoardController@active');
//End Notice Board

//Start Bed_type Routes
Route::resource('bed_type','BadTypeController');
Route::get('bed_type/delete/{id}','BadTypeController@bed_type_delete');
Route::get('/bed_type/inactive/{id}','BadTypeController@inactive');
Route::get('/bed_type/active/{id}','BadTypeController@active');
//End Bed_type Routes


//Start Bed Route
Route::resource('bed','BedController');
Route::get('bed/delete/{id}','BedController@bed_delete');
Route::get('/bed/inactive/{id}','BedController@inactive');
Route::get('/bed/active/{id}','BedController@active');
//End Bed Route


// start insurence
Route::get('/disease', 'InsurenceController@disease');
Route::post('/diseasepost', 'InsurenceController@diseasepost');
Route::get('/insurence', 'InsurenceController@insurence');
Route::post('/insurance_post', 'InsurenceController@insurencepost');
Route::get('/insurance_list', 'InsurenceController@insurencelist');
Route::get('/limit_approval', 'InsurenceController@limitapproval');
Route::post('/limit_approvalpost', 'InsurenceController@limitapprovalpost');
Route::get('/limit_approval_list', 'InsurenceController@limitapprovallist');

//end insurence

//human resources
Route::get('/designation', 'HumanController@designation');
Route::get('/employee', 'HumanController@employee');
Route::post('/employee_post', 'HumanController@employeepost');
Route::get('/accountant', 'HumanController@accountant');
Route::post('/designationPost', 'HumanController@designationPost');
Route::get('/designationDel/{designation_id}', 'HumanController@designationDel');
Route::get('/singleEmployee/{designation_id}', 'HumanController@singleEmployee');
Route::get('/employeeDel/{employee_id}', 'HumanController@employeeDel');

//Hospital Activities Section............Birth Part Start
Route::get('/birth','HospitalActController@birth');
Route::get('/addBirth','HospitalActController@addBirth');
Route::post('/birthPost','HospitalActController@birthPost');
Route::get('/birthView/{birth_id}','HospitalActController@birthView');
Route::get('/birthEdit/{birth_id}','HospitalActController@birthEdit');
Route::post('/birthEditPost','HospitalActController@birthEditPost');
Route::get('/birthDel/{birth_id}','HospitalActController@birthDel');

//Hospital Activities Section............Death Part Start
Route::get('/death','HospitalActController@death');
Route::get('/addDeath','HospitalActController@addDeath');
Route::post('/deathPost','HospitalActController@deathPost');
Route::get('/deathView/{death_id}','HospitalActController@deathView');
Route::get('/deathEdit/{death_id}','HospitalActController@deathEdit');
Route::post('/deathEditPost','HospitalActController@deathEditPost');
Route::get('/deathDel/{death_id}','HospitalActController@deathDel');

//Hospital Activities Section...........Operation Part Start
Route::get('/operation','HospitalActController@operation');
Route::get('/addOperation','HospitalActController@addOperation');
Route::post('/operationPost','HospitalActController@operationPost');
Route::get('/operationView/{operation_id}','HospitalActController@operationView');
Route::get('/operationEdit/{operation_id}','HospitalActController@operationEdit');
Route::post('/operationEditPost','HospitalActController@operationEditPost');
Route::get('/operationDel/{operation_id}','HospitalActController@operationDel');

//Hospital Activities Section...........Medicine Category Part Start
Route::get('/medicineCategory','HospitalActController@medicineCategory');
Route::get('/addMediCategory','HospitalActController@addMediCategory');
Route::post('/mediCategoryPost','HospitalActController@mediCategoryPost');
Route::get('/mediCategoryView/{medicat_id}','HospitalActController@mediCategoryView');
Route::get('/mediCategoryEdit/{medicat_id}','HospitalActController@mediCategoryEdit');
Route::post('/mediCategoryEditPost','HospitalActController@mediCategoryEditPost');
Route::get('/mediCategoryDel/{medicat_id}','HospitalActController@mediCategoryDel');

//Hospital Activities Section...........Medicine Part Start
Route::get('/medicine','HospitalActController@medicine');
Route::get('/addMedicine','HospitalActController@addMedicine');
Route::post('/medicinePost','HospitalActController@medicinePost');
Route::get('/medicineView/{medicine_id}','HospitalActController@medicineView');
Route::get('/medicineEdit/{medicine_id}','HospitalActController@medicineEdit');
Route::post('/medicineEditPost','HospitalActController@medicineEditPost');
Route::get('/medicineDel/{medicine_id}','HospitalActController@medicineDel');

//Start Frontend Header Logo
Route::resource('header-logo','FrontendHeaderLogoController');
Route::get('header-logo/delete/{id}', 'FrontendHeaderLogoController@delete');
Route::get('/header-logo/ChangeStatus/{id}', 'FrontendHeaderLogoController@ChangeStatus');

//Start Footer Opening Hours
Route::resource('footer_opening_hours','FooterOpeningHourController');
Route::get('footer_opening_hours/delete/{id}','FooterOpeningHourController@footer_opening_hours_delete');
Route::get('/footer_opening_hours/inactive/{id}','FooterOpeningHourController@inactive');
Route::get('/footer_opening_hours/active/{id}','FooterOpeningHourController@active');

//Start Frontend Tripple Logo
Route::resource('frontend_tripple_logo','FrontendTrippleLogoController');
Route::get('frontend_tripple_logo/delete/{id}','FrontendTrippleLogoController@delete');
Route::get('/frontend_tripple_logo/ChangeStatus/{id}','FrontendTrippleLogoController@ChangeStatus');

//Start Footer Logo
Route::resource('footer_logo','FooterLogoController');
Route::get('footer_logo/delete/{id}','FooterLogoController@footer_logo_delete');
Route::get('/footer_logo/active/{id}','FooterLogoController@active');

//Footer Logo Item
Route::resource('footer_logo_item','FooterLogoItemController');
Route::get('footer_logo_item/delete/{id}','FooterLogoItemController@footer_logo_item_delete');
Route::get('footer_logo_item/active/{id}','FooterLogoItemController@active');

//Start footer bottom Icon
Route::resource('footer_bottom_icon','FooterBottomIconController');
Route::get('footer_bottom_icon/delete/{id}','FooterBottomIconController@footer_bottom_icon_delete');
Route::get('footer_bottom_icon/ChangeStatus/{id}','FooterBottomIconController@changeStatus');

//Start Frontend Footer Sign_up Form
Route::resource('frontend_footer_signup','FrontendFooterSignupFormController');
Route::get('footer_sign_up_form/delete/{id}','FrontendFooterSignupFormController@footer_sign_up_form_delete');

//Start Footer Heading
Route::get('footer-heading-status/{id}', 'FooterHeadingController@changeStatus')->name('footer-heading.status');
Route::resource('footer_heading','FooterHeadingController');
Route::get('footer_heading/delete/{id}','FooterHeadingController@footer_heading_delete');

//Start Footer Heading Item
Route::resource('footer_heading_item','FooterHeadingItemController');
Route::get('footer_heading_item/delete/{id}','FooterHeadingItemController@footer_heading_item_delete');
Route::get('/footer_heading_item/active/{id}','FooterHeadingItemController@active');
Route::get('/footer_heading_item/inactive/{id}','FooterHeadingItemController@inactive');

//Start Frontend Banner
Route::resource('frontend_banner','BannerController');
Route::get('frontend_banner/edit/{id}','BannerController@banner_edit');
Route::post('frontend_banner/update','BannerController@banner_update');
Route::get('frontend_banner/delete/{id}','BannerController@banner_delete');
Route::get('/frontend_banner/inactive/{id}','BannerController@inactive');
Route::get('/frontend_banner/active/{id}','BannerController@active');

//Start Footer Upper Part
Route::resource('footer_upper_part','FooterUperPartController');
Route::get('/footer_upper_part/edit/{id}','FooterUperPartController@footer_upper_part_edit');
Route::post('/footer_upper_part/update','FooterUperPartController@footer_upper_part_update');

//Start Frontend Section 5 Department Heading
Route::resource('frontend_department_heading','FrontendSection5DepartmentHeadingController');
Route::get('frontend_department_heading/edit/{id}','FrontendSection5DepartmentHeadingController@heading_edit');
Route::post('frontend_department_heading/update','FrontendSection5DepartmentHeadingController@heading_update');
Route::get('frontend_department_heading/delete/{id}','FrontendSection5DepartmentHeadingController@heading_delete');
Route::get('/frontend_department_heading/ChangeStatus/{id}','FrontendSection5DepartmentHeadingController@ChangeStatus');

//Start Frontend Section 5 Department
Route::resource('frontend_department','FrontendSection5DepartmentController');
Route::get('frontend_department/delete/{id}','FrontendSection5DepartmentController@frontend_department_delete');
Route::get('/frontend_department/ChangeStatus/{id}','FrontendSection5DepartmentController@ChangeStatus');

//Start Frontend Doctor
Route::resource('frontend_doctor','FrontendDoctorController');
Route::get('frontend_doctor/delete/{id}','FrontendDoctorController@delete');
Route::get('/frontend_doctor/ChangeStatus/{id}','FrontendDoctorController@ChangeStatus');

//Start Frontend Top Bar
Route::resource('frontend_top_bar','FrontendTopBarController');
Route::get('frontend_top_bar/delete/{id}','FrontendTopBarController@frontend_top_bar_delete');
Route::get('/frontend_top_bar/ChangeStatus/{id}','FrontendTopBarController@ChangeStatus');

//Start Frontend About Category
Route::resource('about_category','FrontendAboutCategoryController');
Route::get('about_category/edit/{id}','FrontendAboutCategoryController@about_category_edit');
Route::post('about_category/update','FrontendAboutCategoryController@about_category_update');
Route::get('about_category/delete/{id}','FrontendAboutCategoryController@about_category_delete');
Route::get('about_category/ChangeStatus/{id}','FrontendAboutCategoryController@ChangeStatus');

//Start Frontend About Category Item
Route::resource('about_category_item','AboutCategoryItemController');
Route::get('about/category/item/delete/{id}','AboutCategoryItemController@category_item_delete');

//Start Frontend About Offer
Route::get('about/offer','AboutOfferController@index')->name('aboutOffer.index');
Route::get('about/offer/create','AboutOfferController@create');
Route::post('about/offer/store','AboutOfferController@store');
Route::get('about/offer/edit/{id}','AboutOfferController@edit');
Route::post('about/offer/update/','AboutOfferController@update');
Route::get('about/offer/delete/{id}','AboutOfferController@delete');
Route::get('/about/offer/ChangeStatus/{id}','AboutOfferController@ChangeStatus');

//frontend icon and title
Route::resource('icon','IconController');
Route::get('/iconActive/{icon_id}','IconController@iconActive');
Route::get('/delete_icon/{icon_id}','IconController@delete_icon');
Route::get('/view_icon/{icon_id}','IconController@view_icon');

Route::get('icon/font_awesome','IconController@font_awesome_index');
Route::get('icon/themify','IconController@themify_index');

//About Title controller (for Frontend)
Route::resource('abouttitle','AbouttitleController');
Route::get('/aboutsActive/{about_id}','AbouttitleController@aboutsActive');
Route::get('/delete_about_title/{about_id}','AbouttitleController@delete_about_title');
Route::get('/view_about_title/{about_id}','AbouttitleController@view_about_title');

//Frontend Progress bar part...........
Route::resource('percentice','PercenticeController');
Route::get('/progressActive/{percentice_id}','PercenticeController@progressActive');
Route::get('/view_progress_bar/{percentice_id}','PercenticeController@view_progress_bar');
Route::get('/delete_progress_bar/{percentice_id}','PercenticeController@delete_progress_bar');

//Start Frontend Our Team Heading
Route::resource('frontend_our_team','FrontendOurTeamController');
Route::get('our_teams/delete/{id}','FrontendOurTeamController@delete');
Route::get('/our_teams/ChangeStatus/{id}','FrontendOurTeamController@ChangeStatus');

//Start Frontend Doctor Schedule Heading
Route::resource('frontend_doctor_schedule', 'FrontendDoctorScheduleController');
Route::get('doctor_schedule/delete/{id}','FrontendDoctorScheduleController@delete');
Route::get('/doctor_schedule/ChangeStatus/{id}','FrontendDoctorScheduleController@ChangeStatus');


//test start here

Route::resource('test','TestController');
Route::GET('test/delete/{test_id}','TestController@delete')->name('test.delete');
Route::resource('testinfo','testinfoController');
Route::POST('test/fetchinfo','TestinfoController@fetch_test')->name('test.data_fetch');
Route::GET('test/invoice/{patient_id}','TestinfoController@invoice')->name('test.invoice');

Route::resource('discount','DiscountController');