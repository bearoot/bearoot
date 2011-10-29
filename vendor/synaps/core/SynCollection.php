<?php

class SynCollection {
    /*
     * constantes de la collection 'mappée'
     */

    final private $_tableName;
    final private $_filter;
    /*
     * liste d'objets de la collection
     */
    private $_list;

    public function __construct($idValue = 0) {
        $this->_list = array();
    }

    public function __get($index = 0) {
        if (!isset($this->_list[$index]))
            throw new Exception("No item at index **$index**, cannot be get()", 400);
        return $this->_list[$index];
    }

    public static function getQuery($operation = "") {
        if ($operation === "")
            return "";
        if ($operation === "LOAD") {
            if (isset($this->_filter{0}))
                return "SELECT * FROM $this->_tableName WHERE " . $this->_filter;
            return "SELECT * FROM $this->_tableName";
        } elseif ($operation === "DELETE") {
            if (isset($this->_filter{0}))
                return "DELETE FROM $this->_tableName WHERE " . $this->_filter;
            return "DELETE * FROM $this->_tableName";
        }
        return "";
    }

    public function validate() {
        foreach ($this->_list as $item)
            if ($item->validate() !== true)
                return false;
        return true;
    }

    public function save() {
        foreach ($this->_list as $item)
            $item->save();
    }

    public function add($item) {
        if (!isset($item))
            return false;
        $this->_list[] = $item;
        return true;
    }

    abstract public function load();

    abstract public function delete();
}