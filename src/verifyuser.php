<?php
// 設置 Content-Type 為 JSON
header('Content-Type: application/json');

$captcha = $_GET['captcha'];
$ctoken_id = $_GET['ctoken_id'];
$uid = $_GET['uid'];
$time = time();

$api_url = "https://com-sev.webapp.163.com/g112nacdkey_query_uidinfo/api?callback=jQuery11130795382142618188_1707547893735&img_auth={$captcha}&ctoken_id={$ctoken_id}&uid={$uid}&host_test=0&area=hmt&_={$time}";

$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true);
$response = curl_exec($ch);

curl_close($ch);

$jsonData = json_decode(preg_replace('/^.*?\(|\)$/', '', $response), true);

if ($jsonData['status'] === false) {
    switch ($jsonData['code']) {
        case 501:
            echo json_encode(["status" => false, "error" => "兌換虛寶失敗", "message" => "驗證碼失效，請重新整理頁面後再試一次"]);
            break;
        case 502:
            echo json_encode(["status" => false, "error" => "兌換虛寶失敗", "message" => "驗證碼錯誤，請重新輸入"]);
            break;
        case "UID_ERROR":
            echo json_encode(["status" => false, "error" => "兌換虛寶失敗", "message" => "查無此遊戲 ID，請重新輸入，或檢查是否為台港澳區的遊戲 ID"]);
            break;
    }
    return;
}
echo json_encode(["status" => true]);
