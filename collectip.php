<?php
require "include/bittorrent.php";
dbconn();

stdhead();

if ($_GET['campus'] == 'east') {
    $campus = '广州校区东校园';
} else if ($_GET['campus'] == 'north') {
    $campus = '广州校区北校园';
} else if ($_GET['campus'] == 'south') {
    $campus = '广州校区南校园';
} else if ($_GET['campus'] == 'zhuhai') {
    $campus = '珠海校区';
} else if ($_GET['campus'] == 'shenzhen') {
    $campus = '深圳校区';
} else {
    $campus = '未知校区';
}

$ip = getip();

if (validateIPv6($ip)) {
    $ipv6 = $ip;
} else {
    $ipv6 = 'unknown';
}

$file = "ip.txt";
$data = $ipv6 . " " . $_GET['campus'] . "\n";
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
stdmsg("感谢您的参与", "已收集您的 IP 信息【" . $ipv6 . "】<br>对应校区【" . $campus . "】。<br><a href='/index.php'>点击这里返回主页</a>");
