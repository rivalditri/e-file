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
        <!-- <div class="easyui-layout " data-options="fit:true"> -->
        <!-- header menu -->
        <div class="modalContent" data-options="region:'north'" style="width:100%;height:5%;background-color: #87CEFA; display: flex; align-items: center; justify-content: space-between;">
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
                        <span>Dokumen</span>
                        <ul>
                            <li><span>Dokumen 1</span></li>
                            <li><span>Dokumen 2</span></li>
                            <li><span>Dokumen 3</span></li>
                            <li><span>Dokumen 4</span></li>
                        </ul>
                    </li>
                </ul>

                <div title="Manage" data-options="selected:true" style="padding:20px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog()" style="width:100%;  margin: 5px;">Tambah User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog1()" style="width:100%; height: 50px;margin: 5px; ">Tambah Jenis Dokumen</a>

                    <div id="formDialog" class="easyui-dialog " title="Register" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons" closable="false">
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
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm()" style="width:80px">Close</a>
                    </div>

                    <div id="formDialog1" class="easyui-dialog" title="Register" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons" closable="false">
                        <form id="ff1" method="post">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="jenisdokumen" style="width:90%" data-options="label:'Jenis Dokumen:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="kodejenisdokumen" style="width:90%" data-options="label:'Kode Jenis Dokumen:',required:true,">
                            </div>

                        </form>
                    </div>
                    <div id="formButtons" style="text-align:center;padding:5px 0">
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm1()" style="width:80px">Submit</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm1()" style="width:80px">Clear</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm1()" style="width:80px">Close</a>
                    </div>

                    <div id="formDialog2" class="easyui-dialog " title="Tambah Dokumen" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons" closable="false">
                        <form id="ff2" method="post">
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="kodejenisdokumen" style="width:90%" data-options="label:'Kode Jenis Dokumen:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="jenisdokumen" style="width:90%" data-options="label:'Jenis Dokumen:',required:true,">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="namadokumen" style="width:90%" data-options="label:'Nama Dokumen:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-textbox" name="path" style="width:90%" data-options="label:'Path:',required:true">
                            </div>
                            <div style="margin-bottom:20px">
                                <input class="easyui-filebox" name="file" style="width:90%" data-options="label:'Unggah File:'">
                            </div>
                        </form>
                    </div>
                    <div id="formButtons" style="text-align:center;padding:5px 0">
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm2()" style="width:80px">Submit</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm2()" style="width:80px">Clear</a>
                        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="closeForm2()" style="width:80px">Close</a>
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

                        function openFormDialog2() {
                            $('#formDialog2').dialog('open');
                            modal.css('filter', 'blur(5px)');
                        }

                        function closeForm2() {
                            $('#formDialog2').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function submitForm() {
                            $('#ff').form('submit');
                            $('#formDialog').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function submitForm1() {
                            $('#ff1').form('submit');
                            $('#formDialog1').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function submitForm2() {
                            $('#ff2').form('submit');
                            $('#formDialog2').dialog('close');
                            modal.css('filter', 'none');
                        }

                        function clearForm() {
                            $('#ff').form('clear');

                        }

                        function clearForm1() {
                            $('#ff1').form('clear');

                        }

                        function clearForm2() {
                            $('#ff2').form('clear');

                        }
                    </script>
                </div>
            </div>
        </div>
        <div data-options="region:'center',title:'Dokumen',iconCls:'icon-man'">
            <div id="toolbar">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="openFormDialog2()">Tambah Dokumen </a>
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
                    <div data-options="name:'sports'">Jenis dokumen</div>
                </div>
            </div>
            <table class="easyui-datagrid" data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true" toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true" singleSelect="true">
                <thead>
                    <tr>
                        <th field="kodejenisdokumen" width="50" editor="{type:'validatebox',options:{required:true}}">
                            Kode Jenis Dokumen</th>
                        <th field="jenisdokumen" width="50" editor="{type:'validatebox',options:{required:true}}">Jenis
                            Dokumen</th>
                        <th field="namadokumen" width="50" editor="{type:'validatebox',options:{required:true}}">Nama
                            Dokumen</th>
                        <th field="path" width="50" editor="text">Path</th>
                        <!-- <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dokumen as $dok) : ?>
                        <tr oncontextmenu="showContextMenu(event, '<?= $dok['kode_jenis_dokumen']; ?>')">
                            <td>
                                <?= $dok['kode_jenis_dokumen']; ?>
                            </td>
                            <td>
                                <?= $dok['jenis_dokumen']; ?>
                            </td>
                            <td>
                                <?= $dok['nama_dokumen']; ?>
                            </td>
                            <td>
                                <?= $dok['path']; ?>
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

            function showContextMenu(event, nip) {
                event.preventDefault();

                // Tampilkan menu konteks saat klik kanan
                var contextMenu = document.createElement('div');
                contextMenu.classList.add('context-menu');
                contextMenu.innerHTML = '<a href="menu_dokumen.php?id=' + nip + '">Edit</a> | <a href="#" onclick="hapusData(\'' + nip + '\')">Hapus</a>';
                contextMenu.style.position = 'absolute';
                contextMenu.style.left = event.clientX + 'px';
                contextMenu.style.top = event.clientY + 'px';

                // Tambahkan menu konteks ke dalam body
                document.body.appendChild(contextMenu);

                // Tambahkan event listener untuk menutup menu konteks saat diklik di luar menu
                document.addEventListener('click', function(event) {
                    if (!contextMenu.contains(event.target)) {
                        contextMenu.remove();
                    }
                });
            }

            function hapusData(nip) {
                if (confirm('Apakah Anda yakin ingin menghapus data dengan NIP ' + nip + '?')) {
                    // Lakukan aksi hapus data
                    // Misalnya, buat AJAX request untuk menghapus data pada sisi server
                    alert('Data dengan NIP ' + nip + ' telah dihapus');
                }
            }
        </script>


    </div>

    </div>
    <!-- </div> -->


    </div>


</body>

</html>