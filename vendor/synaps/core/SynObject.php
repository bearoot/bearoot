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

    public function __construct($idValue = 0) {
        $this->_loaded = false;
        $this->_modified = false;

        if ($idValue !== 0)
            $this->load($idValue);
        else
            $this->_idValue = $idValue;
        $this->_properties = array();
    }

    public function __get($name = "", $htmlSafe = true) {
        if (!isset($this->_properties[$name]))
            throw new Exception("Property **$name** cannot be get(), it doesn't exists !", 400);
        if ($htmlSafe && $this->_properties[$name]['type'] === "string")
            return htmlentities($this->_properties[$name]['value']);
        return $this->_properties[$name]['value'];
    }

    public function __set($name = "", $value = "") {
        if (!isset($this->_properties[$name]))
            throw new Exception("Property **$name** cannot be set(), it  doesn't exists !", 400);
        $this->_properties[$name]['value'] = $value;
        settype($this->_properties[$name]['value'], $this->_properties[$name]['type']);
        $this->_modified = true;
    }

    public static function getQuery($operation = "") {
        if ($operation === "")
            return "";
        if ($operation === "ADD") {
            return "INSERT INTO $this->_tableName (" . implode(",", array_keys($this->_properties)) . ") VALUES (:" . implode(",:", array_keys($this->_properties)) . "); @@IDENTITY";
        } else if ($operation === "LOAD") {
            return "SELECT * FROM $this->_tableName WHERE $this->_idName=:idValue";
        } else if ($operation === "SAVE") {
            $query = "UPDATE $this->_tableName SET ";
            foreach (array_keys($this->_properties) as $key)
                $query .= $key . "=:" . $key;
            $query .= " WHERE $this->_idName=:idValue";
            return $query;
        } else if ($operation === "DELETE") {
            return "DELETE FROM $this->_tableName WHERE $this->_idName=:idValue";
        } else if ($operation === "EXIST") {
            return "SELECT COUNT(*) FROM $this->_tableName WHERE $this->_idName=:idValue";
        }
        return "";
    }

    private function bindProperties(&$stmt) {
        foreach ($this->_properties as $propertyName => $property)
            $stmt->bindValue($propertyName, $property[$propertyName]['value'], $property[$propertyName]['type']);
    }

    abstract private function validate();

    public function save() {
        $valid = $this->validate();
        if ($valid === true) {
            if ($this->_idValue !== 0 && $this->_loaded && $this->_modified)
                return $this->update();
            else
                return $this->add();
        }
        return $valid;
    }

    private function add() {
        $stmt = &SynAccess::getPreparedStatement(__CLASS__, "ADD");
        $this->bindProperties($stmt);
        $this->_idValue = SynAccess::getConnexion()->lastInsertId($this->_idName);
        return $this->_loaded = $stmt->execute();
    }

    private function update() {
        $stmt = &SynAccess::getPreparedStatement(__CLASS__, "UPDATE");
        $this->bindProperties($stmt);
        $stmt->bindValue("idValue", $this->_idValue);
        return $stmt->execute();
    }

    public function load($idValue = 0) {
        $this->_idValue = $idValue;
        $stmt = &SynAccess::getPreparedStatement(__CLASS__, "LOAD");
        $stmt->bindValue("idValue", $this->_idValue);
        $stmt->execute();
        if ($stmt->rowCount() === 0)
            return false;
        foreach ($stmt->fetch() as $key => $value)
            $this->_properties[$key] = $value;
        return $this->_loaded = true;
    }

    public function delete() {
        if ($this->_loaded) {
            $stmt = &SynAccess::getPreparedStatement(__CLASS__, "DELETE");
            $stmt->bindValue("idValue", $this->_idValue);
            return $stmt->execute();
        }
        return false;
    }

    private function exist() {
        $stmt = &SynAccess::getPreparedStatement(__CLASS__, "EXIST");
        $stmt->bindValue("idValue", $this->_idValue);
        $stmt->execute();
        if ((int) current($stmt->fetch()) === 1)
            return true;
        return false;
    }

}