<?php
/**
 * MobFirst
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file AFL_license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@mobfirst.com so we can send you a copy immediately.
 *
 * @author    MobFirst <support@mobfirst.com>
 * @copyright MobFirst
 * @license   http://opensource.org/licenses/AFL-3.0 Academic Free License ("AFL"), in the version 3.0
 */

if (!defined('_PS_VERSION_'))
	exit;

class MobFirst extends Module
{
	public function __construct()
	{
		$this->name = 'mobfirst';
		$this->tab = 'mobile';
		$this->version = '1.0.0';
		$this->author = 'MobFirst';
		$this->module_key = 'd6cc768b79e8d1d57249877d0fac866c';
		$this->need_instance = 0;
		$this->ps_versions_compliancy = array('min' => '1.5', 'max' => _PS_VERSION_);

		parent::__construct();

		$this->displayName = $this->l('MobFirst');
		$this->description = $this->l('Native mobile apps for your PrestaShop store.');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall? You will lose all your mobile apps settings.');
	}

	public function install()
	{
		if (!parent::install()
			|| !Configuration::updateValue('MOBFIRST_SHOP_REFERENCE', $this->createShopReference())
			|| !Configuration::updateValue('PS_WEBSERVICE', true)
			|| !$this->createWebserviceKey())
			return false;

		return true;
	}

	public function uninstall()
	{
		$obj = new WebserviceKeyCore(Configuration::get('MOBFIRST_WEBSERVICE_ACCOUNT_ID'));

		if (!parent::uninstall()
			|| !$this->cancelSubscription()
			|| !Configuration::deleteByName('MOBFIRST_SHOP_REFERENCE')
			|| !Configuration::deleteByName('MOBFIRST_WEBSERVICE_ACCOUNT_ID')
			|| !Configuration::deleteByName('MOBFIRST_ACCESS_CODE')
			|| !$obj->delete())
			return false;

		return true;
	}

