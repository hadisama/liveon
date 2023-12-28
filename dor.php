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

echo @color('green', "\nMENU PAKET:\n");
    echo @color('yellow', "
 [ 1  ] kuota 10GB+2GB 30 hari \t: RP.0  (fee Rp 40.000.)
 [ 2  ] POWER GO 20GB 30 hari \t: RP.0  (fee Rp 65.000.)
 [ 3  ] kuota super 40GB 30 hari: RP.0  (fee Rp 65.000.)
 [ 4  ] kuota 7GB 30 hari\t: RP.0  (fee Rp 35.000.)
 [ 5  ] kuota 50GB 30 hari\t: RP.0  (fee Rp 80.000.)
 [ 6  ] kuota 100GB 30 hari\t: RP.0  (fee Rp 125.000.)


 \n");
    echo @color('nevy', "\nPILIH PAKET: ");
    $pilih = trim(fgets(STDIN));
    //aray pembelian
    switch ($pilih) {
        case '1':

$code = file_get_contents('authToken.json');
            $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_HEADER => false,
CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100806633","subscription_items":[{"product_id":"3b80300d-2001-460d-82f4-acbd5effb06f","product_name":"DG_10GB_30D_40K"}],"subscription_amt":40000,"uuid":"4245468745406827124"}',
CURLOPT_HTTPHEADER => array(
    'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
    'X-AUTH: '.$code.'',
    'Content-Type: application/json; charset=UTF-8',
    //'Content-Length: 302',
    'Host: id-app.liveon.id',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',

),
));

$responseBinary = curl_exec($curl);
// echo "$response";
curl_close($curl);

// Markers
$startMarker = '"link":"';
$endMarker = '"}';

// Mencari posisi tanda awal
$startPosition = strpos($responseBinary, $startMarker);

if ($startPosition !== false) {
    // Mencari posisi tanda akhir setelah tanda awal
    $endPosition = strpos($responseBinary, $endMarker, $startPosition + strlen($startMarker));

    if ($endPosition !== false) {
        // Mengambil teks di antara tanda awal dan akhir
        $linkText = substr($responseBinary, $startPosition + strlen($startMarker), $endPosition - $startPosition - strlen($startMarker));
        echo "Copy link: $linkText" . PHP_EOL;
    } else {
        echo "Tanda akhir tidak ditemukan setelah tanda awal." . PHP_EOL;
    }
} else {
    echo "Token Expaired, Silahkan Login OTP Ulang." . PHP_EOL;
}

break;
//pemisah
case '2':
$code1 = file_get_contents('authToken.json');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100796267","subscription_items":[{"product_id":"95770f82-0401-4edb-b78d-1574f6683ed6","product_name":"Power_Go_20GB_30D_Recharge"}],"subscription_amt":65000,"uuid":"2610733661656234499"}',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
            'X-AUTH:'.$code1.'',
            'Content-Type: application/json; charset=UTF-8',
            //'Content-Length: 302',
            'Host: id-app.liveon.id',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
        ),
    ));


$responseBinary1 = curl_exec($curl);
// echo "$response";
curl_close($curl);

// Markers
$startMarker = '"link":"';
$endMarker = '"}';

// Mencari posisi tanda awal
$startPosition = strpos($responseBinary1, $startMarker);

if ($startPosition !== false) {
    // Mencari posisi tanda akhir setelah tanda awal
    $endPosition = strpos($responseBinary1, $endMarker, $startPosition + strlen($startMarker));

    if ($endPosition !== false) {
        // Mengambil teks di antara tanda awal dan akhir
        $linkText = substr($responseBinary1, $startPosition + strlen($startMarker), $endPosition - $startPosition - strlen($startMarker));
        echo "Copy link: $linkText" . PHP_EOL;
    } else {
        echo "Tanda akhir tidak ditemukan setelah tanda awal." . PHP_EOL;
    }
} else {
    echo "Token Expaired, Silahkan Login OTP Ulang." . PHP_EOL;
}


break;
//pemisah
case '3':
$code2 = file_get_contents('authToken.json');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100796267","subscription_items":[{"product_id":"88136de5-6aea-44b4-a736-6b0e2487e4bc","product_name":"40GB_30D_65K"}],"subscription_amt":65000,"uuid":"6801707894444475183"}',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
            'X-AUTH:'.$code2.'',
            'Content-Type: application/json; charset=UTF-8',
            //'Content-Length: 302',
            'Host: id-app.liveon.id',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
        ),
    ));


$responseBinary2 = curl_exec($curl);
// echo "$response";
curl_close($curl);

// Markers
$startMarker = '"link":"';
$endMarker = '"}';

// Mencari posisi tanda awal
$startPosition = strpos($responseBinary2, $startMarker);

