<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>表單</title>
</head>

<body>

<p>&nbsp;</p>

<form id="form1" name="form1" method="post" action="api.php">
  
  <p>method : 
  <input type="text" name="method" id="method" value=""/>
  </p>
  
  <p>longitude ( 經度 ) : 
  <input type="text" name="longitude" id="longitude" value=""/>
  </p>
  
  <p>latitude ( 緯度 ) : 
  <input type="text" name="latitude" id="latitude" value=""/>
  </p>
  
  <p>distance ( 里程數 km ) : 
  <input type="text" name="distance" id="distance" value=""/>
  </p>
  
  <p>user ( 乘客錢包地址 ) : 
  <input type="text" name="user" id="user" value=""/>
  </p>
  
  <p>driver ( 司機錢包地址 ) : 
  <input type="text" name="driver" id="driver" value=""/>
  </p>
  
  <p>contract ( emobile合約地址 ) : 
  <input type="text" name="contract" id="contract" value=""/>
  </p>
  
  <p>&nbsp;</p>
  <input type="submit" name="button" id="button" value="送出" />
</form>


<br />


<p>&nbsp;</p>
</body>
</html>
