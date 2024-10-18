<?php
$server = "localhost";
$username = "ruhu9217_akbar";
$password = "P[7z]K8;V%PM";
$database = "ruhu9217_ruhulqurani";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$mySecretToken = 'A1xKMu4lbXYqtPhpdrYcxHm16XbUTsBR2elAymyMv67N2gT8';
$headers = getallheaders();
$xCallbackToken = isset($headers['X-CALLBACK-TOKEN']) ? $headers['X-CALLBACK-TOKEN'] : null;

if ($xCallbackToken === $mySecretToken) {
    $payload = file_get_contents('php://input');
    $arrRequestInput = json_decode($payload, true);
    
    $_status = isset($arrRequestInput['status']) ? $arrRequestInput['status'] : null;
    $external_id = isset($arrRequestInput['external_id']) ? $arrRequestInput['external_id'] : null;
    $amount = isset($arrRequestInput['amount']) ? $arrRequestInput['amount'] : null;
    $paid_at = isset($arrRequestInput['paid_at']) ? $arrRequestInput['paid_at'] : null;
    $payment_id = isset($arrRequestInput['payment_id']) ? $arrRequestInput['payment_id'] : null;
    $currency = isset($arrRequestInput['currency']) ? $arrRequestInput['currency'] : null;
    $bank_code = isset($arrRequestInput['bank_code']) ? $arrRequestInput['bank_code'] : null;
    $description = isset($arrRequestInput['description']) ? $arrRequestInput['description'] : null;
    $payer_email = isset($arrRequestInput['payer_email']) ? $arrRequestInput['payer_email'] : null;
    $merchant_name = isset($arrRequestInput['merchant_name']) ? $arrRequestInput['merchant_name'] : null;
    $payment_method = isset($arrRequestInput['payment_method']) ? $arrRequestInput['payment_method'] : null;
    $payment_channel = isset($arrRequestInput['payment_channel']) ? $arrRequestInput['payment_channel'] : null;
    $payment_destination = isset($arrRequestInput['payment_destination']) ? $arrRequestInput['payment_destination'] : null;
    $reference_id = isset($arrRequestInput['reference_id']) ? $arrRequestInput['reference_id'] : null;
    $given_names = isset($individual_detail['given_names']) ? $individual_detail['given_names'] : null;

    if ($_status === 'PAID' && $external_id !== null) {
        try {
            
            $updateQuery = "UPDATE rb_psb_aktivasi SET status_pendaftaran = '1' WHERE kode_pendaftaran = '$external_id'";
            $result = mysqli_query($conn, $updateQuery);
            $whatsapp = mysqli_query($conn, "SELECT B.phone FROM `rb_psb_pendaftaran_new` A LEFT JOIN rb_psb_user B on A.update_id = B.id_psb WHERE A.reff = '$external_id' LIMIT 1");
            
            if ($whatsapp) {
                $data = mysqli_fetch_array($whatsapp); 
                $phone = isset($data['phone']) ? $data['phone'] : null; 
            } else {
                
                echo "Error: " . mysqli_error($conn);
            }


            //$updateQuery = "UPDATE rb_psb_aktivasi SET nama_lengkap = '$phone' WHERE kode_pendaftaran = '$external_id'";
            //$result = mysqli_query($conn, $updateQuery);
            
            if (!preg_match("/[^+0-9]/", trim($phone))) {
                if (substr(trim($phone), 0, 2) == "62") {
                    $hp = trim($phone);
                }
                elseif (substr(trim($phone), 0, 1) == "0") {
                    $hp = "62" . substr(trim($phone), 1);
                }
            }
            $curl = curl_init();
            $token =
                "mfi1gyoODwh2EUGZOhWUD2MglPAmMdx1Of0gDPyS05XVutj1ZRpchdzw01xeGfnc";
            $phone = "$hp";

            $message = urlencode("*Checkout Payment Confirmation*\n\nPembayaran Anda untuk Pendaftaran berhasil dengan detail sebagai berikut:\n\nPembayaran : $description\nMetode : $payment_method\nBank : $bank_code\nHarga : Rp $amount\nReference : $reference_id\n\nTerima kasih melakukan Pendaftaran!\nSilahkan Cek Data anda di\nhttps://ruhulqurani.sch.id/?view=psb-data");

            curl_setopt(
                $curl,
                CURLOPT_URL,
                "https://solo.wablas.com/api/send-message?phone=$phone&message=$message&token=$token"
            );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
            $result = curl_exec($curl);
            curl_close($curl);
            
            if ($result) {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => "Pembayaran berhasil, status diperbarui"]);
            } else {
                http_response_code(500); 
                echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
            }
            
        } catch (Exception $e) {
            http_response_code(500); 
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        http_response_code(200);
        echo json_encode(['status' => 'failed', 'message' => $_status]);
    }
} else {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Invalid X-CALLBACK-TOKEN']);
}


mysqli_close($conn);
