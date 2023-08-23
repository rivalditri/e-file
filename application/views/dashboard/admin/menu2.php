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
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/') ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?= base_url('vendor/') ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/') ?>easyui/jquery.easyui.min.js"></script>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.min.js"></script>
    <script type="text/javascript" src="/easyui/datagrid-filter.js"></script>
    <script src="scrpt.js"></script>

</head>

<body>
    <div class="easyui-layout" style="width:100%;height: 675px;">
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
        <!-- close header menu -->
        <!-- menu -->
        <div data-options="region:'west',split:true" title="Menu" style="width:15%;">
            <div class="easyui-accordion" data-options="fit:true,border:false">
                <!-- tree -->
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
                </ul>
                <!-- manage admin (button tambah user dan jenis dokumen -->
                <div title="Manage" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100%; height: 30px;margin: 5px; " onclick="$('#u').window('open')" data-options="iconCls:'icon-add'">User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#j').window('open')" style="width:100%; height: 50px;margin: 5px;" data-options="iconCls:'icon-add'">Jenis Dokumen</a>
                    <!-- close manage admin -->
                </div>
            </div>
        </div>
        <!-- close menu -->
        <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="$('#w').window('open')">Dokumen</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Accept</a>
                <!-- <a href="#" class="easyui-linkbutton" onclick="getSelected()">GetSelected</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a> -->
                
            </div>
            <table id="dg" class="easyui-datagrid" data-options="url:'<?= base_url('api/karyawan') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true" fit="true" pagination="true" toolbar="#toolbar" idField="nip" rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>

                    <tr>
                        <div id="mmdg" class="easyui-menu" style="width:120px;">
                            <div data-options="iconCls:'icon-open'" onclick="openRow()">Open</div>
                            <div class="menu-sep"></div>
                            <div data-options="iconCls:'icon-edit'" onclick="editRow()">Edit</div>
                            <div data-options="iconCls:'icon-remove'" onclick="removeRow()">Remove</div>
                            <!-- <div data-options="iconCls:'icon-print',disabled:true">Print</div> -->

                        </div>

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


        <!-- window user -->
        <div id="u" class="easyui-window" title="User" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:500px;padding:10px;">
            <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                <!-- form user -->
                <div title="Form User" style="overflow:hidden">
                    <form id="register" action="<?= base_url('api/user') ?>" method="post">
                        <h1 style="text-align: center;">Registrasi</h1>
                        <table style="width: 100%; margin-right: 100px;">
                            <tr>
                                <td><label for="nip" style="width: 80%; margin-right: 50px;">NIP:</label>
                                </td>
                                <td><input id="nip" class="easyui-textbox" style="width: 80%;" name="nip" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="nama" style="width: 80%">Nama:</label></td>
                                <td><input id="nama" class="easyui-textbox" style="width: 80%;" name="nama" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="password1" style="width: 80%">password:</label></td>
                                <td><input id="password1" class="easyui-passwordbox" style="width: 80%;" name="password1" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="password2" style="width: 80%">re-password:</label></td>
                                <td><input id="password2" class="easyui-passwordbox" style="width: 80%;" name="password2" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="role_id" style="width: 80%">Role User:</label></td>
                                <td>
                                    <select id="role_id" class="easyui-combobox" name="role" style="width:80%">
                                        <option value="1">Administrator</option>
                                        <option value="0">Admin</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: center; margin-top: 10px;">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitFormUser()" style="width:80px; text-align:center;padding:5px 0">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearFormUser()" style="width:80px; text-align:center;padding:5px 0">Clear</a>
                        </div>
                    </form>
                </div>
                <!-- data grid user -->
                <div title="Data User" style="padding:10px">
                    <table class="easyui-datagrid" data-options="url:'<?= base_url('api/user') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true, singleSelect:true,rownumbers:true" toolbar="#tbuser">
                        <thead>
                            <tr>
                                <th field="nip" width="auto" editor="{type:'validatebox',options:{required:true}}">NIP
                                </th>
                                <th field="nama" width="auto" editor="{type:'validatebox',options:{required:true}}">Nama
                                    Karyawan
                                </th>
                                <th field="role_id" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                    Role User
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div id="tbuser" style="height:auto">
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Tambah</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeRow()">Hapus</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Save</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- close window user -->
        <!-- window dokumen -->
        <div id="w" class="easyui-window" title="Dokumen" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">
            <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                <!-- form create dokumen -->
                <div title="Form" style="overflow:hidden">
                    <div class="easyui-form" style="width:100%;padding:10px;">
                        <form id="fd" action="<?= base_url('api/dokumen') ?>" method="post" enctype="multipart/form-data">
                            <table style="width: 100%; margin-right: 10%">
                                <tr>
                                    <td style="text-align: left;">
                                        <label style="width: 60%">nama:</label>
                                    </td>
                                    <td>
                                        <input id="name" style="width:80%"></input>
                                        <script type="text/javascript">
                                            $(function() {
                                                $('#name').combogrid({
                                                    url: '<?= base_url('api/karyawan') ?>',
                                                    method: 'get',
                                                    idField: 'id_karyawan',
                                                    textField: 'nama_karyawan',
                                                    fitColumns: true,
                                                    columns: [
                                                        [{
                                                                field: 'nip',
                                                                title: 'NIP',
                                                                width: 10
                                                            },
                                                            {
                                                                field: 'nama_karyawan',
                                                                title: 'Nama',
                                                                width: 15
                                                            },
                                                            {
                                                                field: 'jabatan',
                                                                title: 'Jabatan',
                                                                width: 15
                                                            }
                                                        ]
                                                    ],
                                                });
                                            });
                                        </script>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label style="width: 60%">Jenis Dokumen:</label></td>
                                    <td>
                                        <input id="jenis" style="width:80%"></input>
                                        <script type="text/javascript">
                                            $(function() {
                                                $('#jenis').combogrid({
                                                    url: '<?= base_url('api/dokumen/jenis') ?>',
                                                    method: 'get',
                                                    idField: 'id_jenis_dokumen',
                                                    textField: 'jenis_dokumen',
                                                    fitColumns: true,
                                                    columns: [
                                                        [{
                                                                field: 'kode_jenis_dokumen',
                                                                title: 'Kode',
                                                                width: 5
                                                            },
                                                            {
                                                                field: 'jenis_dokumen',
                                                                title: 'Jenis Dokumen',
                                                                width: 15
                                                            }
                                                        ]
                                                    ],
                                                });
                                            });
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><label for="file" style="width: 60%;">Unggah
                                            File:</label></td>
                                    <td><input id="file" class="easyui-filebox" style="width: 80%;" name="file"></td>
                                </tr>
                            </table>
                        </form>
                        <div style="text-align: center; margin-top: 20px;">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitFormDok()" style="width:80px">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearFormDok()" style="width:80px">Clear</a>

                        </div>
                    </div>

                </div>
                <!-- close form -->
                <!-- data grid dokumen -->
                <div title="Data Dokumen" style="padding:10px" id="w">
                    <table id="datadokumen" class="easyui-datagrid" data-options="url:'<?= base_url('api/dokumen') ?>',method:'get',border:false,singleSelect:true,toolbar: '#tbdok',fit:true,fitColumns:true, singleSelect:true,rownumbers:true">
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
                                <th field="jabatan" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                    Jabatan</th>
                            </tr>
                        </thead>
                    </table>
                    <div id="tbdok" style="height:auto">
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Tambah</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Hapus</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Save</a>
                    </div>
                    <div id="mmdd" class="easyui-menu" style="width:120px;">
                        <div data-options="iconCls:'icon-open'" onclick="openDokumen()">Open Dokumen</div>
                        <div class="menu-sep"></div>
                        <div data-options="iconCls:'icon-edit'" onclick="editRow()">Edit</div>
                        <div data-options="iconCls:'icon-remove'" onclick="removeRow()">Remove</div>
                    </div>
                </div>



            </div>
        </div>
        <!-- close window dokumen -->
        <!-- window jenis dokumen -->
        <div id="j" class="easyui-window" title="Jenis Dokumen" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">
            <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                <!-- tab form jenis dokumen -->
                <div title="Form Jenis Dokumen" style="overflow:hidden">
                    <div class="easyui-form" style="width:100%;padding:10px;">
                        <form id="jenisDokumen" action="<? base_url('api/dokumen/jenis') ?>" method="post" enctype="multipart/form-data">
                            <table style="width: 100%; margin-right: 10%">
                                <tr>
                                    <td><label style="width: 20%">Nama Jenis Dokumen:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" name="jenisdokumen" style="width:80%" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label style="width: 20%" for="kodejenisdokumen">Kode Jenis Dokumen:</label></td>
                                    <td><input id="kodejenisdokumen" class="easyui-textbox" name="kodejenisdokumen" style="width:80%" data-options="required:true"></td>
                                </tr>
                            </table>
                        </form>
                        <div style="text-align: center; margin-top: 20px;">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitFormJenis()" style="width:80px">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearFormJenis()" style="width:80px">Clear</a>

                        </div>
                    </div>

                </div>
                <!-- close form -->
                <!-- data grid jenis dokumen -->
                <div title="Dokumen" style="padding:10px">
                    <table id="datajenis" class="easyui-datagrid" data-options="url:'<?= base_url('api/dokumen/jenis') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true, singleSelect:true,rownumbers:true" toolbar="#tbjen">
                        <thead>
                            <tr>
                                <th field="jenis_dokumen" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                    Jenis Dokumen</th>
                                <th field="kode_jenis_dokumen" width="auto" editor="{type:'validatebox',options:{required:true}}">
                                    Kode Jenis Dokumen</th>

                            </tr>
                        </thead>
                    </table>
                    <div id="tbjen" style="height:auto">
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Tambah</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeRow()">Hapus</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Save</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- close window jenis dokumen -->

        <script>
            function submitFormDokumen() {
                var formData = new FormData();
                // Dapatkan elemen form
                var form = $('#fd')[0];
                // Dapatkan nilai dari input dengan ID tertentu
                var idValue = $('#name').combogrid('getValue');
                var jenisValue = $('#jenis').combogrid('getValue');
                // Tambahkan nilai-nilai ke dalam objek FormData
                formData.append('id', idValue);
                formData.append('jenis', jenisValue);
                // Dapatkan nilai dari input file
                var fileInput = $('#file').next().find('input[type="file"]')[0];
                var file = fileInput.files[0];
                if (file) {
                    formData.append('file', file);
                } else {
                    alert('File tidak boleh kosong');
                    return false;
                }
                // Kirimkan object FormData ke server
                $.ajax({
                    url: '<?= base_url('api/dokumen') ?>',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        //close popup
                        $('#w').window('close');
                        // Tampilkan pesan berhasil
                        Swal.fire(
                            response.message,
                            'success'
                        )
                        // Kosongkan input file
                        $('#file').filebox('clear');
                        // Muat ulang datagrid
                        $('#dg').datagrid('reload');
                    }
                });
            }
            

            function submitFormUser() {
                var nip = $('#nip').val();
                var nama = $('#nama').val();
                var password1 = $('#password1').val();
                var password2 = $('#password2').val();
                var role_id = $('#role_id').val();
                if (nip == '' || nama == '' || password1 == '' || password2 == '' || role_id == '') {
                    $('#u').window('close');
                    Swal.fire(
                        'Data tidak boleh kosong',
                        'error'
                    )
                    return false;
                } else if (password1 != password2) {
                    $('#u').window('close');
                    Swal.fire(
                        'Password tidak sama',
                        'error'
                    )
                    return false;
                } else {
                    var formData = new FormData();
                    // Dapatkan elemen form
                    var form = $('#register')[0];
                    // Tambahkan nilai-nilai ke dalam objek FormData
                    formData.append('nip', nip);
                    formData.append('nama', nama);
                    formData.append('password1', password1);
                    formData.append('role_id', role_id);
                    // Kirimkan object FormData ke server
                    $.ajax({
                        url: '<?= base_url('api/user') ?>',
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            //close popup
                            $('#u').window('close');
                            // Tampilkan pesan berhasil
                            Swal.fire(
                                response.message,
                                'success'
                            );
                        }
                    });
                }
            }

            function submitFormJenis() {
                var jenisdokumen = $('#jenisdokumen').val();
                var kodejenisdokumen = $('#kodejenisdokumen').val();
                if (jenisdokumen == '' || kodejenisdokumen == '') {
                    $('#j').window('close');
                    Swal.fire(
                        'Data tidak boleh kosong',
                        'error'
                    )
                    return false;
                } else {
                    var formData = new FormData();
                    // Dapatkan elemen form
                    var form = $('#register')[0];
                    // Tambahkan nilai-nilai ke dalam objek FormData
                    formData.append('jenisdokumen', jenisdokumen);
                    formData.append('kodejenisdokumen', kodejenisdokumen);
                    // Kirimkan object FormData ke server
                    $.ajax({
                        url: '<?= base_url('api/dokumen/jenis') ?>',
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            //close popup
                            $('#j').window('close');
                            // Tampilkan pesan berhasil
                            Swal.fire(
                                response.message,
                                'success'
                            );
                        }
                    });
                }
            }



            function clearFormUser() {
                $('#register').form('clear');

            }

            function submitFormJD() {
                $('#fj').form('submit');
                $.messager.alert('info', 'Data Berhasil Disimpan', 'info');
                $('#formDialog').dialog('close');

            }

            function clearFormDok() {
                $('#fd').form('clear');

            }

            function clearFormJenis() {
                $('#jenisDokumen').form('clear');

            }

            function showDokumen(id) {
                $('#dokumenWindow').window({
                    title: 'Dokumen',
                    width: 800,
                    height: 600,
                    content: '<iframe src="<?= base_url('uploads/paktaintegritaspkl.pdf') ?>" style="width: 100%; height: 100%; border: 0;"></iframe>',
                    modal: true,
                    collapsible: false,
                    minimizable: false,
                    maximizable: false
                });

                // Membuka window
                $('#dokumenWindow').window('open');
            }

            var editIndex = undefined;

            $('#datadokumen').datagrid({
                onRowContextMenu: function(e, index, row) {
                    e.preventDefault();
                    $('#mmdd').menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    });
                    $('#datadokumen').datagrid('selectRow', index);
                }
            });

            function openDokumen() {
                var row = $('#datadokumen').datagrid('getSelected');
                if (row) {
                    showDokumen(row.id_dokumen);
                }
            }

            // klik kanan pada datagrid
            $('#dg').datagrid({
                onRowContextMenu: function(e, index, row) {
                    e.preventDefault();
                    $('#mmdg').menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    });
                    $('#dg').datagrid('selectRow', index);
                }
            });

            function openRow() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $('#w').window('open');

                }
            }

            function editRow() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    var index = $('#dg').datagrid('getRowIndex', row);
                    onClickCell(index, 'nama_karyawan');
                }
            }

            function removeRow() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    var index = $('#dg').datagrid('getRowIndex', row);
                    $('#dg').datagrid('cancelEdit', index).datagrid('deleteRow', index);
                    editIndex = undefined;
                }
            }
            var editIndex = undefined;

            function endEditing() {
                if (editIndex == undefined) {
                    return true
                }
                if ($('#dg').datagrid('validateRow', editIndex)) {
                    $('#dg').datagrid('endEdit', editIndex);
                    editIndex = undefined;
                    return true;
                } else {
                    return false;
                }
            }

            function acceptit() {
                if (endEditing()) {
                    $('#dg').datagrid('acceptChanges');
                }
                //get selected row data
                var rows = $('#dg').datagrid('getSelections');
                //get edit row index
                //save to variable
                //var edited column = rows[0].column_name;
                //.ajax call to update edited column
                //$.ajax({url: '<?= base_url('api/karyawan/edit') ?>',method: 'post', data: {column: edited_column, value: edited_value, id: edited_id}, success: function(result){}});


            }

            function onClickCell(index, field) {
                if (editIndex != index) {
                    if (endEditing()) {
                        $('#dg').datagrid('selectRow', index)
                            .datagrid('beginEdit', index);
                        var ed = $('#dg').datagrid('getEditor', {
                            index: index,
                            field: field
                        });
                        if (ed) {
                            ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
                        }
                        editIndex = index;
                    } else {
                        setTimeout(function() {
                            $('#dg').datagrid('selectRow', editIndex);
                        }, 0);
                    }
                }
            }

            function onEndEdit(index, row) {
                var ed = $(this).datagrid('getEditor', {
                    index: index,
                    field: 'productid'
                });
                row.productname = $(ed.target).combobox('getText');
            }

            function getSelected() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.alert('Info', row.nip + ":" + row.nama_karyawan + ":" + row.jabatan);
                }
            }

            function doSearch() {
                alert('You input: ' + value + '(' + name + ')');
            }
            $(document).ready(function() {
                $('#dg').datagrid({
                    pageSize: 10, // Ukuran halaman default
                    pagination: true,
                    pageList: [10, 20, 30], // Opsi ukuran halaman yang tersedia
                    onLoadSuccess: function(data) {

                    }
                });
            });
        </script>

    </div>

</body>

</html>