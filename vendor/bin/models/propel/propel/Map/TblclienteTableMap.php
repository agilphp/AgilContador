<?php

namespace propel\propel\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use propel\propel\Tblcliente;
use propel\propel\TblclienteQuery;


/**
 * This class defines the structure of the 'tblcliente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblclienteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'propel.propel.Map.TblclienteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblcliente';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\propel\\propel\\Tblcliente';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'propel.propel.Tblcliente';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the clienteId field
     */
    const COL_CLIENTEID = 'tblcliente.clienteId';

    /**
     * the column name for the codigo field
     */
    const COL_CODIGO = 'tblcliente.codigo';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'tblcliente.nombre';

    /**
     * the column name for the direccion field
     */
    const COL_DIRECCION = 'tblcliente.direccion';

    /**
     * the column name for the telefono field
     */
    const COL_TELEFONO = 'tblcliente.telefono';

    /**
     * the column name for the ciudadId field
     */
    const COL_CIUDADID = 'tblcliente.ciudadId';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Clienteid', 'Codigo', 'Nombre', 'Direccion', 'Telefono', 'Ciudadid', ),
        self::TYPE_CAMELNAME     => array('clienteid', 'codigo', 'nombre', 'direccion', 'telefono', 'ciudadid', ),
        self::TYPE_COLNAME       => array(TblclienteTableMap::COL_CLIENTEID, TblclienteTableMap::COL_CODIGO, TblclienteTableMap::COL_NOMBRE, TblclienteTableMap::COL_DIRECCION, TblclienteTableMap::COL_TELEFONO, TblclienteTableMap::COL_CIUDADID, ),
        self::TYPE_FIELDNAME     => array('clienteId', 'codigo', 'nombre', 'direccion', 'telefono', 'ciudadId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Clienteid' => 0, 'Codigo' => 1, 'Nombre' => 2, 'Direccion' => 3, 'Telefono' => 4, 'Ciudadid' => 5, ),
        self::TYPE_CAMELNAME     => array('clienteid' => 0, 'codigo' => 1, 'nombre' => 2, 'direccion' => 3, 'telefono' => 4, 'ciudadid' => 5, ),
        self::TYPE_COLNAME       => array(TblclienteTableMap::COL_CLIENTEID => 0, TblclienteTableMap::COL_CODIGO => 1, TblclienteTableMap::COL_NOMBRE => 2, TblclienteTableMap::COL_DIRECCION => 3, TblclienteTableMap::COL_TELEFONO => 4, TblclienteTableMap::COL_CIUDADID => 5, ),
        self::TYPE_FIELDNAME     => array('clienteId' => 0, 'codigo' => 1, 'nombre' => 2, 'direccion' => 3, 'telefono' => 4, 'ciudadId' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('tblcliente');
        $this->setPhpName('Tblcliente');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\propel\\propel\\Tblcliente');
        $this->setPackage('propel.propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('clienteId', 'Clienteid', 'BIGINT', true, null, null);
        $this->addColumn('codigo', 'Codigo', 'VARCHAR', true, 50, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 300, null);
        $this->addColumn('direccion', 'Direccion', 'VARCHAR', true, 150, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', true, 150, null);
        $this->addColumn('ciudadId', 'Ciudadid', 'INTEGER', true, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblfactura', '\\propel\\propel\\Tblfactura', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':clienteId',
    1 => ':clienteId',
  ),
), null, null, 'Tblfacturas', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TblclienteTableMap::CLASS_DEFAULT : TblclienteTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Tblcliente object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblclienteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblclienteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblclienteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblclienteTableMap::OM_CLASS;
            /** @var Tblcliente $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblclienteTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TblclienteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblclienteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblcliente $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblclienteTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TblclienteTableMap::COL_CLIENTEID);
            $criteria->addSelectColumn(TblclienteTableMap::COL_CODIGO);
            $criteria->addSelectColumn(TblclienteTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(TblclienteTableMap::COL_DIRECCION);
            $criteria->addSelectColumn(TblclienteTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(TblclienteTableMap::COL_CIUDADID);
        } else {
            $criteria->addSelectColumn($alias . '.clienteId');
            $criteria->addSelectColumn($alias . '.codigo');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.direccion');
            $criteria->addSelectColumn($alias . '.telefono');
            $criteria->addSelectColumn($alias . '.ciudadId');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TblclienteTableMap::DATABASE_NAME)->getTable(TblclienteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblclienteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblclienteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblclienteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblcliente or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblcliente object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \propel\propel\Tblcliente) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblclienteTableMap::DATABASE_NAME);
            $criteria->add(TblclienteTableMap::COL_CLIENTEID, (array) $values, Criteria::IN);
        }

        $query = TblclienteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblclienteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblclienteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblcliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblclienteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblcliente or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblcliente object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblcliente object
        }

        if ($criteria->containsKey(TblclienteTableMap::COL_CLIENTEID) && $criteria->keyContainsValue(TblclienteTableMap::COL_CLIENTEID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblclienteTableMap::COL_CLIENTEID.')');
        }


        // Set the correct dbName
        $query = TblclienteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblclienteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblclienteTableMap::buildTableMap();
