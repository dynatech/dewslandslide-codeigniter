<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/**
 * Monitoring/Public Alert Routes
 */
$route['home'] = "monitoring/index";
$route['dashboard'] = "monitoring/index";
$route['monitoring/release_form'] = "pubrelease/index/alert_release_form";
$route['monitoring/events'] = "pubrelease/index/monitoring_events_all";
$route['monitoring/events/(:num)/(:num)'] = "pubrelease/index/monitoring_events_individual/$1/$2";
$route['monitoring/events/(:num)'] = "pubrelease/index/monitoring_events_individual/$1";
$route['monitoring/faq'] = "pubrelease/index/monitoring_faq";

$route['monitoring/issues_and_reminders'] = "issues_and_reminders";

/**
 * Bulletin Pages Routes
 */
$route['monitoring/bulletin/view/(:any)'] = "bulletin/view/$1";
$route['monitoring/bulletin/build/(:num)'] = "bulletin/build/$1";
$route['monitoring/bulletin/edit/(:num)'] = "bulletin/edit/$1";
$route['monitoring/bulletin/main/(:num)/(:any)'] = "bulletin/main/$1/$2";

/**
 * Reports Pages Routes
 */
$route['reports/monitoring'] = "accomplishment/index";
$route['reports/monitoring/shift_checker'] = "accomplishment/checker";

/**
 * Communications Pages Routes
 */
$route['communications/chatterbox'] = "chatterbox/index";
$route['communications/responsetracker'] = "responsetracker/index";
$route['communications/chatterbox/updatecontacts'] = "chatterbox/updatecontacts";
$route['communications/chatterbox/gintagcontacts'] = "chatterbox/get_comm_contacts_gintag";
$route['communications/chatterbox/addcontact'] = "chatterbox/addcontacts";
$route['communications/chatterbox_v2'] = "chatterbox_v2/index";
/**
 * NEW Chatterbox **BETA**
 */

$route['communications/chatterbox_beta'] = "chatterbox_v2/index";
$route['communications/ewi_template'] = "ewi_template/index";
$route['communications/fetchalltemplate'] = "ewi_template/getAllTemplates";
$route['communications/fetchallbackbonetemplate'] = "ewi_template/getAllBackboneTemplates";
$route['communications/addtemplate'] = "ewi_template/addTemplate";
$route['communications/updatetemplate'] = "ewi_template/updateTemplate";
$route['communications/deletetemplate'] = "ewi_template/deleteTemplate";
$route['communications/deletebackbone'] = "ewi_template/deleteBackboneMessage";
$route['communications/getkeypointsviacategory'] = "ewi_template/getKeyViaCategory";
$route['communications/addbackbonemessage'] = "ewi_template/addBackboneMessage";
$route['communications/updatebackbonemessage'] = "ewi_template/updateBackboneMessage";
$route['communications/getkeyinputviatriggertype'] = "ewi_template/getKeyInputViaTriggerType";
$route['communications/getbackboneviastatus'] = "ewi_template/getBbViaAlertStatus";
$route['communications/getrecommendedresponse'] = "ewi_template/getRecommendedResponse";
$route['communications/getRoutine'] = "chatterbox_beta/getRoutineTemplate";

$route['gintags/manager'] = "gintags_manager/index";

/**
* General Information Tagging
*/

$route['generalinformation/index'] = "gintagshelper/index";
$route['generalinformation/insertGinTags'] = "gintagshelper/ginTagsEntry";
$route['generalinformation/removeGintagsEntryViaChatterbox'] = "gintagshelper/removeGintagsEntryViaChatterbox";
$route['generalinformation/removeIndividualGintagEntryViaChatterbox'] = "gintagshelper/removeIndiGintagsChatterbox";
$route['generalinformation/getGintagsViaTag'] = "gintagshelper/getGintagsViaTag";
$route['generalinformation/initialize'] = "gintagshelper/initialize";
$route['generalinformation/getanalytics'] = "gintagshelper/getAnalytics";
$route['narrativeAutomation/insert'] = "narrative_generator/insertEwiNarrative";
$route['narrativeautomation/checkack'] = "narrative_generator/checkForAcknowledgement";
$route['generalinformation/removeGintagsId'] = "gintagshelper/removeGintagsByGintagsId";
$route['generalinformation/updateGintagsId'] = "gintagshelper/updateGintagsByGintagsId";

/**
 * Data Analysis Pages Routes
 */

$route['analysis/site_analysis'] = "site_analysis";
$route['analysis/site_analysis/(:any)'] = "site_analysis";
$route['analysis/sensor_overview'] = "sensor_overview";
$route['analysis/eos_charts/(:any)/(:any)/(:any)/(:any)'] = "end_of_shift_charts";
$route['analysis/manifestations'] = "manifestations";
$route['analysis/manifestations/(:any)'] = "manifestations/individual_site/$1";
$route['analysis/surficial'] = "surficial";
$route['analysis/rainfall_summary'] = "rainfall_scanner";

/**
 * Data Analysis Pages Routes
 */
// Commons
$route['site_info/index'] = "site_info/index";

$route['general_data_tagging/index'] = "general_tagging/index";
$route['general_data_tagging/add_gen_tag'] = "general_tagging/addNewGeneralDataTag";
$route['general_data_tagging/update_gen_tag'] = "general_tagging/updateGeneralDataTag";
$route['general_data_tagging/delete_gen_tag'] = "general_tagging/deleteGeneralDataTag";
$route['general_data_tagging/insert_tag_point'] = "general_tagging/insertGenTagPoint";
$route['general_data_tagging/modify_tag_point'] = "general_tagging/modifyGenTagPoint";
$route['general_data_tagging/remove_tag_point'] = "general_tagging/removeGenTagPoint";
$route['general_data_tagging/get_gen_tag'] = "general_tagging/getGeneralDataTagViaID";
$route['general_data_tagging/get_all_gen_tag'] = "general_tagging/getAllGeneralDataTag";
$route['general_data_tagging/get_tag_point'] = "general_tagging/getGenTagPointViaID";
$route['general_data_tagging/get_all_tag_point'] = "general_tagging/getAllGenTagPoint";
$route['general_data_tagging/get_tag_point_via_id'] = "general_tagging/getAllGenTagPointViaTagname";
$route['general_data_tagging/tags'] = "general_tagging/getAllTags";

$route['staff/all'] = "staff_profile/index";
$route['staff/get_all_staff'] = "staff_profile/getAllStaffProfile";
$route['staff/profile'] = "staff_profile/getStaffProfile";
$route['staff/add_profile'] = "staff_profile/addNewProfile";
$route['staff/update_profile'] = "staff_profile/updateStaffProfile";
$route['staff/change_profile_pic'] = "staff_profile/changeProfilePic";

$route['site_info/index'] = "site_info/index";

$route['default_controller'] = "account_controller";
$route['login'] = "account_controller";
$route['404_override'] = "error_custom_404";


/* End of file routes.php */
/* Location: ./application/config/routes.php */