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
use propel\propel\Tblmenuitens;
use propel\propel\TblmenuitensQuery;


/**
 * This class defines the structure of the 'tblmenuitens' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblmenuitensTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'propel.propel.Map.TblmenuitensTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblmenuitens';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\propel\\propel\\Tblmenuitens';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'propel.propel.Tblmenuitens';

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
     * the column name for the menuItensId field
     */
    const COL_MENUITENSID = 'tblmenuitens.menuItensId';

    /**
     * the column name for the item field
     */
    const COL_ITEM = 'tblmenuitens.item';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'tblmenuitens.estado';

    /**
     * the column name for the activo field
     */
    const COL_ACTIVO = 'tblmenuitens.activo';

    /**
     * the column name for the padre field
     */
    const COL_PADRE = 'tblmenuitens.padre';

    /**
     * the column name for the menuId field
     */
    const COL_MENUID = 'tblmenuitens.menuId';

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
        self::TYPE_PHPNAME       => array('Menuitensid', 'Item', 'Estado', 'Activo', 'Padre', 'Menuid', ),
        self::TYPE_CAMELNAME     => array('menuitensid', 'item', 'estado', 'activo', 'padre', 'menuid', ),
        self::TYPE_COLNAME       => array(TblmenuitensTableMap::COL_MENUITENSID, TblmenuitensTableMap::COL_ITEM, TblmenuitensTableMap::COL_ESTADO, TblmenuitensTableMap::COL_ACTIVO, TblmenuitensTableMap::COL_PADRE, TblmenuitensTableMap::COL_MENUID, ),
        self::TYPE_FIELDNAME     => array('menuItensId', 'item', 'estado', 'activo', 'padre', 'menuId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Menuitensid' => 0, 'Item' => 1, 'Estado' => 2, 'Activo' => 3, 'Padre' => 4, 'Menuid' => 5, ),
        self::TYPE_CAMELNAME     => array('menuitensid' => 0, 'item' => 1, 'estado' => 2, 'activo' => 3, 'padre' => 4, 'menuid' => 5, ),
        self::TYPE_COLNAME       => array(TblmenuitensTableMap::COL_MENUITENSID => 0, TblmenuitensTableMap::COL_ITEM => 1, TblmenuitensTableMap::COL_ESTADO => 2, TblmenuitensTableMap::COL_ACTIVO => 3, TblmenuitensTableMap::COL_PADRE => 4, TblmenuitensTableMap::COL_MENUID => 5, ),
        self::TYPE_FIELDNAME     => array('menuItensId' => 0, 'item' => 1, 'estado' => 2, 'activo' => 3, 'padre' => 4, 'menuId' => 5, ),
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
        $this->setName('tblmenuitens');
        $this->setPhpName('Tblmenuitens');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\propel\\propel\\Tblmenuitens');
        $this->setPackage('propel.propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('menuItensId', 'Menuitensid', 'BIGINT', true, null, null);
        $this->addColumn('item', 'Item', 'VARCHAR', false, 45, null);
        $this->addColumn('estado', 'Estado', 'CHAR', false, null, '1');
        $this->addColumn('activo', 'Activo', 'CHAR', true, null, '0');
        $this->addColumn('padre', 'Padre', 'CHAR', true, null, '0');
        $this->addForeignKey('menuId', 'Menuid', 'INTEGER', 'tblmenu', 'menuId', true, 5, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tblmenu', '\\propel\\propel\\Tblmenu', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':menuId',
    1 => ':menuId',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Menuitensid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblmenuitensTableMap::CLASS_DEFAULT : TblmenuitensTableMap::OM_CLASS;
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
     * @return array           (Tblmenuitens object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblmenuitensTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblmenuitensTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblmenuitensTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblmenuitensTableMap::OM_CLASS;
            /** @var Tblmenuitens $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblmenuitensTableMap::addInstanceToPool($obj, $key);
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
            $key = TblmenuitensTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblmenuitensTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblmenuitens $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblmenuitensTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_MENUITENSID);
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_ITEM);
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_ESTADO);
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_ACTIVO);
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_PADRE);
            $criteria->addSelectColumn(TblmenuitensTableMap::COL_MENUID);
        } else {
            $criteria->addSelectColumn($alias . '.menuItensId');
            $criteria->addSelectColumn($alias . '.item');
            $criteria->addSelectColumn($alias . '.estado');
            $criteria->addSelectColumn($alias . '.activo');
            $criteria->addSelectColumn($alias . '.padre');
            $criteria->addSelectColumn($alias . '.menuId');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblmenuitensTableMap::DATABASE_NAME)->getTable(TblmenuitensTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblmenuitensTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblmenuitensTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblmenuitensTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblmenuitens or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblmenuitens object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuitensTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \propel\propel\Tblmenuitens) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblmenuitensTableMap::DATABASE_NAME);
            $criteria->add(TblmenuitensTableMap::COL_MENUITENSID, (array) $values, Criteria::IN);
        }

        $query = TblmenuitensQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblmenuitensTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblmenuitensTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblmenuitens table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblmenuitensQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblmenuitens or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblmenuitens object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuitensTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblmenuitens object
        }

        if ($criteria->containsKey(TblmenuitensTableMap::COL_MENUITENSID) && $criteria->keyContainsValue(TblmenuitensTableMap::COL_MENUITENSID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblmenuitensTableMap::COL_MENUITENSID.')');
        }


        // Set the correct dbName
        $query = TblmenuitensQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblmenuitensTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblmenuitensTableMap::buildTableMap();
