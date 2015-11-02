<?php
namespace Craft;

/**
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_pluginHandle_migrationName
 */
class m151109_150110_oauth_add_domain_prefix_column extends BaseMigration
{
	/**
	 * Any migration code in here is wrapped inside of a transaction.
	 *
	 * @return bool
	 */
	public function safeUp()
	{
		$this->addColumnAfter('oauth_providers', 'domainPrefix', array(ColumnType::Varchar, 'required' => false), 'clientSecret');
		return true;
	}
}
