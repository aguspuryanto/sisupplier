<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // check session
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }        
        
        $headerMenu =['Master Data', 'Transaksi', 'Laporan', "Pengaturan"];

        return view('dashboard', [
            'headerMenu' => $headerMenu
        ]);
        // return view('welcome_message');
    }

    public function dashboard()
    {
        // check session
        // if (!session()->get('isLoggedIn')) {
        //     return redirect()->to('/login');
        // }
        
        // $headerMenu =['Master Data', 'Transaksi', 'Laporan', "Pengaturan"];

        // return view('dashboard', [
        //     'headerMenu' => $headerMenu
        // ]);
    }
}
