<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Basic Form - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../<?= base_url('vendor/easyui/'); ?>themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/easyui/'); ?>demo.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/'); ?>style.css">
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/easyui/'); ?>jquery.easyui.min.js"></script>

</head>

<body>
    <h2>Registrasi</h2>
    <p>Fill the form and submit it.</p>
    <div style="margin:20px 0;"></div>
    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="openFormDialog()" style="width:120px">Open Form</a>

    <div id="formDialog" class="easyui-dialog" title="Register" style="width:400px;height:400px;padding:30px;" closed="true" buttons="#formButtons">
        <form id="ff" method="post">
            <div style="margin-bottom:20px">
                <input class="easyui-textbox" name="nama" style="width:90%" data-options="label:'Nama:',required:true">
            </div>
            <div style="margin-bottom:20px">
                <input class="easyui-textbox" name="nip" style="width:90%" data-options="label:'NIP:',required:true,">
            </div>
            <div style="margin-bottom:20px">
                <input class="easyui-textbox" name="password" style="width:90%" data-options="label:'Password:',required:true" type="password">
            </div>
            <div style="margin-bottom:20px">
                <input class="easyui-textbox" name="repassword" style="width:90%" data-options="label:'Re-Password:',required:true" type="password">
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
</body>

</html>