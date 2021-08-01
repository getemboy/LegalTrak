<?php 

Class Invoice 
{

	function view_invoice()
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		

			$arr['invoice_id'] = $_SESSION['invoice_id'];

			$query = "select * from lt_invoice where invoice_id = :invoice_id limit 1";
			$data = $DB->db_read($query,$arr);
			if(is_array($data))
			{
 				//logged in
 				$_SESSION['client'] = $data[0]->client;
				$_SESSION['matter'] = $data[0]->matter;
				$_SESSION['issuer'] = $data[0]->issuer;
				$_SESSION['currency'] = $data[0]->currency;
				$_SESSION['date'] = $data[0]->date;
				$_SESSION['amount'] = $data[0]->amount;
				$_SESSION['price'] = $data[0]->price;
				$_SESSION['discount'] = $data[0]->discount;
				$_SESSION['vat'] = $data[0]->vat;
				$_SESSION['total'] = $data[0]->total;
				$_SESSION['description'] = $data[0]->description;



			}else{

				$_SESSION['error'] = "wrong username or password";
			}
		}

	

	function add_invoice($POST)
	{

		$DB = new Database();

		$_SESSION['error'] = "";
		if (isset($POST['client']) &&
		isset($POST['matter']) &&
		isset($POST['InvoiceNo']) &&
		isset($POST['date']) &&
		isset($POST['price']))
		{

			$arr['client']= $POST['client'];
			$arr['matter'] = $POST['matter'];
			$arr['issuer'] = $POST['issuer'];
			if($POST['currency']== "€"){$arr['currency'] = "EURO";}
			else {$arr['currency'] = 'US dollars';}
			$arr['invoice_id'] = $POST['InvoiceNo'] . '/2020';
			if($this->check_invoice_id($arr['invoice_id']) == false) {header("Location:". ROOT . "error_ms"); die; }
			$arr['date'] = $POST['date'];
			$arr['description'] = $POST['description'];
			if(isset($POST['discount_check']) && ($POST['discount_check'] == true && $POST['discount_proc'] != 0)){
				$arr['price'] = $POST['price'] - (($POST['discount_proc'] / 100) * $POST['price']);
			}
			else {
			$arr['price'] = $POST['price'];
			}
			if(isset($POST['discount_check']) &&  $POST['discount_check'] == true) {
				$arr['discount_proc'] = $POST['discount_proc'];
			}
			else {$arr['discount_proc'] = 0;}
			$arr['vat_proc'] = 20;

			$arr['total'] = $arr['price'] + ($arr['price'] * 0.20);

			$arr['file_location'] = ASSETS . $arr['invoice_id'] . '.doc';
			$_SESSION['invoice_id'] = $arr['invoice_id'];


			$query = "INSERT INTO lt_invoice (client,matter,issuer,currency,invoice_id,date,description,price,discount,vat,total,file_location) VALUES (:client, :matter, :issuer, :currency, :invoice_id, :date, :description, :price, :discount_proc, :vat_proc, :total, :file_location)";


			$data = $DB->db_write($query,$arr);
			echo ' test1';
			var_dump($data);
			if($data)
			{
				echo ' test2';
				header("Location:". ROOT . "invoice_page");
				die;
			}

		else{
			echo ' test3';
			$_SESSION['error'] = "Invoice was not saved";
		}
	}
	}
	function check_invoice_id($invoice_id)
	{

		$DB = new Database();

		$arr['invoice_id'] = $invoice_id;
			$query = "select invoice_id from lt_invoice where invoice_id = :invoice_id limit 1";
			$data = $DB->db_read($query,$arr);
			if(isset($data[0]->invoice_id))
			{
				return false;
			}
			else{return true;}
		
	
	}

	function logout()
	{
		//logged in
		unset($_SESSION['user_name']);
		unset($_SESSION['user_url']);

		header("Location:". ROOT . "login");
		die;
	}
}
