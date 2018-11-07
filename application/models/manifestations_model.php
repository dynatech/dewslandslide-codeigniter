<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manifestations_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('sites_model');
	}

	/**
	 * Gets public releases
	 * 
	 * @author Kevin Dhale dela Cruz
	 **/
	public function getLatestMOMperSite()
	{	
		// $query = "
		// 	SELECT 
		// 		pm.manifestation_id, pm.ts_observance, pm.op_trigger, mf.feature_type, mf.feature_name, site.name AS site_code,
		// 		site.barangay, site.municipality, site.province
		// 	FROM public_alert_manifestation AS pm
		// 	JOIN manifestation_features AS mf ON pm.feature_id = mf.feature_id
		// 	JOIN
		// 		(SELECT MAX(man.ts_observance) AS max_ts, features.site_id
		// 		FROM public_alert_manifestation AS man
		// 		JOIN manifestation_features AS features ON man.feature_id = features.feature_id
		// 		GROUP BY features.site_id) AS max_sub
		// 	ON pm.ts_observance = max_sub.max_ts AND mf.site_id = max_sub.site_id
		// 	RIGHT JOIN site ON mf.site_id = site.id";
		
		$query = "
			SELECT sub_query.*, sites.site_code, 
				sites.sitio, sites.barangay, sites.municipality, sites.province
			FROM sites
			LEFT JOIN
			(
				SELECT
					man.*, mafe.site_id, mafe.feature_type, mafe.feature_name
				FROM 
					public_alert_manifestation man
				JOIN manifestation_features mafe
					ON man.feature_id = mafe.feature_id
				WHERE man.manifestation_id =  
				(
					# GET MOST RECENT TIMESTAMP ACCORDING TO ORDER
					# OP_TRIGGER 3 > 2 > 1 then TS ON DESC ORDER
					# RETURN MANIFESTATION ID
					SELECT pm.manifestation_id
					FROM 
						manifestation_features as mf
	    			JOIN
	    			(
	    				# GET MAX TIMESTAMP PER FEATURE BY AGGREGATE MAX AND GROUP BY
	        			SELECT features.site_id, MAX(man.ts_observance) AS max_ts, features.feature_id
	        			FROM public_alert_manifestation AS man
	        			JOIN manifestation_features AS features ON man.feature_id = features.feature_id
	        			GROUP BY features.feature_id
	    			) AS sub
						ON sub.feature_id = mf.feature_id
					JOIN public_alert_manifestation AS pm
						ON (sub.max_ts = pm.ts_observance AND sub.feature_id = pm.feature_id)
	    			WHERE mafe.site_id = mf.site_id
	    			ORDER BY pm.op_trigger DESC, pm.ts_observance DESC
	    			LIMIT 1
	    		)
    		) AS sub_query
    		ON sites.site_id = sub_query.site_id";

		$result = $this->db->query($query);
		return $result->result_object();
	}

	public function getMOMApi($site_code = "all", $start = null, $end = null)
	{
		$site_id = null;
		if( $site_code !== "all" ) {
			$site_id = $this->sites_model->getSiteID($site_code);
		}

		$this->db->select("pm.*, mf.*, u.first_name AS validator_first, u.last_name AS validator_last, s.name AS site_code");
		$this->db->from("public_alert_manifestation AS pm");
		$this->db->join("manifestation_features AS mf", "pm.feature_id = mf.feature_id");
		$this->db->join("comms_db.users AS u", "pm.validator = u.user_id");
		$this->db->join("site AS s", "mf.site_id = s.id");
		
		if( $site_code !== "all" ) {
			$this->db->where("mf.site_id", $site_id);
		}

		if( !is_null($start) ) {
			$this->db->where("pm.ts_observance >=", $start);	
		}

		if( !is_null($end) ) {
			$this->db->where("pm.ts_observance <= ", $end);	
		}

		$result = $this->db->get();
		return $result->result_object();
	}

	public function getAllMOMforASite($search = null, $filter = null, $orderBy, $orderType, $start, $length)
	{
        $this->db->select('public_alert_manifestation.*, manifestation_features.*, public_alert_release.event_id, u.firstname AS first_name, u.lastname AS last_name');
		$this->db->from('public_alert_manifestation');
		$this->db->join('manifestation_features', 'public_alert_manifestation.feature_id = manifestation_features.feature_id');
		$this->db->join('public_alert_release', 'public_alert_manifestation.release_id = public_alert_release.release_id', 'left');
		$this->db->join('comms_db.users AS u', 'public_alert_manifestation.validator = u.user_id');
		if( !is_null($filter) ) $this->db->where($filter);
		if( !is_null($search) ) {
			// $this->db->or_like($search);
			$open = "("; $where = [];
			foreach ($search as $key => $value) {
				array_push($where, "$key LIKE '%$value%'");
			}
			$final = $open . implode(" OR ", $where) . ")";
			$this->db->where($final);
		}
		$this->db->order_by($orderBy, $orderType);
		$this->db->limit($length, $start);
		$query = $this->db->get();
		// if( !is_null($search) ) {
		// 	$x = $this->db->last_query();
		// 	var_dump( $x );
		// }
		return $query->result_array();
	}

	public function getCount($search = null, $filter = null)
	{
		$this->db->select('COUNT(*)');
		$this->db->from('public_alert_manifestation');
		$this->db->join('manifestation_features', 'public_alert_manifestation.feature_id = manifestation_features.feature_id');
		if( !is_null($filter) ) $this->db->where($filter);
		if( !is_null($search) ) {
			// $this->db->or_like($search);
			$open = "("; $where = [];
			foreach ($search as $key => $value) {
				array_push($where, "$key LIKE '%$value%'");
			}
			$final = $open . implode(" OR ", $where) . ")";
			$this->db->where($final);
		}
		$query = $this->db->get();
		return $query->result_array()[0]["COUNT(*)"];
	}

	public function getDistinctFeatureTypes()
	{
		$this->db->distinct();
		$this->db->select('feature_type');
		$this->db->from('manifestation_features');
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Note: originally from Pubrelease_model
	 **/
	public function getFeatureNames($site_id, $type) {
		$query = $this->db->get_where("manifestation_features", array("site_id" => $site_id, "feature_type" => $type));
		return $query->result_object();
	}    

}
