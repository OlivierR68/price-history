<?php

require_once(dirname(__FILE__).'/classes/PriceHistoryModification.php');

if (!defined('_PS_VERSION_')){
    exit;
}

class PriceHistory extends Module {

    public function __construct()
    {
        $this->name = 'pricehistory';
        $this->displayName = $this->l('Prestashop Price History');
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'webolive studio';
        $this->description = $this->l('This is not working !');
        $this->ps_versions_compliancy =['min' => '1.6', 'max' => _PS_VERSION_];
        $this->confirmUninstall = $this->l('Are you sure ?');
        $this->bootstrap = true;

        parent::__construct();
    }

    public function install() {

        if (!parent::install()
            || !$this->_installSql()
            || !$this->_installTab(0,'AdminPriceHistory', $this->l('Price History'))
            || !$this->_installTab('AdminPriceHistory','AdminPriceHistoryList', $this->l('List of prices'))
        ){
            return false;
        }
        return true;
    }

    public function uninstall() {
        if (!parent::uninstall()
            || !$this->_uninstallTab('AdminPriceHistory')
            || !$this->_uninstallTab('AdminPriceHistoryList')
        ){
            return false;
        }
        return true;
    }


    private function _installTab($parent, $class_name, $name) {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->class_name = $class_name;
        $tab->module = $this->name;


        $tab->name = [];
        foreach(Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $name;
        }
        return $tab->save();
    }


    private function _uninstallTab($class_name) {
        $id_tab = Tab::getIdFromClassName($class_name);
        $tab = new Tab((int)$id_tab);

        return $tab->delete();

    }


    private function _installSql() {

        include(dirname(__FILE__).'/sql/install.php');

        $result = true;
        foreach($sql_requests as $request) {
            if (!empty($request)) {
                $result &= Db::getInstance()->execute($request);
            }
        }
        return true;

    }

}