<?php
//if session nip is not set, redirect to auth
if (!isset($_SESSION['nip'])) {
    redirect('auth');
} else {
    //if session nip is set, check role_id
    if ($_SESSION['role_id'] != 1) {
        redirect('user');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

</head>

<body>
    <div class="easyui-layout modalBox" style="width:100%;height: 675px;">
        <!-- header menu -->
        <div class="modalContent" data-options="region:'north'" style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
            <div style="float: left;">
                Perumda Tugu Tirta
            </div>
            <div style="float: right;">
                <a href="<?= base_url('') ?>" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Setting</a>
                <div id="mm2" style="width:100px;">
                    <div style="float: center;">
                        <a href="<?= base_url('auth/logout') ?>">LogOut</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- nav menu -->
        <div data-options="region:'west',split:true" title="Menu" style="width:15%;">
            <div class="easyui-accordion" data-options="fit:true,border:false">

                <ul class="easyui-tree">
                    <li>
                        <span>
                            <a href="<?= base_url('admin') ?>">Karyawan</a>
                        </span>
                        <ul>
                            <li><span>Bagian / Manajer</span></li>
                            <li><span>Asisten Manajer</span></li>
                            <li><span>Supervisor</span></li>
                            <li><span>Staff</span></li>
                        </ul>
                    </li>

                    <!-- <li>
                        <span>
                            <a href="<?= base_url('dokumen') ?>">Dokumen</a>
                        </span>
                        <ul>
                            <li><span>Dokumen 1</span></li>
                            <li><span>Dokumen 2</span></li>
                            <li><span>Dokumen 3</span></li>
                            <li><span>Dokumen 4</span></li>
                        </ul>
                    </li> -->
                </ul>

                <div title="Manage" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100%; height: 30px;margin: 5px; " onclick="$('#u').window('open')">Tambah User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#j').window('open')" style="width:100%; height: 50px;margin: 5px; ">Tambah Jenis Dokumen</a>
                    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#w').window('open')">Open</a> -->

                    <div id="u" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">
                        <form id="ff" method="post">
                            <h1 style="text-align: center;">Registrasi</h1>
                            <table style="width: 100%; margin-right: 100px;">
                                <tr>
                                    <td><label for="nip" style="width: 80%; margin-right: 50px;">NIP:</label></td>
                                    <td><input id="nip" class="easyui-textbox" style="width: 80%;" name="nip" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kodejenisdokumen" style="width: 80%">Nama:</label></td>
                                    <td><input id="kodejenisdokumen" class="easyui-textbox" style="width: 80%;" name="kodejenisdokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="jenisdokumen" style="width: 80%">password:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" style="width: 80%;" name="jenisdokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="namadokumen" style="width: 80%">re-password:</label></td>
                                    <td><input id="namadokumen" class="easyui-textbox" style="width: 80%;" name="namadokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kode jabatan" style="width: 80%">kode jabatan:</label></td>
                                    <td><input id="kode jabatan" class="easyui-textbox" style="width: 80%;" name="kode jabatan" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="jabatan" style="width: 80%">Jabatan:</label></td>
                                    <td><input id="jabatan" class="easyui-textbox" style="width: 80%;" name="jabatan" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="role" style="width: 80%">Role User:</label></td>
                                    <td>
                                        <select id="role" class="easyui-combobox" name="role" style="width:80%">
                                            <option value="aa">Administrator</option>
                                            <option value="ab">Admin</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin-top: 10px;">
                                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()" style="width:80px; text-align:center;padding:5px 0">Submit</a>
                                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()" style="width:80px; text-align:center;padding:5px 0">Clear</a>
                                <!-- <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()" style="width:80px; text-align:center;padding:5px 0">Close</a> -->
                            </div>
                        </form>
                    </div>

                    <div id="w" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">


                        <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                            <div title="Upload" style="overflow:hidden">
                                <div class="easyui-form" style="width:100%;padding:10px;">
                                    <form id="fd" action="form1_proc.php" method="post" enctype="multipart/form-data">
                                        <table style="width: 100%; margin-right: 10%">
                                            <tr>
                                                <td style="text-align: left;"><label for="nama" style="width: 60%">nama:</label></td>
                                                <td>
                                                    <select class="easyui-combogrid" style="width:80%" data-options="
                                                            idField: 'nama_karyawan',
                                                            textField: 'nama_karyawan',
                                                            url: '<?= base_url('api/karyawan') ?>',
                                                            method: 'get',
                                                            columns: [[
                                                                {field:'nip',title:'NIP',width:10},
                                                                {field:'nama_karyawan',title:'Nama',width:15},
                                                                {field:'jabatan',title:'Jabatan',width:10}
                                                                 ]],
                                                            fitColumns: true,
                                                            mode:'local'
                                                        ">
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="role" style="width: 60%">Jenis Dokumen:</label></td>
                                                <td>
                                                    <select class="easyui-combogrid" style="width:80%" data-options="
                                                            idField: 'jenis_dokumen',
                                                            textField: 'jenis_dokumen',
                                                            url: '<?= base_url('api/dokumen/jenis') ?>',
                                                            method: 'get',
                                                            columns: [[
                                                                {field:'kode_jenis_dokumen',title:'Kode Jenis Dokumen',width:5},
                                                                {field:'jenis_dokumen',title:'Jenis Dokumen',width:10}
                                                                 ]],
                                                            fitColumns: true
                                                        ">
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left;"><label for="namadokumen" style="width: 60%;">Nama Dokumen:</label></td>
                                                <td><input id="namadokumen" class="easyui-textbox" style="width: 80%;" name="namadokumen" data-options="required:true"></td>
                                            </tr>

                                            <tr>
                                                <td style="text-align: left;"><label for="file" style="width: 60%;">Unggah File:</label></td>
                                                <td><input id="file" class="easyui-filebox" style="width: 80%;" name="file"></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <div style="text-align: center; margin-top: 20px;">
                                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
                                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>

                                    </div>
                                </div>

                            </div>
                            <div title="Dokumen" style="padding:10px">
                                <table class="easyui-datagrid" data-options="url:'<?= base_url('api/dokumen') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true, singleSelect:true,rownumbers:true">
                                    <thead>
                                        <tr>
                                            <th field="nama_dokumen" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                                Nama Dokumen</th>
                                            <th field="jenis_dokumen" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                                Jenis Dokumen</th>
                                            <th field="nip" width="auto" editor="{type:'validatebox',options:{required:true}}">NIP
                                            </th>
                                            <th field="nama_karyawan" width="auto" editor="{type:'validatebox',options:{required:true}}">Nama
                                                Karyawan
                                            </th>
                                            <th field="kode_jabatan" width="auto" editor="{type:'validatebox',options:{required:true}}">Kode Jabatan</th>
                                            <th field="jabatan" width="auto" editor="{type:'validatebox',options:{required:true}}">Jabatan</th>
                                        </tr>
                                    </thead>


                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="u" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:400px;height:400px;padding:30px;">
                        <form id="ff" method="post">
                            <h1 style="text-align: center;">Registrasi</h1>
                            <table style="width: 100%; margin-right: 100px;">
                                <tr>
                                    <td><label for="nip" style="width: 80%; margin-right: 50px;">NIP:</label></td>
                                    <td><input id="nip" class="easyui-textbox" style="width: 80%;" name="nip" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kodejenisdokumen" style="width: 80%">Nama:</label></td>
                                    <td><input id="kodejenisdokumen" class="easyui-textbox" style="width: 80%;" name="kodejenisdokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="jenisdokumen" style="width: 80%">password:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" style="width: 80%;" name="jenisdokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="namadokumen" style="width: 80%">re-password:</label></td>
                                    <td><input id="namadokumen" class="easyui-textbox" style="width: 80%;" name="namadokumen" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kode jabatan" style="width: 80%">kode jabatan:</label></td>
                                    <td><input id="kode jabatan" class="easyui-textbox" style="width: 80%;" name="kode jabatan" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="jabatan" style="width: 80%">Jabatan:</label></td>
                                    <td><input id="jabatan" class="easyui-textbox" style="width: 80%;" name="jabatan" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="role" style="width: 80%">Role User:</label></td>
                                    <td>
                                        <select id="role" class="easyui-combobox" name="role" style="width:80%">
                                            <option value="aa">Administrator</option>
                                            <option value="ab">Admin</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align: center; margin-top: 10px;">
                                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()" style="width:80px; text-align:center;padding:5px 0">Submit</a>
                                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()" style="width:80px; text-align:center;padding:5px 0">Clear</a>
                                <!-- <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()" style="width:80px; text-align:center;padding:5px 0">Close</a> -->
                            </div>
                        </form>
                    </div>
                    <div id="j" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:450px;height:200px;padding:30px;">
                        <!-- <div id="formDialog1" class="easyui-dialog" title="Register" style="width:450px;height:200px;padding:30px;" closed="true" buttons="#formButtons" closable="false"> -->
                        <form id="ff1" method="post">
                            <table>
                                <tr>
                                    <td><label for="jenisdokumen">Jenis Dokumen:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" name="jenisdokumen" style="width:100%" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kodejenisdokumen">Kode Jenis Dokumen:</label></td>
                                    <td><input id="kodejenisdokumen" class="easyui-textbox" name="kodejenisdokumen" style="width:100%" data-options="required:true"></td>
                                </tr>
                            </table>
                        </form>
                        <div style="text-align:center;padding:5px 0">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()" style="width:80px">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()" style="width:80px">Clear</a>
                            <!-- <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()" style="width:80px">Close</a> -->
                        </div>
                    </div>

                    <!-- <div id="formButtons" style="text-align:center;padding:5px 0">
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()" style="width:80px">Submit</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()" style="width:80px">Clear</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()" style="width:80px">Close</a>
                    </div> -->

                    <script>
                        var modal = $('.modalBox');

                        function openFormDialog() {
                            $('#formDialog').dialog('open');
                            modal.css('filter', 'blur(5px)');

                        }

                      
                        function openFormDialog1() {
                            $('#formDialog1').dialog('open');
                            modal.css('filter', 'blur(5px)');
                        }

                        function closeForm1() {
                            $('#formDialog1').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function submitForm() {
                            $('#ff').form('submit');
                            $.messager.alert('info', 'Data Berhasil Disimpan', 'info');
                            $('#formDialog').dialog('close');
                            modal.css('filter', 'none');

                        }

                        function submitForm1() {
                            $('#ff1').form('submit');
                            $('#formDialog1').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function clearForm() {
                            $('#ff').form('clear');

                        }

                        function clearForm() {
                            $('#fd').form('clear');

                        }

                        function clearForm1() {
                            $('#ff1').form('clear');

                        }
                    </script>
                </div>
            </div>
        </div>
        <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#w').window('open')">Tambah</a>
                <!-- <a href="#" class="easyui-linkbutton" onclick="getSelected()">GetSelected</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a> -->
                <!-- <div class="search-container"> -->
                <input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch" style="width: 20%;">
                <!-- </div> -->
                <div id="mm">
                    <div data-options="name:'all',iconCls:'icon-ok'">All </div>
                    <div data-options="name:'sports',iconCls:'icon-man'">NIP</div>
                    <div data-options="name:'sports',iconCls:'icon-man'">Nama</div>
                    <!-- <div data-options="name:'sports',iconCls:'icon-man'">Jenis dokumen</div> -->
                </div>
            </div>
            <table id="dg" class="easyui-datagrid" data-options="url:'<?= base_url('api/karyawan') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true" toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                    <tr>
                        <div id="mm" class="easyui-menu" style="width:120px;">
                            <div href="<?= base_url('#') ?>">open</div>

                            <div data-options="iconCls:'icon-edit'">edit</div>
                            <div data-options="iconCls:'icon-delete'">delete</div>
                            <!-- <div data-options="iconCls:'icon-print',disabled:true">Print</div> -->

                        </div>
                        <script>
                            $(function() {
                                $(document).bind('contextmenu', function(e) {
                                    e.preventDefault();
                                    $('#mm').menu('show', {
                                        left: e.pageX,
                                        top: e.pageY
                                    });
                                });
                            });
                        </script>
                        <th field="nip" width="50" editor="{type:'validatebox',options:{required:true}}">NIP
                        </th>
                        <th field="nama_karyawan" width="50" editor="{type:'validatebox',options:{required:true}}">Nama
                            Karyawan
                        </th>
                        <th field="kode_jabatan" width="50" editor="text">Kode Jabatan</th>
                        <th field="jabatan" width="50" editor="text">Jabatan</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script type="text/javascript">
            function getSelected() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.alert('Info', row.nip + ":" + row.nama_karyawan + ":" + row.jabatan);
                }
            }
        </script>
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
            function doSearch() {
                alert('You input: ' + value + '(' + name + ')');
            }
        </script>


    </div>

    </div>
    <!-- </div> -->


    </div>


</body>

</html>