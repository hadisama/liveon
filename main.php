<?php
system('clear');
include 'warna.php';

// Tentukan konstanta atau fungsi yang menandakan bahwa skrip dapat diakses
define('MAIN_ACCESS', true);


system('clear');
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
// akses login
echo @color("purple","MASUKAN USER & PASSWORD UNTUK AKSES\n");
echo ("\n");


// Nama file untuk menyimpan kredensial
$credentials_file = 'credentials.json';

// Fungsi untuk membaca kredensial dari file JSON
function readCredentials($file) {
    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        return json_decode($json_data, true);
    }
    return null;
}

// Fungsi untuk menyimpan kredensial ke file JSON
function saveCredentials($file, $credentials) {
    $json_data = json_encode($credentials, JSON_PRETTY_PRINT);
    file_put_contents($file, $json_data);
}

// Pilih mode inter atau baru
echo @color("purple","PASSWORD (L/lanjut)(N/New) ('L' atau 'N'): ");
$mode = trim(fgets(STDIN));
echo ("\n");
// Inisialisasi variabel
$username = '';
$password = '';

// Cek mode
if ($mode === 'L') {
    // Gunakan kredensial default
    $credentials = readCredentials($credentials_file);
    if (!$credentials) {
        echo "Password default tidak ditemukan. Harap masukkan ulang N/new.\n";
        $mode = 'N'; // Ganti mode menjadi 'baru' untuk memasukkan kredensial baru
    } else {
        // Set variabel dari kredensial default
        $username = $credentials['username'];
        $password = $credentials['password'];
    }
}

// Jika mode 'baru' atau kredensial default tidak ditemukan
if ($mode === 'N') {
    // Memasukkan username dan password baru
    echo "Masukkan username baru: ";
    $username = trim(fgets(STDIN));
echo ("\n");
    echo "Masukkan password baru: ";
    $password = trim(fgets(STDIN));

    // Menyimpan kredensial baru dalam array
    $credentials = array(
        'username' => $username,
        'password' => $password,
    );

    // Menyimpan kredensial ke file JSON
    saveCredentials($credentials_file, $credentials);
}


// ... Lanjutkan dengan skrip login

// URL tujuan
$url = 'https://licrevolution.my.id/license/auth/login/';

// Data yang akan dikirim (array jika isi data lebih dari 1 variabel)
$data = 'username='.$username.'&password='.$password.'&remember-me=remember-me&login=';

// Header yang akan dikirim (header pasti menggunakan array karena dia lebih dari 1 variabel)
$headers = array(
'Host: licrevolution.my.id',
'Connection: keep-alive',
// 'Content-Length: 62',
'Cache-Control: max-age=0',
'Upgrade-Insecure-Requests: 1',
'Origin: http://licrevolution.my.id',
'Content-Type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'Referer: http://licrevolution.my.id/license/auth/login/',
'Accept-Encoding: gzip, deflate',
'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
'Cookie: __test=d8ee1791651a7841f69fbc2908284dca; PHPSESSID=7d61cddfdc360533f3d343a430bfa058',
'Cookie: __test=aa350f799c607f0a7f8dc7f89ab84d5b; PHPSESSID=89da3cff83bbc3d174761b2e173eaa9a',
);

// Menginisialisasi cURL
$ch = curl_init($url);

// Mengatur opsi cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36');
// curl_setopt($ch, CURLOPT_VERBOSE, true);


// Menjalankan cURL dan mendapatkan respons
$response = curl_exec($ch);

// Periksa apakah ada kesalahan
if (curl_errno($ch)) {
    // Menangani kesalahan, misalnya menampilkan pesan kesalahan
    echo 'Error: ' . curl_error($ch);
    // Berhenti atau lakukan sesuatu sesuai kebutuhan
    exit();
}

// Menutup koneksi cURL
curl_close($ch);

// Menampilkan respons
// Tutup koneksi cURL
curl_close($ch);

// Periksa apakah login berhasil (sesuaikan dengan respons login yang diharapkan)
if (strpos($response, 'Login berhasil') !== false) {
    // Lanjutkan dengan script berikutnya setelah login berhasil
    echo @color("purple","Berhasil Login\n");
} else {
    // Menangani kasus login gagal
    echo @color("purple","Akun Anda telah kadaluwarsa. Hubungi Admin\n");
    // Berhenti
    exit();
}

// Skrip berikutnya setelah login berhasil dapat ditambahkan di sini




system('clear');
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
// Menampilkan menu untuk menambahkan ulang nama dan sandi
// login userpass






echo @color("purple","MENU OPSI\n");
echo ("\n");
echo @color("yellow","1. Login OTP\n");
echo @color("yellow","2. Tembak Paket\n");
echo @color("yellow","3. Keluar\n");
echo ("\n");
echo ("\n");

// Membaca pilihan menu dari pengguna
echo @color("purple","PILIH MENU: ");

$pilihanMenu = trim(fgets(STDIN));

// Memproses pilihan menu
switch ($pilihanMenu) {

    case '1':
        // Eksekusi file PHP lainnya
        echo "Login OTP\n";
        include 'liveon.php';
        break;
    case '2':
        echo "Dor Paket:\n";
        include 'dor.php';
        break;
        include 'main.php';
    case '3':
        echo "Terima kasih! Selamat tinggal.\n";
        break;
    default:
        echo "Pilihan menu tidak valid.\n";
        sleep(5);
        include 'main.php';
        break;
        system('clear');

}

//curl_close($curl);
