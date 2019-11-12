<?php

namespace propel\propel\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use propel\propel\Tblegresodetalle as ChildTblegresodetalle;
use propel\propel\TblegresodetalleQuery as ChildTblegresodetalleQuery;
use propel\propel\Map\TblegresodetalleTableMap;

/**
 * Base class that represents a query for the 'tblegresodetalle' table.
 *
 *
 *
 * @method     ChildTblegresodetalleQuery orderByEgresodetalleid($order = Criteria::ASC) Order by the egresoDetalleId column
 * @method     ChildTblegresodetalleQuery orderByEgresoid($order = Criteria::ASC) Order by the egresoId column
 * @method     ChildTblegresodetalleQuery orderByProductoid($order = Criteria::ASC) Order by the productoId column
 * @method     ChildTblegresodetalleQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildTblegresodetalleQuery orderByTblegresoEgresoid($order = Criteria::ASC) Order by the TblEgreso_egresoId column
 * @method     ChildTblegresodetalleQuery orderByTblproductosProductoid($order = Criteria::ASC) Order by the TblProductos_productoId column
 *
 * @method     ChildTblegresodetalleQuery groupByEgresodetalleid() Group by the egresoDetalleId column
 * @method     ChildTblegresodetalleQuery groupByEgresoid() Group by the egresoId column
 * @method     ChildTblegresodetalleQuery groupByProductoid() Group by the productoId column
 * @method     ChildTblegresodetalleQuery groupByCantidad() Group by the cantidad column
 * @method     ChildTblegresodetalleQuery groupByTblegresoEgresoid() Group by the TblEgreso_egresoId column
 * @method     ChildTblegresodetalleQuery groupByTblproductosProductoid() Group by the TblProductos_productoId column
 *
 * @method     ChildTblegresodetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblegresodetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblegresodetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblegresodetalleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblegresodetalleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblegresodetalleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblegresodetalleQuery leftJoinTblegreso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblegreso relation
 * @method     ChildTblegresodetalleQuery rightJoinTblegreso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblegreso relation
 * @method     ChildTblegresodetalleQuery innerJoinTblegreso($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblegreso relation
 *
 * @method     ChildTblegresodetalleQuery joinWithTblegreso($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblegreso relation
 *
 * @method     ChildTblegresodetalleQuery leftJoinWithTblegreso() Adds a LEFT JOIN clause and with to the query using the Tblegreso relation
 * @method     ChildTblegresodetalleQuery rightJoinWithTblegreso() Adds a RIGHT JOIN clause and with to the query using the Tblegreso relation
 * @method     ChildTblegresodetalleQuery innerJoinWithTblegreso() Adds a INNER JOIN clause and with to the query using the Tblegreso relation
 *
 * @method     ChildTblegresodetalleQuery leftJoinTblproductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblegresodetalleQuery rightJoinTblproductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblegresodetalleQuery innerJoinTblproductos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductos relation
 *
 * @method     ChildTblegresodetalleQuery joinWithTblproductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblegresodetalleQuery leftJoinWithTblproductos() Adds a LEFT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblegresodetalleQuery rightJoinWithTblproductos() Adds a RIGHT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblegresodetalleQuery innerJoinWithTblproductos() Adds a INNER JOIN clause and with to the query using the Tblproductos relation
 *
 * @method     \propel\propel\TblegresoQuery|\propel\propel\TblproductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblegresodetalle findOne(ConnectionInterface $con = null) Return the first ChildTblegresodetalle matching the query
 * @method     ChildTblegresodetalle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblegresodetalle matching the query, or a new ChildTblegresodetalle object populated from the query conditions when no match is found
 *
 * @method     ChildTblegresodetalle findOneByEgresodetalleid(string $egresoDetalleId) Return the first ChildTblegresodetalle filtered by the egresoDetalleId column
 * @method     ChildTblegresodetalle findOneByEgresoid(string $egresoId) Return the first ChildTblegresodetalle filtered by the egresoId column
 * @method     ChildTblegresodetalle findOneByProductoid(string $productoId) Return the first ChildTblegresodetalle filtered by the productoId column
 * @method     ChildTblegresodetalle findOneByCantidad(string $cantidad) Return the first ChildTblegresodetalle filtered by the cantidad column
 * @method     ChildTblegresodetalle findOneByTblegresoEgresoid(string $TblEgreso_egresoId) Return the first ChildTblegresodetalle filtered by the TblEgreso_egresoId column
 * @method     ChildTblegresodetalle findOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblegresodetalle filtered by the TblProductos_productoId column *

 * @method     ChildTblegresodetalle requirePk($key, ConnectionInterface $con = null) Return the ChildTblegresodetalle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOne(ConnectionInterface $con = null) Return the first ChildTblegresodetalle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblegresodetalle requireOneByEgresodetalleid(string $egresoDetalleId) Return the first ChildTblegresodetalle filtered by the egresoDetalleId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOneByEgresoid(string $egresoId) Return the first ChildTblegresodetalle filtered by the egresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOneByProductoid(string $productoId) Return the first ChildTblegresodetalle filtered by the productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOneByCantidad(string $cantidad) Return the first ChildTblegresodetalle filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOneByTblegresoEgresoid(string $TblEgreso_egresoId) Return the first ChildTblegresodetalle filtered by the TblEgreso_egresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegresodetalle requireOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblegresodetalle filtered by the TblProductos_productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblegresodetalle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblegresodetalle objects based on current ModelCriteria
 * @method     ChildTblegresodetalle[]|ObjectCollection findByEgresodetalleid(string $egresoDetalleId) Return ChildTblegresodetalle objects filtered by the egresoDetalleId column
 * @method     ChildTblegresodetalle[]|ObjectCollection findByEgresoid(string $egresoId) Return ChildTblegresodetalle objects filtered by the egresoId column
 * @method     ChildTblegresodetalle[]|ObjectCollection findByProductoid(string $productoId) Return ChildTblegresodetalle objects filtered by the productoId column
 * @method     ChildTblegresodetalle[]|ObjectCollection findByCantidad(string $cantidad) Return ChildTblegresodetalle objects filtered by the cantidad column
 * @method     ChildTblegresodetalle[]|ObjectCollection findByTblegresoEgresoid(string $TblEgreso_egresoId) Return ChildTblegresodetalle objects filtered by the TblEgreso_egresoId column
 * @method     ChildTblegresodetalle[]|ObjectCollection findByTblproductosProductoid(string $TblProductos_productoId) Return ChildTblegresodetalle objects filtered by the TblProductos_productoId column
 * @method     ChildTblegresodetalle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblegresodetalleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblegresodetalleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblegresodetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblegresodetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblegresodetalleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblegresodetalleQuery) {
            return $criteria;
        }
        $query = new ChildTblegresodetalleQuery();
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
     * @return ChildTblegresodetalle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblegresodetalleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblegresodetalleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblegresodetalle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT egresoDetalleId, egresoId, productoId, cantidad, TblEgreso_egresoId, TblProductos_productoId FROM tblegresodetalle WHERE egresoDetalleId = :p0';
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
            /** @var ChildTblegresodetalle $obj */
            $obj = new ChildTblegresodetalle();
            $obj->hydrate($row);
            TblegresodetalleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblegresodetalle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the egresoDetalleId column
     *
     * Example usage:
     * <code>
     * $query->filterByEgresodetalleid(1234); // WHERE egresoDetalleId = 1234
     * $query->filterByEgresodetalleid(array(12, 34)); // WHERE egresoDetalleId IN (12, 34)
     * $query->filterByEgresodetalleid(array('min' => 12)); // WHERE egresoDetalleId > 12
     * </code>
     *
     * @param     mixed $egresodetalleid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByEgresodetalleid($egresodetalleid = null, $comparison = null)
    {
        if (is_array($egresodetalleid)) {
            $useMinMax = false;
            if (isset($egresodetalleid['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $egresodetalleid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($egresodetalleid['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $egresodetalleid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $egresodetalleid, $comparison);
    }

    /**
     * Filter the query on the egresoId column
     *
     * Example usage:
     * <code>
     * $query->filterByEgresoid(1234); // WHERE egresoId = 1234
     * $query->filterByEgresoid(array(12, 34)); // WHERE egresoId IN (12, 34)
     * $query->filterByEgresoid(array('min' => 12)); // WHERE egresoId > 12
     * </code>
     *
     * @param     mixed $egresoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByEgresoid($egresoid = null, $comparison = null)
    {
        if (is_array($egresoid)) {
            $useMinMax = false;
            if (isset($egresoid['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESOID, $egresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($egresoid['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESOID, $egresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESOID, $egresoid, $comparison);
    }

    /**
     * Filter the query on the productoId column
     *
     * Example usage:
     * <code>
     * $query->filterByProductoid(1234); // WHERE productoId = 1234
     * $query->filterByProductoid(array(12, 34)); // WHERE productoId IN (12, 34)
     * $query->filterByProductoid(array('min' => 12)); // WHERE productoId > 12
     * </code>
     *
     * @param     mixed $productoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByProductoid($productoid = null, $comparison = null)
    {
        if (is_array($productoid)) {
            $useMinMax = false;
            if (isset($productoid['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoid['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_PRODUCTOID, $productoid, $comparison);
    }

    /**
     * Filter the query on the cantidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCantidad(1234); // WHERE cantidad = 1234
     * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
     * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
     * </code>
     *
     * @param     mixed $cantidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_CANTIDAD, $cantidad, $comparison);
    }

    /**
     * Filter the query on the TblEgreso_egresoId column
     *
     * Example usage:
     * <code>
     * $query->filterByTblegresoEgresoid(1234); // WHERE TblEgreso_egresoId = 1234
     * $query->filterByTblegresoEgresoid(array(12, 34)); // WHERE TblEgreso_egresoId IN (12, 34)
     * $query->filterByTblegresoEgresoid(array('min' => 12)); // WHERE TblEgreso_egresoId > 12
     * </code>
     *
     * @see       filterByTblegreso()
     *
     * @param     mixed $tblegresoEgresoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblegresoEgresoid($tblegresoEgresoid = null, $comparison = null)
    {
        if (is_array($tblegresoEgresoid)) {
            $useMinMax = false;
            if (isset($tblegresoEgresoid['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLEGRESO_EGRESOID, $tblegresoEgresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblegresoEgresoid['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLEGRESO_EGRESOID, $tblegresoEgresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLEGRESO_EGRESOID, $tblegresoEgresoid, $comparison);
    }

    /**
     * Filter the query on the TblProductos_productoId column
     *
     * Example usage:
     * <code>
     * $query->filterByTblproductosProductoid(1234); // WHERE TblProductos_productoId = 1234
     * $query->filterByTblproductosProductoid(array(12, 34)); // WHERE TblProductos_productoId IN (12, 34)
     * $query->filterByTblproductosProductoid(array('min' => 12)); // WHERE TblProductos_productoId > 12
     * </code>
     *
     * @see       filterByTblproductos()
     *
     * @param     mixed $tblproductosProductoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductosProductoid($tblproductosProductoid = null, $comparison = null)
    {
        if (is_array($tblproductosProductoid)) {
            $useMinMax = false;
            if (isset($tblproductosProductoid['min'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblproductosProductoid['max'])) {
                $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblegreso object
     *
     * @param \propel\propel\Tblegreso|ObjectCollection $tblegreso The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblegreso($tblegreso, $comparison = null)
    {
        if ($tblegreso instanceof \propel\propel\Tblegreso) {
            return $this
                ->addUsingAlias(TblegresodetalleTableMap::COL_TBLEGRESO_EGRESOID, $tblegreso->getEgresoid(), $comparison);
        } elseif ($tblegreso instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblegresodetalleTableMap::COL_TBLEGRESO_EGRESOID, $tblegreso->toKeyValue('PrimaryKey', 'Egresoid'), $comparison);
        } else {
            throw new PropelException('filterByTblegreso() only accepts arguments of type \propel\propel\Tblegreso or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblegreso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function joinTblegreso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblegreso');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tblegreso');
        }

        return $this;
    }

    /**
     * Use the Tblegreso relation Tblegreso object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblegresoQuery A secondary query class using the current class as primary query
     */
    public function useTblegresoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblegreso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblegreso', '\propel\propel\TblegresoQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductos object
     *
     * @param \propel\propel\Tblproductos|ObjectCollection $tblproductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductos($tblproductos, $comparison = null)
    {
        if ($tblproductos instanceof \propel\propel\Tblproductos) {
            return $this
                ->addUsingAlias(TblegresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->getProductoid(), $comparison);
        } elseif ($tblproductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblegresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->toKeyValue('PrimaryKey', 'Productoid'), $comparison);
        } else {
            throw new PropelException('filterByTblproductos() only accepts arguments of type \propel\propel\Tblproductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblproductos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function joinTblproductos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblproductos');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tblproductos');
        }

        return $this;
    }

    /**
     * Use the Tblproductos relation Tblproductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblproductosQuery A secondary query class using the current class as primary query
     */
    public function useTblproductosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblproductos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblproductos', '\propel\propel\TblproductosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblegresodetalle $tblegresodetalle Object to remove from the list of results
     *
     * @return $this|ChildTblegresodetalleQuery The current query, for fluid interface
     */
    public function prune($tblegresodetalle = null)
    {
        if ($tblegresodetalle) {
            $this->addUsingAlias(TblegresodetalleTableMap::COL_EGRESODETALLEID, $tblegresodetalle->getEgresodetalleid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblegresodetalle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresodetalleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblegresodetalleTableMap::clearInstancePool();
            TblegresodetalleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresodetalleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblegresodetalleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblegresodetalleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblegresodetalleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblegresodetalleQuery
