<?php

/*
 * © 2016 - 2016 by Grupo Promass. Todos los derechos reservados
 * http://www.grupopromass.com/
 */

namespace capacidades\Module\Entity;

use Zend\Db\TableGateway\TableGateway,
    Zend\Db\Adapter\Adapter;

/**
 * Description of capacidades
 *
 * @author Enrique Zepeda Cruz
 *  Created on 25-feb-2016, 17:02:28 
 */
class capacidades extends TableGateway {
    
    protected $table = 'gp_capacidades';

    public function __construct(Adapter $adapter, $features = null, ResultSetInterface $resultSetPrototype = null, Sql $sql = null) {
        parent::__construct($this->table, $adapter, $features, $resultSetPrototype, $sql);
    }
    
    
}
