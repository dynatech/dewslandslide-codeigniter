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
class Gintags_helper_model extends CI_Model {

  public function createGintagsTable() {
        $sql = "SHOW TABLES LIKE 'gintags'";
        $res = $this->db->query($sql);
        if ($res->num_rows == 0) {
            $sql = "CREATE TABLE `gintags` (
                      `gintags_id` int(11) NOT NULL AUTO_INCREMENT,
                      `tag_id_fk` int(11) NOT NULL,
                      `tagger_eid_fk` varchar(45) NOT NULL,
                      `table_element_id` varchar(10) DEFAULT NULL,
                      `table_used` varchar(45) DEFAULT NULL,
                      `timestamp` varchar(45) DEFAULT NULL,
                      `remarks` varchar(200) DEFAULT NULL,
                      PRIMARY KEY (`gintags_id`),
                      KEY `tag_id_idx` (`tag_id_fk`),
                      KEY `tagger_idx` (`tagger_eid_fk`),
                      CONSTRAINT `tag_id` FOREIGN KEY (`tag_id_fk`) REFERENCES `gintags_reference` (`tag_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8";

            $res = $this->db->query($sql);
            echo "Table 'gintags' Created!\n";
        } else {
            // echo "Table 'gintags' exists!\n";
        }
  }

  public function createGintagsReferenceTable() {
       $sql = "SHOW TABLES LIKE 'gintags_reference'";
       $res = $this->db->query($sql);
        if ($res->num_rows == 0) {
            $sql = "CREATE TABLE `gintags_reference` (
                      `tag_id` int(11) NOT NULL AUTO_INCREMENT,
                      `tag_name` varchar(200) NOT NULL,
                      `tag_description` longtext,
                      PRIMARY KEY (`tag_id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8";

            $res = $this->db->query($sql);
            echo "Table 'gintags_reference' Created!\n";
        } else {
            // echo "Table 'gintags_reference' exists!\n";
        }
  }
    public function createGintagsHistoryTable() {
       $sql = "SHOW TABLES LIKE 'gintags_history'";
       $res = $this->db->query($sql);
        if ($res->num_rows == 0) {
          $sql = "CREATE TABLE `gintags_history` (
          `id` INT(11) NOT NULL AUTO_INCREMENT,
          `tag_id_fk` INT(11) NOT NULL,
          `tagger_eid_fk` VARCHAR(45) NULL DEFAULT NULL,
          `table_element_id` varchar(10) DEFAULT NULL,
          `table_used` VARCHAR(45) NULL DEFAULT NULL,
          `timestamp` VARCHAR(45) NULL DEFAULT NULL,
          `remarks` VARCHAR(100) NULL DEFAULT NULL,
          `issue` VARCHAR(100) NULL DEFAULT NULL,
          `status` VARCHAR(45) NULL DEFAULT NULL,
          PRIMARY KEY (`id`));
          ";
            $res = $this->db->query($sql);
            echo "Table 'gintags_history' Created!\n";
        } else {
            // echo "Table 'gintags_reference' exists!\n";
        }

        $sql_check = "SHOW COLUMNS FROM `gndmeas` LIKE 'id'";
        $q_check = $this->db->query($sql_check);
        if($q_check->num_rows == 0){
          $sql_altered = "ALTER TABLE `senslopedb`.`gndmeas` 
          ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT FIRST,
          ADD COLUMN `gndmeascol` VARCHAR(45) NULL AFTER `reliability`,
          DROP PRIMARY KEY,
          ADD PRIMARY KEY (`id`);";
          $q_sql = $this->db->query($sql_altered);
          echo "Altered gndmeas table with Primary key ID!\n";
        } else {
          echo "Altered exists";
        }
        
  }
    public function insertGinTagEntry($data){
        $doExist = $this->checkTagExist($data);
        if(sizeof($doExist) == 0) {
            $ginRefs = $this->insertIntoGinRef($data);
            $ginTags = $this->insertIntoGintags($data);
        } else {
            $doGintagExist = $this->checkEntryExist($data,$doExist);
            if(sizeof($doGintagExist) == 0) {
                $gintag_ref_exist["tag_name"] = $doExist[0]->tag_name;
                $gintag_ref_exist["tagger"] = $data["tagger"];
                $gintag_ref_exist["table_element_id"] = $data["table_element_id"];
                $gintag_ref_exist["table_used"] = $data["table_used"];
                $gintag_ref_exist["timestamp"] = $data["timestamp"];
                $gintag_ref_exist["remarks"] = $data["remarks"];
                $result = $this->insertIntoGintags($gintag_ref_exist);
            } else {
                echo "Tag exists";
            }
        }
    }

