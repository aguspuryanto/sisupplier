<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PurchaseOrdersSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ada data quotation terlebih dahulu
        $quotations = $this->db->table('quotations')->get()->getResultArray();
        
        if (empty($quotations)) {
            // Jika belum ada data quotation, jalankan QuotationSeeder dulu
            $this->call('QuotationSeeder');
            $quotations = $this->db->table('quotations')->get()->getResultArray();
        }

        $data = [
            [
                'quotation_id'    => $quotations[0]['id'],
                'po_number'       => 'PO-2024-0001',
                'po_date'         => '2024-03-14',
                'due_date'        => '2024-04-14',
                'customer'        => 'PT Maju Jaya',
                'pic_customer'    => 'John Doe',
                'amount'          => 15000000.00,
                'description'     => 'Purchase Order for Laptop Dell XPS 13',
                'status'          => 'draft',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'quotation_id'    => $quotations[1]['id'],
                'po_number'       => 'PO-2024-0002',
                'po_date'         => '2024-03-14',
                'due_date'        => '2024-04-14',
                'customer'        => 'PT Sukses Makmur',
                'pic_customer'    => 'Jane Smith',
                'amount'          => 5000000.00,
                'description'     => 'Purchase Order for Office Chairs',
                'status'          => 'approved',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('purchase_orders')->insertBatch($data);
    }
} 