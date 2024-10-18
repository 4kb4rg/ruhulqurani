<?php 
if (isset($_POST['daftar'])) {
   
    $update_id = $_POST['update_id'];
    $update_date = $_POST['update_date'];
    $reff = $_POST['reff'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jalur_prestasi = $_POST['jalur_prestasi'];
    $sekolah_asal = $_POST['sekolah_asal'];
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $jenjang_madrasah = $_POST['jenjang_madrasah'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nama_ayah = $_POST['nama_ayah'];
    $status_ayah = $_POST['status_ayah'];
    $nik_ayah = $_POST['nik_ayah'];
    $tempat_lahir_ayah = $_POST['tempat_lahir_ayah'];
    $tanggal_lahir_ayah = $_POST['tanggal_lahir_ayah'];
    $agama_ayah = $_POST['agama_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $no_hp_ayah = $_POST['no_hp_ayah'];
    $alamat_ayah = $_POST['alamat_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $status_ibu = $_POST['status_ibu'];
    $nik_ibu = $_POST['nik_ibu'];
    $tempat_lahir_ibu = $_POST['tempat_lahir_ibu'];
    $tanggal_lahir_ibu = $_POST['tanggal_lahir_ibu'];
    $agama_ibu = $_POST['agama_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $no_hp_ibu = $_POST['no_hp_ibu'];
    $alamat_ibu = $_POST['alamat_ibu'];

    // Handle file uploads
    $upload_dir = 'images/';

    // Function to handle file upload
    function uploadFile($fileKey, $upload_dir) {
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == 0) {
            $filePath = $upload_dir . basename($_FILES[$fileKey]['name']);
            move_uploaded_file($_FILES[$fileKey]['tmp_name'], $filePath);
            return $filePath;
        }
        return '';
    }

    // Upload main files
    $kartu_keluarga = uploadFile('kartu_keluarga', $upload_dir);
    $photo_santri = uploadFile('photo_santri', $upload_dir);

    // Upload prestasi files
    $img_siswa_1 = uploadFile('img_siswa_1', $upload_dir);
    $img_siswa_2 = uploadFile('img_siswa_2', $upload_dir);
    $img_siswa_3 = uploadFile('img_siswa_3', $upload_dir);
    $img_siswa_4 = uploadFile('img_siswa_4', $upload_dir);

        // Ambil nomor terakhir dari table rb_psb_pendaftaran_new
    $query = "SELECT id FROM rb_psb_pendaftaran_new ORDER BY id DESC LIMIT 1";
    $result = mysql_query($query);
    $data = mysql_fetch_array($result);

    // Cek apakah ada data
    if ($data) {
        // Ambil nomor terakhir dan ubah menjadi integer
        $last_number = intval(substr($data['id'], -4));
    } else {
        // Jika tidak ada data, mulai dari 0
        $last_number = 0;
    }

    // Tambahkan 1 ke nomor terakhir
    $new_number = $last_number + 1;

    // Format nomor baru dengan 4 digit
    $new_number_formatted = str_pad($new_number, 4, '0', STR_PAD_LEFT);

    // Gabungkan dengan format 'PSB/DRQ/'
    $nomor_baru = 'PSB/DRQ/' . $new_number_formatted;

    // Query INSERT
    $sql = "INSERT INTO rb_psb_pendaftaran_new (
            reff, nama_lengkap, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, jalur_prestasi, sekolah_asal, nisn, nik, alamat_lengkap, 
            jenjang_madrasah, no_hp, email, nama_ayah, status_ayah, nik_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, agama_ayah, pendidikan_ayah, 
            pekerjaan_ayah, penghasilan_ayah, no_hp_ayah, alamat_ayah, nama_ibu, status_ibu, nik_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, agama_ibu, 
            pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, no_hp_ibu, alamat_ibu, update_date, update_id,verifikator_id, kartu_keluarga, photo_santri, img_siswa_1, img_siswa_2, img_siswa_3, img_siswa_4
        ) VALUES (
            '$nomor_baru', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$agama', '$jenis_kelamin', '$jalur_prestasi', '$sekolah_asal', '$nisn', '$nik', 
            '$alamat_lengkap', '$jenjang_madrasah', '$no_hp', '$email', '$nama_ayah', '$status_ayah', '$nik_ayah', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', 
            '$agama_ayah', '$pendidikan_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$no_hp_ayah', '$alamat_ayah', '$nama_ibu', '$status_ibu', '$nik_ibu', 
            '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$agama_ibu', '$pendidikan_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$no_hp_ibu', '$alamat_ibu', 
            '$update_date', '$update_id','$update_id', '$kartu_keluarga', '$photo_santri', '$img_siswa_1', '$img_siswa_2', '$img_siswa_3', '$img_siswa_4'
        )";
        
                        
        $psb = "INSERT INTO rb_psb_aktivasi (
            kode_pendaftaran,nama_lengkap,status,status_pendaftaran,status_data,status_ujian,status_medical_checkup,status_daftar_ulang,proses,waktu_input
        ) VALUES (
            '$nomor_baru', '$nama_lengkap', '0', '0', '0', '0', '0', '0', '0', '$update_date'
        )";
         $result = mysql_query($psb);


            if (mysql_query($conn, $sql)) {
        // Eksekusi query kedua
        if (mysql_query($conn, $psb)) {
            echo "<script>document.location='index.php?view=psb-data';</script>";
        } else {
            echo "Error (rb_psb_aktivasi): " . mysqli_error($conn);
        }
    } else {
        echo "Error (rb_psb_pendaftaran_new): " . mysqli_error($conn);
    }
        
    }
  
  
?>