    public function removeGinTag($data){
      if ($data["db_used"] == "smsoutbox") {
        $sql = "SELECT sms_id from ".$data["db_used"]." WHERE recepients LIKE '%".$data["contact"]."%' AND timestamp_written='".$data["timestamp"]."'";
      } else {
        $sql = "SELECT sms_id from ".$data["db_used"]." WHERE sim_num LIKE '%".$data["contact"]."%' AND timestamp='".$data["timestamp"]."'";
      }
      $query_result = $this->db->query($sql);

      for ($counter = 0;$counter < sizeof($data["tags"]);$counter++) {
        if ($counter == 0) {
          $tag_query = "refs.tag_name='".$data["tags"][$counter]."' ";
        } else {
          $tag_query = $tag_query." OR refs.tag_name='".$data["tags"][$counter]."'";
        }
      }

      foreach ($query_result->result() as $row) {
        $remove_query = "DELETE tags FROM gintags tags INNER JOIN gintags_reference refs ON tags.tag_id_fk=refs.tag_id WHERE tags.table_element_id='".$row->sms_id."' AND ".$tag_query.";";
        $query_result = $this->db->query($remove_query);
      }
    }

    public function removeSenderGintag($data) {
        for ($counter = 0;$counter < sizeof($data["tags"]);$counter++) {
            if ($counter == 0) {
              $tag_query = "refs.tag_name='".$data["tags"][$counter]."' ";
            } else {
              $tag_query = $tag_query." OR refs.tag_name='".$data["tags"][$counter]."'";
            }
        }
        $remove_query = "DELETE tags FROM gintags tags INNER JOIN gintags_reference refs ON tags.tag_id_fk=refs.tag_id WHERE tags.table_element_id='".$data["sms_id"]."' AND ".$tag_query.";";
        $query_result = $this->db->query($remove_query);
    }

    public function checkTagExist($data){
        $sql = "SELECT * FROM gintags_reference WHERE tag_name='".$data['tag_name']."'";
        $query_result = $this->db->query($sql);
        return $query_result->result();
    }

    public function checkEntryExist($data,$doExist){
        $sql = "SELECT * FROM gintags WHERE tag_id_fk = ".$doExist[0]->tag_id." AND table_element_id = '".$data['table_element_id']."'";
        $query_result = $this->db->query($sql);
        return $query_result->result();
    }

    public function insertIntoGinRef($data){
        $sql = "INSERT INTO gintags_reference VALUES(0,'".$data["tag_name"]."','".$data["tag_description"]."')";
        $result = $this->db->query($sql);
        return $result;
    }

    public function insertIntoGintags($data){
        $sql = "SELECT tag_id FROM gintags_reference WHERE tag_name='".$data["tag_name"]."'";
        $result = $this->db->query($sql);
        $tag_id_fk = $result->result();

        $sql = "INSERT INTO gintags VALUES (0,".$tag_id_fk[0]->tag_id.",'".$data["tagger"]."','".$data["table_element_id"]."','".$data["table_used"]."','".$data["timestamp"]."','".$data["remarks"]."')";
        $result = $this->db->query($sql);
        return $result;
    }

