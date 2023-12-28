<?php
system('clear');
include 'warna.php';

// Memeriksa apakah konstanta MAIN_ACCESS didefinisikan
if (!defined('MAIN_ACCESS')) {
    echo "Unauthorized access\n";
    exit;
}


echo @color("purple","TEMBAK PAKET\n");
echo @color("purple"," _     _____     _______ ___  _   _\n");
echo @color("purple","| |   |_ _\ \   / / ____/ _ \| \ | |\n");
echo @color("purple","| |    | | \ \ / /|  _|| | | |  \| |\n");
echo @color("purple","| |___ | |  \ V / | |__| |_| | |\  |\n");
echo @color("purple","|_____|___|  \_/  |_____\___/|_| \_|\n");
echo ("\n");
echo @color("yellow","𝘾𝙧𝙚𝙖𝙩𝙚 𝘽𝙮:\n");
echo @color("green","𝚃𝚞𝚊𝚗𝚈𝚉\n");
echo ("\n");
echo ("\n");
echo "Nomer : ";
$nomer = trim(fgets(STDIN));
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://id-app.liveon.id/api/v3/user-service/v3/id/en/mobile/users/auth/otp/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // Menggunakan versi HTTP yang tepat
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{"device_id":"ffffffff-fcc7-73b0-0000-018c3f8d2f1dcom.circles.selfcare.id","isd_code":"62","otp_duration":15,"phone_no":"'.$nomer.'","auth_mode":"ENHANCED_SMS","request_type":"LOGIN_MOBILE_OTP","uuid":"3012586257802087431"}',
    CURLOPT_HTTPHEADER => array(
        'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
        'Content-Type: application/json; charset=UTF-8',
        'Host: id-app.liveon.id',
        'Connection: Keep-Alive',
        'Accept-Encoding: gzip',
    ),
));

$response = curl_exec($curl);

// Memeriksa status kode HTTP
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($http_status === 200) {
    $data = json_decode($response, true);

    if ($data['success']) {
        $auth_id = $data['result']['auth_id'];



        echo @color('green',"otp telah di kirim!! cek sms\n");

        echo "Masukkan OTP : ";
        $otp = trim(fgets(STDIN));

        $curl2 = curl_init();

        curl_setopt_array($curl2, array(
            CURLOPT_URL => 'https://id-app.liveon.id/api/v3/user-service/v3/id/en/mobile/users/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // Menggunakan versi HTTP yang tepat
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"mobile_auth":{"auth_id":"'.$auth_id.'","otp_code":"'.$otp.'","device_id":"ffffffff-fcc7-73b0-0000-018c3f8d2f1dcom.circles.selfcare.id"},"device":{"device_id":"ffffffff-fcc7-73b0-0000-018c3f8d2f1dcom.circles.selfcare.id","device_type":"Mobile","app_type":"ecosystem"},"uuid":"-1591955293652759049"}',
            CURLOPT_HTTPHEADER => array(
                'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
                'Content-Type: application/json; charset=UTF-8',
                'Host: id-app.liveon.id',
                'Connection: Keep-Alive',
                'Accept-Encoding: gzip',
            ),
        ));

        $response2 = curl_exec($curl2);

        //echo $response2; // Tampilkan respons dari permintaan kedua

        curl_close($curl2);
    } else {
        echo @color('red',"Gagal mengirim OTP.");
    }
} else {
    echo @color('red',"Gagal melakukan permintaan OTP.");
}



$data2 = json_decode($response2, true);

if ($data2['success']) {
    $authToken = $data2['result']['auth_token'];
    file_put_contents('authToken.json', $authToken);
    
    // Contoh output response
    echo "Response GET 3: " . $authToken . PHP_EOL;
} else {
    echo "Failed to retrieve auth token";
}

echo ("\n");
echo ("\n");
echo @color("purple","Tekan inter untuk menu opsi ");
echo ("\n");
$pilihanMenu = trim(fgets(STDIN));
switch ($pilihanMenu) {
default:
 echo "Kembali Kemenu Opsi.\n";
 sleep(1);
 include 'main.php';
 break;
 system('clear');


}


