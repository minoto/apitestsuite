<?php
/**
 * Store for fixed oauth access token, for use in 2 legged OAuth.
 * @author Erik Bakker <erik@minoto-interactive.com>
 */


require_once dirname(__FILE__) . '/OAuthStoreAbstract.class.php';


class OAuthStore2Legged extends OAuthStore
{
    private $credentials;
    
    public function __construct(array $credentials) {
        $this->credentials = $credentials;
    }
    public function getSecretsForSignature ( $uri, $user_id ) { 
        return $this->credentials; 
    }
    
    public function getSecretsForVerify ( $consumer_key, $token, $token_type = 'access' ) { self::throwException(); }
     
    public function getServerTokenSecrets ( $consumer_key, $token, $token_type, $user_id, $name = '' ) { self::throwException(); } 
    public function addServerToken ( $consumer_key, $token_type, $token, $token_secret, $user_id, $options = array() ) { self::throwException(); } 
    
    public function deleteServer ( $consumer_key, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function getServer( $consumer_key, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function getServerForUri ( $uri, $user_id ) { self::throwException(); } 
    public function listServerTokens ( $user_id ) { self::throwException(); } 
    public function countServerTokens ( $consumer_key ) { self::throwException(); } 
    public function getServerToken ( $consumer_key, $token, $user_id ) { self::throwException(); } 
    public function deleteServerToken ( $consumer_key, $token, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function listServers ( $q = '', $user_id ) { self::throwException(); } 
    public function updateServer ( $server, $user_id, $user_is_admin = false ) { self::throwException(); } 
    
    public function updateConsumer ( $consumer, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function deleteConsumer ( $consumer_key, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function getConsumer ( $consumer_key, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function getConsumerStatic () { self::throwException(); } 
    
    public function addConsumerRequestToken ( $consumer_key, $options = array() ) { self::throwException(); } 
    public function getConsumerRequestToken ( $token ) { self::throwException(); } 
    public function deleteConsumerRequestToken ( $token ) { self::throwException(); } 
    public function authorizeConsumerRequestToken ( $token, $user_id, $referrer_host = '' ) { self::throwException(); } 
    public function countConsumerAccessTokens ( $consumer_key ) { self::throwException(); } 
    public function exchangeConsumerRequestForAccessToken ( $token, $options = array() ) { self::throwException(); } 
    public function getConsumerAccessToken ( $token, $user_id ) { self::throwException(); } 
    public function deleteConsumerAccessToken ( $token, $user_id, $user_is_admin = false ) { self::throwException(); } 
    public function setConsumerAccessTokenTtl ( $token, $ttl ) { self::throwException(); } 
    
    public function listConsumers ( $user_id ) { self::throwException(); } 
    public function listConsumerTokens ( $user_id ) { self::throwException(); } 
    
    public function checkServerNonce ( $consumer_key, $token, $timestamp, $nonce ) { self::throwException(); } 
    
    public function addLog ( $keys, $received, $sent, $base_string, $notes, $user_id = null ) { self::throwException(); } 
    public function listLog ( $options, $user_id ) { self::throwException(); } 
    
    public function install () { self::throwException(); }

    private function throwException() {
        throw new OAuthException('Datastore \'2 Legged\' unsuitable.');
    }
}
?>