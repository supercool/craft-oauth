<?php

/**
 * Craft OAuth by Dukt
 *
 * @package   Craft OAuth
 * @author    Benjamin David
 * @copyright Copyright (c) 2014, Dukt
 * @license   https://dukt.net/craft/oauth/docs/license
 * @link      https://dukt.net/craft/oauth/
 */

namespace Craft;

class Oauth_ProviderModel extends BaseModel
{
    private $_source;

    public function defineAttributes()
    {
        $attributes = array(
                'id'    => AttributeType::Number,
                'class' => array(AttributeType::String, 'required' => true),
                'clientId' => array(AttributeType::String, 'required' => false),
                'clientSecret' => array(AttributeType::String, 'required' => false),
            );

        return $attributes;
    }

    public function initSource()
    {
        $this->_source = craft()->oauth->getProviderSource($this->class);
    }

    public function getSource()
    {
        return $this->_source;
    }

    public function getUserDetails()
    {
        $source = $this->getSource();

        if($source)
        {
            return $this->_source->getUserDetails();
        }
    }

    public function getHandle()
    {
        return strtolower($this->class);
    }

    public function getName()
    {
        return $this->_source->getName();
    }

    public function getAccount()
    {
        try {
            return $this->_source->getAccount();
        }
        catch(\Exception $e)
        {
            // todo: log
            return false;
        }
    }

    public function isConfigured()
    {
        if(!empty($this->clientId))
        {
            return true;
        }

        return false;
    }

    public function setSource($source)
    {
        $this->_source = $source;
    }

    public function setToken(Oauth_TokenModel $model)
    {
        $this->_source->setToken($model);
    }

    public function getTokens()
    {
        return craft()->oauth->getTokensByProvider($this->getHandle());
    }
}