$(document).ready(function () {
	var karyawan = $("#karyawan").datagrid();
	karyawan.datagrid({
		pageSize: 10, // Ukuran halaman default
		pagination: true,
		pageList: [10, 20, 30, 40], // Opsi ukuran halaman yang tersedia
		remoteFilter: true,
		rownumbers: true,
		onLoadSuccess: function (data) {},
	});
});
$(function () {
	$("#name").combogrid({
		url: base_url + "api/karyawan",
		method: "get",
		idField: "id_karyawan",
		textField: "nama_karyawan",
		fitColumns: true,
		columns: [
			[
				{
					field: "nip",
					title: "NIP",
					width: 10,
				},
				{
					field: "nama_karyawan",
					title: "Nama",
					width: 15,
				},
				{
					field: "jabatan",
					title: "Jabatan",
					width: 15,
				},
			],
		],
	});
});

$(function () {
	$("#jenis").combogrid({
		url: base_url + "api/jenis",
		method: "get",
		idField: "id_jenis_dokumen",
		textField: "jenis_dokumen",
		fitColumns: true,
		columns: [
			[
				{
					field: "kode_jenis_dokumen",
					title: "Kode",
					width: 5,
				},
				{
					field: "jenis_dokumen",
					title: "Jenis Dokumen",
					width: 15,
				},
			],
		],
	});
});

//open dokumen window from karyawan
function openKaryawan() {
	var row = $("#karyawan").datagrid("getSelected");
	if (row) {
		$("#dokumenGrid").window("open");
	}
}

//open file from dokumen
function openDokumen() {
	var row = $("#datadokumen").datagrid("getSelected");
	if (row) {
		showDokumen(id);
	}
}

//Function CRUD

function clearFormDok() {
	$("#formDokumen").form("clear");
}

function submitFormDok() {
	var formData = new FormData();
	// Dapatkan nilai dari input dengan ID tertentu
	var idValue = $("#name").combogrid("getValue");
	var jenisValue = $("#jenis").combogrid("getValue");
	// Tambahkan nilai-nilai ke dalam objek FormData
	formData.append("id_karyawan", idValue);
	formData.append("jenis", jenisValue);
	// Dapatkan nilai dari input file
	var fileInput = $("#file").next().find('input[type="file"]')[0];
	var file = fileInput.files[0];
	if (file) {
		formData.append("file", file);
	} else {
		$("#dokumenGrid").window("close");
		swal.fire({
			icon: "error",
			title: "Dokumen Gagal Ditambahkan",
			text: "File tidak boleh kosong",
		});
		return false;
	}
	// Kirimkan object FormData ke server
	$.ajax({
		url: base_url + "api/dokumen",
		type: "post",
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			//close popup
			$("#dokumenGrid").window("close");
			// Tampilkan pesan berhasil
			Swal.fire(response.message, "success");
			clearFormDok();
			// Muat ulang datagrid
			$("#datadokumen").datagrid("reload");
		},
		error: function (xhr, status, error) {
			//close popup
			$("#dokumenGrid").window("close");
			Swal.fire({
				icon: xhr.responseJSON.status,
				title: xhr.responseJSON.message,
				text: xhr.responseJSON.error,
			});
			clearFormDok();
		},
		silentErrorHandler: true,
	});
}

function clearFormUser() {
	$("#register").form("clear");
}

function submitFormUser() {
	var nip = $("#nip").val();
	var nama = $("#nama").val();
	var password1 = $("#password1").val();
	var password2 = $("#password2").val();
	var role_id = $("#role_id").val();
	if (
		nip == "" ||
		nama == "" ||
		password1 == "" ||
		password2 == "" ||
		role_id == ""
	) {
		$("#userWindow").window("close");
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Data tidak boleh kosong",
		});
		return false;
	} else if (password1 != password2) {
		$("#userWindow").window("close");
		Swal.fire("Password tidak sama", "error");
		return false;
	} else {
		var formData = new FormData();
		// Tambahkan nilai-nilai ke dalam objek FormData
		formData.append("nip", nip);
		formData.append("nama", nama);
		formData.append("password1", password1);
		formData.append("role_id", role_id);
		// Kirimkan object FormData ke server
		$.ajax({
			url: base_url + "api/user",
			type: "post",
			data: formData,
			contentType: false,
			processData: false,
			success: function (response) {
				//close popup
				$("#userWindow").window("close");
				// Tampilkan pesan berhasil
				Swal.fire({
					icon: "success",
					text: response.message,
					title: "success",
				});
				clearFormUser();
				// Muat ulang datagrid
				$("#datauser").datagrid("reload");
			},
			error: function (xhr, status, error) {
				//close popup
				$("#userWindow").window("close");
				Swal.fire({
					icon: xhr.responseJSON.status,
					title: xhr.responseJSON.message,
					text: xhr.responseJSON.error,
				});
			},
		});
	}
}

function clearFormKaryawan() {
	$("#karyawan").form("clear");
}

