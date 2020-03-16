<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class PriceHistory extends Module
{
    public function __construct()
    {
        $this->name = 'pricehistory';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'webolive Studio';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Price History');
        $this->description = $this->l('Track price of products, and alert admin by mail');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    }

    public function install()
    {
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }
}