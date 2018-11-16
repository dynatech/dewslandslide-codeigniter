<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Includes the User_Model class as well as the required sub-classes
 * @package codeigniter.application.models
 */

/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Responsetracker_model extends CI_Model {

	public function getSite(){
		$query = $this->db->query("SELECT DISTINCT sitename FROM comms_db.communitycontacts");
		return $query;
	}

	public function getPerson(){
		$query = $this->db->query("SELECT lastname,firstname,prefix,office,sitename,number FROM comms_db.communitycontacts");
		return $query;
	}

	public function getPersonSite($firstname,$lastname,$contactNo){
		if (sizeof($contactNo) > 1) {
			for ($i = 0; $i < sizeof($contactNo);$i++){
				if ($i == 0) {
					$targetContact = "AND number LIKE '%$contactNo[0]%'";
				} else {
					$targetContact = $targetContact." OR number LIKE '%$contactNo[$i]%'";
				}
			}
		} else {
			$targetContact = "AND number LIKE '%$contactNo[0]%'";
		}
		$sql = "SELECT DISTINCT sitename FROM comms_db.communitycontacts WHERE firstname = '$firstname' AND lastname = '$lastname' $targetContact";
		$query = $this->db->query($sql);
		return $query;
	}

	public function getSitePersons($sitename){
		$query = $this->db->query("SELECT DISTINCT lastname,firstname,number,office FROM comms_db.communitycontacts WHERE sitename = '$sitename'");
		return $query;
	}

	public function getChatTimeStamps($data){
		
		$period = $data['period'];
		$current_date = $data['current_date'];
		$group_by_filter = "/";
		$count_query = "/";
		$filters = "/";
		if ($data['category'] == 'allsites'){
		
				$group_by_filter = "/";
				$count_query = "/";
			
		}else if ($data['category'] == "site"){
			
			$site = $data['site_name'];
			$filters = " (sent_by = '$site' or received_by = '$site') and";

		}else if ($data['category'] == "person"){
			$lastname = $data["lastname"];
			$firstname= $data["firstname"]; 
			$filters = " sent_by like '$firstname $lastname%' and "  ;
		}


		$sql = ("SELECT timestamp, sent_by, received_by,site_name, DATE_FORMAT(timestamp, '%Y-%m-%d') AS daily,
   			DATE_FORMAT(timestamp, '%Y-%m-%d %H:00') AS hourly, DATE_FORMAT(timestamp, '%Y-%m-01 ') AS monthly,
			WEEK(timestamp) AS weekly, (IF((hour(timestamp) % 4) = 0, DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00'), 
			date_sub((DATE_FORMAT(timestamp, '%Y-%m-%d %H:00')), INTERVAL ((hour(timestamp) % 4) - 4) HOUR))) as every_four from 
			(SELECT smsoutbox_users.ts_written AS timestamp, 
			upper(substring(loggers.logger_name,1,3)) AS sent_by, 'YOU' as received_by,  
			upper(substring(loggers.logger_name,1,3)) AS site_name FROM comms_db.smsoutbox_users
       		INNER JOIN comms_db.smsoutbox_user_status ON smsoutbox_users.outbox_id = smsoutbox_user_status.outbox_id
       		INNER JOIN comms_db.user_mobile ON smsoutbox_user_status.mobile_id = user_mobile.mobile_id
       		INNER JOIN comms_db.user_organization ON user_mobile.user_id = user_organization.user_id
        	INNER JOIN comms_db.loggers on user_organization.fk_site_id = loggers.site_id
   			union all SELECT ts_sms AS timestamp, CONCAT(users.firstname,' ', users.lastname,' ', UPPER(user_organization.org_name)),
   			upper(substring(loggers.logger_name,1,3)), upper(substring(loggers.logger_name,1,3)) FROM comms_db.smsinbox_users
       		INNER JOIN comms_db.user_mobile ON smsinbox_users.mobile_id = user_mobile.mobile_id
       		INNER JOIN comms_db.user_organization ON user_mobile.user_id = user_organization.user_id
	  		INNER JOIN comms_db.loggers on user_organization.fk_site_id = loggers.site_id
       		INNER JOIN comms_db.users ON user_mobile.user_id = users.user_id) as sms_details WHERE 
			$filters timestamp > '$period' AND timestamp < '$current_date' 
			$group_by_filter order by received_by desc");

        
		$sql = str_replace("/","",$sql);


		$query = $this->db->query($sql);


		return $query->result();

	}

	public function getTargetContacts($sitename){
		$contact = [];
		// $sql = "SELECT firstname,lastname,sitename,number FROM communitycontacts WHERE sitename = '$sitename'";
		$sql = "SELECT number FROM comms_db.communitycontacts WHERE sitename = '$sitename'";
		$query = $this->db->query($sql);

		foreach ($query->result() as $contacts) {
			array_push($contact,$contacts);
		}
		return $contact;
	}

	public function getAllRegions(){
		$sql = "SELECT DISTINCT UPPER(SUBSTRING(name,1,3)) as name,region FROM site_column ORDER BY name";
		$query = $this->db->query($sql);

		return $query->result();
	}

}