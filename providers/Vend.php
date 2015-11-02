<?php
/**
 * @link      https://dukt.net/craft/oauth/
 * @copyright Copyright (c) 2015, Dukt
 * @license   https://dukt.net/craft/oauth/docs/license
 */

namespace Dukt\OAuth\Providers;

use Dukt\OAuth\base\Provider;

class Vend extends Provider
{
    // Properties
    // =========================================================================

    public $consoleUrl = 'https://developers.vendhq.com/developer/applications';
    public $oauthVersion = 2;

    // Public Methods
    // =========================================================================

    /* default scopes (minimum scope for getting user details) */

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return 'Vend';
    }

    /**
     * Get a Vend API URL, depending on path.
     *
     * @param  string $path
     * @return string
     */
    public function getApiUrl($path)
    {
        return "https://{$this->providerInfos->domainPrefix}.vendhq.com/api/{$path}";
    }

    /**
     * Create Vend Provider
     *
     * @return Vend
     */
    public function createProvider()
    {
        $config = [
            'domainPrefix' => $this->providerInfos->domainPrefix,
            'clientId' => $this->providerInfos->clientId,
            'clientSecret' => $this->providerInfos->clientSecret,
            'redirectUri' => $this->getRedirectUri(),
        ];

        return new \Dukt\OAuth\OAuth2\Client\Provider\Vend($config);
    }
}
