<?php

/**
 * Craft OAuth by Dukt
 *
 * @package   Craft OAuth
 * @author    Benjamin David
 * @copyright Copyright (c) 2013, Dukt
 * @license   http://dukt.net/craft/oauth/docs#license
 * @link      http://dukt.net/craft/oauth/
 */

namespace OAuthProviderSources;

class StripeOAuthProviderSource extends BaseOAuthProviderSource {

	public $consoleUrl = 'https://manage.stripe.com/account/applications/settings';

	public function getName()
	{
		return 'Stripe';
	}
}