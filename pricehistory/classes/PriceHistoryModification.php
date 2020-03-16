<?php


class PriceHistoryModification extends ObjectModel
{


    // On déclare les champs de la table
    public $id_price_history;

    public $id_product;

    public $product_name;

    public $old_price;

    public $new_price;

    public $id_employee;

    public $date_upd;

    // On définit les champs
    public static $definition = [
        'table' => 'price_history',
        'primary' => 'id_price_history',
        'fields' => [
            'id_product' => ['type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true],
            'product_name' => ['type' => self::TYPE_STRING,'validate' => 'isCleanHtml','size' => 128],
            'old_price' => ['type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => true],
            'new_price' => ['type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => true],
            'id_employee' => ['type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true],
            'date_upd' => ['type' => self::TYPE_DATE,'validate' => 'isDate','required' => true],
        ]
    ];

    public function __construct($id = null, $id_lang = null)
    {
        parent::__construct($id, $id_lang);
    }

    public static function getFirstModuleDisiis($firstname = null, $birthdate = null)
    {

        $query = new DbQuery();
        $query->select('*');

        if ($firstname != null) {
            $query->where(' firstname LIKE \'' . $firstname . '\'');
        }
        $query->from('disii');


        // On exécute la requête
        $result = Db::getInstance()->executeS($query);

        return $result;
    }
}