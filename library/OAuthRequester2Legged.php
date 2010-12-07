<?php
/**
 * OAuthRequester2Legged for use in 2 legged OAuth.
 * @author Erik Bakker <erik@minoto-interactive.com>
 */

require_once dirname(__FILE__) . '/OAuthRequester.php';

class OAuthRequester2Legged extends OAuthRequester {
    
    private $request_succesful;
    
    /**
     * Perform the request, returns the response code, headers and body.
     * 
     * @param array curl_options    optional extra options for curl request
     * @return array (code=>int, headers=>array(), body=>string)
     */
    public function doRequest ($curl_options = array())
    {
        $this->sign();
        $text   = $this->curl_raw($curl_options);
        $result = $this->curl_parse($text); 
        $this->request_succesful = $result['code'] < 400;
        return $result;
    }

    /**
     * Check if the last request was succesful
     * 
     * Check if the HTTP status code result of the last request is less than 400
     * @return bool
     */
    public function isSuccess() {
        return $this->request_succesful;
    }
}
