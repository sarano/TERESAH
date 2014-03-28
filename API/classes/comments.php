<?php
	/**
	 * Comment class handles the insert and get functions for comments and forum
	 *
	 *
	 */
	class Comment {
	
		/**
		 *	Get the DB in a PDO way, can be called through self::DB()->PdoFunctions
		 * @return PDO php object
		 */
		private static function DB() {
			global $DB;
			return $DB;
		}
		
		/**
		 *	Get the text type of a post from an integer identifier
		 *
		 * @param 	$id		Numeric identifier of the tool about which the comment is
		 * @return 	PDO php object
		 */
		private static function type($id) {
			$type = array(1=> "comment", 2 => "question", 3=>"answer");
			return $type[$id];
		}
		
		/**
		 *	Insert a post in the comment table, regardless of its functions (forum or comment)
		 *
		 * @require	$_SESSION["user"]["id"]	Numeric Identifier of a logged in User
		 *
		 * @param 	$id				Numeric identifier of the tool about which the comment is
		 * @param	$data["text"]	Text of the comment
		 * @param	$data["title"]	Title of the comment
		 * @param 	$type			Numeric identifier of the post type, default to 1(Comment)
		 * @return 	array(
		 *				"Rows" => Number of lines inserted
		 *			)
		 *			Or standard error code array("status", "message", + non standard "Rows")
		 */
		static function insert($id, $data, $type = 1) {
			if(isset($_SESSION["user"]["id"])) {
				$req = "INSERT INTO comment VALUES (NULL, ?, NOW(), ?, ?, ?, ?)";
				$req = self::DB()->prepare($req);
				$req->execute(array($data["text"], $data["title"], $_SESSION["user"]["id"], $id, self::type($type)));
				
				Log::insert("insert", $_SESSION["user"]["id"], "comment", self::DB()->lastInsertId());
				return array("Rows" => $req->rowCount());
			} else {
				return array("status" => "error", "message" => "Not signed in", "Rows" => 0);
			}
		}
		
		/**
		 *	Insert a reply in the comment table
		 *
		 * @require	$_SESSION["user"]["id"]	Numeric Identifier of a logged in User
		 *
		 * @param 	$id				Numeric identifier of the tool about which the comment is
		 * @param	$data["text"]	Text of the comment
		 * @param	$data["title"]	Title of the comment
		 * @param 	$topic			Numeric identifier of the topic to which the answer is linked to
		 * @return 	array(
		 *				"Rows" => Number of lines inserted
		 *			)
		 *			Or standard error code array("status", "message", + non standard "Rows")
		 */
		static function reply($id, $topic, $data) {
			if(isset($_SESSION["user"]["id"])) {
				$req = "INSERT INTO comment VALUES (NULL, ?, NOW(), ?, ?, ?, ?)";
				$req = self::DB()->prepare($req);
				$req->execute(array($data["text"], $data["title"], $_SESSION["user"]["id"], $id, self::type(3)));
				
				$lii = self::DB()->lastInsertId();
				Log::insert("insert", $_SESSION["user"]["id"], "comment", $lii);
				if($lii > 0) {
					$req = "INSERT INTO comment_has_reply VALUES ( ? , ? )";
					$req = self::DB()->prepare($req);
					$req->execute(array($topic, $lii));
					Log::insert("insert", $_SESSION["user"]["id"], "comment_has_reply", $lii);
				}
				
				return array("Rows" => $req->rowCount());
			} else {
				return array("status" => "error", "message" => "Not signed in", "Rows" => 0);
			}
		}
		
		/**
		 *	Get posts, depending of its type, from a tool
		 *
		 *
		 * @param 	$id		Numeric identifier of the tool about which the comment is
		 * @param 	$type	Numeric identifier of the post type, default to 1(Comment)
		 * @return 	Array() of Posts formated
		 */
		static function get($id, $type = 1) {
			if($type == 2) {
				//Request
				$req = "SELECT c.date as Date, c.subject as Subject, c.comment_uid as UID , u.mail as Mail, u.name as Name FROM comment c, user u WHERE c.tool_uid = ? AND u.user_uid = c.user_uid AND c.type = ?";
			} else {
				//Request
				$req = "SELECT c.text as Text, c.date as Date, c.subject as Subject, c.comment_uid as UID , u.mail as Mail, u.name as Name, c.type as Comment_type_name FROM comment c, user u WHERE c.tool_uid = ? AND u.user_uid = c.user_uid AND c.type = ?";
			}
			$req = self::DB()->prepare($req);
			$req->execute(array($id, self::type($type)));
			$d = $req->fetchAll(PDO::FETCH_ASSOC) ;
			//Format
			$r = self::format($type, $d);
			
			return $r;
		}
		
		
		/**
		 *	Format a fetchAll result from the Comment table to a readable array
		 *
		 *
		 * @param 	$type	Numeric identifier of the post type, default to 1(Comment)
		 * @param 	$d		Array resulting of a fetchAll PDO function
		 * @param 	$r		(Optional) Prefiled array of formatted posts
		 * @return 	Array() of Posts formated
		 */
		private static function format($type, $d, $r = array()) {
			foreach($d as $com) {
			
				if($type == 2) {
					$r[] = array(
						"identifier" => $com["UID"],
						"comment" => array(
							"date" => $com["Date"],
							"subject" => $com["Subject"]),
						"user" => array(
							"name" => $com["Name"],
							"mail" => md5($com["Mail"]))
						);
				} elseif($type == 3) {
					$r[] = array(
						"identifier" => $com["UID"],
						"comment" => array(
							"date" => $com["Date"],
							"text" => $com["Text"],
							"subject" => $com["Subject"]),
						"user" => array(
							"name" => $com["Name"],
							"mail" => md5($com["Mail"]))
						);
				} else {
					$r[] = array(
						"identifier" => $com["UID"],
						"comment" => array(
							"date" => $com["Date"],
							"subject" => $com["Subject"],
							"text" => $com["Text"],
							"type" => $com["Comment_type_name"]),
						"user" => array(
							"name" => $com["Name"],
							"mail" => md5($com["Mail"]))
						);
				}
			}
			return $r;
		}
		
		/**
		 *	Return a topic with all its messages
		 *
		 *
		 * @param 	$id		Numeric identifier of the topic
		 * @return 	Array() of Posts formated
		 */
		static function topic($id) {
			//Original topic
			$req = "SELECT c.text as Text, c.date as Date, c.subject as Subject, c.comment_uid as UID , u.mail as Mail, u.name as Name FROM comment c, user u WHERE c.comment_uid = ? AND u.user_uid = c.user_uid AND c.type = ? LIMIT 1";
			$req = self::DB()->prepare($req);
			$req->execute(array($id, self::type(2)));
			$d = $req->fetchAll(PDO::FETCH_ASSOC) ;
			
			//Format
			$r = self::format(3, $d);
			
			//Answers
			$req = "SELECT c.text as Text, c.date as Date, c.subject as Subject, c.comment_uid as UID , u.mail as Mail, u.name as Name FROM comment c, user u, comment_has_reply cr WHERE cr.comment_uid = ? AND c.comment_uid=cr.comment_uid1 AND u.user_uid = c.user_uid AND c.type = ? ORDER BY c.comment_uid ASC";
			$req = self::DB()->prepare($req);
			$req->execute(array($id, self::type(3)));
			$d = $req->fetchAll(PDO::FETCH_ASSOC) ;
			
			$r = self::format(3, $d, $r);
			
			
			return $r;
		}
	}
	$comment = new Comment();
?>