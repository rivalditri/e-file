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
    <?= $this->session->flashdata('message') ?>
    <div class="easyui-layout modalBox" style="width:100%;height: 675px;">
        <!-- <div class="easyui-layout " data-options="fit:true"> -->
        <!-- header menu -->
        <div class="modalContent" data-options="region:'north'"
            style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
            <div style="float: left;">
                Perumda Tugu Tirta
            </div>
            <div style="float: right;">
                <a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-help'">Setting</a>
                <div id="mm2" style="width:100px;">
                    <!-- <div>Profil</div> -->
                    <div>LogOut</div>
                </div>
            </div>
        </div>


        <!-- <div data-options="region:'east',split:true" title="East" style="width:100px;"></div> -->
        <div data-options="region:'west',split:true" title="Menu" style="width:15%;">
            <div class="easyui-accordion" data-options="fit:true,border:false">

                <ul class="easyui-tree">
                    <li>
                        <span>
                            <a href="menu_admin.php">Karyawan</a>
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
                            <a href="<?= base_url('admin/manageDoc') ?>">Dokumen</a>
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

                    <div id="formDialog" class="easyui-dialog " title="Register"
                        style="width:400px;height:500px;padding:30px;" closed="true" buttons="#formButtons">
                        <form id="ff" method="post" action="<?= base_url('admin/registration') ?>">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="nama" style="width:90%"
                                    data-options="label:'Nama:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="nip" style="width:90%"
                                    data-options="label:'NIP:',required:true,">
                                <br>
                                <?= form_error('nip', '<small style="color:red;padding-left:5px;">', '</small>'); ?>
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="password1" style="width:90%"
                                    data-options="label:'Password:',required:true" type="password">
                                <br>
                                <?= form_error('password1', '<small style="color:red;padding-left:5px;">', '</small>'); ?>
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="password2" style="width:90%"
                                    data-options="label:'Re-Password:',required:true" type="password">
                            </div>
                            <div style="margin-bottom:20px">
                                <select class="easyui-combobox" name="role" label="Role User" style="width:90%">
                                    <option value="0">Administrator</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <button type="submit" href="javascript:void(0)" class="easyui-linkbutton"
                                onclick="submitForm()" style="width:80px; margin: 5px;">Submit</button>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()"
                                style="width:80px; margin: 5px;">Clear</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm()"
                                style="width:80px; margin: 5px;">Close</a>
                        </form>
                    </div>


                    <div id="formDialog1" class="easyui-dialog" title="Register"
                        style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons">
                        <form id="ff1" method="post">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="jenisdokumen" style="width:90%"
                                    data-options="label:'Jenis Dokumen:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="kodejenisdokumen" style="width:90%"
                                    data-options="label:'Kode Jenis Dokumen:',required:true,">
                            </div>

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
                            // $.messager.alert('notif','Data Berhasil Disimpan', 'info');
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
                    <div data-options="name:'sports',iconCls:'icon-man'">Jenis dokumen</div>
                </div>
            </div>
            <table class="easyui-datagrid"
                data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true"
                toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true"
                singleSelect="true">
                <thead>
                    <tr>
                        <th field="nip" width="50" editor="{type:'validatebox',options:{required:true}}">NIP
                        </th>
                        <th field="nama" width="50" editor="{type:'validatebox',options:{required:true}}">Nama Karyawan
                        </th>
                        <th field="jabatan" width="50" editor="text">Jabatan</th>
                        <!-- <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($karyawan as $k): ?>
                        <tr>
                            <td>
                                <?= $k['nip']; ?>
                            </td>
                            <td>
                                <?= $k['nama_karyawan']; ?>
                            </td>
                            <td>
                                <?= $k['jabatan']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
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


    </div>

    </div>
    <!-- </div> -->


    </div>


</body>

</html>