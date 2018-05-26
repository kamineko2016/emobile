<?PHP


require '../sql/emobile.php';
$dsn="mysql:host=$db_host;dbname=$db_name";
$db=new PDO($dsn, $db_user, $db_password);


$result = NULL;

if(isset($_POST['method']))
{
	if($_POST['method'] == "new_driver")
	{
		if( isset($_POST['driver']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['plate']) && isset($_POST['credit']) )
		{
			if( (strlen($_POST['driver']) >= 25)  && (strlen($_POST['driver']) <= 50) )
			{
				
				//新增司機
				
				$sql="INSERT INTO `driver` (driver_id,phone,name,plate,credit)"." VALUES(?,?,?,?,?)";
				$sth=$db->prepare($sql);
				$sth->execute( array($_POST['driver'], $_POST['phone'], $_POST['name'], $_POST['plate'], intval($_POST['credit'])) );
				
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
	else if($_POST['method'] == "get_driver")
	{
		if(isset($_POST['driver']))
		{
			if( (strlen($_POST['driver']) >= 25) && (strlen($_POST['driver']) <= 50) )
			{
				//取出司機資料
				
				$sql="SELECT * FROM `driver` WHERE driver_id=? ORDER BY `credit` DESC";
				$sth=$db->prepare($sql);
				$sth->execute( array($_POST['driver']) );
				
				$count = 0;
				
				while($tmp=$sth->fetchObject())
				{
					$result['data'][$count]['id'] = $tmp->id;
					$result['data'][$count]['driver'] = $tmp->driver_id;
					$result['data'][$count]['name'] = $tmp->name;
					$result['data'][$count]['phone'] = $tmp->phone;
					$result['data'][$count]['plate'] = $tmp->plate;
					$result['data'][$count]['credit'] = $tmp->credit;
					
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
	else if($_POST['method'] == "get_all_driver")
	{
		
		//取出司機資料
		
		$sql="SELECT * FROM `driver` ORDER BY `credit` DESC";
		$sth=$db->prepare($sql);
		$sth->execute();
		
		$count = 0;
		
		while($tmp=$sth->fetchObject())
		{
			$result['data'][$count]['id'] = $tmp->id;
			$result['data'][$count]['driver'] = $tmp->driver_id;
			$result['data'][$count]['name'] = $tmp->name;
			$result['data'][$count]['phone'] = $tmp->phone;
			$result['data'][$count]['plate'] = $tmp->plate;
			$result['data'][$count]['credit'] = $tmp->credit;
			
			$count++;
		}
		
		$result['result'] = true;
		$result['message'] = "success";
		$result['count'] = $count;
		echo json_encode($result);
		
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


