<?php

// File: app/Views/dashboard.php
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container p-0">

    <div class="row text-center">
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">👥</div>
                <div>Total Customer</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">📦</div>
                <div>Total Barang</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">📦✔️</div>
                <div>Total Barang Ready</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">📦❌</div>
                <div>Total Barang Indent</div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">✅</div>
                <div>Total Lunas Hari Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">✅</div>
                <div>Total Lunas Bulan Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">❌</div>
                <div>Total Belum Lunas Hari Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">❌</div>
                <div>Total Belum Lunas Bulan Ini</div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">✅</div>
                <div>Total Jatuh Tempo Hari Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">✅</div>
                <div>Total Jatuh Tempo Bulan Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">❌</div>
                <div>Total Jatuh Tempo Tahun Ini</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-5">
                <div class="card-icon">❌</div>
                <div>Total Transaksi Invoice</div>
            </div>
        </div>
    </div>

    <?php //include_once("_part/analytic.php"); ?>

</div>
<?= $this->endSection() ?>
