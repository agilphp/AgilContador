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
use propel\propel\Tblproductocosto as ChildTblproductocosto;
use propel\propel\TblproductocostoQuery as ChildTblproductocostoQuery;
use propel\propel\Map\TblproductocostoTableMap;

/**
 * Base class that represents a query for the 'tblproductocosto' table.
 *
 *
 *
 * @method     ChildTblproductocostoQuery orderByProductoprecioid($order = Criteria::ASC) Order by the productoPrecioId column
 * @method     ChildTblproductocostoQuery orderByProductoid($order = Criteria::ASC) Order by the productoId column
 * @method     ChildTblproductocostoQuery orderByCosto($order = Criteria::ASC) Order by the costo column
 * @method     ChildTblproductocostoQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ChildTblproductocostoQuery orderByTblproductosProductoid($order = Criteria::ASC) Order by the TblProductos_productoId column
 *
 * @method     ChildTblproductocostoQuery groupByProductoprecioid() Group by the productoPrecioId column
 * @method     ChildTblproductocostoQuery groupByProductoid() Group by the productoId column
 * @method     ChildTblproductocostoQuery groupByCosto() Group by the costo column
 * @method     ChildTblproductocostoQuery groupByFecha() Group by the fecha column
 * @method     ChildTblproductocostoQuery groupByTblproductosProductoid() Group by the TblProductos_productoId column
 *
 * @method     ChildTblproductocostoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblproductocostoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblproductocostoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblproductocostoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblproductocostoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblproductocostoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblproductocostoQuery leftJoinTblproductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblproductocostoQuery rightJoinTblproductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblproductocostoQuery innerJoinTblproductos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductos relation
 *
 * @method     ChildTblproductocostoQuery joinWithTblproductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblproductocostoQuery leftJoinWithTblproductos() Adds a LEFT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblproductocostoQuery rightJoinWithTblproductos() Adds a RIGHT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblproductocostoQuery innerJoinWithTblproductos() Adds a INNER JOIN clause and with to the query using the Tblproductos relation
 *
 * @method     \propel\propel\TblproductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblproductocosto findOne(ConnectionInterface $con = null) Return the first ChildTblproductocosto matching the query
 * @method     ChildTblproductocosto findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblproductocosto matching the query, or a new ChildTblproductocosto object populated from the query conditions when no match is found
 *
 * @method     ChildTblproductocosto findOneByProductoprecioid(string $productoPrecioId) Return the first ChildTblproductocosto filtered by the productoPrecioId column
 * @method     ChildTblproductocosto findOneByProductoid(string $productoId) Return the first ChildTblproductocosto filtered by the productoId column
 * @method     ChildTblproductocosto findOneByCosto(string $costo) Return the first ChildTblproductocosto filtered by the costo column
 * @method     ChildTblproductocosto findOneByFecha(string $fecha) Return the first ChildTblproductocosto filtered by the fecha column
 * @method     ChildTblproductocosto findOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblproductocosto filtered by the TblProductos_productoId column *

 * @method     ChildTblproductocosto requirePk($key, ConnectionInterface $con = null) Return the ChildTblproductocosto by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductocosto requireOne(ConnectionInterface $con = null) Return the first ChildTblproductocosto matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblproductocosto requireOneByProductoprecioid(string $productoPrecioId) Return the first ChildTblproductocosto filtered by the productoPrecioId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductocosto requireOneByProductoid(string $productoId) Return the first ChildTblproductocosto filtered by the productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductocosto requireOneByCosto(string $costo) Return the first ChildTblproductocosto filtered by the costo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductocosto requireOneByFecha(string $fecha) Return the first ChildTblproductocosto filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductocosto requireOneByTblproductosProductoid(string $TblProductos_productoId) Return the first ChildTblproductocosto filtered by the TblProductos_productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblproductocosto[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblproductocosto objects based on current ModelCriteria
 * @method     ChildTblproductocosto[]|ObjectCollection findByProductoprecioid(string $productoPrecioId) Return ChildTblproductocosto objects filtered by the productoPrecioId column
 * @method     ChildTblproductocosto[]|ObjectCollection findByProductoid(string $productoId) Return ChildTblproductocosto objects filtered by the productoId column
 * @method     ChildTblproductocosto[]|ObjectCollection findByCosto(string $costo) Return ChildTblproductocosto objects filtered by the costo column
 * @method     ChildTblproductocosto[]|ObjectCollection findByFecha(string $fecha) Return ChildTblproductocosto objects filtered by the fecha column
 * @method     ChildTblproductocosto[]|ObjectCollection findByTblproductosProductoid(string $TblProductos_productoId) Return ChildTblproductocosto objects filtered by the TblProductos_productoId column
 * @method     ChildTblproductocosto[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblproductocostoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblproductocostoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblproductocosto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblproductocostoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblproductocostoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblproductocostoQuery) {
            return $criteria;
        }
        $query = new ChildTblproductocostoQuery();
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
     * @return ChildTblproductocosto|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblproductocostoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblproductocostoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblproductocosto A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT productoPrecioId, productoId, costo, fecha, TblProductos_productoId FROM tblproductocosto WHERE productoPrecioId = :p0';
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
            /** @var ChildTblproductocosto $obj */
            $obj = new ChildTblproductocosto();
            $obj->hydrate($row);
            TblproductocostoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblproductocosto|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the productoPrecioId column
     *
     * Example usage:
     * <code>
     * $query->filterByProductoprecioid(1234); // WHERE productoPrecioId = 1234
     * $query->filterByProductoprecioid(array(12, 34)); // WHERE productoPrecioId IN (12, 34)
     * $query->filterByProductoprecioid(array('min' => 12)); // WHERE productoPrecioId > 12
     * </code>
     *
     * @param     mixed $productoprecioid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByProductoprecioid($productoprecioid = null, $comparison = null)
    {
        if (is_array($productoprecioid)) {
            $useMinMax = false;
            if (isset($productoprecioid['min'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $productoprecioid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoprecioid['max'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $productoprecioid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $productoprecioid, $comparison);
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
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByProductoid($productoid = null, $comparison = null)
    {
        if (is_array($productoid)) {
            $useMinMax = false;
            if (isset($productoid['min'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoid['max'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOID, $productoid, $comparison);
    }

    /**
     * Filter the query on the costo column
     *
     * Example usage:
     * <code>
     * $query->filterByCosto(1234); // WHERE costo = 1234
     * $query->filterByCosto(array(12, 34)); // WHERE costo IN (12, 34)
     * $query->filterByCosto(array('min' => 12)); // WHERE costo > 12
     * </code>
     *
     * @param     mixed $costo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByCosto($costo = null, $comparison = null)
    {
        if (is_array($costo)) {
            $useMinMax = false;
            if (isset($costo['min'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_COSTO, $costo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costo['max'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_COSTO, $costo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductocostoTableMap::COL_COSTO, $costo, $comparison);
    }

    /**
     * Filter the query on the fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductocostoTableMap::COL_FECHA, $fecha, $comparison);
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
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByTblproductosProductoid($tblproductosProductoid = null, $comparison = null)
    {
        if (is_array($tblproductosProductoid)) {
            $useMinMax = false;
            if (isset($tblproductosProductoid['min'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblproductosProductoid['max'])) {
                $this->addUsingAlias(TblproductocostoTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductocostoTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductosProductoid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductos object
     *
     * @param \propel\propel\Tblproductos|ObjectCollection $tblproductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function filterByTblproductos($tblproductos, $comparison = null)
    {
        if ($tblproductos instanceof \propel\propel\Tblproductos) {
            return $this
                ->addUsingAlias(TblproductocostoTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->getProductoid(), $comparison);
        } elseif ($tblproductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblproductocostoTableMap::COL_TBLPRODUCTOS_PRODUCTOID, $tblproductos->toKeyValue('PrimaryKey', 'Productoid'), $comparison);
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
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
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
     * @param   ChildTblproductocosto $tblproductocosto Object to remove from the list of results
     *
     * @return $this|ChildTblproductocostoQuery The current query, for fluid interface
     */
    public function prune($tblproductocosto = null)
    {
        if ($tblproductocosto) {
            $this->addUsingAlias(TblproductocostoTableMap::COL_PRODUCTOPRECIOID, $tblproductocosto->getProductoprecioid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblproductocosto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductocostoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblproductocostoTableMap::clearInstancePool();
            TblproductocostoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductocostoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblproductocostoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblproductocostoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblproductocostoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblproductocostoQuery
