<?php
class Facets {
	##Getting DB
	private static function DB() {
		global $DB;
		return $DB;
	}
	
	function get($name, $id, $mode = "Default") {
		switch ($name) {
			#####
			#
			#	TODO : ToolType, Licence Type
			#
			#####
			case "Suite":
				return self::getSuite($id, $mode);
				break;
			case "Project":
				return self::getProjects($id, $mode);
				break;
			case "Publication":
				return self::getPublications($id, $mode);
				break;
			case "ToolType":
				return self::getToolType($id, $mode);
				break;
			case "Platform":
				return self::getPlatform($id, $mode);
				break;
			case "Standard":
				return self::getStandards($id, $mode);
				break;
			case "Keyword":
				return self::getKeywords($id, $mode);
				break;
			case "Licence":
				return self::getLicence($id, $mode);
				break;
			case "Developer":
				return self::getDevelopers($id, $mode);
				break;
			case "ApplicationType":
				return self::getApplicationType($id, $mode);
				break;
			case "Feature":
				return self::getFeatures($id, $mode);
				break;
			default:
				return false;
		}
	}
	private function getDevelopers($id, $mode = "Default") {

		#REVERSE MODE : Get only data about a developer with developer_uid = $id
		if($mode == "Reverse") {
			$req = "SELECT d.developer_uid as UID, d.name, d.contact FROM developer d WHERE d.developer_uid = ? LIMIT 1";
		#DEFAULT MODE : Get keyword for tool
		} else {
			$req = "SELECT d.developer_uid as UID, d.name, d.contact FROM developer d, tool_has_developer td WHERE td.developer_uid = d.developer_uid AND td.tool_uid = ?";
		}
		#We group prepare and execute so we dont have any duplicate line
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		
		#If we got more than 0 result, we format
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				if($keyword["contact"] != null) {
					$ret[] = array(
								"name" => $keyword["name"],
								"contact" => $keyword["contact"],
								"identifier" => $keyword["UID"]
							);
				}	else {
					$ret[] = array(
								"name" => $keyword["name"],
								"identifier" => $keyword["UID"]
							);
				}
			}
			#In reverse mode, we have only one return item
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}


	private function getPublications($id, $mode = "Default") {
		#REVERSE MODE : Get only data about a keyword with ID = X
		if($mode == "Reverse") {
			$req = "SELECT p.publication_uid as UID, p.reference as name FROM publication p WHERE p.publication_uid = ? LIMIT 1";
		
		#DEFAULT MODE : Get keyword for tool
		} else {
			$req = "SELECT  p.publication_uid as UID, p.reference as name FROM publication p, tool_has_publication tp WHERE tp.publication_uid = p.publication_uid AND tp.tool_uid = ?";
			
		}
		#
		#
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		#
		#
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				$ret[] = array(
					"name" => $keyword["name"],
					"identifier" => $keyword["UID"]
				);
			}
			#Hack for formation for Reverse mode
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}

	private function getFeatures($id, $mode = "Default") {
		#REVERSE MODE : Get only data about a keyword with ID = X
		if($mode == "Reverse") {
			$req = "SELECT f.feature_uid as UID, f.name, f.description FROM feature f WHERE f.feature_uid = ? LIMIT 1";
		
		#DEFAULT MODE : Get keyword for tool
		} else {
			$req = "SELECT f.feature_uid as UID, f.name, f.description FROM feature f, tool_has_feature tf WHERE tf.feature_uid = f.feature_uid AND tf.tool_uid = ?";
			
		}
		#
		#
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		#
		#
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				$ret[] = array(
					"name" => $keyword["name"],
					"informations" => array(
						"description" => $keyword["description"]
					),
					"identifier" => $keyword["UID"]
				);
			}
			#Hack for formation for Reverse mode
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}		
	private function getProjects($id, $mode = "Default") {
		#REVERSE MODE : Get only data about a keyword with ID = X
		if($mode == "Reverse") {
			$req = "SELECT p.project_uid as UID, p.title as name, p.description, p.contact  FROM project p WHERE p.project_uid = ? LIMIT 1";
		
		#DEFAULT MODE : Get keyword for tool
		} else {
			$req = "SELECT  p.project_uid as UID, p.title as name, p.description, p.contact FROM project p, tool_has_project tp WHERE tp.project_uid = p.project_uid AND tp.tool_uid = ?";
			
		}
		#
		#
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		#
		#
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				$ret[] = array(
					"name" => $keyword["name"],
					"informations" => array(
						"description" => $keyword["description"],
						"contact" => $keyword["contact"]
					),
					"identifier" => $keyword["UID"]
				);
			}
			#Hack for formation for Reverse mode
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}

	private function getStandards($id, $mode = "Default") {
		#REVERSE MODE : Get only data about a keyword with ID = X
		if($mode == "Reverse") {
			$req = "SELECT s.standard_uid as UID, s.title as name, s.version, s.source  FROM standard s WHERE s.standard_uid = ? LIMIT 1";
		
		#DEFAULT MODE : Get keyword for tool
		} else {
			$req = "SELECT s.standard_uid as UID, s.title as name, s.version, s.source FROM standard s, tool_has_standard ts WHERE ts.standard_uid = s.standard_uid AND ts.tool_uid = ?";
			
		}
		#
		#
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		#
		#
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				$ret[] = array(
					"name" => $keyword["name"],
					"informations" => array(
						"version" => $keyword["version"],
						"source" => $keyword["source"]
					),
					"identifier" => $keyword["UID"]
				);
			}
			#Hack for formation for Reverse mode
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}

	private function getApplicationType($id, $mode = "Default") {
		$dictionnary = array(	
			"localDesktop" => "Desktop application",
			"other" => "Other",
			"unknown" => "Unkown",
			"webApplication" => "Web Application",
			"webService" => "Web service"
		);
		if($mode == "Reverse") {
			return array(
							"name" => $dictionnary[$id],
							"identifier" => $id
						);
		} else {
			$req = "SELECT d.application_type as UID, d.application_type as name FROM tool_application_type d WHERE d.tool_uid = ? GROUP BY application_type";
		}
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				$ret[] = array(
							"name" => $dictionnary[$keyword["name"]],
							"identifier" => $keyword["UID"]
						);
			}
			return $ret;
		} else {
			return false;
		}
	}



	private function getKeywords($id, $mode = "Default") {
		if($mode == "Reverse") { 
			$req = "SELECT k.keyword_uid, k.keyword, k.source_uri as sourceURI, k.source_taxonomy as sourceTaxonomy FROM keyword k WHERE k.keyword_uid = ? LIMIT 1";
		} else {
			$req = "SELECT k.keyword_uid, k.keyword, k.source_uri as sourceURI, k.source_taxonomy as sourceTaxonomy FROM keyword k, tool_has_keyword tk WHERE tk.keyword_uid = k.keyword_uid AND tk.tool_uid = ?";
		}
		
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
			$ret = array();
			foreach($data as &$keyword) {
				if($keyword["sourceURI"] != "") {
					$ret[] = array(
								"identifier" => $keyword["keyword_uid"],
								"keyword" => $keyword["keyword"],
								"provider" => array(
												"uri" => $keyword["sourceURI"],
												"domain" => parse_url($keyword["sourceURI"], PHP_URL_HOST),
												"taxonomy" => $keyword["sourceTaxonomy"]
											)
							);
				}	else {
					$ret[] = array(
								"identifier" => $keyword["keyword_uid"],
								"keyword" => $keyword["keyword"]
							);
				}
			}
			
			if($mode == "Reverse") { $ret = $ret[0]; }
			return $ret;
		} else {
			return false;
		}
	}

	private function getSuite($id, $mode = "Default") {
		###################################
		#
		#	MODES :
		#
		#		* Reverse = gets ToolType 							id is either null (List of ToolType) or int()
		#		* Default = gets ToolType from Tool					id cant be null
		#
		###################################
		
		#Default return is false :
		$ret = false;
		
		if($mode == "Reverse") {
		
			$req = "SELECT s.name, s.suite_uid as uid FROM suite s WHERE s.suite_uid = ? LIMIT 1";			
		
		} else {
		
			#In default mode, $id is an int
			$req = "SELECT s.name as name, s.suite_uid as uid FROM suite s, tool_has_suite ts WHERE ts.suite_uid = s.suite_uid AND ts.tool_uid = ?";
		
		}
			$req = self::DB()->prepare($req);
			$req->execute(array($id));
		
		#If we got data
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
		
			$ret = array();
			foreach($data as &$type) {
				$ret[] = $type;
			}
			if($mode == "Reverse") { $ret = $ret[0]; }
		}
		#RETURN
		return $ret;
	}

	private function getToolType($id, $mode = "Default") {
		###################################
		#
		#	MODES :
		#
		#		* Reverse = gets ToolType 							id is either null (List of ToolType) or int()
		#		* Default = gets ToolType from Tool					id cant be null
		#
		###################################
		
		#Default return is false :
		$ret = false;
		
		if($mode == "Reverse") {
		
			$req = "SELECT t.tool_type as name, t.source_uri as uri FROM tool_type t WHERE t.tool_type_uid = ? LIMIT 1";			
		
		} else {
		
			#In default mode, $id is an int
			$req = "SELECT t.tool_type as type, t.source_uri as uri FROM tool_type t, tool_has_tool_type tt WHERE tt.tool_type_uid = t.tool_type_uid AND tt.tool_uid = ?";
		
		}
			$req = self::DB()->prepare($req);
			$req->execute(array($id));
		
		#If we got data
		if($req->rowCount() > 0) {
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
		
			$ret = array();
			foreach($data as &$type) {
				$ret[] = $type;
			}
			if($mode == "Reverse") { $ret = $ret[0]; }
		}
		#RETURN
		return $ret;
	}

	private function getPlatform($id, $mode = "Default") {
		#Default return is false :
		$ret = false;
		
		if($mode == "Reverse") {
			$req = "SELECT p.name as platform FROM platform p WHERE p.platform_uid = ? LIMIT 1";
			#Request
		} else {
			$req = "SELECT p.name as platform FROM tool_has_platform tp, platform p WHERE tp.tool_uid = ? AND tp.platform_uid = p.platform_uid";
			#TBD
		}
		
		$req = self::DB()->prepare($req);
		$req->execute(array($id));
		
		#If we got data
		if($req->rowCount() > 0) {
		
			#Fetching data
			$data = $req->fetchAll(PDO::FETCH_ASSOC);
		
			#Format data
			$ret = array();
			foreach($data as &$v) {
				$ret[] = $v["platform"];
			}
			if($mode == "Reverse") { $ret = array("name" => $ret[0]); }
		}
		#Only one return
		return $ret;			
	}

	private function getLicence($id, $mode = "Default") {
		#Default return is false :
		$ret = false;
		
		if($mode == "Default") {
			#Request
			$req = "SELECT l.text, lt.type FROM licence l, tool_has_licence tl, licence_type lt WHERE tl.tool_uid = ? AND l.licence_uid = tl.licence_uid AND lt.licence_type_uid = l.licence_type_uid";
			$req = self::DB()->prepare($req);
			$req->execute(array($id));
			
			#If we got data
			if($req->rowCount() > 0) {
				#Fetching data
				$data = $req->fetchAll(PDO::FETCH_ASSOC);
				
				#Format data
				$ret = array();
				foreach($data as &$v) {
					#Format licence
					$ret[] = array(
						"name" => $v["text"],
						"type" => $v["type"]
					);
				}
			}
		} elseif($mode == "Reverse") {
			$req = "SELECT l.text, lt.type FROM licence l, licence_type lt WHERE l.licence_uid = ? AND lt.licence_type_uid = l.licence_type_uid";
			$req = self::DB()->prepare($req);
			$req->execute(array($id));
			
			#If we got data
			if($req->rowCount() > 0) {
				#Fetching data
				$data = $req->fetch(PDO::FETCH_ASSOC);
				
				#Format data
				$ret = array(
					"name" => $data["text"],
					"type" => $data["type"]
				);
			}
		}
		
		#Only one return
		return $ret;			
	}
}
?>