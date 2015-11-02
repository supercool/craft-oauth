<?php
/**
 * @link      https://dukt.net/craft/oauth/
 * @copyright Copyright (c) 2015, Dukt
 * @license   https://dukt.net/craft/oauth/docs/license
 */

namespace Dukt\OAuth\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;

class Vend extends AbstractProvider
{

    private $_domainPrefix;

    // Public Methods
    // =========================================================================

    public function __construct($config = [])
    {
        if (empty($config['domainPrefix']))
        {
            throw new \RuntimeException('Vend provider requires a "domainPrefix" option');
        }
        else
        {
          $this->_domainPrefix = $config['domainPrefix'];
        }

        parent::__construct($config);
    }

    public function urlAuthorize()
    {
        return 'https://secure.vendhq.com/connect';
    }

    public function urlAccessToken()
    {
        return $this->getApiUrl('1.0/token');
    }

    public function urlUserDetails(AccessToken $token)
    {
        throw new \RuntimeException('Vend does not provide details for single users');
    }

    public function userDetails($response, AccessToken $token)
    {
        return [];
    }


    /**
     * Get a Vend API URL, depending on path.
     *
     * @param  string $path
     * @return string
     */
    public function getApiUrl($path)
    {
        return "https://{$this->_domainPrefix}.vendhq.com/api/{$path}";
    }

}
