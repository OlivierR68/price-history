<?php

$sql_requests = [];

$sql_requests[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'_price_history 
(
    `id_price_history` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_product` INT(10) UNSIGNED NOT NULL,
    `old_price` DECIMAL(20,6) UNSIGNED NOT NULL DEFAULT 0.000000,
    `new_price` DECIMAL(20,6) UNSIGNED NOT NULL DEFAULT 0.000000,
    `id_employee` INT(10) UNSIGNED NOT NULL,
    `date_upd` DATETIME NOT NULL
)
ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8';
