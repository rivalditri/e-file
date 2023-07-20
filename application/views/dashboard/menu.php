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
        <div data-options="region:'north'" style="width:100%;height:5%">
            <!-- <div>
                <h1>
                    PERUMDA Air Minum Tugu Tirta
                </h1>
                <h5>
                    Jl. Terusan Danau Sentani no. 100 Kota Malang - Jawa Timur, Indonesia.
                </h5>
            </div> -->
            <!-- sidebar menu -->
        </div>

        <div data-options="region:'west',split:true" title="Menu" style="width:10%;">
            <div class="easyui-accordion" data-options="fit:true,border:false">
                <!-- menu Karyawan -->
                <div title="Karyawan" style="padding:10px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Bagian/ Manajer</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Asisten Manajer</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Supervisor</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Staf</a>
                    <a href="javascript:void(0)" class="easyui-sidebutton" plain="true" onclick="" style="width:100%">Tambahkan Jenis a>

                </div>
                <div title="Manage User" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog()" style="width:100%">Add User</a>

                    <div id="formDialog" class="easyui-dialog" title="Register" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons">
                        <form id="ff" method="post">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="nama" style="width:90%" data-options="label:'Nama:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="nip" style="width:90%" data-options="label:'NIP:',required:true,">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="password1" style="width:90%" data-options="label:'Password:',required:true" type="password">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="password2" style="width:90%" data-options="label:'Re-Password:',required:true" type="password">
                            </div>
                            <div style="margin-bottom:20px">
                                <select class="easyui-combobox" name="role" label="Role User" style="width:90%">
                                    <option value="aa">Administrator</option>
                                    <option value="ab">Admin</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div id="formButtons" style="text-align:center;padding:5px 0">
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
                    </div>

                    <script>
                        function openFormDialog() {
                            $('#formDialog').dialog('open');
                        }

                        function submitForm() {
                            $('#ff').form('submit');
                            $('#formDialog').dialog('close');
                        }

                        function clearForm() {
                            $('#ff').form('clear');
                        }
                    </script>
                </div>
                <div title="Dokumen" style="padding:0px">
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Dokumen 1</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Dokumen 2</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Dokumen 3</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" onclick="" style="width:100%">Dokumen 4</a>
                    <a href="javascript:void(0)" class="easyui-sidebutton" plain="true" onclick="" style="width:100%">Tambahkan Jenis a>
                </div>
            </div>
        </div>


        <div data-options="region:'center',iconCls:'icon-ok'" title="Dokumen" style="width:90%">
            <div id="tt" class="easyui-tabs">
                <div title="Users Management" style="padding:5px;" rownumbers="true">
                    <div style="margin:20px 0;">
                        <div style="text-align: right;">
                            <a href="#" class="easyui-linkbutton" onclick="getSelected()">Pilih </a>
                        </div>
                    </div>
                    <table class="easyui-datagrid" id="dg" title="Users Management" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true,">
                        <thead>
                            <tr>
                                <th data-options="field:'itemid'" width="150">NIP</th>
                                <th data-options="field:'Jenis Dokumen',align:'left'" width="150">Nama Karyawan</th>
                                <th data-options="field:'Nama Dokumen',align:'left'" width="150">Jabatan</th>
                                <th data-options="field:'Nama Dokumen',align:'left'" width="150">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div title="Dokumen" style="padding:5px;" rownumbers="true">
                    <div style="margin:10px 0;">
                        <h2 style="margin-bottom: 0px;">Dokumen - User</h2>
                        <h4 style="margin-bottom: 10px;">Direksi PERUMDA Tugu Tirta</h4>
                        <div style="text-align: right;">
                            <a href="#" class="easyui-linkbutton" onclick="openFormDialog1()">Tambah Dokumen</a>
                            <div id="formDokumen" class="easyui-dialog" title="Dokumen" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons">
                                <form id="ff" action="<?= base_url('auth') ?>" method="post" name="dokumen_form">
                                    <div style="margin-bottom:20px">
                                        <select class="easyui-combobox" name="jenisdokumen" label="Jenis Dokumen" style="width:90%">
                                            <option value="aa">Dokumen 1</option>
                                            <option value="ab">Dokumen 2</option>
                                            <option value="aa">Dokumen 3</option>
                                            <option value="ab">Dokumen 4</option>
                                        </select>
                                    </div>
                                    <div style="margin-bottom:20px">
                                        <input class="easyui-textbox" name="namadokumen" style="width:90%" data-options="label:'Nama Dokumen:',required:true,">
                                    </div>
                                    <div style="margin-bottom:20px">
                                        <input class="easyui-textbox" name="keterangan" style="width:90%" data-options="label:'Keterangan:',required:true">
                                    </div>
                                    <div style="margin-bottom:20px">
                                        <input class="easyui-textbox" name="path" style="width:90%" data-options="label:'Path:',required:true">
                                    </div>
                                    <div style="margin-bottom:20px">
                                        <input class="f1 easyui-filebox" name="file" style="width:90%" data-options="label:'File:',required:true">
                                    </div>
                                    <div id="formButtons" style="text-align:center;padding:5px 0">
                                        <button type="submit" name="submit" style="width:80px">Submit</button>
                                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
                                    </div>
                                </form>
                            </div>

                            <script>
                                function openFormDialog1() {
                                    $('#formDokumen').dialog('open');
                                }

                                function submitForm() {
                                    $('#ff').form('submit');
                                    $('#formDokumen').dialog('close');
                                }

                                function clearForm() {
                                    $('#ff').form('clear');
                                }
                            </script>
                        </div>
                    </div>

                    <table class="easyui-datagrid" id="dg" title="Dokumen" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
                        <thead>
                            <tr>
                                <th data-options="field:'itemid'" width="150">Nama Dokumen</th>
                                <th data-options="field:'Jenis Dokumen',align:'left'" width="150">Jenis Dokumen</th>
                                <th data-options="field:'Nama Dokumen',align:'left'" width="150">Path</th>
                                <th data-options="field:'Nama Dokumen',align:'left'" width="150">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <div title="Tab2" data-options="closable:true" style="overflow:auto;display:none;">
                    <h2>Tambahkan Jenis Dokumen</h2>
                    <div style="margin:20px 0;"></div>
                    <div class="easyui-panel" title="New Topic" style="width:100%;max-width:400px;padding:30px 60px;">
                        <form id="ff" method="post">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="name" style="width:100%" data-options="label:'Name:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="email" style="width:100%" data-options="label:'Email:',required:true,validType:'email'">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="subject" style="width:100%" data-options="label:'Subject:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="message" style="width:100%;height:60px" data-options="label:'Message:',multiline:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <select class="easyui-combobox" name="language" label="Language" style="width:100%">
                                    <option value="ar">Arabic</option>
                                    <option value="bg">Bulgarian</option>
                                    <option value="ca">Catalan</option>
                                    <option value="zh-cht">Chinese Traditional</option>
                                    <option value="cs">Czech</option>
                                    <option value="da">Danish</option>
                                    <option value="nl">Dutch</option>
                                    <option value="en" selected="selected">English</option>
                                    <option value="et">Estonian</option>
                                    <option value="fi">Finnish</option>
                                    <option value="fr">French</option>
                                    <option value="de">German</option>
                                    <option value="el">Greek</option>
                                    <option value="ht">Haitian Creole</option>
                                    <option value="he">Hebrew</option>
                                    <option value="hi">Hindi</option>
                                    <option value="mww">Hmong Daw</option>
                                    <option value="hu">Hungarian</option>
                                    <option value="id">Indonesian</option>
                                    <option value="it">Italian</option>
                                    <option value="ja">Japanese</option>
                                    <option value="ko">Korean</option>
                                    <option value="lv">Latvian</option>
                                    <option value="lt">Lithuanian</option>
                                    <option value="no">Norwegian</option>
                                    <option value="fa">Persian</option>
                                    <option value="pl">Polish</option>
                                    <option value="pt">Portuguese</option>
                                    <option value="ro">Romanian</option>
                                    <option value="ru">Russian</option>
                                    <option value="sk">Slovak</option>
                                    <option value="sl">Slovenian</option>
                                    <option value="es">Spanish</option>
                                    <option value="sv">Swedish</option>
                                    <option value="th">Thai</option>
                                    <option value="tr">Turkish</option>
                                    <option value="uk">Ukrainian</option>
                                    <option value="vi">Vietnamese</option>
                                </select>
                            </div>
                        </form>
                        <div style="text-align:center;padding:5px 0">
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
                        </div>
                    </div>


                </div>
                <div title="Tab3" data-options="iconCls:'icon-reload',closable:true" style="display:none;">
                    <h2>Ajax Form Demo</h2>
                    <p>Type in input box and submit the form.</p>

                    <div class="easyui-panel" title="Ajax Form" style="width:300px;padding:10px;">
                        <form id="ff" action="form1_proc.php" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Name:</td>
                                    <td><input name="name" class="f1 easyui-textbox"></input></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input name="email" class="f1 easyui-textbox"></input></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td><input name="phone" class="f1 easyui-textbox"></input></td>
                                </tr>
                                <tr>
                                    <td>File:</td>
                                    <td><input name="file" class="f1 easyui-filebox"></input></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Submit"></input></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <style scoped>
                        .f1 {
                            width: 200px;
                        }
                    </style>
                    <script type="text/javascript">
                        $(function() {
                            $('#ff').form({
                                iframe: false,
                                success: function(data) {
                                    $.messager.alert('Info', data, 'info');
                                }
                            });
                        });
                    </script>
                </div> -->


</body>

</html>