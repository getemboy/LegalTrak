<?php

Class Home extends Controller
{
    function index()
    {   
        $data['page_title']= 'Home';
        


        if (isset($_POST['client']) &&
		isset($_POST['matter']) &&
		isset($_POST['InvoiceNo']) &&
		isset($_POST['date']) &&
		isset($_POST['price']))
		
		{
            
                $user = $this->loadModel('invoice');
                $user->add_invoice($_POST);
                echo $_SESSION['error'];
                
            }
            $this->view('home', $data);
    }


}

?>