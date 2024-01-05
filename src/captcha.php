<?php
// 設置 Content-Type 為 JSON
header('Content-Type: application/json');

$api_url = "https://com-sev.webapp.163.com/get_apnt_auth_img?return_type=base64";

$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close($ch);

$json_data = preg_replace('/^.+?\((.+)\)$/', '$1', $response);

$data = json_decode($json_data, true);

if ($data !== null) {
    $status = $data['status'];
    $base64 = 'data:image/jpeg;base64,' . $data['base64'];
    $ctoken_id = $data['ctoken_id'];

    // 將數據包裝成關聯數組
    $responseData = array(
        'status' => $status,
        'base64' => $base64,
        'ctoken_id' => $ctoken_id
    );

    // 將關聯數組轉換為 JSON 並輸出
    echo json_encode($responseData);
} else {
    echo json_encode(["status" => false, "error" => "兌換虛寶失敗", "message" => "獲取驗證碼失敗，請重新整理頁面後再試一次"]);
}
