<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Basic Layout - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../<?= base_url('vendor/easyui/'); ?>themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>demo.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>style.css">
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.easyui.min.js"></script>
</head>

<body>
    <div style="margin:0;"></div>
    <div class="easyui-layout" style="width:100%;height:500px;">
        <div data-options="region:'north'" style="width:100%;height:20%">
            <div>
                <h1>
                    PERUMDA Air Minum Tugu Tirta
                </h1>
                <h5>
                    Jl. Terusan Danau Sentani no. 100 Kota Malang - Jawa Timur, Indonesia.
                </h5>
            </div>

        </div>
        <div data-options="region:'south',split:true" style="height:50px;"></div>
        <div data-options="region:'east',split:true" title="East" style="width:100px;"></div>
        <div data-options="region:'west',split:true" title="Menu" style="width:100px;"></div>
        <div data-options="region:'center',iconCls:'icon-ok'" title="Dokumen">
            <input type="search" class="search-box">
            <table class="easyui-datagrid" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
                <thead>
                    <tr>
                        <th data-options="field:'itemid'" width="30">ID</th>
                        <th data-options="field:'Jenis DOkumen',align:'left'" width="100">Jenis Dokumen</th>
                        <th data-options="field:'Nama Dokumen',align:'left'" width="100">Nama Dokumen</th>
                        <th data-options="field:'Keterangan'" width="150">Keterangan</th>
                        <th data-options="field:'path',align:'left'" width="60">Path</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</body>

</html>