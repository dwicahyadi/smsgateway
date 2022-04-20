
<h1>SMS Gateway Lumen & Gammu</h1>

Ini adalah contoh backend service untuk mengirim SMS dengan memanfaatkan SMS Daemon dari [Gammu](https://wammu.eu/gammu/).
Pelajari lebih lanjut tentang SMS Daemon GAMMU [DI SINI](https://docs.gammu.org/smsd/).

**Instalasi**

Proses instalasi sama seperti clone projec Laravel/Lumen umumnya:
- clone project <code>git clone</code>
- update pengaturan database di dalam file .env
- <code>composer install</code>
- <code>php artisan migrate</code>

**Penggunaan**

Lakukan request berupa POST berisi field **destination** dan **msg**

Contoh:

**Menggunakan cUrl**

````
<?php

curl --request POST \
--url http://localhost:8000/ \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data destination=087779537772 \
--data msg=coba
</code>
````


**Menggunakan PHP cUrl**

````
$curl = curl_init();

curl_setopt_array($curl, [
CURLOPT_PORT => "8000",
CURLOPT_URL => "http://localhost:8000/",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "destination=087779537772&msg=coba",
CURLOPT_HTTPHEADER => [
"Content-Type: application/x-www-form-urlencoded"
],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}