    public function fetchGinTags($data = null){
        if ($data == null) {
            $sql = "SELECT gintags.gintags_id,gintags_reference.tag_name,gintags_reference.tag_description,membership.first_name as tagger_firstname,membership.last_name as tagger_lastname,gintags.table_element_id,gintags.table_used,gintags.timestamp,gintags.remarks from gintags inner join gintags_reference ON gintags.tag_id_fk=gintags_reference.tag_id inner join membership ON gintags.tagger_eid_fk = membership.id";   
        } else {
            $sql = "SELECT gintags.gintags_id,gintags_reference.tag_name,gintags_reference.tag_description,membership.first_name as tagger_firstname,membership.last_name as tagger_lastname,gintags.table_element_id,gintags.table_used,gintags.timestamp,gintags.remarks from gintags inner join gintags_reference ON gintags.tag_id_fk=gintags_reference.tag_id inner join membership ON gintags.tagger_eid_fk = membership.id WHERE gintags.table_element_id = ".$data."";   
        }
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function fetchGinTagsViaTag($data = null){
        $sql = "SELECT gintags.gintags_id,gintags_reference.tag_name,gintags_reference.tag_description,membership.first_name as tagger_firstname,membership.last_name as tagger_lastname,gintags.table_element_id,gintags.table_used,gintags.timestamp from gintags inner join gintags_reference ON gintags.tag_id_fk=gintags_reference.tag_id inner join membership ON gintags.tagger_eid_fk = membership.id WHERE gintags_reference.tag_name = ".$data."";   
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function fetchAllGintags(){
      $this->db->select('tag_name');
      $result = $this->db->get('gintags_reference');
      return $result->result();
    }

    public function getGintagsAndReference(){
      $sql = "SELECT gintags.tag_id_fk as GintagID,gintags.tagger_eid_fk as TaggerID,gintags.table_element_id as TableElementID,gintags.table_used as TableUsed,gintags.timestamp as Timestamp,gintags.remarks as Remarks,gintags_reference.tag_name as TagName,gintags_reference.tag_description as Description FROM senslopedb.gintags INNER JOIN gintags_reference ON gintags.tag_id_fk = gintags_reference.tag_id";
      $result = $this->db->query($sql);
      return $result->result();
    }

    public function getAnalytics($data){
      $query = "SELECT tag_id FROM gintags_reference WHERE tag_name LIKE '%".$data->gintags."%'";
      $result = $this->db->query($query);
      foreach ($result->result() as $tag_id) {
        $query = "SELECT * FROM gintags WHERE timestamp >= '".$data->start_date." 00:00:00' AND timestamp <= '".$data->end_date." 23:59:59' AND tag_id_fk='".$tag_id->tag_id."'";
        $result = $this->db->query($query);
        return $result->result();
      }
    }

    public function getGintagSearched($data){
      $result_collection = [];
      $multiple_gintag = "";
      $tags = explode(",",$data->gintags);
      for ($counter = 0; $counter < sizeof($tags);$counter++) {
        $query = "SELECT tag_id FROM gintags_reference WHERE tag_name LIKE '%".$tags[$counter]."%'";
        $result = $this->db->query($query);
        foreach ($result->result() as $tag_id) {
          $query = "SELECT * FROM gintags WHERE timestamp >= '".$data->start_date." 00:00:00' AND timestamp <= '".$data->end_date." 23:59:59' AND tag_id_fk='".$tag_id->tag_id."'";
          // var_dump($query);
          $result = $this->db->query($query);
          $result_collection[$tags[$counter]] = $result->result();
        }
      }
      return $result_collection;
    }

    public function getSms($data) {
      $sms_ids = "";
      for ($db_counter = 0; $db_counter < sizeof($data->database);$db_counter++) {
        for ($counter = 0; $counter < sizeof($data->data);$counter++) {
          if ($counter == 0) {
            $sms_ids = "sms_id = '".$data->data[$counter]."'";
          } else {
            $sms_ids = $sms_ids." OR sms_id = '".$data->data[$counter]."'";
          }
        }
        $query = "SELECT * FROM ".$data->database[$db_counter]." WHERE ".$sms_ids.";";
        $result = $this->db->query($query);
        return $result->result();
      }
    }

    public function getColumnName($data){
      $query = "SHOW COLUMNS FROM ".$data->database[0]."";
      $result = $this->db->query($query);
      return $result->result();
    }

    public function removeGintagId($data){
      $insertGintags = $this->InsertGintagsHistory($data);
      $gintags_id = $data["gintags_id"];
      $query_delete = "DELETE FROM gintags WHERE gintags_id='$gintags_id'";
      $result_delete = $this->db->query($query_delete);
      return $result_delete;
    }

    public function updateGintagId($data){
      $checkTagExistData = $this->checkTagExist($data);
      $gintags_id = $data["gintags_id"];
      $remarks = $data["remarks"];
      if (sizeof($checkTagExistData) == 0) {
          $ginRefs = $this->insertIntoGinRef($data);
          if ($ginRefs == True){
            $TagExistData = $this->checkTagExist($data);
            $newTagId = $TagExistData[0]->tag_id; 
          } 
      } else {  
          $newTagId = $checkTagExistData[0]->tag_id;        
      }
      $query_update = "UPDATE `gintags` SET `tag_id_fk`= '$newTagId' , `remarks`='$remarks' WHERE `gintags_id`='$gintags_id'";
      $insertGintags = $this->InsertGintagsHistory($data);
      $result_update = $this->db->query($query_update);
      return $result_update;
    }

    public function InsertGintagsHistory($data){
      $tag_id_fk = $data["tag_name_id"] ;
      $tagger_eid_fk = $data["tagger"];
      $table_element_id = $data["table_element_id"];
      $table_used = $data["table_used"];
      $timestamp = $data["timestamp"];
      $remarks = $data["remarks"];
      $issue = $data["issue"];
      $status = $data["status"];

      $query_insert = "INSERT INTO gintags_history (`tag_id_fk`, `tagger_eid_fk`, `table_element_id`, `table_used`, `timestamp`, `remarks`,`issue`, `status`) VALUES ('$tag_id_fk', '$tagger_eid_fk', '$table_element_id', '$table_used', '$timestamp', '$remarks','$issue' ,'$status')";
      $result_insert = $this->db->query($query_insert);
      
    }

     

}