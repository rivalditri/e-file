
// function submitFormDokumen() {
//     var formData = new FormData();
//     // Dapatkan elemen form
//     var form = $('#fd')[0];
//     // Dapatkan nilai dari input dengan ID tertentu
//     var idValue = $('#name').combogrid('getValue');
//     var jenisValue = $('#jenis').combogrid('getValue');
//     // Tambahkan nilai-nilai ke dalam objek FormData
//     formData.append('id', idValue);
//     formData.append('jenis', jenisValue);
//     // Dapatkan nilai dari input file
//     var fileInput = $('#file').next().find('input[type="file"]')[0];
//     var file = fileInput.files[0];
//     if (file) {
//         formData.append('file', file);
//     } else {
//         alert('File tidak boleh kosong');
//         return false;
//     }
//     // Kirimkan object FormData ke server
//     $.ajax({
//         url: '<?= base_url('api/ dokumen') ?>',
//         type: 'post',
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function (response) {
//             //close popup
//             $('#w').window('close');
//             // Tampilkan pesan berhasil
//             Swal.fire(
//                 response.message,
//                 'success'
//             )
//             // Kosongkan input file
//             $('#file').filebox('clear');
//             // Muat ulang datagrid
//             $('#dg').datagrid('reload');
//         }
//                 });
//             }

// function submitFormUser() {
//     var nip = $('#nip').val();
//     var nama = $('#nama').val();
//     var password1 = $('#password1').val();
//     var password2 = $('#password2').val();
//     var role_id = $('#role_id').val();
//     if (nip == '' || nama == '' || password1 == '' || password2 == '' || role_id == '') {
//         $('#u').window('close');
//         Swal.fire(
//             'Data tidak boleh kosong',
//             'error'
//         )
//         return false;
//     } else if (password1 != password2) {
//         $('#u').window('close');
//         Swal.fire(
//             'Password tidak sama',
//             'error'
//         )
//         return false;
//     } else {
//         var formData = new FormData();
//         // Dapatkan elemen form
//         var form = $('#register')[0];
//         // Tambahkan nilai-nilai ke dalam objek FormData
//         formData.append('nip', nip);
//         formData.append('nama', nama);
//         formData.append('password1', password1);
//         formData.append('role_id', role_id);
//         // Kirimkan object FormData ke server
//         $.ajax({
//             url: '<?= base_url('api/ user') ?>',
//             type: 'post',
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 //close popup
//                 $('#u').window('close');
//                 // Tampilkan pesan berhasil
//                 Swal.fire(
//                     response.message,
//                     'success'
//                 );
//             }
//                     });
// }
//             }

// function submitFormJenis() {
//     var jenisdokumen = $('#jenisdokumen').val();
//     var kodejenisdokumen = $('#kodejenisdokumen').val();
//     if (jenisdokumen == '' || kodejenisdokumen == '') {
//         $('#j').window('close');
//         Swal.fire(
//             'Data tidak boleh kosong',
//             'error'
//         )
//         return false;
//     } else {
//         var formData = new FormData();
//         // Dapatkan elemen form
//         var form = $('#register')[0];
//         // Tambahkan nilai-nilai ke dalam objek FormData
//         formData.append('jenisdokumen', jenisdokumen);
//         formData.append('kodejenisdokumen', kodejenisdokumen);
//         // Kirimkan object FormData ke server
//         $.ajax({
//             url: '<?= base_url('api/ dokumen / jenis') ?>',
//             type: 'post',
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 //close popup
//                 $('#j').window('close');
//                 // Tampilkan pesan berhasil
//                 Swal.fire(
//                     response.message,
//                     'success'
//                 );
//             }
//                     });
// }
//             }



// function clearFormUser() {
//     $('#register').form('clear');

// }

// function submitFormJD() {
//     $('#fj').form('submit');
//     $.messager.alert('info', 'Data Berhasil Disimpan', 'info');
//     $('#formDialog').dialog('close');

// }

// function clearFormDok() {
//     $('#fd').form('clear');

// }

// function clearFormJenis() {
//     $('#jenisDokumen').form('clear');

// }

// function showDokumen(id) {
//     $('#dokumenWindow').window({
//         title: 'Dokumen',
//         width: 800,
//         height: 600,
//         content: '<iframe src="<?= base_url('uploads/ paktaintegritaspkl.pdf') ?>" style="width: 100%; height: 100%; border: 0;"></iframe>',
//         modal: true,
//         collapsible: false,
//         minimizable: false,
//         maximizable: false
//                 });

// // Membuka window
// $('#dokumenWindow').window('open');
//             }

// var editIndex = undefined;

// $('#datadokumen').datagrid({
//     onRowContextMenu: function (e, index, row) {
//         e.preventDefault();
//         $('#mmdd').menu('show', {
//             left: e.pageX,
//             top: e.pageY
//         });
//         $('#datadokumen').datagrid('selectRow', index);
//     }
// });

// function openDokumen() {
//     var row = $('#datadokumen').datagrid('getSelected');
//     if (row) {
//         showDokumen(row.id_dokumen);
//     }
// }

// // klik kanan pada datagrid
// $('#dg').datagrid({
//     onRowContextMenu: function (e, index, row) {
//         e.preventDefault();
//         $('#mmdg').menu('show', {
//             left: e.pageX,
//             top: e.pageY
//         });
//         $('#dg').datagrid('selectRow', index);
//     }
// });

// function openRow() {
//     var row = $('#dg').datagrid('getSelected');
//     if (row) {
//         $('#w').window('open');

//     }
// }

// function editRow() {
//     var row = $('#dg').datagrid('getSelected');
//     if (row) {
//         var index = $('#dg').datagrid('getRowIndex', row);
//         onClickCell(index, 'nama_karyawan');
//     }
// }

// function removeRow() {
//     var row = $('#dg').datagrid('getSelected');
//     if (row) {
//         var index = $('#dg').datagrid('getRowIndex', row);
//         $('#dg').datagrid('cancelEdit', index).datagrid('deleteRow', index);
//         editIndex = undefined;
//     }
// }
// var editIndex = undefined;

// function endEditing() {
//     if (editIndex == undefined) {
//         return true
//     }
//     if ($('#dg').datagrid('validateRow', editIndex)) {
//         $('#dg').datagrid('endEdit', editIndex);
//         editIndex = undefined;
//         return true;
//     } else {
//         return false;
//     }
// }

// function acceptit() {
//     if (endEditing()) {
//         $('#dg').datagrid('acceptChanges');
//     }
//     //get selected row data
//     var rows = $('#dg').datagrid('getSelections');
//     //get edit row index
//     //save to variable
//     //var edited column = rows[0].column_name;
//     //.ajax call to update edited column
//     //$.ajax({url: '<?= base_url('api/karyawan/edit') ?>',method: 'post', data: {column: edited_column, value: edited_value, id: edited_id}, success: function(result){}});


// }

// function onClickCell(index, field) {
//     if (editIndex != index) {
//         if (endEditing()) {
//             $('#dg').datagrid('selectRow', index)
//                 .datagrid('beginEdit', index);
//             var ed = $('#dg').datagrid('getEditor', {
//                 index: index,
//                 field: field
//             });
//             if (ed) {
//                 ($(ed.target).data('textbox') ? $(ed.target).textbox('textbox') : $(ed.target)).focus();
//             }
//             editIndex = index;
//         } else {
//             setTimeout(function () {
//                 $('#dg').datagrid('selectRow', editIndex);
//             }, 0);
//         }
//     }
// }

// function onEndEdit(index, row) {
//     var ed = $(this).datagrid('getEditor', {
//         index: index,
//         field: 'productid'
//     });
//     row.productname = $(ed.target).combobox('getText');
// }

// function getSelected() {
//     var row = $('#dg').datagrid('getSelected');
//     if (row) {
//         $.messager.alert('Info', row.nip + ":" + row.nama_karyawan + ":" + row.jabatan);
//     }
// }

// function doSearch() {
//     alert('You input: ' + value + '(' + name + ')');
// }
// $(document).ready(function () {
//     $('#dg').datagrid({
//         pageSize: 10, // Ukuran halaman default
//         pagination: true,
//         pageList: [10, 20, 30], // Opsi ukuran halaman yang tersedia
//         onLoadSuccess: function (data) {

//         }
//     });
// });
