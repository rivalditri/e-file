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
        <div class="modalContent" data-options="region:'north'"
            style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
            <div style="float: left;">
                Perumda Tugu Tirta
            </div>
            <div style="float: right;">
                <a href="<?= base_url('') ?>" class="easyui-menubutton"
                    data-options="menu:'#mm2',iconCls:'icon-help'">Setting</a>
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

                    <li>
                        <span>
                            <a href="<?= base_url('dokumen') ?>">Dokumen</a>
                        </span>
                        <ul>
                            <li><span>Dokumen 1</span></li>
                            <li><span>Dokumen 2</span></li>
                            <li><span>Dokumen 3</span></li>
                            <li><span>Dokumen 4</span></li>
                        </ul>
                    </li>
                </ul>

                <div title="Manage" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog()"
                        style="width:100%;  margin: 5px;">Tambah User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog1()"
                        style="width:100%; height: 50px;margin: 5px; ">Tambah Jenis Dokumen</a>

                    <!-- form register user -->
                    <div id="formDialog" class="easyui-dialog" title="Register"
                        style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons"
                        closable="false">
                        <form id="ff" method="post">
                            <table>
                                <tr>
                                    <td><label for="nama">Nama:</label></td>
                                    <td><input id="nama" class="easyui-textbox" name="nama" style="width:100%"
                                            data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="nip">NIP:</label></td>
                                    <td><input id="nip" class="easyui-textbox" name="nip" style="width:100%"
                                            data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="password1">Password:</label></td>
                                    <td><input id="password1" class="easyui-textbox" name="password1" style="width:100%"
                                            data-options="required:true" type="password"></td>
                                </tr>
                                <tr>
                                    <td><label for="password2">Re-Password:</label></td>
                                    <td><input id="password2" class="easyui-textbox" name="password2" style="width:100%"
                                            data-options="required:true" type="password"></td>
                                </tr>
                                <tr>
                                    <td><label for="role">Role User:</label></td>
                                    <td>
                                        <select id="role" class="easyui-combobox" name="role" style="width:100%">
                                            <option value="aa">Administrator</option>
                                            <option value="ab">Admin</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()"
                                style="width:80px; padding:5px; margin:10px;">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()"
                                style="width:80px; padding:5px; margin:10px">Clear</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm()"
                                style="width:80px; padding:5px; margin:10px">Close</a>
                        </form>
                    </div>


                    <div id="formDialog1" class="easyui-dialog" title="Register"
                        style="width:450px;height:200px;padding:30px;" closed="true" buttons="#formButtons"
                        closable="false">
                        <form id="ff1" method="post">
                            <table>
                                <tr>
                                    <td><label for="jenisdokumen">Jenis Dokumen:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" name="jenisdokumen"
                                            style="width:100%" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label for="kodejenisdokumen">Kode Jenis Dokumen:</label></td>
                                    <td><input id="kodejenisdokumen" class="easyui-textbox" name="kodejenisdokumen"
                                            style="width:100%" data-options="required:true"></td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div id="formButtons" style="text-align:center;padding:5px 0">
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()"
                            style="width:80px">Submit</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()"
                            style="width:80px">Clear</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()"
                            style="width:80px">Close</a>
                    </div>

                    <script>
                        var modal = $('.modalBox');

                        function openFormDialog() {
                            $('#formDialog').dialog('open');
                            modal.css('filter', 'blur(5px)');

                        }

                        function closeForm() {
                            $('#formDialog').dialog('close');
                            modal.css('filter', 'none');
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
                            $.messager.alert('notif', 'Data Berhasil Disimpan', 'info');
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

                        function clearForm1() {
                            $('#ff1').form('clear');

                        }
                    </script>
                </div>
            </div>
        </div>
        <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true"
                    onclick="openFormDialog()">Tambah</a>
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a> -->
                <!-- <div class="search-container"> -->
                <input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch"
                    style="width: 20%;">
                <!-- </div> -->
                <div id="mm">
                    <div data-options="name:'all',iconCls:'icon-ok'">All </div>
                    <div data-options="name:'sports',iconCls:'icon-man'">NIP</div>
                    <div data-options="name:'sports',iconCls:'icon-man'">Nama</div>
                    <!-- <div data-options="name:'sports',iconCls:'icon-man'">Jenis dokumen</div> -->
                </div>
            </div>
            <table class="easyui-datagrid"
                data-options="url:'<?= base_url('api/karyawan') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true"
                toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true"
                singleSelect="true">
                <thead>
                    <tr>
                        <div id="mm" class="easyui-menu" style="width:120px;">
                            <div href="<?= base_url('#') ?>">open</div>

                            <div data-options="iconCls:'icon-edit'">edit</div>
                            <div data-options="iconCls:'icon-delete'">delete</div>
                            <!-- <div data-options="iconCls:'icon-print',disabled:true">Print</div> -->

                        </div>
                        <script>
                            $(function () {
                                $(document).bind('contextmenu', function (e) {
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
        function NIP(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'NIP');
            $('#fm').form('clear');
        } 
        </script>      

        <script>
            // function doSearch(val) {
            //     var $dg = $('#dg'),
            //     prevQueryParams = $dg.datagrid('option') ['queryParams'],
            //     newQueryParams = $.extend(prevQueryParams, {cari:val} );

            //     $dg.datagrid('load',newQueryParams);
            // }
            function doSearch(value, NIP) {
            // You can implement your custom search logic here
            alert('You searched for: ' + value + ' using option: ' + NIP);
        }
        </script>


    </div>

    </div>
    <!-- </div> -->


    </div>


</body>

</html>