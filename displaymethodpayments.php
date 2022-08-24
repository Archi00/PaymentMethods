<?php
/**
* 2007-2022 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2022 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Displaymethodpayments extends Module
{
    public function __construct()
    {
        $this->name = 'displaymethodpayments';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Archi00';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Display Method Payments');
        $this->description = $this->l('Module that let\'s you display the current payment methods in the footer');
        if (!Configuration::get('DISPLAYMETHODPAYMENTS_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('displayFooter')
            && Configuration::updateValue('DISPLAYMETHODPAYMENTS_NAME', 'Display Method Payments');
    }

    public function uninstall()
    {
        return (
        parent::uninstall() &&
        Configuration::deleteByName('DISPLAYMETHODPAYMENTS_NAME')
        );
        
    }

    public function isUsingNewTranslationSystem()
    {
        return true;
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayFooter()
    {
        $payment_methods = array();
        $root_str = 'https://gemmesterra.com/Botiga/modules/';
        foreach (PaymentModule::getInstalledPaymentModules() as $payment) {
            $module = Module::getInstanceByName($payment['name']);
            if (Validate::isLoadedObject($module) && $module->active) {
                $payment_methods[$module->displayName] = $root_str.$module->name.'/logo.png';
            }
        }
        $this->context->smarty->assign([
            'method_payments_title' => $this->trans('PAYMENT METHODS', [], 'Modules.Displaymethodpayments.Title'),
            'method_payments_list' => $payment_methods,
        ]);

        return $this->display(__FILE__, 'methodpayments.tpl');
    }
}