if ($startPosition !== false) {
    // Mencari posisi tanda akhir setelah tanda awal
    $endPosition = strpos($responseBinary2, $endMarker, $startPosition + strlen($startMarker));

    if ($endPosition !== false) {
        // Mengambil teks di antara tanda awal dan akhir
        $linkText = substr($responseBinary2, $startPosition + strlen($startMarker), $endPosition - $startPosition - strlen($startMarker));
        echo "Copy link: $linkText" . PHP_EOL;
    } else {
        echo "Tanda akhir tidak ditemukan setelah tanda awal." . PHP_EOL;
    }
} else {
    echo "Token Expaired, Silahkan Login OTP Ulang." . PHP_EOL;
}


    break;
    //pemisah
    case '4':
$code3 = file_get_contents('authToken.json');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100816477","subscription_items":[{"product_id":"8ff8b0ef-deb4-4087-9676-e55d0910cca1","product_name":"DG_7GB_30D_35K"}],"subscription_amt":35000,"uuid":"4635975526528272450"}',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
            'X-AUTH:'.$code3.'',
            'Content-Type: application/json; charset=UTF-8',
            //'Content-Length: 302',
            'Host: id-app.liveon.id',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
        ),
    ));

$responseBinary3 = curl_exec($curl);
// echo "$response";
curl_close($curl);

// Markers
$startMarker = '"link":"';
$endMarker = '"}';

// Mencari posisi tanda awal
$startPosition = strpos($responseBinary3, $startMarker);

if ($startPosition !== false) {
    // Mencari posisi tanda akhir setelah tanda awal
    $endPosition = strpos($responseBinary3, $endMarker, $startPosition + strlen($startMarker));

    if ($endPosition !== false) {
        // Mengambil teks di antara tanda awal dan akhir
        $linkText = substr($responseBinary3, $startPosition + strlen($startMarker), $endPosition - $startPosition - strlen($startMarker));
        echo "Copy link: $linkText" . PHP_EOL;
    } else {
        echo "Tanda akhir tidak ditemukan setelah tanda awal." . PHP_EOL;
    }
} else {
    echo "Token Expaired, Silahkan Login OTP Ulang." . PHP_EOL;
}


    break;
// pemisah

case '5':
$code4 = file_get_contents('authToken.json');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100816477","subscription_items":[{"product_id":"96476d3d-2b36-49a4-aec5-eea95eeb4eba","product_name":"50GB_30D_80K"}],"subscription_amt":80000,"uuid":"-6666283608964774798"}',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
            'X-AUTH:'.$code4.'',
            'Content-Type: application/json; charset=UTF-8',
            //'Content-Length: 302',
            'Host: id-app.liveon.id',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
        ),
    ));


$responseBinary4 = curl_exec($curl);
// echo "$response";
curl_close($curl);

// Markers
$startMarker = '"link":"';
$endMarker = '"}';

// Mencari posisi tanda awal
$startPosition = strpos($responseBinary4, $startMarker);

if ($startPosition !== false) {
    // Mencari posisi tanda akhir setelah tanda awal
    $endPosition = strpos($responseBinary4, $endMarker, $startPosition + strlen($startMarker));

    if ($endPosition !== false) {
        // Mengambil teks di antara tanda awal dan akhir
        $linkText = substr($responseBinary4, $startPosition + strlen($startMarker), $endPosition - $startPosition - strlen($startMarker));
        echo "Copy link: $linkText" . PHP_EOL;
    } else {
        echo "Tanda akhir tidak ditemukan setelah tanda awal." . PHP_EOL;
    }
} else {
    echo "Token Expaired, Silahkan Login OTP Ulang." . PHP_EOL;
}


    break;
//pemisah
case '6':
$code5 = file_get_contents('authToken.json');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://id-app.liveon.id/v4/id/en/mobile/billing/prepaid/subscription/buy',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => '{"segmentation_id":"","billingAccountNumber":"LW100816477","subscription_items":[{"product_id":"094c2091-14a1-4750-b4da-aa97b9490892","product_name":"100GB_30D_125K"}],"subscription_amt":125000,"uuid":"-4705545263705600796"}',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: selfcare/6.72.0-ID Android/11 Redmi Note 8/en_US',
            'X-AUTH:'.$code5.'',
            'Content-Type: application/json; charset=UTF-8',
            //'Content-Length: 302',
            'Host: id-app.liveon.id',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
        ),
    ));

    $response = curl_exec($curl);
    echo "$response";
    curl_close($curl);
    break;

}
echo ("\n");
echo ("\n");
echo @color("purple","Tekan inter untuk menu opsi ");
echo ("\n");
$pilihanMenu = trim(fgets(STDIN));
switch ($pilihanMenu) {
default:
 echo "Kembali Ke Menu Opsi.\n";
 sleep(1);
 include 'main.php';
 break;
 system('clear');


}

?>