	private function cancelSubscription()
	{
		// Create the access token that will be used to validate the subscription cancellation
		$this->genAccessToken(64);

		// Set the request params
		$params = array(
			'code' => Configuration::get('MOBFIRST_ACCESS_CODE'),
			'reference' => Configuration::get('MOBFIRST_SHOP_REFERENCE'),
			'url' => _PS_BASE_URL_.__PS_BASE_URI__
		);

		// Init and configure curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://apps.mobfirst.com/prestashop/uninstall');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Make the request and get the response status code
		curl_exec ($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if ($httpcode == 200)
			return true;

		return false;
	}

	private function createShopReference()
	{
		return md5(uniqid(rand(), true));
	}

	private function createWebserviceKey()
	{
		// Instantiate the WebserviceKeyCore object
		$obj = new WebserviceKeyCore();

		// Generate an unique webservice key
		$key = $this->genKey(32);
		while ($obj->keyExists($key))
			$key = $this->genKey(32);

		// Set the WebserviceKeyCore object properties
		$obj->key = $key;
		$obj->description = 'MobFirst webservice key';

		// Save the webservice key
		if (!$obj->add() || !Configuration::updateValue('MOBFIRST_WEBSERVICE_ACCOUNT_ID', $obj->id))
		{
			$this->context->controller->errors[] = 'It was not possible to install the MobFirst module: webservice key creation error.';
			return false;
		}

		Tools::generateHtaccess();

		// Set the webservice key permissions
		if (!$obj->setPermissionForAccount($obj->id, $this->getWebservicePermissions()))
		{
			$this->context->controller->errors[] = 'It was not possible to install the MobFirst module: webservice key permissions setup error.';
			return false;
		}

		return true;
	}

	private function genKey($size)
	{
		$key = '';
		/* There are no O/0 in the codes in order to avoid confusion */
		$chars = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
		for ($i = 1; $i <= $size; ++$i)
			$key .= $chars[rand(0, Tools::strlen($chars) - 1)];

		return $key;
	}

	private function genAccessToken($size)
	{
		Configuration::updateValue('MOBFIRST_ACCESS_CODE', $this->genKey($size));
	}

	public function getContent()
	{
		// If the MobFirst webservice key was deleted for any reason, create a new one
		if (!(new WebserviceKeyCore(Configuration::get('MOBFIRST_WEBSERVICE_ACCOUNT_ID')))->key)
			$this->createWebserviceKey();

		// Create the access token that will be used to validate the panel access
		$this->genAccessToken(64);

		$url = 'http://apps.mobfirst.com/prestashop?';
		$url .= 'email='.Configuration::get('PS_SHOP_EMAIL');
		$url .= '&name='.Configuration::get('PS_SHOP_NAME');
		$url .= '&reference='.Configuration::get('MOBFIRST_SHOP_REFERENCE');
		$url .= '&url='._PS_BASE_URL_.__PS_BASE_URI__;
		$url .= '&ws_key='.(new WebserviceKeyCore(Configuration::get('MOBFIRST_WEBSERVICE_ACCOUNT_ID')))->key;
		$url .= '&language='.(new Language(Configuration::get('PS_LANG_DEFAULT')))->language_code;
		$url .= '&code='.Configuration::get('MOBFIRST_ACCESS_CODE');

		Tools::redirect($url);
		die();
	}

	private function getWebservicePermissions()
	{
		$webservice_permissions = array(
			'addresses' => array('GET' => 'on'),
			'carriers' => array('GET' => 'on'),
			'cart_rules' => array('GET' => 'on'),
			'carts' => array('GET' => 'on'),
			'categories' => array('GET' => 'on'),
			'combinations' => array('GET' => 'on'),
			'configurations' => array('GET' => 'on'),
			'contacts' => array('GET' => 'on'),
			'content_management_system' => array('GET' => 'on'),
			'countries' => array('GET' => 'on'),
			'currencies' => array('GET' => 'on'),
			'customer_messages' => array('GET' => 'on'),
			'customer_threads' => array('GET' => 'on'),
			'customers' => array('GET' => 'on'),
			'customizations' => array('GET' => 'on'),
			'deliveries' => array('GET' => 'on'),
			'employees' => array('GET' => 'on'),
			'groups' => array('GET' => 'on'),
			'guests' => array('GET' => 'on'),
			'image_types' => array('GET' => 'on'),
			'images' => array('GET' => 'on'),
			'languages' => array('GET' => 'on'),
			'manufacturers' => array('GET' => 'on'),
			'order_carriers' => array('GET' => 'on'),
			'order_details' => array('GET' => 'on'),
			'order_discounts' => array('GET' => 'on'),
			'order_histories' => array('GET' => 'on'),
			'order_invoices' => array('GET' => 'on'),
			'order_payments' => array('GET' => 'on'),
			'order_slip' => array('GET' => 'on'),
			'order_states' => array('GET' => 'on'),
			'orders' => array('GET' => 'on'),
			'price_ranges' => array('GET' => 'on'),
			'product_customization_fields' => array('GET' => 'on'),
			'product_feature_values' => array('GET' => 'on'),
			'product_features' => array('GET' => 'on'),
			'product_option_values' => array('GET' => 'on'),
			'product_options' => array('GET' => 'on'),
			'product_suppliers' => array('GET' => 'on'),
			'products' => array('GET' => 'on'),
			'search' => array('GET' => 'on'),
			'shop_groups' => array('GET' => 'on'),
			'shop_urls' => array('GET' => 'on'),
			'shops' => array('GET' => 'on'),
			'specific_price_rules' => array('GET' => 'on'),
			'specific_prices' => array('GET' => 'on'),
			'states' => array('GET' => 'on'),
			'stock_availables' => array('GET' => 'on'),
			'stock_movement_reasons' => array('GET' => 'on'),
			'stock_movements' => array('GET' => 'on'),
			'stocks' => array('GET' => 'on'),
			'stores' => array('GET' => 'on'),
			'suppliers' => array('GET' => 'on'),
			'supply_order_details' => array('GET' => 'on'),
			'supply_order_histories' => array('GET' => 'on'),
			'supply_order_receipt_histories' => array('GET' => 'on'),
			'supply_order_states' => array('GET' => 'on'),
			'supply_orders' => array('GET' => 'on'),
			'tags' => array('GET' => 'on'),
			'tax_rule_groups' => array('GET' => 'on'),
			'tax_rules' => array('GET' => 'on'),
			'taxes' => array('GET' => 'on'),
			'translated_configurations' => array('GET' => 'on'),
			'warehouse_product_locations' => array('GET' => 'on'),
			'warehouses' => array('GET' => 'on'),
			'weight_ranges' => array('GET' => 'on'),
			'zones' => array('GET' => 'on')
		);

		return $webservice_permissions;
	}
}