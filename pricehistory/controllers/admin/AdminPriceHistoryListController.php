<?php

class AdminPriceHistoryListController extends ModuleAdminController {


    public function __construct()
    {
        $this->bootstrap = true;

        $this->table = 'price_history';
        $this->className = "PriceHistoryModification";
        $this->lang = false;

        $this->fields_list = [
            'id_price_history' => [
                'title' => $this->l('#'),
                'type' => 'int'
            ],
            'id_product' => [
                'title' => $this->l('product id'),
                'type' => 'int'
            ],
            'product_name' => [
                'title' => $this->l('product name'),
                'type' => 'text'
            ],
            'old_price' => [
                'title' => $this->l('old price'),
                'type' => 'float'
            ],
            'new_price' => [
                'title' => $this->l('new price'),
                'type' => 'float'
            ],
            'id_employee' => [
                'title' => $this->l('id employee'),
                'type' => 'int'
            ],
            'date_upd ' => [
                'title' => $this->l('date update'),
                'type' => 'datetime'
            ],

        ];

        // On appelle le construct du parent
        parent::__construct();

    }

    /*
    * Method Translation Override For PS 1.7
    */
    public function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if (method_exists('Context', 'getTranslator')) {
            $this->translator = Context::getContext()->getTranslator();
            $translated = $this->translator->trans($string);

            if ($translated !== $string) {
                return $translated;
            }
        }
        if ($class === null || $class == 'AdminTab') {
            $class = Tools::substr(get_class($this), 0, -10);
        } elseif (Tools::strtolower(Tools::substr($class, -10)) == 'controller') {
            $class = Tools::substr($class, 0, -10);
        }
        return Translate::getAdminTranslation($string, $class, $addslashes, $htmlentities);
    }
}