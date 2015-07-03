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

require_once(dirname(__FILE__).'/../../config/config.inc.php');

if (Tools::strlen(Tools::getValue('code')) > 0
	&& Tools::strlen(trim(Tools::getValue('code'))) != 0
	&& strcmp(Configuration::get('MOBFIRST_ACCESS_CODE'), Tools::getValue('code')) == 0)
{
	Configuration::deleteByName('MOBFIRST_ACCESS_CODE');

	http_response_code(200);
	die();
}

http_response_code(401);