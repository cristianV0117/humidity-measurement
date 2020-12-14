<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 * He implementado la ayuda que brinda la documentacion en @link https://developer.yahoo.com/weather/documentation.html#oauth-php
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/WeatherApi.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Core/Ext.php';
abstract class ConsumerController implements WeatherApi
{
    use Ext;

    private $url;

    private $appId;
    private $consumerKey;
    private $consumerSecret;

    private $oauth;
    private $options;

    public function __construct()
    {
        $this->url = self::URL;

        $this->appId          = self::API_CREDENTIALS["APP_ID"];
        $this->consumerKey    = self::API_CREDENTIALS["CONSUMER_KEY"];
        $this->consumerSecret = self::API_CREDENTIALS["CONSUMER_SECRET"];

        $this->oauth = array(
            'oauth_consumer_key'     => $this->consumerKey,
            'oauth_nonce'            => uniqid(mt_rand(1, 1000)),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp'        => time(),
            'oauth_version'          => '1.0'
        );
    }

    //

    abstract protected function fetch();

    //

    private function getOuth($location)
    {
        $baseInfo = Ext::buildBaseString($this->url, 'GET', array_merge($location, $this->oauth));
        $compositeKey = rawurlencode($this->consumerSecret) . '&';
        $oauthSignature = base64_encode(hash_hmac('sha1', $baseInfo, $compositeKey, true));
        $this->oauth['oauth_signature'] = $oauthSignature;
        return $this->oauth;
    }

    private function getHeader($location)
    {
        return array(
            Ext::buildAuthorizationHeader($this->getOuth($location)),
            'X-Yahoo-App-Id: ' . $this->appId
        );
    }

    protected function getOptions($location)
    {
        return $this->options = array(
            CURLOPT_HTTPHEADER => $this->getHeader($location),
            CURLOPT_HEADER => false,
            CURLOPT_URL => $this->url . '?' . http_build_query($location),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        );
    }

    //

    public function __destruct()
    {
        $this->appId       = null;
        $this->consumerKey = null;
        $this->appId       = null;
    }
}