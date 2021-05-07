<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="//cdn.webix.com/edge/webix.css" type="text/css">
    <script src="//cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    </link>
</head>

<nav>
    <ul>
        <li class="<?= ($this->uri->segment(2) == 'kasir') ? 'active' : '' ?>"><a href="<?= base_url('Admin/kasir') ?>">kasir</a></li>
        <li class="<?= ($this->uri->segment(2) == 'index') ? 'active' : '' ?>"><a href="<?= base_url('Admin/index') ?>">data stock</a></li>
        <li class="<?= ($this->uri->segment(2) == 'laporan') ? 'active' : '' ?>"><a href="<?= base_url('Admin/laporan') ?>">data penjualan</a></li>
        <li>profile</li>
    </ul>
</nav>