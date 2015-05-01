<?php

/**
 * Craft OAuth by Dukt
 *
 * @package   Craft OAuth
 * @author    Benjamin David
 * @copyright Copyright (c) 2015, Dukt
 * @link      https://dukt.net/craft/oauth/
 * @license   https://dukt.net/craft/oauth/docs/license
 */

namespace Dukt\OAuth\Providers;

use Guzzle\Http\Client;
use Dukt\OAuth\base\Provider;

class Facebook extends Provider {

    public $consoleUrl = 'https://developers.facebook.com/apps';
    public $oauthVersion = 2;

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return 'Facebook';
    }

    /**
     * Create Facebook Provider
     *
     * @return Facebook
     */
    public function createProvider()
    {
        $config = [
            'clientId' => $this->providerInfos->clientId,
            'clientSecret' => $this->providerInfos->clientSecret,
            'redirectUri' => $this->getRedirectUri(),
        ];

        return new \League\OAuth2\Client\Provider\Facebook($config);
    }
}