<?php
require "../function/function_daftarb.php";
$nomor = query("SELECT no_hp FROM regis where no_hp");

foreach ($nomor as $row) {


  $params = array(
    'token' => 'xs7el5fmcx8gtatf',
    'to' => '+62' . $row['no_hp'],
    'body' => $_POST['jadwal'],
  );
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ultramsg.com/instance52115/messages/chat",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
}
// echo "<script>
// alert('data berhasil di kirim');
// document.location.herf = '../admin/inputjadwal.php';
// </script>";

header("Location:../kader/jadwal/inputjadwal.php");
exit;