function submitFormKaryawan() {
	var nip = $("#nip").val();
	var nama = $("#nama_karyawan").val();
	var kode_jabatan = $("#kode_jabatan").val();
	var jabatan = $("#jabatan").val();
	if (
		nip == "" ||
		nama == "" ||
		kode_jabatan == "" ||
		jabatan == ""
	) {
		$("#tambahWindow").window("close");
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Data tidak boleh kosong",
		});
		return false;
	} else {
		var formData = new FormData();
		// Tambahkan nilai-nilai ke dalam objek FormData
		formData.append("nip", nip);
		formData.append("nama", nama);
		formData.append("kode jabatan", kode_jabatan);
		formData.append("jabatan", jabatan);
		// Kirimkan object FormData ke server
		$.ajax({
			url: base_url + "api/karyawan",
			type: "post",
			data: formData,
			contentType: false,
			processData: false,
			success: function (response) {
				//close popup
				$("#userWindow").window("close");
				// Tampilkan pesan berhasil
				Swal.fire({
					icon: "success",
					text: response.message,
					title: "success",
				});
				clearFormTambah();
				// Muat ulang datagrid
				$("#karyawan").datagrid("reload");
			},
			error: function (xhr, status, error) {
				//close popup
				$("#tambahWindow").window("close");
				Swal.fire({
					icon: xhr.responseJSON.status,
					title: xhr.responseJSON.message,
					text: xhr.responseJSON.error,
				});
			},
		});
	}
}

function clearFormJenis() {
	$("#jenisDokumen").form("clear");
}

function submitFormJenis() {
	var jenisdokumen = $("#jenisdokumen").val();
	var kodejenisdokumen = $("#kodejenisdokumen").val();
	if (jenisdokumen == "" || kodejenisdokumen == "") {
		$("#jenisDokumenWindow").window("close");
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "Data tidak boleh kosong",
		});
		return false;
	} else {
		var formData = new FormData();
		// Tambahkan nilai-nilai ke dalam objek FormData
		formData.append("jenisdokumen", jenisdokumen);
		formData.append("kodejenisdokumen", kodejenisdokumen);
		// Kirimkan object FormData ke server
		console.log(base_url + "api/jenis");
		$.ajax({
			url: base_url + "api/jenis",
			type: "post",
			data: formData,
			contentType: false,
			processData: false,
			success: function (response) {
				//close popup
				$("#jenisDokumenWindow").window("close");
				// Tampilkan pesan berhasil
				Swal.fire({
					icon: "success",
					text: response.message,
					title: "success",
				});
				clearFormJenis();
				// Muat ulang datagrid
				$("#datajenis").datagrid("reload");
			},
			error: function (xhr, status, error) {
				//close popup
				$("#jenisDokumenWindow").window("close");
				Swal.fire({
					icon: xhr.responseJSON.status,
					title: xhr.responseJSON.message,
					text: xhr.responseJSON.error,
				});
			},
		});
	}
}

function removeKaryawan() {
	var row = $("#karyawan").datagrid("getSelected");
	if (row) {
		// var index = $("#karyawan").datagrid("getRowIndex", row);
		// $("#karyawan").datagrid("cancelEdit", index).datagrid("deleteRow", index);
		// editIndex = undefined;
		var url = base_url + "api/karyawan?id_karyawan=" + row.id_karyawan;
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
					.then((response) => response.json())
					.then((data) => {
						Swal.fire(data.message, "success");
						$("#karyawan").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
					})
					.catch((error) => {
						console.error("Terjadi kesalahan:", error);
					});
				Swal.fire("Deleted!", "Your file has been deleted.", "success");
			}
		});
	}
}

//user
function removeUser() {
	var row = $("#tbuser").datagrid("getSelected");
	if (row) {
		var url = base_url + "api/user?nip=" + row.nip;
		$("#user").window("close");
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
					.then((response) => response.json())
					.then((data) => {
						Swal.fire(data.message, "success");
						$("#tbuser").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
					})
					.catch((error) => {
						console.error("Terjadi kesalahan:", error);
					});
				Swal.fire("Deleted!", "Your file has been deleted.", "success");
			}
		});
	}
}

function deleteDokumen() {
	var row = $("#datadokumen").datagrid("getSelected");
	if (row) {
		var url = base_url + "api/dokumen?id_dokumen=" + row.id_dokumen;
		$("#dokumenGrid").window("close");
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
					.then((response) => response.json())
					.then((data) => {
						Swal.fire(data.message, "success");
						$("#datadokumen").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
					})
					.catch((error) => {
						console.error("Terjadi kesalahan:", error);
					});
				Swal.fire("Deleted!", "Your file has been deleted.", "success");
			}
		});
	}
}

//user
// function deleteUser() {
//     var row = $("#datauser").datagrid("getSelected");
//     if (row && row.nip) {
//         var url = base_url + "api/user?nip=" + row.nip;
//         $("#userWindow").window("close");
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
//                 .then((response) => {
//                     if (response.ok) {
//                         return response.json();
//                     } else {
//                         throw new Error("HTTP status " + response.status);
//                     }
//                 })
//                 .then((data) => {
//                     Swal.fire(data.message, "success");
//                     $("#datauser").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
//                 })
//                 .catch((error) => {
//                     console.error("Terjadi kesalahan:", error);
//                     Swal.fire("Error", "An error occurred while deleting the user.", "error");
//                 });
//             }
//         });
//     } else {
//         Swal.fire("Error", "No user selected for deletion.", "error");
//     }
// }


// function deleteJenis() {
//     var row = $("#datajenis").datagrid("getSelected");
//     if (row && row.nip) {
//         var url = base_url + "api/dokumen/jenis?jenis_dokumen=" + row.jenis_dokumen;
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
//                 .then((response) => {
//                     if (response.ok) {
//                         return response.json();
//                     } else {
//                         throw new Error("HTTP status " + response.status);
//                     }
//                 })
//                 .then((data) => {
//                     Swal.fire(data.message, "success");
//                     $("#datajenis").datagrid("reload"); // Muat ulang DataGrid setelah penghapusan
//                 })
//                 .catch((error) => {
//                     console.error("Terjadi kesalahan:", error);
//                     Swal.fire("Error", "An error occurred while deleting the user.", "error");
//                 });
//             }
//         });
//     } else {
//         Swal.fire("Error", "No user selected for deletion.", "error");
//     }
// }

