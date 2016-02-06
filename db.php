<?php
	session_start();
	function site_db()
	{
		try
		{
			return new PDO('mysql:host=localhost;dbname=rosios', 'root', '');
		}
		catch(PDOException $ex)
		{
			echo "Connection Error: ", $ex->getMessage();
		}
	}
	
	function login_admin($username,$password)
	{
		$db = site_db();
		$sql = "Select * from account where username=? and password=?";
		$st = $db->prepare($sql);
		$st->execute(array($username,$password));
		$row = $st->fetch();
		$db = null;
		
		if($username == $row['username'] and $password = $row['password'])
		{
			$_SESSION['userID'] = $row['id'];
			$_SESSION['isloginAdmin'] = true;
			return true;
		}
		else
		{
			$_SESSION['isloginAdmin'] = false;
			return false;
		}
	}

	function get_comments($page)
	{
		$db = site_db();
		$sql = "select * from comments where page=? order by 1 desc"; 
		$st = $db->prepare($sql);
		$st->execute(array($page));
		$comments = $st->fetchAll();
		$db = null;
		return $comments;
	}

	function add_comment($page, $name, $comments)
	{
		$db = site_db();
		$sql = "insert into comments(name, comments, page) values(?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($name,$comments,$page));	
		
		$db = null;
	}
	
	function view_comment()
	{
		$db = site_db();
		$sql = "select * from comments order by 1 asc";
		$st = $db->prepare($sql);
		$st->execute();	
		$rows = $st->fetchAll();
		$db = null;
		return $rows;
	}
	
	function comments_find($id)
	{
		$db = site_db();
		$sql = "select * from comments where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	
	function comments_update($id, $name, $comment)
	{
		$db = site_db();
		$sql = "update comments set name=? ,comments=? where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($name, $comment, $id));
		$db = null;
	}
	
	function comments_delete($id)
	{
		$db = site_db();
		$sql = "delete from comments where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));
		$db = null;
	}
	
	function add_photo($name, $type, $bytes)
	{
		$db = site_db();
		$sql = "insert into photos(name, type, bytes) values(?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($name,$type,$bytes));	
		
		$db = null;
	}
	
	function get_photos()
	{
		$db = site_db();
		$sql = "select id, name, type from photos";
		$st = $db->prepare($sql);
		$st->execute();	
		$rows = $st->fetchAll();
		$db = null;
		return $rows;
	}
	
	function get_photo($id)
	{
		$db = site_db();
		$sql = "select * from photos where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));	
		$row = $st->fetch();
		$db = null;
		return $row;
	}
	
	function view_photos()
	{
		$db = site_db();
		$sql = "select * from photos";
		$st = $db->prepare($sql);
		$st->execute();	
		$row = $st->fetchAll();
		$db = null;
		return $row;
	}
	
	function photos_find($id)
	{
		$db = site_db();
		$sql = "select * from photos where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	
	function photos_delete($id)
	{
		$db = site_db();
		$sql = "delete from photos where id=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));
		$db = null;
	}
	/*function view_order()
	{
		$db = site_db();
		$sql = "SELECT * FROM  `order` order by 1 asc";
		$st = $db->prepare($sql);
		$st->execute();
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function order_add($orderName,$orderDesc,$orderQty,$orderDosage,$orderMod,$orderDate,$orderStat,$DocID)
	{
		$db = site_db();
		$sql = "Insert into `order` (OrderName,OrderDesc,OrderQty,OrderDosage,OrderMod,OrderDate,OrderStat,DocID) values(?,?,?,?,?,?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($orderName,$orderDesc,$orderQty,$orderDosage,$orderMod,$orderDate,1,1));
		$db = null;
	}
	
	function supp_add($Supname,$Supdesc,$SupQty,$Supstat)
	{
		$db = site_db();
		$sql = "Insert into `supplies` (Supname,Supdesc,Supqty,SupStat) values(?,?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($Supname,$Supdesc,$SupQty,1));
		$db = null;
	}
	
	function view_supp()
	{
		$db = site_db();
		$sql = "SELECT * FROM  `supplies` order by 1 asc";
		$st = $db->prepare($sql);
		$st->execute();
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function view_search($keyword)
	{
		$keyword = '%'. $keyword . '%'; //add wildcard for partial matching
		$db = site_db();
		$sql = "Select * from `supplies` where Supname like ? or Supdesc like ? or SupQty like ? or Supstat like ?";
		$st = $db->prepare($sql);
		$st->execute(array($keyword,$keyword,$keyword,$keyword));
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function order_update($orderName,$orderDesc,$orderQty,$orderDate,$id)
	{
		$db = site_db();
		$sql = "Update `order` set OrderName=? ,OrderDesc=?, OrderQty=?, OrderDate=? where OrderID=?";
		$st = $db->prepare($sql);
		$st->execute(array($orderName, $orderDesc, $orderQty, $orderDate,$id));
		$db = null;
	}
	
	function order_find($id)
	{
		$db = site_db();
		$sql = "select OrderID from `order` where OrderID=?";
		$st = $db->prepare($sql);
		$st->execute(array($id));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	function order_delete($id,$orderStat)
	{
		$db = site_db();
		$sql = "update `order` set OrderStat=? where OrderID=?";
		$st = $db->prepare($sql);
		$st->execute(array($id,'Deleted'));
		$db = null;
	}
	
	function order_search($keyword)
	{
		$keyword = '%'. $keyword . '%'; //add wildcard for partial matching
		$db = site_db();
		$sql = "Select * from `order` where OrderName like ? or OrderDesc like ? or OrderDate like ? or OrderQty like ? or OrderID like ? or OrderDosage like ? or OrderMod like ? or OrderStat like ?";
		$st = $db->prepare($sql);
		$st->execute(array($keyword,$keyword,$keyword,$keyword,$keyword,$keyword,$keyword,$keyword));
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function view_equip()
	{
		$db = site_db();
		$sql = "SELECT * FROM  `equipments` order by 1 asc";
		$st = $db->prepare($sql);
		$st->execute();
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function add_suppr($suppName,$suppLoc,$suppStat)
	{
		$db = site_db();
		$sql = "Insert into `suppliers` (suprname,suprloc,suprstat) values(?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($suppName,$suppLoc,1));
		$db = null;
	}
	
	
	function view_suppliers()
	{
		$db = site_db();
		$sql = "SELECT * FROM  `suppliers` order by 1 asc";
		$st = $db->prepare($sql);
		$st->execute();
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	

	function view_searchEquip($keyword)
	{
		$keyword = '%'. $keyword . '%'; //add wildcard for partial matching
		$db = site_db();
		$sql = "Select * from `equipments` where Equipname like ? or Equipdesc like ? or EquipQty like ? or EquipStat like ?";
		$st = $db->prepare($sql);
		$st->execute(array($keyword,$keyword,$keyword,$keyword));
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function equip_add($Equipname, $Equipdesc, $EquipQty, $Equipstat)
	{
		$db = site_db();
		$sql = "Insert into `equipments` (Equipname,Equipdesc,EquipQty,EquipStat) values(?,?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($Equipname,$Equipdesc,$EquipQty,1));
		$db = null;
	}
	
	 function view_suppr($keyword)
	 {
		$keyword = '%'. $keyword . '%'; //add wildcard for partial matching
		$db = site_db();
		$sql = "Select * from `suppliers` where suprname like ? or suprloc like ?";
		$st = $db->prepare($sql);
		$st->execute(array($keyword,$keyword));
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	 }*/
	
	function logout()
	{
		session_unset();
		session_destroy();
		session_regenerate_id();
	}
?>