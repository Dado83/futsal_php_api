<?php
require 'db.php';

function setVisitor($session, $db)
{
    $role = $session->role;
    $returnVisitor = $session->returnVisitor;
    $ip = $session->ip;
    $device = $session->device;
    $browser = $session->browser;
    $mobile = $session->mobile;
    $platform = $session->platform;
    $referral = $session->referral;
    $agent = $session->agent;
    $page = $session->page;
    $date = $session->date;
    $time = $session->time;
    $timestamp = $session->timestamp;

    $sql = "INSERT INTO visitors (
            role, return_visitor, ip, device, browser,
            mobile, platform, referral, agent, page, date, time, timestamp)
        VALUES (
            '$role', $returnVisitor, '$ip', '$device', '$browser',
            '$mobile', '$platform', '$referral', '$agent', '$page', '$date','$time', $timestamp)";
    $db->query($sql);
}

/* function setSession()
{
session_start();
if ($_COOKIE['role'] == 'admin') {
$role = 'admin';
} else {
$role = 'NULL';
}
if ($_COOKIE['visit'] == '1') {
$visitor = '1';
} else {
setcookie('visit', '1', 60 * 60 * 24 * 30 * 3);
$visitor = '0';
}
$agent = $_SERVER['HTTP_USER_AGENT'];
if ($agent->isMobile()) {
$device = 'mobile';
} else {
$device = 'desktop';
}
$data = [
'role' => $role,
'returnVisitor' => $visitor ?: 'NULL',
'ip' => $_SERVER['REMOTE_ADDR'],
'device' => $device ?: 'NULL',
'browser' => $_SERVER['HTTP_USER_AGENT'],
'mobile' => $agent->getMobile() ?: 'NULL',
'platform' => $agent->getPlatform() ?: 'NULL',
'referral' => $agent->getReferrer() ?: 'NULL',
'agent' => $agent->getAgentString() ?: 'NULL',
'page' => uri_string() == '/' ? 'fairplay2014' : uri_string(),
'date' => date('d/m/y', time()) ?: 'NULL',
'time' => date('H:i', time()) ?: 'NULL',
'timestamp' => time(),
'last12hrsViews' => $this->model->getVisitors('last12hrsViews'),
'last12hrsVisitors' => $this->model->getVisitors('last12hrsVisitors'),
'last6hrsViews' => $this->model->getVisitors('last6hrsViews'),
'last6hrsVisitors' => $this->model->getVisitors('last6hrsVisitors'),
'last2hrsViews' => $this->model->getVisitors('last2hrsViews'),
'last2hrsVisitors' => $this->model->getVisitors('last2hrsVisitors'),
];
$session->set($data);

return $session;
} */

function getVisitors($type, $db)
{
    $last12hrs = time() - (60 * 60 * 12);
    $last6hrs = time() - (60 * 60 * 6);
    $last2hrs = time() - (60 * 60 * 2);
    switch ($type) {
        case 'all':
            $sql = "SELECT COUNT(*) AS vis FROM visitors";
            break;
        case 'allUnique':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors";
            break;
        case 'mobile':
            $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE device='mobile'";
            break;
        case 'mobileUnique':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE device='mobile'";
            break;
        case 'desktop':
            $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE device='desktop'";
            break;
        case 'desktopUnique':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE device='desktop'";
            break;
        case 'last12hrsViews':
            $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last12hrs";
            break;
        case 'last12hrsVisitors':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last12hrs";
            break;
        case 'last6hrsViews':
            $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last6hrs";
            break;
        case 'last6hrsVisitors':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last6hrs";
            break;
        case 'last2hrsViews':
            $sql = "SELECT COUNT(*) AS vis FROM visitors WHERE timestamp>$last2hrs";
            break;
        case 'last2hrsVisitors':
            $sql = "SELECT COUNT(DISTINCT ip) AS vis FROM visitors WHERE timestamp>$last2hrs";
            break;
    }

    $query = $db->query($sql);
    return ($query) ? $query->getRow() : array();
}

function visitorListForCurrentYear($db)
{
    $sql = "SELECT * FROM visitors ORDER BY id DESC";
    $query = $db->query($sql);
    $result = ($query) ? $query->getResult() : array();

    $visitors = [];
    foreach ($result as $v) {
        $visitors[] = (object) [
            'id' => $v->id,
            'role' => $v->role,
            'returnVisitor' => $v->return_visitor,
            'ip' => $v->ip,
            'device' => $v->device,
            'browser' => $v->browser,
            'browserVersion' => $v->browser_ver,
            'mobile' => $v->mobile,
            'platform' => $v->platform,
            'referral' => $v->referral,
            'agent' => $v->agent,
            'page' => $v->page,
            'date' => $v->date,
            'time' => $v->time,
            'timestamp' => $v->timestamp,
            'month' => date('M', $v->timestamp),
            'year' => date('Y', $v->timestamp),
        ];
    }

    $currentYear = date('Y', time());
    $year = [];
    //$vis = array_reverse($visitors);
    foreach ($visitors as $v) {
        if ($v->year == $currentYear) {
            switch ($v->month) {
                case 'Jan':
                    $year['Januar'][] = $v;
                    break;
                case 'Feb':
                    $year['Februar'][] = $v;
                    break;
                case 'Mar':
                    $year['Mart'][] = $v;
                    break;
                case 'Apr':
                    $year['April'][] = $v;
                    break;
                case 'May':
                    $year['Maj'][] = $v;
                    break;
                case 'Jun':
                    $year['Jun'][] = $v;
                    break;
                case 'Jul':
                    $year['Jul'][] = $v;
                    break;
                case 'Aug':
                    $year['Avgust'][] = $v;
                    break;
                case 'Sep':
                    $year['Septembar'][] = $v;
                    break;
                case 'Oct':
                    $year['Oktobar'][] = $v;
                    break;
                case 'Nov':
                    $year['Novembar'][] = $v;
                    break;
                case 'Dec':
                    $year['Decembar'][] = $v;
                    break;
            }
        }
    }
    return $year;
}

function test($db)
{
    //session_start();
    $role = 'admin';
    $returnVisitor = 1;
    $timestamp = $_SERVER['REQUEST_TIME'];
    $date = date('d/m/y', $timestamp);
    $time = date('H:i', $timestamp);
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $page = $_SERVER['REQUEST_URI'];

    //echo $timestamp . ' | ' . $date . ' | ' . $time . ' | ' . $userAgent . ' | ' . $remoteIP . ' | ' . $uri;

    $_SESSION['role'] = $role;
    $_SESSION['timestamp'] = $timestamp;
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $time;
    $_SESSION['userAg'] = $agent;
    $_SESSION['remoteIP'] = $ip;
    $_SESSION['uri'] = $page;

    foreach ($_SESSION as $el) {
        echo "\n" . $el;
    }

    $sql = "INSERT INTO visitors (
            role, return_visitor, ip,  agent, page, date, time, timestamp)
        VALUES (
            '$role', $returnVisitor, '$ip',  '$agent', '$page', '$date','$time', $timestamp)";
    $db->query($sql);

}

test($db);