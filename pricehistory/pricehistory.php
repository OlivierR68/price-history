<?php


// sécurité de base
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
        ){
            return false;
        }
        return true;
    }

    public function uninstall() {
        if (!parent::uninstall()

        ){
            return false;
        }
        return true;
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