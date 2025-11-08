<?php
session_start();

// 兼容 POST/GET 请求（优先使用 POST）
$data = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;

// 读取表单字段
$inputName = isset($data['name']) ? trim($data['name']) : '';
$inputPassword = isset($data['password']) ? $data['password'] : '';
$isGuest = isset($data['guest']) && ($data['guest'] === '1' || $data['guest'] === 1);

// 简单示例的固定账号（演示用途，生产请使用数据库和密码哈希）
$validUser = 'admin';
$validPassword = '123456';

// 处理游客登录
if ($isGuest) {
    // 创建会话并重定向（将游客标识存入 session）
    $_SESSION['user'] = 'guest';
    $_SESSION['is_guest'] = true;
    // 跳转到首页或受保护页面
    header('Location: test.html');
    exit;
}

// 处理正常登录
if ($inputName === $validUser && $inputPassword === $validPassword) {
    $_SESSION['user'] = $inputName;
    $_SESSION['is_guest'] = false;
    // 登录成功后重定向
    header('Location: test.html');
    exit;
} else {
    // 登录失败，显示错误并给出返回链接
    $safeName = htmlspecialchars($inputName, ENT_QUOTES, 'UTF-8');
    echo "登录失败。用户：{$safeName} 不存在或密码错误。<br>";
    echo "<a href=\"1.html.php\">返回登录页面</a>";
}



