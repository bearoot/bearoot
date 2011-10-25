<?php

abstract class SynObject {
    /*
     * constantes d'un objet 'mappé'
     */

    final private $_tableName;
    final private $_idName;

    /*
     * propriétés d'état vis à vis de la BD
     */
    private $_loaded;
    private $_modified;

    /*
     * prioriété d'un objet mappé
     */
    private $_idValue;
    private $_properties;

    public function __construct() {
        $this->_loaded = false;
        $this->_modified = false;

        $this->_idValue = 0;
        $this->_properties = array();
    }

    public static function getQuery($operation = "") {
        if ($operation == "")
            return "";
        if ($operation == "ADD") {
            return "INSERT INTO $this->_tableName";/*A FINIR*/
        } else if ($operation == "LOAD") {
            return "SELECT * FROM $this->_tableName WHERE $this->_idName=?";
        } else if ($operation == "SAVE") {
            return "UPDATE $this->_tableName SET WHERE $this->_idName=?";/*A FINIR*/
        } else if ($operation == "DELETE") {
            return "DELETE FROM $this->_tableName WHERE $this->_idName=?";
        } else if ($operation == "TEST") {
            return "SELECT COUNT(*) FROM $this->_tableName WHERE $this->_idName=?";
        }
        return "";
    }

    abstract private function validate();

    public function save() {
        
    }

    public function load($idValue = 0) {
        
    }

    public function delete() {
        
    }

    private function add() {
        
    }

    private function update() {
        
    }

    private function test() {
        
    }

}