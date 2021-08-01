<?php

Class Error_ms extends Controller
{
    function index()
    {   
        $data['page_title']= 'Home';
        


            $this->view('error_ms', $data);
    }


}

?>