<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container p-0">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Qoutation</h5>
            <a href="<?= base_url('transaksi/quote/add') ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="quotationTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Qoutation</th>
                            <th>Item Name</th>
                            <th>Date Qoutation</th>
                            <th>Due Date Qoutation</th>
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

<!-- Include DataTables CSS & JS di section yang sesuai -->
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
    $('#quotationTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url('transaksi/quote/getdata') ?>',
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
            { data: 'item_name' },
            { data: 'quotation_date' },
            { data: 'due_date' },
            { data: 'customer' },
            { data: 'pic_customer' },
            { 
                data: 'amount',
                render: function(data, type, row) {
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
                            <a href="<?= base_url('transaksi/quote/edit/') ?>${row.id}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('transaksi/quote/view/') ?>${row.id}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button onclick="deleteQuote(${row.id})" class="btn btn-sm btn-danger">
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

function deleteQuote(id) {
    if(confirm('Are you sure you want to delete this quotation?')) {
        $.ajax({
            url: '<?= base_url('transaksi/quote/delete/') ?>' + id,
            type: 'GET',
            success: function(response) {
                $('#quotationTable').DataTable().ajax.reload();
                alert('Quotation deleted successfully');
            },
            error: function(xhr, status, error) {
                alert('Error deleting quotation');
            }
        });
    }
}
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>