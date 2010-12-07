<?php
header('Content-Type: text/html; charset=utf-8');

require_once('includes/requestsettings.class.php');
require_once('library/OAuthRequester2Legged.php');

session_start();

$default_settings = array(
    'consumerKey' => 'devconsumer444',
    'consumerSecret' => 'devsecret444',
    'protocol' => 'http',
    'host' => 'api.minoto-video.com',
    'headers' => 'Accept: +xml',
    'signatureMethod' => 'HMAC-SHA1',
    'processResult' => 'true'
);


if(isset($_SESSION['requestSettings']) && !isset($_REQUEST['reset'])) {
    $requestSettings = $_SESSION['requestSettings'];
} else {
    $requestSettings = new RequestSettings();
    $requestSettings->populate($default_settings);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestSettings->populate($_POST);

    if($requestSettings->countErrors()) {
        $errors = $requestSettings->getErrors();
    } else {
        $result = doOAuthRequest($requestSettings);
        if($requestSettings->processResult()) {
            $result['processed'] = processResult($result);
        } else {
            $result['processed'] = null;
        }
    }
    
}

require('template.php');
$_SESSION['requestSettings'] = $requestSettings;



function doOAuthRequest(RequestSettings $requestSettings) {
    $store = OAuthStore::instance('2Legged', $requestSettings->getCredentials());
    $url = $requestSettings->getProtocol() . '://' . $requestSettings->getHost() . $requestSettings->getPath();
    $requester = new OAuthRequester2Legged($url, $requestSettings->getMethod(), $requestSettings->getParametersArray(), $requestSettings->getBody());
    $curl_options = array(CURLOPT_HTTPHEADER => $requestSettings->getHeadersArray());
    $result = $requester->doRequest($curl_options);
    return $result;
}

function processResult($result) {
    $content_type = $result['headers']['content-type'];
    if(substr($content_type, -3, 3) == 'php') {
        return processResultPHP($result);
    } else {
        return null;
    } 
}

function processResultPHP($result) {
    ob_start();
    print '<pre>';
    var_dump(unserialize($result['body']));
    print '</pre>';
    $result = ob_get_clean();
    return $result;
}
?>