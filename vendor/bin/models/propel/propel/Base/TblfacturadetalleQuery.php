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
use propel\propel\Tblfacturadetalle as ChildTblfacturadetalle;
use propel\propel\TblfacturadetalleQuery as ChildTblfacturadetalleQuery;
use propel\propel\Map\TblfacturadetalleTableMap;

/**
 * Base class that represents a query for the 'tblfacturadetalle' table.
 *
 *
 *
 * @method     ChildTblfacturadetalleQuery orderByFacturadetalleid($order = Criteria::ASC) Order by the facturaDetalleId column
 * @method     ChildTblfacturadetalleQuery orderByFacturaid($order = Criteria::ASC) Order by the facturaId column
 * @method     ChildTblfacturadetalleQuery orderByProductoid($order = Criteria::ASC) Order by the productoId column
 * @method     ChildTblfacturadetalleQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildTblfacturadetalleQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ChildTblfacturadetalleQuery orderByTblfacturaFacturaid($order = Criteria::ASC) Order by the tblfactura_facturaId column
 * @method     ChildTblfacturadetalleQuery orderByTblproductosProductoid($order = Criteria::ASC) Order by the TblProductos_productoId column
 *
 * @method     ChildTblfacturadetalleQuery groupByFacturadetalleid() Group by the facturaDetalleId column
 * @method     ChildTblfacturadetalleQuery groupByFacturaid() Group by the facturaId column
 * @method     ChildTblfacturadetalleQuery groupByProductoid() Group by the productoId column
 * @method     ChildTblfacturadetalleQuery groupByCantidad() Group by the cantidad column
 * @method     ChildTblfacturadetalleQuery groupByPrecio() Group by the precio column
 * @method     ChildTblfacturadetalleQuery groupByTblfacturaFacturaid() Group by the tblfactura_facturaId column
 * @method     ChildTblfacturadetalleQuery groupByTblproductosProductoid() Group by the TblProductos_productoId column
 *
 * @method     ChildTblfacturadetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblfacturadetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblfacturadetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblfacturadetalleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblfacturadetalleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblfacturadetalleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblfacturadetalleQuery leftJoinTblproductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblfacturadetalleQuery rightJoinTblproductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblfacturadetalleQuery innerJoinTblproductos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductos relation
 *
 * @method     ChildTblfacturadetalleQuery joinWithTblproductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblfacturadetalleQuery leftJoinWithTblproductos() Adds a LEFT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblfacturadetalleQuery rightJoinWithTblproductos() Adds a RIGHT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblfacturadetalleQuery innerJoinWithTblproductos() Adds a INNER JOIN clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblfacturadetalleQuery leftJoinTblfactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblfacturadetalleQuery rightJoinTblfactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblfacturadetalleQuery innerJoinTblfactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfactura relation
 *
 * @method     ChildTblfacturadetalleQuery joinWithTblfactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfactura relation
 *
 * @method     ChildTblfacturadetalleQuery leftJoinWithTblfactura() Adds a LEFT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblfacturadetalleQuery rightJoinWithTblfactura() Adds a RIGHT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblfacturadetalleQuery innerJoinWithTblfactura() Adds a INNER JOIN clause and with to the query using the Tblfactura relation
 *
 * @method     \propel\propel\TblproductosQuery|\propel\propel\TblfacturaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblfacturadetalle findOne(ConnectionInterface $con = null) Return the first ChildTblfacturadetalle matching the query
 * @method     ChildTblfacturadetalle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblfacturadetalle matching the query, or a new ChildTblfacturadetalle object populated from the query conditions when no match is found
 *
 * @method     ChildTblfacturadetalle findOneByFacturadetalleid(string $facturaDetalleId) Return the first ChildTblfacturadetalle filtered by the facturaDetalleId column
 * @method     ChildTblfacturadetalle findOneByFacturaid(string $facturaId) Return the first ChildTblfacturadetalle filtered by the facturaId column
 * @method     ChildTblfacturadetalle findOneByProductoid(string $productoId) Return the first ChildTblfacturadetalle filtered by the productoId column
 * @method     ChildTblfacturadetalle findOneByCantidad(string $cantidad) Return the first ChildTblfacturadetalle filtered by the cantidad column
 * @method     ChildTblfacturadetalle findOneByPrecio(string $precio) Return the first ChildTblfacturadetalle filtered by the precio column
 * @method     ChildTblfacturadetalle findOneByTblfacturaFacturaid(string $tblfactura_facturaId) Return the first ChildTblfacturadetalle filtered by the tblfactura_facturaId column
 * @method     ChildTblfacturadetalle findOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblfacturadetalle filtered by the TblProductos_productoId column *

 * @method     ChildTblfacturadetalle requirePk($key, ConnectionInterface $con = null) Return the ChildTblfacturadetalle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOne(ConnectionInterface $con = null) Return the first ChildTblfacturadetalle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblfacturadetalle requireOneByFacturadetalleid(string $facturaDetalleId) Return the first ChildTblfacturadetalle filtered by the facturaDetalleId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByFacturaid(string $facturaId) Return the first ChildTblfacturadetalle filtered by the facturaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByProductoid(string $productoId) Return the first ChildTblfacturadetalle filtered by the productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByCantidad(string $cantidad) Return the first ChildTblfacturadetalle filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByPrecio(string $precio) Return the first ChildTblfacturadetalle filtered by the precio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByTblfacturaFacturaid(string $tblfactura_facturaId) Return the first ChildTblfacturadetalle filtered by the tblfactura_facturaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfacturadetalle requireOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblfacturadetalle filtered by the TblProductos_productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblfacturadetalle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblfacturadetalle objects based on current ModelCriteria
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByFacturadetalleid(string $facturaDetalleId) Return ChildTblfacturadetalle objects filtered by the facturaDetalleId column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByFacturaid(string $facturaId) Return ChildTblfacturadetalle objects filtered by the facturaId column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByProductoid(string $productoId) Return ChildTblfacturadetalle objects filtered by the productoId column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByCantidad(string $cantidad) Return ChildTblfacturadetalle objects filtered by the cantidad column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByPrecio(string $precio) Return ChildTblfacturadetalle objects filtered by the precio column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByTblfacturaFacturaid(string $tblfactura_facturaId) Return ChildTblfacturadetalle objects filtered by the tblfactura_facturaId column
 * @method     ChildTblfacturadetalle[]|ObjectCollection findByTblproductosProductoid(string $TblProductos_productoId) Return ChildTblfacturadetalle objects filtered by the TblProductos_productoId column
 * @method     ChildTblfacturadetalle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblfacturadetalleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblfacturadetalleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblfacturadetalle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblfacturadetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblfacturadetalleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblfacturadetalleQuery) {
            return $criteria;
        }
        $query = new ChildTblfacturadetalleQuery();
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
     * @return ChildTblfacturadetalle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblfacturadetalleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblfacturadetalleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblfacturadetalle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT facturaDetalleId, facturaId, productoId, cantidad, precio, tblfactura_facturaId, TblProductos_productoId FROM tblfacturadetalle WHERE facturaDetalleId = :p0';
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
            /** @var ChildTblfacturadetalle $obj */
            $obj = new ChildTblfacturadetalle();
            $obj->hydrate($row);
            TblfacturadetalleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblfacturadetalle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the facturaDetalleId column
     *
     * Example usage:
     * <code>
     * $query->filterByFacturadetalleid(1234); // WHERE facturaDetalleId = 1234
     * $query->filterByFacturadetalleid(array(12, 34)); // WHERE facturaDetalleId IN (12, 34)
     * $query->filterByFacturadetalleid(array('min' => 12)); // WHERE facturaDetalleId > 12
     * </code>
     *
     * @param     mixed $facturadetalleid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByFacturadetalleid($facturadetalleid = null, $comparison = null)
    {
        if (is_array($facturadetalleid)) {
            $useMinMax = false;
            if (isset($facturadetalleid['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $facturadetalleid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($facturadetalleid['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $facturadetalleid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $facturadetalleid, $comparison);
    }

    /**
     * Filter the query on the facturaId column
     *
     * Example usage:
     * <code>
     * $query->filterByFacturaid(1234); // WHERE facturaId = 1234
     * $query->filterByFacturaid(array(12, 34)); // WHERE facturaId IN (12, 34)
     * $query->filterByFacturaid(array('min' => 12)); // WHERE facturaId > 12
     * </code>
     *
     * @param     mixed $facturaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByFacturaid($facturaid = null, $comparison = null)
    {
        if (is_array($facturaid)) {
            $useMinMax = false;
            if (isset($facturaid['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURAID, $facturaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($facturaid['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURAID, $facturaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURAID, $facturaid, $comparison);
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
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByProductoid($productoid = null, $comparison = null)
    {
        if (is_array($productoid)) {
            $useMinMax = false;
            if (isset($productoid['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoid['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRODUCTOID, $productoid, $comparison);
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
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_CANTIDAD, $cantidad, $comparison);
    }

    /**
     * Filter the query on the precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query on the tblfactura_facturaId column
     *
     * Example usage:
     * <code>
     * $query->filterByTblfacturaFacturaid(1234); // WHERE tblfactura_facturaId = 1234
     * $query->filterByTblfacturaFacturaid(array(12, 34)); // WHERE tblfactura_facturaId IN (12, 34)
     * $query->filterByTblfacturaFacturaid(array('min' => 12)); // WHERE tblfactura_facturaId > 12
     * </code>
     *
     * @see       filterByTblfactura()
     *
     * @param     mixed $tblfacturaFacturaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByTblfacturaFacturaid($tblfacturaFacturaid = null, $comparison = null)
    {
        if (is_array($tblfacturaFacturaid)) {
            $useMinMax = false;
            if (isset($tblfacturaFacturaid['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLFACTURA_FACTURAID, $tblfacturaFacturaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblfacturaFacturaid['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLFACTURA_FACTURAID, $tblfacturaFacturaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLFACTURA_FACTURAID, $tblfacturaFacturaid, $comparison);
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
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductosProductoid($tblproductosProductoid = null, $comparison = null)
    {
        if (is_array($tblproductosProductoid)) {
            $useMinMax = false;
            if (isset($tblproductosProductoid['min'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblproductosProductoid['max'])) {
                $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturadetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductos object
     *
     * @param \propel\propel\Tblproductos|ObjectCollection $tblproductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByTblproductos($tblproductos, $comparison = null)
    {
        if ($tblproductos instanceof \propel\propel\Tblproductos) {
            return $this
                ->addUsingAlias(TblfacturadetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->getProductoid(), $comparison);
        } elseif ($tblproductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblfacturadetalleTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->toKeyValue('PrimaryKey', 'Productoid'), $comparison);
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
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
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
     * Filter the query by a related \propel\propel\Tblfactura object
     *
     * @param \propel\propel\Tblfactura|ObjectCollection $tblfactura The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function filterByTblfactura($tblfactura, $comparison = null)
    {
        if ($tblfactura instanceof \propel\propel\Tblfactura) {
            return $this
                ->addUsingAlias(TblfacturadetalleTableMap::COL_TBLFACTURA_FACTURAID, $tblfactura->getFacturaid(), $comparison);
        } elseif ($tblfactura instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblfacturadetalleTableMap::COL_TBLFACTURA_FACTURAID, $tblfactura->toKeyValue('PrimaryKey', 'Facturaid'), $comparison);
        } else {
            throw new PropelException('filterByTblfactura() only accepts arguments of type \propel\propel\Tblfactura or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblfactura relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function joinTblfactura($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblfactura');

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
            $this->addJoinObject($join, 'Tblfactura');
        }

        return $this;
    }

    /**
     * Use the Tblfactura relation Tblfactura object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblfacturaQuery A secondary query class using the current class as primary query
     */
    public function useTblfacturaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblfactura($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblfactura', '\propel\propel\TblfacturaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblfacturadetalle $tblfacturadetalle Object to remove from the list of results
     *
     * @return $this|ChildTblfacturadetalleQuery The current query, for fluid interface
     */
    public function prune($tblfacturadetalle = null)
    {
        if ($tblfacturadetalle) {
            $this->addUsingAlias(TblfacturadetalleTableMap::COL_FACTURADETALLEID, $tblfacturadetalle->getFacturadetalleid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblfacturadetalle table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblfacturadetalleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblfacturadetalleTableMap::clearInstancePool();
            TblfacturadetalleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblfacturadetalleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblfacturadetalleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblfacturadetalleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblfacturadetalleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblfacturadetalleQuery
