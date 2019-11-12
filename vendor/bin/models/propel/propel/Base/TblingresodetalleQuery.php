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
use propel\propel\Tblingresodetalle as ChildTblingresodetalle;
use propel\propel\TblingresodetalleQuery as ChildTblingresodetalleQuery;
use propel\propel\Map\TblingresodetalleTableMap;

/**
 * Base class that represents a query for the 'tblingresodetalle' table.
 *
 *
 *
 * @method     ChildTblingresodetalleQuery orderByIngresodetalleid($order = Criteria::ASC) Order by the ingresoDetalleId column
 * @method     ChildTblingresodetalleQuery orderByIngresoid($order = Criteria::ASC) Order by the ingresoId column
 * @method     ChildTblingresodetalleQuery orderByProductoid($order = Criteria::ASC) Order by the productoId column
 * @method     ChildTblingresodetalleQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildTblingresodetalleQuery orderByTblproductosProductoid($order = Criteria::ASC) Order by the TblProductos_productoId column
 * @method     ChildTblingresodetalleQuery orderByTblingresoIngresoid($order = Criteria::ASC) Order by the TblIngreso_ingresoId column
 *
 * @method     ChildTblingresodetalleQuery groupByIngresodetalleid() Group by the ingresoDetalleId column
 * @method     ChildTblingresodetalleQuery groupByIngresoid() Group by the ingresoId column
 * @method     ChildTblingresodetalleQuery groupByProductoid() Group by the productoId column
 * @method     ChildTblingresodetalleQuery groupByCantidad() Group by the cantidad column
 * @method     ChildTblingresodetalleQuery groupByTblproductosProductoid() Group by the TblProductos_productoId column
 * @method     ChildTblingresodetalleQuery groupByTblingresoIngresoid() Group by the TblIngreso_ingresoId column
 *
 * @method     ChildTblingresodetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblingresodetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblingresodetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblingresodetalleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblingresodetalleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblingresodetalleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblingresodetalleQuery leftJoinTblingreso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblingreso relation
 * @method     ChildTblingresodetalleQuery rightJoinTblingreso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblingreso relation
 * @method     ChildTblingresodetalleQuery innerJoinTblingreso($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblingreso relation
 *
 * @method     ChildTblingresodetalleQuery joinWithTblingreso($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblingreso relation
 *
 * @method     ChildTblingresodetalleQuery leftJoinWithTblingreso() Adds a LEFT JOIN clause and with to the query using the Tblingreso relation
 * @method     ChildTblingresodetalleQuery rightJoinWithTblingreso() Adds a RIGHT JOIN clause and with to the query using the Tblingreso relation
 * @method     ChildTblingresodetalleQuery innerJoinWithTblingreso() Adds a INNER JOIN clause and with to the query using the Tblingreso relation
 *
 * @method     ChildTblingresodetalleQuery leftJoinTblproductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblingresodetalleQuery rightJoinTblproductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblingresodetalleQuery innerJoinTblproductos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductos relation
 *
 * @method     ChildTblingresodetalleQuery joinWithTblproductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblingresodetalleQuery leftJoinWithTblproductos() Adds a LEFT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblingresodetalleQuery rightJoinWithTblproductos() Adds a RIGHT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblingresodetalleQuery innerJoinWithTblproductos() Adds a INNER JOIN clause and with to the query using the Tblproductos relation
 *
 * @method     \propel\propel\TblingresoQuery|\propel\propel\TblproductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblingresodetalle findOne(ConnectionInterface $con = null) Return the first ChildTblingresodetalle matching the query
 * @method     ChildTblingresodetalle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblingresodetalle matching the query, or a new ChildTblingresodetalle object populated from the query conditions when no match is found
 *
 * @method     ChildTblingresodetalle findOneByIngresodetalleid(string $ingresoDetalleId) Return the first ChildTblingresodetalle filtered by the ingresoDetalleId column
 * @method     ChildTblingresodetalle findOneByIngresoid(string $ingresoId) Return the first ChildTblingresodetalle filtered by the ingresoId column
 * @method     ChildTblingresodetalle findOneByProductoid(string $productoId) Return the first ChildTblingresodetalle filtered by the productoId column
 * @method     ChildTblingresodetalle findOneByCantidad(string $cantidad) Return the first ChildTblingresodetalle filtered by the cantidad column
 * @method     ChildTblingresodetalle findOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblingresodetalle filtered by the TblProductos_productoId column
 * @method     ChildTblingresodetalle findOneByTblingresoIngresoid(string $TblIngreso_ingresoId) Return the first ChildTblingresodetalle filtered by the TblIngreso_ingresoId column *

 * @method     ChildTblingresodetalle requirePk($key, ConnectionInterface $con = null) Return the ChildTblingresodetalle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOne(ConnectionInterface $con = null) Return the first ChildTblingresodetalle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblingresodetalle requireOneByIngresodetalleid(string $ingresoDetalleId) Return the first ChildTblingresodetalle filtered by the ingresoDetalleId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOneByIngresoid(string $ingresoId) Return the first ChildTblingresodetalle filtered by the ingresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOneByProductoid(string $productoId) Return the first ChildTblingresodetalle filtered by the productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOneByCantidad(string $cantidad) Return the first ChildTblingresodetalle filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblingresodetalle filtered by the TblProductos_productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingresodetalle requireOneByTblingresoIngresoid(string $TblIngreso_ingresoId) Return the first ChildTblingresodetalle filtered by the TblIngreso_ingresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblingresodetalle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblingresodetalle objects based on current ModelCriteria
 * @method     ChildTblingresodetalle[]|ObjectCollection findByIngresodetalleid(string $ingresoDetalleId) Return ChildTblingresodetalle objects filtered by the ingresoDetalleId column
 * @method     ChildTblingresodetalle[]|ObjectCollection findByIngresoid(string $ingresoId) Return ChildTblingresodetalle objects filtered by the ingresoId column
 * @method     ChildTblingresodetalle[]|ObjectCollection findByProductoid(string $productoId) Return ChildTblingresodetalle objects filtered by the productoId column
 * @method     ChildTblingresodetalle[]|ObjectCollection findByCantidad(string $cantidad) Return ChildTblingresodetalle objects filtered by the cantidad column
 * @method     ChildTblingresodetalle[]|ObjectCollection findByTblproductosProductoid(string $TblProductos_productoId) Return ChildTblingresodetalle objects filtered by the TblProductos_productoId column
 * @method     ChildTblingresodetalle[]|ObjectCollection findByTblingresoIngresoid(string $TblIngreso_ingresoId) Return ChildTblingresodetalle objects filtered by the TblIngreso_ingresoId column
 * @method     ChildTblingresodetalle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblingresodetalleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblingresodetalleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblingresodetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblingresodetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblingresodetalleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblingresodetalleQuery) {
            return $criteria;
        }
        $query = new ChildTblingresodetalleQuery();
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
     * @return ChildTblingresodetalle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblingresodetalleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblingresodetalleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblingresodetalle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ingresoDetalleId, ingresoId, productoId, cantidad, TblProductos_productoId, TblIngreso_ingresoId FROM tblingresodetalle WHERE ingresoDetalleId = :p0';
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
            /** @var ChildTblingresodetalle $obj */
            $obj = new ChildTblingresodetalle();
            $obj->hydrate($row);
            TblingresodetalleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblingresodetalle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ingresoDetalleId column
     *
     * Example usage:
     * <code>
     * $query->filterByIngresodetalleid(1234); // WHERE ingresoDetalleId = 1234
     * $query->filterByIngresodetalleid(array(12, 34)); // WHERE ingresoDetalleId IN (12, 34)
     * $query->filterByIngresodetalleid(array('min' => 12)); // WHERE ingresoDetalleId > 12
     * </code>
     *
     * @param     mixed $ingresodetalleid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByIngresodetalleid($ingresodetalleid = null, $comparison = null)
    {
        if (is_array($ingresodetalleid)) {
            $useMinMax = false;
            if (isset($ingresodetalleid['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $ingresodetalleid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ingresodetalleid['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $ingresodetalleid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $ingresodetalleid, $comparison);
    }

    /**
     * Filter the query on the ingresoId column
     *
     * Example usage:
     * <code>
     * $query->filterByIngresoid(1234); // WHERE ingresoId = 1234
     * $query->filterByIngresoid(array(12, 34)); // WHERE ingresoId IN (12, 34)
     * $query->filterByIngresoid(array('min' => 12)); // WHERE ingresoId > 12
     * </code>
     *
     * @param     mixed $ingresoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByIngresoid($ingresoid = null, $comparison = null)
    {
        if (is_array($ingresoid)) {
            $useMinMax = false;
            if (isset($ingresoid['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESOID, $ingresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ingresoid['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESOID, $ingresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESOID, $ingresoid, $comparison);
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
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByProductoid($productoid = null, $comparison = null)
    {
        if (is_array($productoid)) {
            $useMinMax = false;
            if (isset($productoid['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoid['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_PRODUCTOID, $productoid, $comparison);
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
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_CANTIDAD, $cantidad, $comparison);
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
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductosProductoid($tblproductosProductoid = null, $comparison = null)
    {
        if (is_array($tblproductosProductoid)) {
            $useMinMax = false;
            if (isset($tblproductosProductoid['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblproductosProductoid['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid, $comparison);
    }

    /**
     * Filter the query on the TblIngreso_ingresoId column
     *
     * Example usage:
     * <code>
     * $query->filterByTblingresoIngresoid(1234); // WHERE TblIngreso_ingresoId = 1234
     * $query->filterByTblingresoIngresoid(array(12, 34)); // WHERE TblIngreso_ingresoId IN (12, 34)
     * $query->filterByTblingresoIngresoid(array('min' => 12)); // WHERE TblIngreso_ingresoId > 12
     * </code>
     *
     * @see       filterByTblingreso()
     *
     * @param     mixed $tblingresoIngresoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblingresoIngresoid($tblingresoIngresoid = null, $comparison = null)
    {
        if (is_array($tblingresoIngresoid)) {
            $useMinMax = false;
            if (isset($tblingresoIngresoid['min'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLINGRESO_INGRESOID, $tblingresoIngresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblingresoIngresoid['max'])) {
                $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLINGRESO_INGRESOID, $tblingresoIngresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresodetalleTableMap::COL_TBLINGRESO_INGRESOID, $tblingresoIngresoid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblingreso object
     *
     * @param \propel\propel\Tblingreso|ObjectCollection $tblingreso The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblingreso($tblingreso, $comparison = null)
    {
        if ($tblingreso instanceof \propel\propel\Tblingreso) {
            return $this
                ->addUsingAlias(TblingresodetalleTableMap::COL_TBLINGRESO_INGRESOID, $tblingreso->getIngresoid(), $comparison);
        } elseif ($tblingreso instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblingresodetalleTableMap::COL_TBLINGRESO_INGRESOID, $tblingreso->toKeyValue('PrimaryKey', 'Ingresoid'), $comparison);
        } else {
            throw new PropelException('filterByTblingreso() only accepts arguments of type \propel\propel\Tblingreso or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblingreso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function joinTblingreso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblingreso');

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
            $this->addJoinObject($join, 'Tblingreso');
        }

        return $this;
    }

    /**
     * Use the Tblingreso relation Tblingreso object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblingresoQuery A secondary query class using the current class as primary query
     */
    public function useTblingresoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblingreso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblingreso', '\propel\propel\TblingresoQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductos object
     *
     * @param \propel\propel\Tblproductos|ObjectCollection $tblproductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductos($tblproductos, $comparison = null)
    {
        if ($tblproductos instanceof \propel\propel\Tblproductos) {
            return $this
                ->addUsingAlias(TblingresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->getProductoid(), $comparison);
        } elseif ($tblproductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblingresodetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->toKeyValue('PrimaryKey', 'Productoid'), $comparison);
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
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
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
     * @param   ChildTblingresodetalle $tblingresodetalle Object to remove from the list of results
     *
     * @return $this|ChildTblingresodetalleQuery The current query, for fluid interface
     */
    public function prune($tblingresodetalle = null)
    {
        if ($tblingresodetalle) {
            $this->addUsingAlias(TblingresodetalleTableMap::COL_INGRESODETALLEID, $tblingresodetalle->getIngresodetalleid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblingresodetalle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresodetalleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblingresodetalleTableMap::clearInstancePool();
            TblingresodetalleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresodetalleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblingresodetalleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblingresodetalleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblingresodetalleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblingresodetalleQuery
