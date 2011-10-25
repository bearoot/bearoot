<?php

abstract class SynAccess extends SynSingleton {
    /*
     * connection DBAL (voir pus tard pour support multiples)
     * liste de requêtes préparées
     */

    public $_connexion;
    private $_queries;

    /*
     * fonction qui permet de récupérer
     * une requête préparée pour
     * l'entité passée en paramêtre
     */

    public function getPreparedStatement($className = "", $operation = "") {
        /*
         * initialisation de la liste des requêtes préparées
         */
        if (!isset($this->_queries))
            $this->_queries = array();

        /*
         * si le nom de la classe est vide
         * alors on retourne une chaine vide
         */
        if ($className == "" || $operation = "")
            return "";

        /*
         * on test l'existence de la requete préparée
         * elle est créé si elle n'existe pas
         */
        if (!isset($this->_queries[$className . "." . $operation]))
            $this->_queries[$className . "." . $operation] = SynAccess::getInstance()->_connexion->prepare($className::getQuery($operation));

        /*
         * on retourne l'index de la liste
         */
        return $this->_queries[$className];
    }

}