<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid p-0">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Purchase Order</h5>
            <a href="<?= base_url('transaksi/purchase-order/add') ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="purchaseOrderTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Quotation</th>
                            <th>No. PO</th>
                            <th>Date PO</th>
                            <th>Due Date PO</th>
                            <th>Customer</th>
                            <th>PIC Customer</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#purchaseOrderTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url('transaksi/purchase-order/getdata') ?>',
            type: 'POST'
        },
        columns: [
            { 
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'quotation_number' },
            { data: 'po_number' },
            { 
                data: 'po_date',
                render: function(data) {
                    return moment(data).format('DD/MM/YYYY');
                }
            },
            { 
                data: 'due_date',
                render: function(data) {
                    return moment(data).format('DD/MM/YYYY');
                }
            },
            { data: 'customer' },
            { data: 'pic_customer' },
            { 
                data: 'amount',
                render: function(data) {
                    return new Intl.NumberFormat('id-ID', { 
                        style: 'currency', 
                        currency: 'IDR' 
                    }).format(data);
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <a href="<?= base_url('transaksi/purchase-order/edit/') ?>${row.id}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('transaksi/purchase-order/view/') ?>${row.id}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button onclick="deletePO(${row.id})" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        responsive: true,
        language: {
            processing: "Loading...",
            zeroRecords: "No matching records found",
            search: "Search:",
            paginate: {
                first:      "First",
                last:       "Last",
                next:       "Next",
                previous:   "Previous"
            },
        }
    });
});

function deletePO(id) {
    if(confirm('Are you sure you want to delete this purchase order?')) {
        $.ajax({
            url: '<?= base_url('transaksi/purchase-order/delete/') ?>' + id,
            type: 'GET',
            success: function(response) {
                $('#purchaseOrderTable').DataTable().ajax.reload();
                alert('Purchase Order deleted successfully');
            },
            error: function(xhr, status, error) {
                alert('Error deleting purchase order');
            }
        });
    }
}
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?> 