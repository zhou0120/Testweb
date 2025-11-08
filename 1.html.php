<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登陆</title>
    <link rel="stylesheet" href="web.html/1.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2>用户登录</h2>
            <form id="loginForm" method="post" action="login.php">
                <input type="hidden" name="guest" id="guestInput" value="0">
                <label for="name">名字</label>
                <input type="text" id="name" name="name" placeholder="请输入用户名" required>

                <label for="password">密码</label>
                <input type="password" id="password" name="password" placeholder="请输入密码">

                <div class="login-actions">
                    <button type="submit"><span>登陆</span></button>
                    <button type="button" id="guestBtn" class="guest-btn"><span>游客登录</span></button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // 游客登录：将 guest 标记为 1，设置用户名为 guest，并提交表单
    (function(){
        var guestBtn = document.getElementById('guestBtn');
        var guestInput = document.getElementById('guestInput');
        var nameInput = document.getElementById('name');
        var pwdInput = document.getElementById('password');
        var form = document.getElementById('loginForm');
        if (!guestBtn || !guestInput || !form) return;
        guestBtn.addEventListener('click', function(){
            guestInput.value = '1';
            // 设置默认游客信息（可按需更改）
            if (nameInput) nameInput.value = 'guest';
            if (pwdInput) pwdInput.value = '';
            form.submit();
        });
    })();
    </script>

</body>
</html>