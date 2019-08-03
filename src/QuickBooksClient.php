<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-07-28
 * Time: 19:30
 */

namespace JoeDaCo\QuickBooks;


/**
 * QuickBooksClient.
 *
 * @package Joedaco\QuickBooks
 */
class QuickBooksClient
{
	private $endpoint;
	private $client_id;
	private $client_secret;

    /**
     * QuickBooksClient constructor.
     * @param string $endpoint
     * @param string $client_id
     * @param string $client_secret
     */
	public function __construct(string $endpoint, string $client_id, string $client_secret, string $authRedirectUri, array $scopes = [])
    {
        $this->endpoint = $endpoint;
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    /**
     * Provide a static constructor for projects that do not utilize Dependency Injection.
     *
     * @param string $endpoint
     * @param string $client_id
     * @param string $client_secret
     * @return QuickBooksClient
     */
    final public static function create(string $endpoint, string $client_id, string $client_secret, string $authRedirectUri, array $scopes = []) {
	    return new QuickBooksClient($endpoint, $client_id, $client_secret, $authRedirectUri, $scopes);
    }

    private $config = array(
        'authorizationRequestUrl' => 'https://appcenter.intuit.com/connect/oauth2',
        'tokenEndPointUrl' => 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer',
        'client_id' => 'ABdM9V9dDfvi8KWkPZaRfpd0K81HwPoza0r8RsYTaEGArWGi7P',
        'client_secret' => 'xPb5Q2QWxktcsN4dfRvFx548MOatP57zZr8VYgJy',
        'oauth_scope' => 'com.intuit.quickbooks.accounting openid profile email phone address',
        'oauth_redirect_uri' => 'http://localhost:8080/callback.php',
    );

    public function authenticate() {

        $dataService = \QuickBooksOnline\API\DataService\DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => $config['client_id'],
            'ClientSecret' =>  $config['client_secret'],
            'RedirectURI' => $config['oauth_redirect_uri'],
            'scope' => $config['oauth_scope'],
            'baseUrl' => "development"
        ));

        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        // Get the Authorization URL from the SDK
        $authUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();
    }

}