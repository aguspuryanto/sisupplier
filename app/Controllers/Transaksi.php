<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Transaksi extends BaseController
{
    public function index()
    {
        //
        echo "Transaksi::Index";
    }

    public function quote()
    {
        // 
        // echo "Transaksi::Quote";
        return view("pages/transaksi/quote/quote");
    }
    
    public function purchaseOrder()
    {
        //
    }

    public function invoice()
    {
        // 
    }

    public function deliveryOrder()
    {
        // 
    }
}
