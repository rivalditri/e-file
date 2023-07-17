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
        <!-- <div data-options="region:'east',split:true" title="East" style="width:100px;"></div> -->
        <div data-options="region:'west',split:true" title="Menu" style="width:100px;"></div>
        <div data-options="region:'center',iconCls:'icon-ok'" title="Dokumen">

            <div id="toolbar" >
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="">New</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remove()">Remove</a>
                <input id="term" placeholder="Type Keyword....." style="float: right;">
                <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()" style="float: right;">Search</a> -->
            </div>


            <table class="easyui-datagrid" id="dg" title="Users Management" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">

                <thead>
                    <tr>
                        <th data-options="field:'itemid'" width="150">NIP</th>
                        <th data-options="field:'Jenis Dokumen',align:'left'" width="150">Nama Karyawan</th>
                        <th data-options="field:'Nama Dokumen',align:'left'" width="150">Bagian</th>
                        <th data-options="field:'Nama Dokumen',align:'left'" width="150">Action</th>
                    </tr>
                </thead>
            </table>
            <!-- 
        <div id="toolbar">
                <div id="tb">
                    <input id="term" placeholder="Type Keyword.....">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">Search </a>
                </div>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="new()">New </a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit </a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remove()">Remove </a>
            </div> -->
        </div>


</body>

</html>