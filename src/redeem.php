<?php
// 設置 Content-Type 為 JSON
header('Content-Type: application/json');

$uid = $_GET['uid'];
$codes = array( //虛寶
    "VIP777",
    "VIP888",
    "DRAGON2024",
    "CNY888",
    "CNY999",
    "CNY2024",
    "CLUB2024"
);

$context = array( //虛寶內容
    "金幣*300+鑽石*88",
    "基本性能改裝寶箱*1+鑽石*88",
    "金幣*2024+鑽石*128+高級性能改裝寶箱*1+個人化卓越寶箱*1+基本性能改裝寶箱*1",
    "鑽石*58、金幣*188",
    "鑽石*58、金幣*188",
    "鑽石*58、金幣*188",
    "鑽石*58、金幣*188  (03/01直播提供，數量有限，兌完為止)",
);

$results = array();
$curlHandles = array();

$mh = curl_multi_init();  // 初始化 curl_multi

foreach ($codes as $code) {
    $api_url = "https://com-sev.webapp.163.com/g112nacdkey_redeem/api?uid={$uid}&code={$code}";

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curlHandles[$code] = $ch;
    curl_multi_add_handle($mh, $ch);
}

do {
    $status = curl_multi_exec($mh, $active);
    if ($active) {
        curl_multi_select($mh);
    }
} while ($active && $status == CURLM_OK);

foreach ($codes as $code) {
    $response = curl_multi_getcontent($curlHandles[$code]);
    $responseData = json_decode($response, true);

    if ($responseData['status'] == "true") {
        $state = "兌換成功";
        $badgeClass = "bg-success";
    } else if ($responseData['code'] == "REDEEMED_ALREADY") {
        $state = "已兌換";
        $badgeClass = "bg-warning";
    } else if ($responseData['code'] == "CURR_ERROR") {
        $state = "訪問過於頻繁，請稍後再試";
        $badgeClass = "bg-danger";
    } else if ($responseData['code'] == "JIFEI_ERROR" && $responseData['retcode'] == "406") {
        $state = "已過期";
        $badgeClass = "bg-secondary";
    } else if ($responseData['code'] == "JIFEI_ERROR") {
        $state = "系統繁忙，請稍後再試";
        $badgeClass = "bg-info";
    }

    $resultItem = array(
        'code' => $code,
        'codeContext' => $context[array_search($code, $codes)],
        'state' => $state,
        'badgeClass' => $badgeClass,
        'response' => $response
    );
    $results[] = $resultItem;

    curl_multi_remove_handle($mh, $curlHandles[$code]);
    curl_close($curlHandles[$code]);
}

curl_multi_close($mh);

echo json_encode($results);
