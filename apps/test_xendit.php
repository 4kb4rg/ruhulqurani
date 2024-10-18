<?php
// API Key Xendit (Public Key yang valid dari akun Xendit demo Anda)
$api_key = 'xnd_development_jDrpyTkT9GqO2d8UyGuXNC42AgG1pqFJHyN8krBKsJma67dV1wP1hC56VAOHon';

// Endpoint API Xendit untuk membuat invoice
$url = 'https://api.xendit.co/v2/invoices';

// Pastikan $_POST['reff'] sudah ada sebelum digunakan
if (isset($_POST['reff'])) {
    $reff = $_POST['reff'];

    // Data untuk request invoice
    $data = array(
        'external_id' => $reff, // ID transaksi eksternal dari form
        'amount' => 205000, // Jumlah pembayaran dalam Rupiah (IDR)
        'payer_email' => 'customer@example.com', // Email pelanggan
        'description' => 'Pembayaran Pendaftaran Santri Baru 2024-2025',
        'success_redirect_url' => "https://ruhulqurani.sch.id/?view=psb-data&id_st=9", // Tambahkan koma di akhir
        'given_names' => $name
    );


    // Inisialisasi cURL
    $ch = curl_init();

    // Set opsi cURL untuk mengirim permintaan POST ke Xendit
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode($api_key . ':') // Encode API key
    ));

    // Eksekusi cURL
    $response = curl_exec($ch);

    // Cek apakah ada error pada cURL
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // Decode hasil response dari Xendit
        $result = json_decode($response, true);

        // Periksa apakah response sukses dan ada URL invoice
        if (isset($result['invoice_url'])) {
            // Redirect pengguna ke halaman pembayaran Xendit
            $invoice_url = $result['invoice_url'];
            header("Location: $invoice_url");
            exit();
        } else {
            // Jika tidak ada invoice_url, tampilkan pesan error
            echo "Error membuat invoice: ";
            print_r($result);
        }
    }

    // Tutup cURL
    curl_close($ch);
} else {
    echo "Error: Data 'reff' tidak tersedia.";
}
