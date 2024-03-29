<?php 
		
	// check data is appear in DB or not, if yes return true, else return false
	function isAppear($table_name, $condition){
		$db = new Database;
		$result = $db->getRowsWithCondition($table_name,$condition);
		$count = mysqli_num_rows($result);
		echo "num of rows: " . $count;
		$db->disconnectDB();
		if($count==0){
			return false;
		}
		else return true;

	}

	//check a file upload is a image? if $check is an array return true, else return false
	function isImage($img_name){
		$check = getimagesize($_FILES[$img_name]['tmp_name']);
		if($check){
			return true;
		}
		return false;
	}

	//check an image had existed in folder yet? if right return true, else return false
	function isFileExist($target_file){
		if(file_exists($target_file)){
			return true;
		}
		else return false;
	}

	// check size of image uploaded, if the size greater than max_size return true, else return false
	function isTooLarge($size_file){
		if($size_file>MAX_FILE_SIZE){
			return true;
		}
		else return false;
	}

	//check type of image, if the type is one in the followed type return true, else return false
	function isRightType($type_file){

		if(in_array($type_file, ARRAY_IMAGE_TYPE)){
			return true;
		}
		else return false;
	}

	//get rows from database with condition
	function dbGetRowsWithCondition($tb_name, $condition){
		$db = new Database();
		$result = $db->getRowsWithCondition($tb_name,$condition);
		$db->disconnectDB();
		return $result;
	}

	//get all rows from table in database
	function dbGetAllRows($tb_name){
		$db = new Database();
		$result = $db->getAllRows($tb_name);
		$db->disconnectDB();
		return $result;
	}

	// update database base on query, if success return 1, else return 0
	function dbUpdateData($query){
		$db = new Database();
		$result=$db->updateData($query);
		$db->disconnectDB();
		if($result==1) return 1;
		else return 0;
	}

?>

