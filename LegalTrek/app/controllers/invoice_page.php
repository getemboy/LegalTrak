<?php

Class Invoice_page extends Controller
{
    function index()
    {   
        $data['page_title']= 'Home';
    
            
                $user = $this->loadModel('invoice');
                $user->view_invoice();
                $word = $this->loadModel('HTML_TO_DOC');
                
            $this->view('invoice_page', $data);
    }


}

?>