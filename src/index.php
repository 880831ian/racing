<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>巔峰極速 兌換虛寶 (台港澳) By Pin-Yi</title>
  <link href="icon.webp" rel="icon" type="image/x-icon">
  <link href="icon.webp" rel="shortcut icon" type="image/x-icon">
  <link href="icon.webp" rel="bookmark" type="image/x-icon">
  <link href="icon.webp" rel="apple-touch-icon" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <meta name="ctoken_id" content="">
</head>

<body>
  <div class="container mt-5">
    <h2>
      &nbsp;&nbsp;
      <figure class="figure">
        <img src="icon.webp" class="figure-img img-fluid rounded" width="75" height="75">
      </figure>
      &nbsp; 巔峰極速 兌換虛寶 v1.5
    </h2>

    <br>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">注意事項</h4>
      <p>
        1. 此工具是為了方便大家兌換所有虛寶，並非官方提供，請勿將此工具用於非法用途，否則後果自負。<br>
        2. 此工具只能兌換台港澳區的虛寶，其他區域無法使用。
      </p>
    </div>

    <div class="alert alert-info" role="alert">
      <h4 class="alert-heading">使用說明</h4>
      <p>
        1. 只需要輸入遊戲 ID 以及驗證碼，即可一鍵兌換所有虛寶，不需要輸入密碼，安全又方便。<br>
        2. 不知道遊戲 ID 怎麼取得？可以點擊下方的「如何取得遊戲 ID ?」查看圖片說明。 <br>
        3. 下方狀態會顯示兌換結果，有以下幾種狀態：<br>
      </p>

      <p>
        <span class="badge bg-success">兌換成功</span>：兌換成功，請直接到遊戲郵件中領取。<br>
        <span class="badge bg-warning">已兌換</span>：代表該虛寶已經兌換過了。<br>
        <span class="badge bg-secondary">已過期</span>：代表該虛寶兌換時間已經過了。<br>
        <span class="badge bg-danger">訪問過於頻繁，請稍後再試</span>：巔峰極速官方有限制兌換虛寶的間隔時間，如果遇到可以多按幾次按鈕試試看。<br>
        <span class="badge bg-info">系統繁忙，請稍後再試</span>：巔峰極速有限制訪問間隔，可以過幾分鐘後再嘗試。<br>
      </p>

      <hr>
      虛寶最後更新時間：2024/08/10 21:30:41
      <hr>

      <p class="mb-0">
        如果有任何問題，或是有新的虛寶，歡迎直接在留言區留言或是傳
        <a href="https://t.me/pinyichuchu">TG 訊息 </a>給我，我會盡快回覆大家的問題。<br>
        此為小弟隨意寫寫的 Side Project，對於程式碼有興趣的朋友，或是有更好的寫法及優化，歡迎發 PR，記得順手給我個⭐，<a href="https://github.com/880831ian/racing">GitHub 連結點我</a>。<br>
        開發人員：<a href="https://blog.pin-yi.me/">Pin-Yi</a>
      </p>
    </div>

    <br>

    <h2>
      <label class="form-label">輸入資料</label>
    </h2>

    <div class="card-group">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            <label class="form-label">遊戲 ID： &nbsp;&nbsp;
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                如何取得遊戲 ID ?
              </button>
            </label>
          </h5>

          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <img src="../sh14jylvls10psmagto7busosmakar97.jpeg" class="img-fluid" alt="取得遊戲 ID 範例" />
            </div>
            <br>
          </div>

          <p class="card-text">
            <input type="text" class="form-control" id="id" placeholder="2203240938" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="10" required />
          </p>
          <br>
          <h5 class="card-title">
            <label class="form-label">驗證碼： &nbsp;&nbsp;</label>
          </h5>
          <small>可點擊圖片更換驗證碼(若驗證碼沒有出現，請稍後再試，此為遊戲驗證碼API 問題)</small>
          <p class="card-text"></p>
          <div class="row">
            <div class="col-8">
              <input type="text" class="form-control" id="captcha" placeholder="英文不分大小寫" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="3" required />
            </div>
            <div class="col-4">
              <div id="captchaImage" onclick="changeCaptcha()" title="更換驗證碼"></div>
            </div>
          </div>
          <br>
        </div>

        <div class="card-footer">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="button" id="redeem" onclick="disableButton()">
              點我一鍵兌換虛寶
            </button>
          </div>
        </div>
      </div>
    </div>

    <br>
    <h2>
      <label for="id" class="form-label">
        兌換虛寶狀態
        <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#expired" aria-expanded="false" aria-controls="expired">
          查看已過期序號
        </button></label>
    </h2>

    <div class="collapse" id="expired">
      <div class="card card-body">
        <h2>
          <label for="id" class="form-label">已過期序號清單</label>
        </h2>

        <table id="expired" class="table table-dark table-bordered">
          <thead>
            <tr class="table-dark">
              <th scope="col">排序</th>
              <th scope="col">虛寶代碼</th>
              <th scope="col">虛寶內容</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

        <script>
          fetch('expired.json')
            .then(response => response.json())
            .then(data => {
              var tbody = document.querySelector('#expired tbody');
              data.forEach(item => {
                var row = document.createElement('tr');
                row.innerHTML = `<th>${item['排序']}</th><td>${item['虛寶代碼']}</td><td>${item['虛寶內容']}</td>`;
                tbody.appendChild(row);
              });
            })
            .catch(error => console.error('Error:', error));
        </script>

      </div>
      <br>
    </div>

    <table class="table table-dark table-bordered">
      <thead>
        <tr class="table-dark">
          <th scope="col">排序</th>
          <th scope="col">虛寶代碼</th>
          <th scope="col">虛寶內容</th>
          <th scope="col">狀態</th>
        </tr>
      </thead>
      <tbody id="table-body"></tbody>
    </table>
  </div>

  <script>
    changeCaptcha(); // 首次載入時，先取得驗證碼

    // 取得驗證碼or更換驗證碼
    async function changeCaptcha() {
      try {
        const response = await fetch("captcha.php");
        const data = await response.json();

        const {
          base64,
          ctoken_id
        } = data; // 獲取 base64、ctoken_id 的值

        const captchaImage = document.getElementById("captchaImage"); // 更新圖片
        captchaImage.innerHTML = '<img src="' + base64 + '">';

        document.querySelector('meta[name="ctoken_id"]').content = ctoken_id; // 將 ctoken_id 存放在 meta 標籤中
        document.getElementById("captcha").value = ""; // 清空驗證碼輸入框

      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "兌換虛寶失敗",
          text: "更新/取得驗證碼失敗，請稍候再試",
          confirmButtonColor: "#3085d6",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      }
    }

    // 禁用按鈕
    function disableButton() {
      const redeemButton = document.getElementById("redeem");
      const tableBody = document.getElementById("table-body");
      const id = document.getElementById("id").value;
      const captcha = document.getElementById("captcha").value;

      if (!id || !captcha) { // 檢查輸入框是否有輸入資料
        Swal.fire({
          icon: "error",
          title: "兌換虛寶失敗",
          text: "請輸入有效的遊戲 ID 和驗證碼",
          confirmButtonColor: "#3085d6",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
        enableButton(); //重新啟用按鈕
        return;
      }

      const ctoken_id = document.querySelector('meta[name="ctoken_id"]').content; // 獲取 ctoken_id

      tableBody.innerHTML = ""; // 清空表格
      document.getElementById("id").disabled = true; // 禁用遊戲 ID 輸入框
      document.getElementById("captcha").disabled = true; // 禁用驗證碼輸入框
      redeemButton.disabled = true; // 禁用按鈕
      redeemButton.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>&nbsp;資料送出中...";
      verifyUser(id, captcha, ctoken_id); // 驗證使用者
    }

    // 重新啟用按鈕
    function enableButton() {
      document.getElementById("captcha").value = ""; // 清空驗證碼輸入框

      changeCaptcha(); // 更換驗證碼

      document.getElementById("id").disabled = false; // 啟用遊戲 ID 輸入框
      document.getElementById("captcha").disabled = false; // 啟用驗證碼輸入框

      const redeemButton = document.getElementById("redeem");
      redeemButton.disabled = false; // 啟用按鈕
      redeemButton.innerHTML = "點我一鍵兌換虛寶"; // 恢復按鈕文字
    }

    // 驗證使用者
    async function verifyUser(uid, captcha, ctoken_id) {
      try {
        const response = await fetch(`verifyuser.php?uid=${uid}&captcha=${captcha}&ctoken_id=${ctoken_id}`);
        const jsonResponse = await response.json();
        // const jsonData = JSON.parse(jsonResponse.replace(/^.*?\(|\)$/g, ""));
        if (jsonResponse.status === false) {
          Swal.fire({
            icon: "error",
            title: jsonResponse.error,
            text: jsonResponse.message,
            confirmButtonColor: "#3085d6",
            allowOutsideClick: false,
            allowEscapeKey: false,
          });
          changeCaptcha(); // 更換驗證碼
          enableButton(); // 重新啟用按鈕
          return;
        }

        if (jsonResponse.status === true) {
          redeemSerialNumber(); // 開始兌換虛寶
        }
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "兌換虛寶失敗",
          text: "目前太多人使用，導致官方 API 沒有回應，請稍候再試，謝謝。",
          confirmButtonColor: "#3085d6",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
        enableButton();
      }
    }

    // 兌換虛寶
    async function redeemSerialNumber() {
      try {
        const id = document.getElementById("id").value;
        const response = await fetch(`redeem.php?uid=${id}`);
        const data = await response.json();

        data.forEach((item, index) => {
          displayData(item);
        });
      } catch (error) {
        Swal.fire({
          icon: "error",
          title: "兌換虛寶失敗",
          text: "兌換虛寶時發生錯誤",
          confirmButtonColor: "#3085d6",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } finally {
        enableButton();
      }
    }

    // 在前端顯示從 API 取得的資料 (虛寶代碼、虛寶內容、狀態)
    function displayData(item) {
      // 遍歷資料並動態添加到表格中
      const tableBody = document.getElementById("table-body");
      const row = document.createElement("tr");
      row.innerHTML = `
          <th scope="row">#${tableBody.childElementCount + 1}</th>
          <td>${item.code}</td>
          <td>${item.codeContext}</td>
          <td>
            <h5>
              <span class="badge ${item.badgeClass}">${item.state}</span>
            </h5>
          </td>
        `;
      tableBody.appendChild(row);
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>