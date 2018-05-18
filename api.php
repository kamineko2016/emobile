<?PHP


require '../sql/emobile.php';
$dsn="mysql:host=$db_host;dbname=$db_name";
$db=new PDO($dsn, $db_user, $db_password);


$result = NULL;

if(isset($_POST['method']))
{
	if($_POST['method'] == "new_travel")
	{
		if(isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['distance']) && isset($_POST['user']) && isset($_POST['driver']) && isset($_POST['contract']))
		{
			if( (strlen($_POST['user']) >= 25) && (strlen($_POST['user']) <= 50) && (strlen($_POST['driver']) >= 25)  && (strlen($_POST['driver']) <= 50) && (strlen($_POST['contract']) >= 25)  && (strlen($_POST['contract']) <= 50) )
			{
				
				//新增搭乘記錄
				
				$sql="INSERT INTO `travel` (user_id,driver_id,contract_id,latitude,longitude,distance)"." VALUES(?,?,?,?,?,?)";
				$sth=$db->prepare($sql);
				$sth->execute( array($_POST['user'], $_POST['driver'], $_POST['contract'], floatval($_POST['latitude']), floatval($_POST['longitude']), floatval($_POST['distance'])) );
				
				$result['result'] = true;
				$result['message'] = "success";
				echo json_encode($result);
				
			}
			else
			{
				//簡單判斷地址長度不正確
				$result['result'] = false;
				$result['message'] = "invalid_address";
				echo json_encode($result);
			}
		}
		else
		{
			//少給資料
			$result['result'] = false;
			$result['message'] = "missing_data";
			echo json_encode($result);
		}
	}
	else if($_POST['method'] == "get_user_travel")
	{
		if(isset($_POST['user']))
		{
			if( (strlen($_POST['user']) >= 25) && (strlen($_POST['user']) <= 50) )
			{
				//取出乘客的搭乘記錄
				
				$sql="SELECT * FROM `travel` WHERE user_id=? ORDER BY `distance` DESC";
				$sth=$db->prepare($sql);
				$sth->execute( array($_POST['user']) );
				
				$count = 0;
				
				while($tmp=$sth->fetchObject())
				{
					$result['data'][$count]['id'] = $tmp->id;
					$result['data'][$count]['user'] = $tmp->user_id;
					$result['data'][$count]['driver'] = $tmp->driver_id;
					$result['data'][$count]['contract'] = $tmp->contract_id;
					$result['data'][$count]['latitude'] = $tmp->latitude;
					$result['data'][$count]['longitude'] = $tmp->longitude;
					$result['data'][$count]['distance'] = $tmp->distance;
					
					$count++;
				}
				
				$result['result'] = true;
				$result['message'] = "success";
				$result['count'] = $count;
				echo json_encode($result);
				
			}
			else
			{
				//簡單判斷地址長度不正確
				$result['result'] = false;
				$result['message'] = "invalid_address";
				echo json_encode($result);
			}
		}
		else
		{
			//少給資料
			$result['result'] = false;
			$result['message'] = "missing_data";
			echo json_encode($result);
		}
	}
	else if($_POST['method'] == "get_driver_travel")
	{
		if(isset($_POST['driver']))
		{
			if( (strlen($_POST['driver']) >= 25) && (strlen($_POST['driver']) <= 50) )
			{
				//取出司機的載客記錄
				
				$sql="SELECT * FROM `travel` WHERE driver_id=? ORDER BY `user_id` ASC , `distance` DESC";
				$sth=$db->prepare($sql);
				$sth->execute( array($_POST['driver']) );
				
				$count = 0;
				
				while($tmp=$sth->fetchObject())
				{
					$result['data'][$count]['id'] = $tmp->id;
					$result['data'][$count]['user'] = $tmp->user_id;
					$result['data'][$count]['driver'] = $tmp->driver_id;
					$result['data'][$count]['contract'] = $tmp->contract_id;
					$result['data'][$count]['latitude'] = $tmp->latitude;
					$result['data'][$count]['longitude'] = $tmp->longitude;
					$result['data'][$count]['distance'] = $tmp->distance;
					
					$count++;
				}
				
				$result['result'] = true;
				$result['message'] = "success";
				$result['count'] = $count;
				echo json_encode($result);
				
			}
			else
			{
				//簡單判斷地址長度不正確
				$result['result'] = false;
				$result['message'] = "invalid_address";
				echo json_encode($result);
			}
		}
		else
		{
			//少給資料
			$result['result'] = false;
			$result['message'] = "missing_data";
			echo json_encode($result);
		}
	}
	else
	{
		//method不正確
		$result['result'] = false;
		$result['message'] = "invalid_method";
		echo json_encode($result);
	}
}
else
{
	//沒給method值
	$result['result'] = false;
	$result['message'] = "no_method";
	echo json_encode($result);
}




?>


