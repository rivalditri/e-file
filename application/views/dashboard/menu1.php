<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../<?= base_url('vendor/easyui/'); ?>themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>demo.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>style.css">
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.easyui.min.js"></script>

</head>

<body>
    <div class="easyui-layout" style="width:100%;height:700px;">
        <!-- header menu -->
        <div data-options="region:'north'" style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
            <div style="float: left;">
                Perumda Tugu Tirta
            </div>
            <div style="float: right;">
                <a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Setting</a>
                <div id="mm2" style="width:100px;">
                    <div>Profil</div>
                    <div>LogOut</div>
                </div>
            </div>
        </div>


        <!-- <div data-options="region:'east',split:true" title="East" style="width:100px;"></div> -->
        <div data-options="region:'west',split:true" title="Menu" style="width:10%;">
            <ul class="easyui-tree">
                <li>
                    <span>Karyawan</span>
                    <ul>
                        <li><span>Bagian / Manajer</span></li>
                        <li><span>Asisten Manajer</span></li>
                        <li><span>Supervisor</span></li>
                        <li><span>Staff</span></li>
                    </ul>
                </li>
                
                <li>
                    <span>Dokumen</span>
                    <ul>
                        <li><span>Dokumen 1</span></li>
                        <li><span>Dokumen 2</span></li>
                        <li><span>Dokumen 3</span></li>
                        <li><span>Dokumen 4</span></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
            <div id="toolbar">
                <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
                <!-- <div class="search-container"> -->
                <input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width: 15%;">
                <!-- </div> -->
                <div id="mm">
                    <div data-options="name:'all',iconCls:'icon-ok'">All </div>
                    <div data-options="name:'sports'">NIP</div>
                    <div data-options="name:'sports'">Nama</div>
                </div>
            </div>
            <table class="easyui-datagrid" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true" toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                    <tr>
                        <th field="firstname" width="50" editor="{type:'validatebox',options:{required:true}}">First Name</th>
                        <th field="lastname" width="50" editor="{type:'validatebox',options:{required:true}}">Last Name</th>
                        <th field="phone" width="50" editor="text">Phone</th>
                        <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th>
                    </tr>
                </thead>
            </table>
        </div>
        <style>
            .sidebar {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                gap: 10px;
            }

            .easyui-linkbutton {
                height: 28px;
                line-height: 28px;
            }
        </style>

        <script>
            function doSearch(value, name) {
                alert('You input: ' + value + '(' + name + ')');
            }
        </script>

        <!-- <table class="easyui-datagrid" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
        <thead>
            <tr>
                <th field="firstname" width="50" editor="{type:'validatebox',options:{required:true}}">First Name</th>
                <th field="lastname" width="50" editor="{type:'validatebox',options:{required:true}}">Last Name</th>
                <th field="phone" width="50" editor="text">Phone</th>
                <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th>
            </tr>
        </thead>
    </table> -->
    </div>

    </div>


    </div>


</body>

</html>