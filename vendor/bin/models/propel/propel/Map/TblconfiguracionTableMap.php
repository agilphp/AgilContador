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
use propel\propel\Tblconfiguracion;
use propel\propel\TblconfiguracionQuery;


/**
 * This class defines the structure of the 'tblconfiguracion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblconfiguracionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'propel.propel.Map.TblconfiguracionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tblconfiguracion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\propel\\propel\\Tblconfiguracion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'propel.propel.Tblconfiguracion';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the configuracionId field
     */
    const COL_CONFIGURACIONID = 'tblconfiguracion.configuracionId';

    /**
     * the column name for the nombreEmpresa field
     */
    const COL_NOMBREEMPRESA = 'tblconfiguracion.nombreEmpresa';

    /**
     * the column name for the nit field
     */
    const COL_NIT = 'tblconfiguracion.nit';

    /**
     * the column name for the direccion field
     */
    const COL_DIRECCION = 'tblconfiguracion.direccion';

    /**
     * the column name for the ciudadId field
     */
    const COL_CIUDADID = 'tblconfiguracion.ciudadId';

    /**
     * the column name for the telefono field
     */
    const COL_TELEFONO = 'tblconfiguracion.telefono';

    /**
     * the column name for the actividadEconomica field
     */
    const COL_ACTIVIDADECONOMICA = 'tblconfiguracion.actividadEconomica';

    /**
     * the column name for the regimen field
     */
    const COL_REGIMEN = 'tblconfiguracion.regimen';

    /**
     * the column name for the resolucion field
     */
    const COL_RESOLUCION = 'tblconfiguracion.resolucion';

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
        self::TYPE_PHPNAME       => array('Configuracionid', 'Nombreempresa', 'Nit', 'Direccion', 'Ciudadid', 'Telefono', 'Actividadeconomica', 'Regimen', 'Resolucion', ),
        self::TYPE_CAMELNAME     => array('configuracionid', 'nombreempresa', 'nit', 'direccion', 'ciudadid', 'telefono', 'actividadeconomica', 'regimen', 'resolucion', ),
        self::TYPE_COLNAME       => array(TblconfiguracionTableMap::COL_CONFIGURACIONID, TblconfiguracionTableMap::COL_NOMBREEMPRESA, TblconfiguracionTableMap::COL_NIT, TblconfiguracionTableMap::COL_DIRECCION, TblconfiguracionTableMap::COL_CIUDADID, TblconfiguracionTableMap::COL_TELEFONO, TblconfiguracionTableMap::COL_ACTIVIDADECONOMICA, TblconfiguracionTableMap::COL_REGIMEN, TblconfiguracionTableMap::COL_RESOLUCION, ),
        self::TYPE_FIELDNAME     => array('configuracionId', 'nombreEmpresa', 'nit', 'direccion', 'ciudadId', 'telefono', 'actividadEconomica', 'regimen', 'resolucion', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Configuracionid' => 0, 'Nombreempresa' => 1, 'Nit' => 2, 'Direccion' => 3, 'Ciudadid' => 4, 'Telefono' => 5, 'Actividadeconomica' => 6, 'Regimen' => 7, 'Resolucion' => 8, ),
        self::TYPE_CAMELNAME     => array('configuracionid' => 0, 'nombreempresa' => 1, 'nit' => 2, 'direccion' => 3, 'ciudadid' => 4, 'telefono' => 5, 'actividadeconomica' => 6, 'regimen' => 7, 'resolucion' => 8, ),
        self::TYPE_COLNAME       => array(TblconfiguracionTableMap::COL_CONFIGURACIONID => 0, TblconfiguracionTableMap::COL_NOMBREEMPRESA => 1, TblconfiguracionTableMap::COL_NIT => 2, TblconfiguracionTableMap::COL_DIRECCION => 3, TblconfiguracionTableMap::COL_CIUDADID => 4, TblconfiguracionTableMap::COL_TELEFONO => 5, TblconfiguracionTableMap::COL_ACTIVIDADECONOMICA => 6, TblconfiguracionTableMap::COL_REGIMEN => 7, TblconfiguracionTableMap::COL_RESOLUCION => 8, ),
        self::TYPE_FIELDNAME     => array('configuracionId' => 0, 'nombreEmpresa' => 1, 'nit' => 2, 'direccion' => 3, 'ciudadId' => 4, 'telefono' => 5, 'actividadEconomica' => 6, 'regimen' => 7, 'resolucion' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('tblconfiguracion');
        $this->setPhpName('Tblconfiguracion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\propel\\propel\\Tblconfiguracion');
        $this->setPackage('propel.propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('configuracionId', 'Configuracionid', 'BIGINT', true, null, null);
        $this->addColumn('nombreEmpresa', 'Nombreempresa', 'VARCHAR', false, 250, null);
        $this->addColumn('nit', 'Nit', 'VARCHAR', false, 45, null);
        $this->addColumn('direccion', 'Direccion', 'VARCHAR', false, 250, null);
        $this->addColumn('ciudadId', 'Ciudadid', 'BIGINT', false, null, null);
        $this->addColumn('telefono', 'Telefono', 'VARCHAR', false, 15, null);
        $this->addColumn('actividadEconomica', 'Actividadeconomica', 'VARCHAR', false, 5, null);
        $this->addColumn('regimen', 'Regimen', 'VARCHAR', false, 250, null);
        $this->addColumn('resolucion', 'Resolucion', 'VARCHAR', false, 45, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Configuracionid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblconfiguracionTableMap::CLASS_DEFAULT : TblconfiguracionTableMap::OM_CLASS;
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
     * @return array           (Tblconfiguracion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblconfiguracionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblconfiguracionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblconfiguracionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblconfiguracionTableMap::OM_CLASS;
            /** @var Tblconfiguracion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblconfiguracionTableMap::addInstanceToPool($obj, $key);
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
            $key = TblconfiguracionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblconfiguracionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tblconfiguracion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblconfiguracionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_CONFIGURACIONID);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_NOMBREEMPRESA);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_NIT);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_DIRECCION);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_CIUDADID);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_ACTIVIDADECONOMICA);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_REGIMEN);
            $criteria->addSelectColumn(TblconfiguracionTableMap::COL_RESOLUCION);
        } else {
            $criteria->addSelectColumn($alias . '.configuracionId');
            $criteria->addSelectColumn($alias . '.nombreEmpresa');
            $criteria->addSelectColumn($alias . '.nit');
            $criteria->addSelectColumn($alias . '.direccion');
            $criteria->addSelectColumn($alias . '.ciudadId');
            $criteria->addSelectColumn($alias . '.telefono');
            $criteria->addSelectColumn($alias . '.actividadEconomica');
            $criteria->addSelectColumn($alias . '.regimen');
            $criteria->addSelectColumn($alias . '.resolucion');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblconfiguracionTableMap::DATABASE_NAME)->getTable(TblconfiguracionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblconfiguracionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblconfiguracionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblconfiguracionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tblconfiguracion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tblconfiguracion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblconfiguracionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \propel\propel\Tblconfiguracion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblconfiguracionTableMap::DATABASE_NAME);
            $criteria->add(TblconfiguracionTableMap::COL_CONFIGURACIONID, (array) $values, Criteria::IN);
        }

        $query = TblconfiguracionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblconfiguracionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblconfiguracionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tblconfiguracion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblconfiguracionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tblconfiguracion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tblconfiguracion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblconfiguracionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tblconfiguracion object
        }

        if ($criteria->containsKey(TblconfiguracionTableMap::COL_CONFIGURACIONID) && $criteria->keyContainsValue(TblconfiguracionTableMap::COL_CONFIGURACIONID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblconfiguracionTableMap::COL_CONFIGURACIONID.')');
        }


        // Set the correct dbName
        $query = TblconfiguracionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblconfiguracionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblconfiguracionTableMap::buildTableMap();
