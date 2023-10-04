<?php
//if session nip is not set, redirect to auth
if (!isset($_SESSION['nip'])) {
    redirect('auth');
} else {
    //if session nip is set, check role_id
    if ($_SESSION['role_id'] != 'admin') {
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
    <script type="text/javascript" src="<?= base_url('vendor/') ?>easyui/jquery.propertygrid.js"></script>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/easyui/datagrid-filter.js') ?>"></script>
    <script>
        var base_url = "<?= base_url() ?>";
        var _nip, _nama = '';
    </script>
    <script type="text/javascript" src="<?= base_url('vendor/js/tes.js') ?>"></script>

</head>

<body>
    <div class="easyui-layout" style="width:100%;height: 675px;">
        <!-- header menu -->
        <div class="modalContent" data-options="region:'north'" style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
            <div style="float: left;">
                Perumda Tugu Tirta
            </div>
            <div style="float: right;">
                <a class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Setting</a>
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
                        <!-- <ul>
                            <li><span>Bagian / Manajer</span></li>
                            <li><span>Asisten Manajer</span></li>
                            <li><span>Supervisor</span></li>
                            <li><span>Staff</span></li>
                        </ul> -->
                    </li>
                </ul>
                <!-- manage admin (button tambah user dan jenis dokumen -->
                <div title="Manage" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" style="width:100%; height: 30px;margin: 5px; " onclick="$('#userWindow').window('open')" data-options="iconCls:'icon-add'">User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#jenisDokumenWindow').window('open')" style="width:100%; height: 50px;margin: 5px;" data-options="iconCls:'icon-add'">Jenis
                        Dokumen</a>
                    <!-- close manage admin -->
                </div>
            </div>
        </div>
        <!-- close menu -->
        <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="openAndReloadDokumen()">Dokumen</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick=acceptit()>Accept</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="$('#tambahWindow').window('open')">Tambah</a>
                <input class="easyui-searchbox karyawan-filter" data-options="prompt:'Please Input Value',menu:'#filterKaryawan'" style="width: 20%;">
                <div id="filterKaryawan">
                    <div data-options="name:'filterNIP',iconCls:'icon-man'">NIP</div>
                    <div data-options="name:'filterNama',iconCls:'icon-man'">Nama</div>
                </div>
                <script>
                    var typingTimer;
                    var doneTypingInterval = 1000; // Waktu jeda dalam milidetik (misalnya 500 ms)
                    $(function() {
                        $('.karyawan-filter').textbox('textbox').on('keyup', function() {
                            clearTimeout(typingTimer);
                            var value = $(this).val();
                            var filterName = $('.karyawan-filter').searchbox('getName');

                            typingTimer = setTimeout(function() {
                                var queryParams = {};
                                queryParams[filterName] = value;
                                console.log(queryParams);
                                $('#karyawan').datagrid('load', queryParams);
                            }, doneTypingInterval);
                        });
                    });
                </script>
                <!-- <a href="#" class="easyui-linkbutton" onclick="getSelected()">GetSelected</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#karyawan').edatagrid('destroyRow')">Destroy</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#karyawan').edatagrid('saveRow')">Save</a> -->
                <!-- <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#karyawan').edatagrid('cancelRow')">Cancel</a> -->
            </div>
            <table id="karyawan" class="easyui-datagrid" data-options="url:'<?= base_url('api/karyawan') ?>',method:'get',queryParams:{filterNIP:'', filterNama:''},border:false,singleSelect:true,fit:true,fitColumns:true" fit="true" pagination="true" toolbar="#toolbar" idField="nip" rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                    <tr>
                        <div id="menuKaryawan" class="easyui-menu" style="width:120px;">
                            <div data-options="iconCls:'icon-open'" onclick="openKaryawan()">Open</div>
                            <div class="menu-sep"></div>
                            <div data-options="iconCls:'icon-edit'" onclick="editKaryawan()">Edit</div>
                            <div data-options="iconCls:'icon-remove'" onclick="removeKaryawan()">Remove</div>
                            <!-- <div data-options="iconCls:'icon-print',disabled:true">Print</div> -->

                        </div>

                        <th field="nip" width="50" sortable="true" editor="{type:'validatebox',options:{required:true}}">NIP
                        </th>
                        <th field="nama_karyawan" width="50" sortable="true" editor="{type:'validatebox',options:{required:true}}">Nama
                            Karyawan
                        </th>
                        <th field="kode_jabatan" width="50" sortable="true" editor="text">Kode Jabatan</th>
                        <th field="jabatan" width="50" sortable="true" editor="text">Jabatan</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- window user -->
        <div id="userWindow" class="easyui-window" title="User" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:500px;padding:10px;">
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
                                        <option value="admin">Administrator</option>
                                        <option value="user">Admin</option>
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
                    <table class="easyui-datagrid" id="datauser" data-options="url:'<?= base_url('api/user') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true, singleSelect:true,rownumbers:true" toolbar="#tbuser">
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
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="deleteUser()">Hapus</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Save</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- close window user -->
        <!-- window dokumen -->
        <div id="dokumenGrid" class="easyui-window" title="Dokumen" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">
            <div id="tabsDokumen" class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                <!-- data grid dokumen -->
                <div title="Data Dokumen" style="padding:10px" id="dokumenGrid">
                    <table id="datadokumen" class="easyui-datagrid" data-options="url:'<?= base_url('api/dokumen') ?>',method:'get',queryParams:{nip : '',nama_dokumen:'', jenis_dokumen:'', nama_karyawan:''},border:false,singleSelect:true,toolbar: '#tbdok',fit:true,fitColumns:true, singleSelect:true,rownumbers:true">
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
                        <input class="easyui-searchbox dokumen-filter" data-options="prompt:'Please Input Value',menu:'#filterDokumen'" style="width: 100%;">
                        <div id="filterDokumen">
                            <div data-options="name:'nama_dokumen',iconCls:'icon-man'">dokumen</div>
                            <div data-options="name:'jenis_dokumen',iconCls:'icon-man'">jenis</div>
                            <div data-options="name:'nama_karyawan',iconCls:'icon-man'">Nama</div>
                        </div>
                        <script>
                            var typingTimer;
                            var doneTypingInterval = 1000; // Waktu jeda dalam milidetik (misalnya 500 ms)
                            $(function() {
                                $('.dokumen-filter').textbox('textbox').on('keyup', function() {
                                    clearTimeout(typingTimer);
                                    var value = $(this).val();
                                    var filterName = $('.dokumen-filter').searchbox('getName');

                                    typingTimer = setTimeout(function() {
                                        var queryParams = {};
                                        queryParams[filterName] = value;
                                        console.log(queryParams);
                                        $('#datadokumen').datagrid('load', queryParams);
                                    }, doneTypingInterval);
                                });
                            });
                        </script>
                    </div>
                    <div id="mmdd" class="easyui-menu" style="width:120px;">
                        <div data-options="iconCls:'icon-open'" onclick="openDokumen()">Open Dokumen</div>
                        <div class="menu-sep"></div>
                        <div data-options="iconCls:'icon-edit'" onclick="openEditDokumen()">Edit</div>
                        <div data-options="iconCls:'icon-remove'" onclick="deleteDokumen()">Remove</div>
                    </div>
                </div>
                <!-- form create dokumen -->
                <div title="Add Document" style="overflow:hidden">
                    <div class="easyui-form" style="width:100%;padding:10px;">
                        <form id="formDokumen" action="<?= base_url('api/dokumen') ?>" method="post" enctype="multipart/form-data">
                            <table style="width: 100%; margin-right: 10%">
                                <tr>
                                    <td><label style="width: 60%">Jenis Dokumen:</label></td>
                                    <td>
                                        <input id="idkaryawan" style="width:80%" hidden="hidden"></input>
                                        <input class="easyui-combobox" id="jenis" style="width:80%"></input>
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
            </div>
        </div>
        <!-- close window dokumen -->

        <!-- window tambah -->
        <div id="tambahWindow" class="easyui-window" title="Karyawan" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:500px;padding:10px;">
            <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                form karyawan
                <div title="Form Karyawan" style="overflow:hidden">
                    <form id="register" action="<?= base_url('api/karyawan') ?>" method="post">
                        <h1 style="text-align: center;">Registrasi</h1>
                        <table style="width: 100%; margin-right: 100px;">
                            <tr>
                                <td><label for="nip" style="width: 80%; margin-right: 50px;">NIP:</label>
                                </td>
                                <td><input id="nip_karyawan" class="easyui-textbox" style="width: 80%;" name="nip_karyawan" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="nama_karyawan" style="width: 80%">Nama:</label></td>
                                <td><input id="nama_karyawan" class="easyui-textbox" style="width: 80%;" name="nama_karyawan" data-options="required:true"></td>
                            </tr>
                            <tr>
                                <td><label for="kode_jabatan" style="width: 80%">Kode Jabatan:</label></td>
                                <td>
                                    <select id="jabatan" class="easyui-combobox" style="width: 80%;" name="kode_jabatan" data-options="
                                        valueField: 'value',
                                        textField: 'text',
                                        data: [
                                            { value: '001', text: 'Manager' },
                                            { value: '002', text: 'Asisten Manager' },
                                            { value: '005', text: 'Staff' },
                                            { value: '003', text: 'Supervisor' }
                                        ]
                                    ">
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: center; margin-top: 10px;">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitFormKaryawan()" style="width:80px; text-align:center;padding:5px 0">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearFormKaryawan()" style="width:80px; text-align:center;padding:5px 0">Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- window jenis dokumen -->
        <div id="jenisDokumenWindow" class="easyui-window" title="Jenis Dokumen" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:50%;height:400px;padding:10px;">
            <div class="easyui-tabs" data-options="tools:'#tab-tools'" style="width:100%;height:100%">
                <!-- tab form jenis dokumen -->
                <div title="Form Jenis Dokumen" style="overflow:hidden">
                    <div class="easyui-form" style="width:100%;padding:10px;">
                        <form id="jenisDokumen" action="<? base_url('api/jenis') ?>" method="post">
                            <table style="width: 100%; margin-right: 10%">
                                <tr>
                                    <td><label style="width: 20%">Nama Jenis Dokumen:</label></td>
                                    <td><input id="jenisdokumen" class="easyui-textbox" name="jenisdokumen" style="width:80%" data-options="required:true"></td>
                                </tr>
                                <tr>
                                    <td><label style="width: 20%" for="kodejenisdokumen">Kode Jenis Dokumen:</label>
                                    </td>
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
                <div title="Jenis Dokumen" style="padding:10px">
                    <table id="datajenis" class="easyui-datagrid" data-options="url:'<?= base_url('api/jenis') ?>',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true, singleSelect:true,rownumbers:true" toolbar="#tbjen">
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
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="deleteJenis()">Hapus</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',plain:true" onclick="acceptit()">Save</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- close window jenis dokumen -->

        <!-- file window dokumen -->
        <div id="dokumenWindow" overflow="hidden">

        </div>

        <script>
            //klik kanan pada datadokumen
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

            // klik kanan pada datakaryawan
            $('#karyawan').datagrid({
                onRowContextMenu: function(e, index, row) {
                    e.preventDefault();
                    $('#menuKaryawan').menu('show', {
                        left: e.pageX,
                        top: e.pageY
                    });
                    $('#karyawan').datagrid('selectRow', index);
                }
            });

            function openEditDokumen() {
                var row = $("#datadokumen").datagrid("getSelected");
                console.log('krik ', row);
                var idKaryawanInput = document.getElementById('idkaryawan');
                idKaryawanInput.value = row.id_karyawan
                // jenisDokInput.value = row.jenis_dokumen
                // $("#jenis").combobox('select',row.jenis_dokumen)
                $('#jenis').combobox('select', row.jenis_dokumen)
                methodDok = 'put';
                idDok = row.id_dokumen;
                // idKaryawanInput.value = row.id_karyawan
                $('#tabsDokumen').tabs('select', 'Add Document');
            }

            function openAndReloadDokumen() {
                $("#dokumenGrid").window("open");
                $('#datadokumen').datagrid('load', {
                    nip: ''
                })
            }

            function showDokumen(path) {
                $('#dokumenWindow').window({
                    title: 'Dokumen',
                    width: 800,
                    height: 600,
                    content: '<iframe src="' + base_url + '/uploads/' + path + '" style="width: 100%; height: 100%; border: 0;"></iframe>',
                    modal: true,
                    collapsible: false,
                    minimizable: false,
                    maximizable: false
                });

                // $.ajax({
                //     url: base_url + "/api/dokumen", // Gantilah dengan URL yang sesuai
                //     method: 'GET', // Sesuaikan metode sesuai kebutuhan Anda
                //     // data: { 'id': id }, // Kirim ID pengguna sebagai parameter
                //     dataType: 'json', // Tipe data yang diharapkan dari respons

                //     success: function(data) {
                //         console.log(data);
                //         const filterData = data.filter(function(item) {
                //             return item.id_dokumen == id
                //         })
                //         console.log('hehe',filterData);
                //         if (filterData) {
                //             // Gantilah dengan nama field yang sesuai
                //             var path = filterData[0].path; // Gantilah dengan nama field yang sesuai

                //             // Membuka window
                //             $('#dokumenGrid').window('open');
                //         } else {
                //             alert('Data dokumen tidak ditemukan.'); // Pesan jika data tidak ditemukan
                //         }
                //     },

                //     error: function(xhr, status, error) {
                //         console.error('Terjadi kesalahan: ' + error); // Tangani kesalahan jika ada
                //     }
                // })
            };


            $(document).ready(function() {
                $('#karyawan').datagrid({
                    onDblClickRow: function(index, row) {
                        console.log(row);
                        $("#dokumenGrid").window("open");
                        $('#datadokumen').datagrid('load', {
                            nip: row.nip
                        })
                        // $('#_name').val
                        var idKaryawanInput = document.getElementById('idkaryawan');
                        idKaryawanInput.value = row.id_karyawan
                    }
                });
                $('#datadokumen').datagrid({
                    onDblClickRow: function(index, row) {
                        showDokumen(row.nama_dokumen);
                    }
                });
            });

            function editKaryawan() {
                var row = $('#karyawan').datagrid('getSelected');
                if (row) {
                    var index = $('#karyawan').datagrid('getRowIndex', row);
                    onClickCell(index, 'nama_karyawan');
                }
            }
            var editIndex = undefined;

            function endEditing() {
                if (editIndex == undefined) {
                    return true
                }
                if ($('#karyawan').datagrid('validateRow', editIndex)) {
                    $('#karyawan').datagrid('endEdit', editIndex);
                    editIndex = undefined;
                    return true;
                } else {
                    return false;
                }
            }


            function acceptit() {
                if (endEditing()) {
                    $('#karyawan').datagrid('acceptChanges');
                }
                // Mengambil data baris yang dipilih
                var rows = $('#karyawan').datagrid('getSelections');
                // Pastikan ada baris yang dipilih sebelum melanjutkan
                if (rows.length === 0) {
                    alert('Pilih setidaknya satu baris untuk diedit.');
                    return;
                }
                // Ambil nilai NIP dari baris yang pertama (misalnya, jika NIP ada di kolom "nip")
                var id = rows[0].id_karyawan;
                var nip = rows[0].nip;
                var namaKaryawan = rows[0].nama_karyawan;
                var kodeJabatan = rows[0].kode_jabatan;
                var jabatan = rows[0].jabatan;
                var data = {
                    id: id,
                    nip: nip,
                    nama_karyawan: namaKaryawan,
                    kode_jabatan: kodeJabatan,
                    jabatan: jabatan
                };
                // Lakukan panggilan AJAX untuk mengirim data ke server
                $.ajax({
                    url: base_url + "api/karyawan/edit",
                    method: "POST",
                    data: data, // Kirim data NIP ke server
                    dataType: 'json',
                    success: function(response) {
                        // Menutup popup atau window
                        $("#dokumenGrid").window("close");
                        // Menampilkan pesan berhasil
                        Swal.fire("Success", response.message, "success");
                        // Memuat ulang datagrid
                        $("#datadokumen").datagrid("reload");
                    },
                    error: function(xhr, status, error) {
                        // Menangani kesalahan jika terjadi
                        console.error(error);
                        Swal.fire("Error", "Terjadi kesalahan", "error");
                    }
                });
            }

            function deleteUser() {
                var row = $("#datauser").datagrid("getSelected");
                if (row && row.nip) {
                    var url = base_url + "api/user?nip=" + row.nip;
                    $("#userWindow").window("close");
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                    method: "DELETE",
                                })
                                .then((response) => {
                                    if (response.ok) {
                                        return response.json();
                                    } else {
                                        throw new Error("HTTP status " + response.status);
                                    }
                                })
                                .then((data) => {
                                    Swal.fire(data.message, "success");
                                    $("#datauser").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
                                })
                                .catch((error) => {
                                    console.error("Terjadi kesalahan:", error);
                                    Swal.fire("Error", "An error occurred while deleting the user.", "error");
                                });
                        }
                    });
                } else {
                    Swal.fire("Error", "No user selected for deletion.", "error");
                }
            }

            function deleteJenis() {
                var row = $("#datajenis").datagrid("getSelected");
                if (row && row.jenis_dokumen) {
                    var index = $("#datajenis").datagrid("getRowIndex", row);
                    $("#datajenis").datagrid("cancelEdit", index).datagrid("deleteRow", index);
                    editIndex = undefined;
                    console.log(row);
                    var url = base_url + "api/jenis?id_jenis_dokumen=" + row.id_jenis_dokumen;
                    $("#jenisDokumenWindow").window("close");
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                    method: "DELETE",
                                })
                                .then((response) => {
                                    if (!response.ok) {
                                        throw new Error("Network response was not ok");
                                    }
                                    return response.json();
                                })
                                .then((data) => {
                                    Swal.fire(data.message, "success");
                                    $("#datajenis").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
                                })
                                .catch((error) => {
                                    console.error("Terjadi kesalahan:", error);
                                    Swal.fire("Error!", "There was an error deleting the file.", "error");
                                });
                        }
                    });
                }
            }


            // function deleteJenis() {
            //     var row = $("#datajenis").datagrid("getSelected");
            //     if (row) {
            //         var url = base_url + "api/jenis?jenis_dokumen=" + row.jenis_dokumen;
            //         $("#jenisDokumenWindow").window("close");
            //         Swal.fire({
            //             title: "Are you sure?",
            //             text: "You won't be able to revert this!",
            //             icon: "warning",
            //             showCancelButton: true,
            //             confirmButtonColor: "#3085d6",
            //             cancelButtonColor: "#d33",
            //             confirmButtonText: "Yes, delete it!",
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 fetch(url, {
            //                     method: "DELETE",
            //                 })
            //                     .then((response) => response.json())
            //                     .then((data) => {
            //                         Swal.fire(data.message, "success");
            //                         $("#datajenis").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
            //                     })
            //                     .catch((error) => {
            //                         console.error("Terjadi kesalahan:", error);
            //                     });
            //                 Swal.fire("Deleted!", "Your file has been deleted.", "success");
            //             }
            //         });
            //     }
            // }



            function onClickCell(index, field) {
                if (editIndex != index) {
                    if (endEditing()) {
                        $('#karyawan').datagrid('selectRow', index)
                            .datagrid('beginEdit', index);
                        var ed = $('#karyawan').datagrid('getEditor', {
                            index: index,
                            field: field
                        });
                        if (ed) {
                            ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
                        }
                        editIndex = index;
                    } else {
                        setTimeout(function() {
                            $('#karyawan').datagrid('selectRow', editIndex);
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

            // function getSelected() {
            //     var row = $('#karyawan').datagrid('getSelected');
            //     if (row) {
            //         $.messager.alert('Info', row.nip + ":" + row.nama_karyawan + ":" + row.jabatan);
            //     }
            // }
        </script>

        <!-- script pagination -->
        <script>
            (function($) {
                function pagerFilter(data) {
                    if ($.isArray(data)) { // is array
                        data = {
                            total: data.length,
                            rows: data
                        }
                    }
                    var target = this;
                    var karyawan = $(target);
                    var state = karyawan.data('datagrid');
                    var opts = karyawan.datagrid('options');
                    if (!state.allRows) {
                        state.allRows = (data.rows);
                    }
                    if (!opts.remoteSort && opts.sortName) {
                        var names = opts.sortName.split(',');
                        var orders = opts.sortOrder.split(',');
                        state.allRows.sort(function(r1, r2) {
                            var r = 0;
                            for (var i = 0; i < names.length; i++) {
                                var sn = names[i];
                                var so = orders[i];
                                var col = $(target).datagrid('getColumnOption', sn);
                                var sortFunc = col.sorter || function(a, b) {
                                    return a == b ? 0 : (a > b ? 1 : -1);
                                };
                                r = sortFunc(r1[sn], r2[sn]) * (so == 'asc' ? 1 : -1);
                                if (r != 0) {
                                    return r;
                                }
                            }
                            return r;
                        });
                    }
                    var start = (opts.pageNumber - 1) * parseInt(opts.pageSize);
                    var end = start + parseInt(opts.pageSize);
                    data.rows = state.allRows.slice(start, end);
                    return data;
                }

                var loadDataMethod = $.fn.datagrid.methods.loadData;
                var deleteRowMethod = $.fn.datagrid.methods.deleteRow;
                $.extend($.fn.datagrid.methods, {
                    clientPaging: function(jq) {
                        return jq.each(function() {
                            var karyawan = $(this);
                            var state = karyawan.data('datagrid');
                            var opts = state.options;
                            opts.loadFilter = pagerFilter;
                            var onBeforeLoad = opts.onBeforeLoad;
                            opts.onBeforeLoad = function(param) {
                                state.allRows = null;
                                return onBeforeLoad.call(this, param);
                            }
                            var pager = karyawan.datagrid('getPager');
                            pager.pagination({
                                onSelectPage: function(pageNum, pageSize) {
                                    opts.pageNumber = pageNum;
                                    opts.pageSize = pageSize;
                                    pager.pagination('refresh', {
                                        pageNumber: pageNum,
                                        pageSize: pageSize
                                    });
                                    karyawan.datagrid('loadData', state.allRows);
                                }
                            });
                            $(this).datagrid('loadData', state.data);
                            if (opts.url) {
                                $(this).datagrid('reload');
                            }
                        });
                    },
                    loadData: function(jq, data) {
                        jq.each(function() {
                            $(this).data('datagrid').allRows = null;
                        });
                        return loadDataMethod.call($.fn.datagrid.methods, jq, data);
                    },
                    deleteRow: function(jq, index) {
                        return jq.each(function() {
                            var row = $(this).datagrid('getRows')[index];
                            deleteRowMethod.call($.fn.datagrid.methods, $(this), index);
                            var state = $(this).data('datagrid');
                            if (state.options.loadFilter == pagerFilter) {
                                for (var i = 0; i < state.allRows.length; i++) {
                                    if (state.allRows[i] == row) {
                                        state.allRows.splice(i, 1);
                                        break;
                                    }
                                }
                                $(this).datagrid('loadData', state.allRows);
                            }
                        });
                    },
                    getAllRows: function(jq) {
                        return jq.data('datagrid').allRows;
                    }
                })
            })(jQuery);

            function getData() {
                var rows = [];
                for (var i = 1; i <= 800; i++) {
                    var amount = Math.floor(Math.random() * 1000);
                    var price = Math.floor(Math.random() * 1000);
                    rows.push({
                        inv: 'Inv No ' + i,
                        date: $.fn.datebox.defaults.formatter(new Date()),
                        name: 'Name ' + i,
                        amount: amount,
                        price: price,
                        cost: amount * price,
                        note: 'Note ' + i
                    });
                }
                return rows;
            }

            $(function() {
                $('#karyawan').datagrid({
                    data: getData()
                }).datagrid('clientPaging');
            });

            function doSearch(nip) {
                alert('You input: ');
            }
        </script>
    </div>

</body>

</html>