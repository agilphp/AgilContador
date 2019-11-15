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
use propel\propel\Tblproductos;
use propel\propel\TblproductosQuery;


/**
 * This class defines the structure of the 'tblproductos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblproductosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'propel.propel.Map.TblproductosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblproductos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\propel\\propel\\Tblproductos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'propel.propel.Tblproductos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the productoId field
     */
    const COL_PRODUCTOID = 'tblproductos.productoId';

    /**
     * the column name for the codigo field
     */
    const COL_CODIGO = 'tblproductos.codigo';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'tblproductos.nombre';

    /**
     * the column name for the lineaId field
     */
    const COL_LINEAID = 'tblproductos.lineaId';

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
        self::TYPE_PHPNAME       => array('Productoid', 'Codigo', 'Nombre', 'Lineaid', ),
        self::TYPE_CAMELNAME     => array('productoid', 'codigo', 'nombre', 'lineaid', ),
        self::TYPE_COLNAME       => array(TblproductosTableMap::COL_PRODUCTOID, TblproductosTableMap::COL_CODIGO, TblproductosTableMap::COL_NOMBRE, TblproductosTableMap::COL_LINEAID, ),
        self::TYPE_FIELDNAME     => array('productoId', 'codigo', 'nombre', 'lineaId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Productoid' => 0, 'Codigo' => 1, 'Nombre' => 2, 'Lineaid' => 3, ),
        self::TYPE_CAMELNAME     => array('productoid' => 0, 'codigo' => 1, 'nombre' => 2, 'lineaid' => 3, ),
        self::TYPE_COLNAME       => array(TblproductosTableMap::COL_PRODUCTOID => 0, TblproductosTableMap::COL_CODIGO => 1, TblproductosTableMap::COL_NOMBRE => 2, TblproductosTableMap::COL_LINEAID => 3, ),
        self::TYPE_FIELDNAME     => array('productoId' => 0, 'codigo' => 1, 'nombre' => 2, 'lineaId' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
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
        $this->setName('tblproductos');
        $this->setPhpName('Tblproductos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\propel\\propel\\Tblproductos');
        $this->setPackage('propel.propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('productoId', 'Productoid', 'BIGINT', true, null, null);
        $this->addColumn('codigo', 'Codigo', 'VARCHAR', false, 45, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', false, 250, null);
        $this->addForeignKey('lineaId', 'Lineaid', 'INTEGER', 'tblcategoria', 'LineaId', false, 5, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblcategoria', '\\propel\\propel\\Tblcategoria', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':lineaId',
    1 => ':LineaId',
  ),
), null, null, null, false);
        $this->addRelation('Tblegresodetalle', '\\propel\\propel\\Tblegresodetalle', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, 'Tblegresodetalles', false);
        $this->addRelation('Tblfacturadetalle', '\\propel\\propel\\Tblfacturadetalle', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, 'Tblfacturadetalles', false);
        $this->addRelation('Tblingresodetalle', '\\propel\\propel\\Tblingresodetalle', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, 'Tblingresodetalles', false);
        $this->addRelation('Tblproductocosto', '\\propel\\propel\\Tblproductocosto', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, 'Tblproductocostos', false);
        $this->addRelation('Tblproductoprecio', '\\propel\\propel\\Tblproductoprecio', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':productoId',
    1 => ':productoId',
  ),
), null, null, 'Tblproductoprecios', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblproductosTableMap::CLASS_DEFAULT : TblproductosTableMap::OM_CLASS;
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
     * @return array           (Tblproductos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblproductosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblproductosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblproductosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblproductosTableMap::OM_CLASS;
            /** @var Tblproductos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblproductosTableMap::addInstanceToPool($obj, $key);
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
            $key = TblproductosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblproductosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblproductos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblproductosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblproductosTableMap::COL_PRODUCTOID);
            $criteria->addSelectColumn(TblproductosTableMap::COL_CODIGO);
            $criteria->addSelectColumn(TblproductosTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(TblproductosTableMap::COL_LINEAID);
        } else {
            $criteria->addSelectColumn($alias . '.productoId');
            $criteria->addSelectColumn($alias . '.codigo');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.lineaId');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblproductosTableMap::DATABASE_NAME)->getTable(TblproductosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblproductosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblproductosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblproductosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblproductos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblproductos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \propel\propel\Tblproductos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblproductosTableMap::DATABASE_NAME);
            $criteria->add(TblproductosTableMap::COL_PRODUCTOID, (array) $values, Criteria::IN);
        }

        $query = TblproductosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblproductosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblproductosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblproductos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblproductosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblproductos or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblproductos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblproductos object
        }

        if ($criteria->containsKey(TblproductosTableMap::COL_PRODUCTOID) && $criteria->keyContainsValue(TblproductosTableMap::COL_PRODUCTOID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblproductosTableMap::COL_PRODUCTOID.')');
        }


        // Set the correct dbName
        $query = TblproductosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblproductosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblproductosTableMap::buildTableMap();
