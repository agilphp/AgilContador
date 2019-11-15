<?php

namespace propel\propel\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use propel\propel\Tblconfiguracion as ChildTblconfiguracion;
use propel\propel\TblconfiguracionQuery as ChildTblconfiguracionQuery;
use propel\propel\Map\TblconfiguracionTableMap;

/**
 * Base class that represents a query for the 'tblconfiguracion' table.
 *
 *
 *
 * @method     ChildTblconfiguracionQuery orderByConfiguracionid($order = Criteria::ASC) Order by the configuracionId column
 * @method     ChildTblconfiguracionQuery orderByNombreempresa($order = Criteria::ASC) Order by the nombreEmpresa column
 * @method     ChildTblconfiguracionQuery orderByNit($order = Criteria::ASC) Order by the nit column
 * @method     ChildTblconfiguracionQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ChildTblconfiguracionQuery orderByCiudadid($order = Criteria::ASC) Order by the ciudadId column
 * @method     ChildTblconfiguracionQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ChildTblconfiguracionQuery orderByActividadeconomica($order = Criteria::ASC) Order by the actividadEconomica column
 * @method     ChildTblconfiguracionQuery orderByRegimen($order = Criteria::ASC) Order by the regimen column
 * @method     ChildTblconfiguracionQuery orderByResolucion($order = Criteria::ASC) Order by the resolucion column
 *
 * @method     ChildTblconfiguracionQuery groupByConfiguracionid() Group by the configuracionId column
 * @method     ChildTblconfiguracionQuery groupByNombreempresa() Group by the nombreEmpresa column
 * @method     ChildTblconfiguracionQuery groupByNit() Group by the nit column
 * @method     ChildTblconfiguracionQuery groupByDireccion() Group by the direccion column
 * @method     ChildTblconfiguracionQuery groupByCiudadid() Group by the ciudadId column
 * @method     ChildTblconfiguracionQuery groupByTelefono() Group by the telefono column
 * @method     ChildTblconfiguracionQuery groupByActividadeconomica() Group by the actividadEconomica column
 * @method     ChildTblconfiguracionQuery groupByRegimen() Group by the regimen column
 * @method     ChildTblconfiguracionQuery groupByResolucion() Group by the resolucion column
 *
 * @method     ChildTblconfiguracionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblconfiguracionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblconfiguracionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblconfiguracionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblconfiguracionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblconfiguracionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblconfiguracion findOne(ConnectionInterface $con = null) Return the first ChildTblconfiguracion matching the query
 * @method     ChildTblconfiguracion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblconfiguracion matching the query, or a new ChildTblconfiguracion object populated from the query conditions when no match is found
 *
 * @method     ChildTblconfiguracion findOneByConfiguracionid(string $configuracionId) Return the first ChildTblconfiguracion filtered by the configuracionId column
 * @method     ChildTblconfiguracion findOneByNombreempresa(string $nombreEmpresa) Return the first ChildTblconfiguracion filtered by the nombreEmpresa column
 * @method     ChildTblconfiguracion findOneByNit(string $nit) Return the first ChildTblconfiguracion filtered by the nit column
 * @method     ChildTblconfiguracion findOneByDireccion(string $direccion) Return the first ChildTblconfiguracion filtered by the direccion column
 * @method     ChildTblconfiguracion findOneByCiudadid(string $ciudadId) Return the first ChildTblconfiguracion filtered by the ciudadId column
 * @method     ChildTblconfiguracion findOneByTelefono(string $telefono) Return the first ChildTblconfiguracion filtered by the telefono column
 * @method     ChildTblconfiguracion findOneByActividadeconomica(string $actividadEconomica) Return the first ChildTblconfiguracion filtered by the actividadEconomica column
 * @method     ChildTblconfiguracion findOneByRegimen(string $regimen) Return the first ChildTblconfiguracion filtered by the regimen column
 * @method     ChildTblconfiguracion findOneByResolucion(string $resolucion) Return the first ChildTblconfiguracion filtered by the resolucion column *

 * @method     ChildTblconfiguracion requirePk($key, ConnectionInterface $con = null) Return the ChildTblconfiguracion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOne(ConnectionInterface $con = null) Return the first ChildTblconfiguracion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblconfiguracion requireOneByConfiguracionid(string $configuracionId) Return the first ChildTblconfiguracion filtered by the configuracionId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByNombreempresa(string $nombreEmpresa) Return the first ChildTblconfiguracion filtered by the nombreEmpresa column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByNit(string $nit) Return the first ChildTblconfiguracion filtered by the nit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByDireccion(string $direccion) Return the first ChildTblconfiguracion filtered by the direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByCiudadid(string $ciudadId) Return the first ChildTblconfiguracion filtered by the ciudadId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByTelefono(string $telefono) Return the first ChildTblconfiguracion filtered by the telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByActividadeconomica(string $actividadEconomica) Return the first ChildTblconfiguracion filtered by the actividadEconomica column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByRegimen(string $regimen) Return the first ChildTblconfiguracion filtered by the regimen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblconfiguracion requireOneByResolucion(string $resolucion) Return the first ChildTblconfiguracion filtered by the resolucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblconfiguracion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblconfiguracion objects based on current ModelCriteria
 * @method     ChildTblconfiguracion[]|ObjectCollection findByConfiguracionid(string $configuracionId) Return ChildTblconfiguracion objects filtered by the configuracionId column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByNombreempresa(string $nombreEmpresa) Return ChildTblconfiguracion objects filtered by the nombreEmpresa column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByNit(string $nit) Return ChildTblconfiguracion objects filtered by the nit column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByDireccion(string $direccion) Return ChildTblconfiguracion objects filtered by the direccion column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByCiudadid(string $ciudadId) Return ChildTblconfiguracion objects filtered by the ciudadId column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByTelefono(string $telefono) Return ChildTblconfiguracion objects filtered by the telefono column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByActividadeconomica(string $actividadEconomica) Return ChildTblconfiguracion objects filtered by the actividadEconomica column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByRegimen(string $regimen) Return ChildTblconfiguracion objects filtered by the regimen column
 * @method     ChildTblconfiguracion[]|ObjectCollection findByResolucion(string $resolucion) Return ChildTblconfiguracion objects filtered by the resolucion column
 * @method     ChildTblconfiguracion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblconfiguracionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblconfiguracionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblconfiguracion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblconfiguracionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblconfiguracionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblconfiguracionQuery) {
            return $criteria;
        }
        $query = new ChildTblconfiguracionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTblconfiguracion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblconfiguracionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblconfiguracionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblconfiguracion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT configuracionId, nombreEmpresa, nit, direccion, ciudadId, telefono, actividadEconomica, regimen, resolucion FROM tblconfiguracion WHERE configuracionId = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTblconfiguracion $obj */
            $obj = new ChildTblconfiguracion();
            $obj->hydrate($row);
            TblconfiguracionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTblconfiguracion|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the configuracionId column
     *
     * Example usage:
     * <code>
     * $query->filterByConfiguracionid(1234); // WHERE configuracionId = 1234
     * $query->filterByConfiguracionid(array(12, 34)); // WHERE configuracionId IN (12, 34)
     * $query->filterByConfiguracionid(array('min' => 12)); // WHERE configuracionId > 12
     * </code>
     *
     * @param     mixed $configuracionid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByConfiguracionid($configuracionid = null, $comparison = null)
    {
        if (is_array($configuracionid)) {
            $useMinMax = false;
            if (isset($configuracionid['min'])) {
                $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $configuracionid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($configuracionid['max'])) {
                $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $configuracionid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $configuracionid, $comparison);
    }

    /**
     * Filter the query on the nombreEmpresa column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreempresa('fooValue');   // WHERE nombreEmpresa = 'fooValue'
     * $query->filterByNombreempresa('%fooValue%', Criteria::LIKE); // WHERE nombreEmpresa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreempresa The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByNombreempresa($nombreempresa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreempresa)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_NOMBREEMPRESA, $nombreempresa, $comparison);
    }

    /**
     * Filter the query on the nit column
     *
     * Example usage:
     * <code>
     * $query->filterByNit('fooValue');   // WHERE nit = 'fooValue'
     * $query->filterByNit('%fooValue%', Criteria::LIKE); // WHERE nit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByNit($nit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_NIT, $nit, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%', Criteria::LIKE); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the ciudadId column
     *
     * Example usage:
     * <code>
     * $query->filterByCiudadid(1234); // WHERE ciudadId = 1234
     * $query->filterByCiudadid(array(12, 34)); // WHERE ciudadId IN (12, 34)
     * $query->filterByCiudadid(array('min' => 12)); // WHERE ciudadId > 12
     * </code>
     *
     * @param     mixed $ciudadid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByCiudadid($ciudadid = null, $comparison = null)
    {
        if (is_array($ciudadid)) {
            $useMinMax = false;
            if (isset($ciudadid['min'])) {
                $this->addUsingAlias(TblconfiguracionTableMap::COL_CIUDADID, $ciudadid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciudadid['max'])) {
                $this->addUsingAlias(TblconfiguracionTableMap::COL_CIUDADID, $ciudadid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_CIUDADID, $ciudadid, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%', Criteria::LIKE); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the actividadEconomica column
     *
     * Example usage:
     * <code>
     * $query->filterByActividadeconomica('fooValue');   // WHERE actividadEconomica = 'fooValue'
     * $query->filterByActividadeconomica('%fooValue%', Criteria::LIKE); // WHERE actividadEconomica LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actividadeconomica The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByActividadeconomica($actividadeconomica = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actividadeconomica)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_ACTIVIDADECONOMICA, $actividadeconomica, $comparison);
    }

    /**
     * Filter the query on the regimen column
     *
     * Example usage:
     * <code>
     * $query->filterByRegimen('fooValue');   // WHERE regimen = 'fooValue'
     * $query->filterByRegimen('%fooValue%', Criteria::LIKE); // WHERE regimen LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regimen The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByRegimen($regimen = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regimen)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_REGIMEN, $regimen, $comparison);
    }

    /**
     * Filter the query on the resolucion column
     *
     * Example usage:
     * <code>
     * $query->filterByResolucion('fooValue');   // WHERE resolucion = 'fooValue'
     * $query->filterByResolucion('%fooValue%', Criteria::LIKE); // WHERE resolucion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resolucion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function filterByResolucion($resolucion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resolucion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblconfiguracionTableMap::COL_RESOLUCION, $resolucion, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblconfiguracion $tblconfiguracion Object to remove from the list of results
     *
     * @return $this|ChildTblconfiguracionQuery The current query, for fluid interface
     */
    public function prune($tblconfiguracion = null)
    {
        if ($tblconfiguracion) {
            $this->addUsingAlias(TblconfiguracionTableMap::COL_CONFIGURACIONID, $tblconfiguracion->getConfiguracionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblconfiguracion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblconfiguracionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblconfiguracionTableMap::clearInstancePool();
            TblconfiguracionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblconfiguracionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblconfiguracionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblconfiguracionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblconfiguracionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblconfiguracionQuery
