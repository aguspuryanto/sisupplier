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

    public function getdataQuote()
    {
        $db = db_connect();
        $builder = $db->table('quotations');

        // Total records
        $totalRecords = $builder->countAllResults();

        // Prepare the query
        $builder->select('
            quotations.id,
            quotations.quotation_number,
            quotations.item_name,
            quotations.quotation_date,
            quotations.due_date,
            quotations.customer,
            quotations.pic_customer,
            quotations.amount
        ');

        // Get search value
        $search = $this->request->getPost('search')['value'];

        if($search) {
            $builder->groupStart()
                ->like('quotation_number', $search)
                ->orLike('item_name', $search)
                ->orLike('customer', $search)
                ->orLike('pic_customer', $search)
            ->groupEnd();
        }

        // Total records with filter
        $totalRecordsWithFilter = $builder->countAllResults(false);

        // Fetch records
        $builder->orderBy($this->request->getPost('order')[0]['column'], $this->request->getPost('order')[0]['dir']);
        $builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $records = $builder->get()->getResultArray();

        $data = array();
        foreach($records as $record) {
            $data[] = array(
                "id" => $record['id'],
                "quotation_number" => $record['quotation_number'],
                "item_name" => $record['item_name'],
                "quotation_date" => date('d/m/Y', strtotime($record['quotation_date'])),
                "due_date" => date('d/m/Y', strtotime($record['due_date'])),
                "customer" => $record['customer'],
                "pic_customer" => $record['pic_customer'],
                "amount" => $record['amount']
            );
        }

        $response = array(
            "draw" => intval($this->request->getPost('draw')),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data
        );

        return $this->response->setJSON($response);
    }

    public function getPurchaseOrderData()
    {
        $db = db_connect();
        $builder = $db->table('purchase_orders')
            ->select('
                purchase_orders.*,
                quotations.quotation_number
            ')
            ->join('quotations', 'quotations.id = purchase_orders.quotation_id');

        // Total records
        $totalRecords = $builder->countAllResults(false);

        // Get search value
        $search = $this->request->getPost('search')['value'];

        if($search) {
            $builder->groupStart()
                ->like('po_number', $search)
                ->orLike('quotation_number', $search)
                ->orLike('customer', $search)
                ->orLike('pic_customer', $search)
            ->groupEnd();
        }

        // Total records with filter
        $totalRecordsWithFilter = $builder->countAllResults(false);

        // Fetch records
        $builder->orderBy($this->request->getPost('order')[0]['column'], $this->request->getPost('order')[0]['dir']);
        $builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $records = $builder->get()->getResultArray();

        $response = array(
            "draw" => intval($this->request->getPost('draw')),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $records
        );

        return $this->response->setJSON($response);
    }

}
