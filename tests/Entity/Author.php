<?php
/**
 * Author
 *
 * @package Spot
 */
class Entity_Author extends \Spot\Entity
{
    protected static $_datasource = 'test_authors';

    public static function fields()
    {
        return array(
            'id' => array('type' => 'int', 'primary' => true, 'serial' => true),
            'email' => array('type' => 'string', 'required' => true, 'unique' => true), // Unique
            'password' => array('type' => 'text', 'required' => true),
            'is_admin' => array('type' => 'boolean', 'default' => false),
            'date_created' => array('type' => 'datetime', 'default' => new \DateTime())
        );
    }
}

