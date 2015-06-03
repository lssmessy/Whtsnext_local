<?php
 
//Upload a blank cookie.txt to the same directory as this file with a CHMOD/Permission to 777
function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    //unset($login);    
}                  
 
function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_URL, $site);
    ob_start();
    return curl_exec ($ch);
    ob_end_clean();
    curl_close ($ch);
}
 
function post_data($site,$data){
    $datapost = curl_init();
        $headers = array("Expect:");
    curl_setopt($datapost, CURLOPT_URL, $site);
        curl_setopt($datapost, CURLOPT_TIMEOUT, 40000);
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
        curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($datapost, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
        curl_setopt($datapost, CURLOPT_COOKIEFILE, "cookie.txt");
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);    
}

 
?>
<?php
$site='http://site24.way2sms.com/';
login("http://www.160by2.com/re-login","rssData=&username=9426576315&password=08moth42");
 grab_page("http://www.160by2.com/Main.action?id=BA0BAC475850A65CED2F0536DDE0438E.8514");
 
 grab_page("http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html");
 grab_page("http://www.160by2.com/js/jquery.js");
 grab_page("http://www.160by2.com/SetFunBucks");
grab_page("http://www.160by2.com/Dashboard?id=BA0BAC475850A65CED2F0536DDE0438E.8514");
grab_page("http://www.160by2.com/css/160by2_styles.css?ranId=1");
grab_page("http://pagead2.googlesyndication.com/pagead/js/lidar.js");
post_data("http://www.160by2.com/Dashboard?id=BA0BAC475850A65CED2F0536DDE0438E.8514","hidSessionId=BA0BAC475850A65CED2F0536DDE0438E.8514&hidval=&arrayInvite=&dashing=aug30");
echo grab_page("http://www.160by2.com/Dashboard?id=37DF4E82E66E8DC6B995AFA28CAE072B.8514");
echo grab_page("http://www.160by2.com/Main.action?id=37DF4E82E66E8DC6B995AFA28CAE072B.8514");
 ?>