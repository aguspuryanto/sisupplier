<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuotationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'quotation_number' => 'QT-2024-0001',
                'item_name'        => 'Laptop Dell XPS 13',
                'quotation_date'   => '2024-03-14',
                'due_date'         => '2024-03-28',
                'customer'         => 'PT Maju Jaya',
                'pic_customer'     => 'John Doe',
                'amount'           => 15000000.00,
                'description'      => 'Laptop Dell XPS 13 with 16GB RAM and 512GB SSD',
                'status'           => 'draft',
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'quotation_number' => 'QT-2024-0002',
                'item_name'        => 'Office Chairs',
                'quotation_date'   => '2024-03-14',
                'due_date'         => '2024-03-28',
                'customer'         => 'PT Sukses Makmur',
                'pic_customer'     => 'Jane Smith',
                'amount'           => 5000000.00,
                'description'      => '10 High-quality ergonomic office chairs',
                'status'           => 'sent',
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('quotations')->insertBatch($data);
    }
} 