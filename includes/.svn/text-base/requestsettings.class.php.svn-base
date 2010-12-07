<?php
class RequestSettings {
    private $consumerKey = null;
    private $consumerSecret = null;
    private $accessToken = null;
    private $tokenSecret = null;
    
    private $protocol = null;
    private $host = null;
    private $path = null;
    private $method = null;
    private $body = null;
    private $headers = null;
    
    private $signatureMethod = null;
    
    private $allowed_fields;
    private $allowed_protocols;
    private $allowed_methods;
    private $allowed_signature_methods;
    
    private $errors;
    
    public function __construct() {
        $this->loadArrays();
    }
    
    public function __wakeup() {
        $this->loadArrays();
    }
    
    private function loadArrays() {
        $this->allowed_fields = array('consumerKey', 'consumerSecret', 'accessToken', 'tokenSecret', 'protocol', 'host', 'path', 'method', 'parameters', 'body', 'headers', 'signatureMethod');
        $this->boolean_fields = array('processResult');
        $this->allowed_protocols = array('http', 'https');
        $this->allowed_methods = array('GET', 'POST', 'PUT', 'DELETE'); 
        $this->allowed_signature_methods = array('HMAC-SHA1', 'PLAINTEXT');    
        $this->errors = array();
    }
    
    public function populate(array $data) {
        foreach($data as $key => $value) {
            if(in_array($key, $this->allowed_fields)) {
                $method = set . ucfirst($key);
                $this->$method($value);
            }
        }
        
        foreach($this->boolean_fields as $field) {
            $method = set . ucfirst($field);
            $value = array_key_exists($field, $data);
            $this->$method($value);
        }
    }
    
    public function countErrors() {
        return count($this->errors);
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function setConsumerKey($value) {
        $this->consumerKey = $value;
    }
    
    public function getConsumerKey() {
        return $this->consumerKey;
    }
    
    public function setConsumerSecret($value) {
        $this->consumerSecret = $value;
    }
    
    public function getConsumerSecret() {
        return $this->consumerSecret;
    }
    
    public function setAccessToken($value) {
        $this->accessToken = $value;
    }
    
    public function getAccessToken() {
        return $this->accessToken;
    }
    
    public function setTokenSecret($value) {
        $this->tokenSecret = $value;
    }
    
    public function getTokenSecret() {
        return $this->tokenSecret;
    }
    
    public function setProtocol($value) {
        if(!in_array($value, $this->allowed_protocols)) {
            $this->errors[] = array('field' => 'protocol', 'error' => 'Protocol not allowed!');
        } else {
            $this->protocol = $value;
        }
    }
    
    public function getProtocol() {
        return $this->protocol;
    }
    
    public function getProtocolOptionList() {
        return $this->makeOptionList($this->allowed_protocols, $this->protocol);
    }
    
    public function setHost($value) {
        $this->host = $value;
    }
    
    public function getHost() {
        return $this->host;
    }
    
    public function setPath($value) {
        $this->path = $value;
    }
    
    public function getPath() {
        return $this->path;
    }
    
    public function setMethod($value) {
        if(!in_array($value, $this->allowed_methods)) {
            $this->errors[] = array('field' => 'method', 'error' => 'Method not allowed!');
        } else {
            $this->method = $value;
        }
    }
    
    public function getMethod() {
        return $this->method;
    }
    
    public function getMethodOptionList() {
        return $this->makeOptionList($this->allowed_methods, $this->method);
    }
    
    public function setParameters($value) {
        $this->parameters = $value;
    }
    
    public function getParameters() {
        return $this->parameters;
    }
    
    public function getParametersArray() {
        $parameters = array();
        $lines = array_map('trim', explode("\n", $this->parameters));
        foreach($lines as $line) {
            list($key, $value) = explode('=', $line, 2);
            $parameters[$key] = $value;
        }
        return $parameters;     
    }
    
    public function setBody($value) {
        $this->body = $value;
    }
    
    public function getBody() {
        return $this->body;
    }
    
    public function setHeaders($value) {
        $this->headers = $value;
    }
    
    public function getHeaders() {
        return $this->headers;
    }
    
    public function setSignatureMethod($value) {
        if(!in_array($value, $this->allowed_signature_methods)) {
            $this->errors[] = array('field' => 'signatureMethod', 'error' => 'Signature Method not allowed!');
        } else {
            $this->signatureMethod = $value;
        }
    }
    
    public function getSignatureMethod() {
        return $this->signatureMethod;
    }
    
    public function getSignatureMethodOptionList() {
        return $this->makeOptionList($this->allowed_signature_methods, $this->signatureMethod);
    }
    
    public function setProcessResult($value) {
        $this->processResult = $value;
    }
    
    public function processResult() {
        return $this->processResult;
    }
    
    public function getCredentials() {
        return array('consumer_key' => $this->consumerKey,
                     'consumer_secret' => $this->consumerSecret, 
                     'token' => $this->accessToken,
                     'token_secret' => $this->tokenSecret,
                     'signature_methods' => array($this->getSignatureMethod()));
    }
    
    public function getHeadersArray() {
        return array_map('trim', explode("\n", $this->headers));
    }
    
    private function makeOptionList($options, $selected = null) {
        foreach($options as $value) {
            print '<option value="' . $value . '"'.($value==$selected?' selected="selected"':null).'>' . $value . '</option>';
        }
    }
    
}