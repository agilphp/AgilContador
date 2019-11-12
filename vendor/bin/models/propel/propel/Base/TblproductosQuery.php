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
use propel\propel\Tblproductos as ChildTblproductos;
use propel\propel\TblproductosQuery as ChildTblproductosQuery;
use propel\propel\Map\TblproductosTableMap;

/**
 * Base class that represents a query for the 'tblproductos' table.
 *
 *
 *
 * @method     ChildTblproductosQuery orderByProductoid($order = Criteria::ASC) Order by the productoId column
 * @method     ChildTblproductosQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ChildTblproductosQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildTblproductosQuery orderByLineaid($order = Criteria::ASC) Order by the lineaId column
 * @method     ChildTblproductosQuery orderByTbllineaLineaid($order = Criteria::ASC) Order by the TblLinea_LineaId column
 *
 * @method     ChildTblproductosQuery groupByProductoid() Group by the productoId column
 * @method     ChildTblproductosQuery groupByCodigo() Group by the codigo column
 * @method     ChildTblproductosQuery groupByNombre() Group by the nombre column
 * @method     ChildTblproductosQuery groupByLineaid() Group by the lineaId column
 * @method     ChildTblproductosQuery groupByTbllineaLineaid() Group by the TblLinea_LineaId column
 *
 * @method     ChildTblproductosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblproductosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblproductosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblproductosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblproductosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblproductosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblproductosQuery leftJoinTbllinea($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tbllinea relation
 * @method     ChildTblproductosQuery rightJoinTbllinea($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tbllinea relation
 * @method     ChildTblproductosQuery innerJoinTbllinea($relationAlias = null) Adds a INNER JOIN clause to the query using the Tbllinea relation
 *
 * @method     ChildTblproductosQuery joinWithTbllinea($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tbllinea relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTbllinea() Adds a LEFT JOIN clause and with to the query using the Tbllinea relation
 * @method     ChildTblproductosQuery rightJoinWithTbllinea() Adds a RIGHT JOIN clause and with to the query using the Tbllinea relation
 * @method     ChildTblproductosQuery innerJoinWithTbllinea() Adds a INNER JOIN clause and with to the query using the Tbllinea relation
 *
 * @method     ChildTblproductosQuery leftJoinTblegresodetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblegresodetalle relation
 * @method     ChildTblproductosQuery rightJoinTblegresodetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblegresodetalle relation
 * @method     ChildTblproductosQuery innerJoinTblegresodetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblegresodetalle relation
 *
 * @method     ChildTblproductosQuery joinWithTblegresodetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblegresodetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTblegresodetalle() Adds a LEFT JOIN clause and with to the query using the Tblegresodetalle relation
 * @method     ChildTblproductosQuery rightJoinWithTblegresodetalle() Adds a RIGHT JOIN clause and with to the query using the Tblegresodetalle relation
 * @method     ChildTblproductosQuery innerJoinWithTblegresodetalle() Adds a INNER JOIN clause and with to the query using the Tblegresodetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinTblfacturadetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfacturadetalle relation
 * @method     ChildTblproductosQuery rightJoinTblfacturadetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfacturadetalle relation
 * @method     ChildTblproductosQuery innerJoinTblfacturadetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfacturadetalle relation
 *
 * @method     ChildTblproductosQuery joinWithTblfacturadetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfacturadetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTblfacturadetalle() Adds a LEFT JOIN clause and with to the query using the Tblfacturadetalle relation
 * @method     ChildTblproductosQuery rightJoinWithTblfacturadetalle() Adds a RIGHT JOIN clause and with to the query using the Tblfacturadetalle relation
 * @method     ChildTblproductosQuery innerJoinWithTblfacturadetalle() Adds a INNER JOIN clause and with to the query using the Tblfacturadetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinTblingresodetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblingresodetalle relation
 * @method     ChildTblproductosQuery rightJoinTblingresodetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblingresodetalle relation
 * @method     ChildTblproductosQuery innerJoinTblingresodetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblingresodetalle relation
 *
 * @method     ChildTblproductosQuery joinWithTblingresodetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblingresodetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTblingresodetalle() Adds a LEFT JOIN clause and with to the query using the Tblingresodetalle relation
 * @method     ChildTblproductosQuery rightJoinWithTblingresodetalle() Adds a RIGHT JOIN clause and with to the query using the Tblingresodetalle relation
 * @method     ChildTblproductosQuery innerJoinWithTblingresodetalle() Adds a INNER JOIN clause and with to the query using the Tblingresodetalle relation
 *
 * @method     ChildTblproductosQuery leftJoinTblproductocosto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductocosto relation
 * @method     ChildTblproductosQuery rightJoinTblproductocosto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductocosto relation
 * @method     ChildTblproductosQuery innerJoinTblproductocosto($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductocosto relation
 *
 * @method     ChildTblproductosQuery joinWithTblproductocosto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductocosto relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTblproductocosto() Adds a LEFT JOIN clause and with to the query using the Tblproductocosto relation
 * @method     ChildTblproductosQuery rightJoinWithTblproductocosto() Adds a RIGHT JOIN clause and with to the query using the Tblproductocosto relation
 * @method     ChildTblproductosQuery innerJoinWithTblproductocosto() Adds a INNER JOIN clause and with to the query using the Tblproductocosto relation
 *
 * @method     ChildTblproductosQuery leftJoinTblproductoprecio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductoprecio relation
 * @method     ChildTblproductosQuery rightJoinTblproductoprecio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductoprecio relation
 * @method     ChildTblproductosQuery innerJoinTblproductoprecio($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductoprecio relation
 *
 * @method     ChildTblproductosQuery joinWithTblproductoprecio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductoprecio relation
 *
 * @method     ChildTblproductosQuery leftJoinWithTblproductoprecio() Adds a LEFT JOIN clause and with to the query using the Tblproductoprecio relation
 * @method     ChildTblproductosQuery rightJoinWithTblproductoprecio() Adds a RIGHT JOIN clause and with to the query using the Tblproductoprecio relation
 * @method     ChildTblproductosQuery innerJoinWithTblproductoprecio() Adds a INNER JOIN clause and with to the query using the Tblproductoprecio relation
 *
 * @method     \propel\propel\TbllineaQuery|\propel\propel\TblegresodetalleQuery|\propel\propel\TblfacturadetalleQuery|\propel\propel\TblingresodetalleQuery|\propel\propel\TblproductocostoQuery|\propel\propel\TblproductoprecioQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblproductos findOne(ConnectionInterface $con = null) Return the first ChildTblproductos matching the query
 * @method     ChildTblproductos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblproductos matching the query, or a new ChildTblproductos object populated from the query conditions when no match is found
 *
 * @method     ChildTblproductos findOneByProductoid(string $productoId) Return the first ChildTblproductos filtered by the productoId column
 * @method     ChildTblproductos findOneByCodigo(string $codigo) Return the first ChildTblproductos filtered by the codigo column
 * @method     ChildTblproductos findOneByNombre(string $nombre) Return the first ChildTblproductos filtered by the nombre column
 * @method     ChildTblproductos findOneByLineaid(int $lineaId) Return the first ChildTblproductos filtered by the lineaId column
 * @method     ChildTblproductos findOneByTbllineaLineaid(int $TblLinea_LineaId) Return the first ChildTblproductos filtered by the TblLinea_LineaId column *

 * @method     ChildTblproductos requirePk($key, ConnectionInterface $con = null) Return the ChildTblproductos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductos requireOne(ConnectionInterface $con = null) Return the first ChildTblproductos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblproductos requireOneByProductoid(string $productoId) Return the first ChildTblproductos filtered by the productoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductos requireOneByCodigo(string $codigo) Return the first ChildTblproductos filtered by the codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductos requireOneByNombre(string $nombre) Return the first ChildTblproductos filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductos requireOneByLineaid(int $lineaId) Return the first ChildTblproductos filtered by the lineaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblproductos requireOneByTbllineaLineaid(int $TblLinea_LineaId) Return the first ChildTblproductos filtered by the TblLinea_LineaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblproductos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblproductos objects based on current ModelCriteria
 * @method     ChildTblproductos[]|ObjectCollection findByProductoid(string $productoId) Return ChildTblproductos objects filtered by the productoId column
 * @method     ChildTblproductos[]|ObjectCollection findByCodigo(string $codigo) Return ChildTblproductos objects filtered by the codigo column
 * @method     ChildTblproductos[]|ObjectCollection findByNombre(string $nombre) Return ChildTblproductos objects filtered by the nombre column
 * @method     ChildTblproductos[]|ObjectCollection findByLineaid(int $lineaId) Return ChildTblproductos objects filtered by the lineaId column
 * @method     ChildTblproductos[]|ObjectCollection findByTbllineaLineaid(int $TblLinea_LineaId) Return ChildTblproductos objects filtered by the TblLinea_LineaId column
 * @method     ChildTblproductos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblproductosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblproductosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblproductos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblproductosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblproductosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblproductosQuery) {
            return $criteria;
        }
        $query = new ChildTblproductosQuery();
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
     * @return ChildTblproductos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblproductosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblproductosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblproductos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT productoId, codigo, nombre, lineaId, TblLinea_LineaId FROM tblproductos WHERE productoId = :p0';
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
            /** @var ChildTblproductos $obj */
            $obj = new ChildTblproductos();
            $obj->hydrate($row);
            TblproductosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblproductos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $keys, Criteria::IN);
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
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByProductoid($productoid = null, $comparison = null)
    {
        if (is_array($productoid)) {
            $useMinMax = false;
            if (isset($productoid['min'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productoid['max'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $productoid, $comparison);
    }

    /**
     * Filter the query on the codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigo('fooValue');   // WHERE codigo = 'fooValue'
     * $query->filterByCodigo('%fooValue%', Criteria::LIKE); // WHERE codigo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductosTableMap::COL_CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductosTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the lineaId column
     *
     * Example usage:
     * <code>
     * $query->filterByLineaid(1234); // WHERE lineaId = 1234
     * $query->filterByLineaid(array(12, 34)); // WHERE lineaId IN (12, 34)
     * $query->filterByLineaid(array('min' => 12)); // WHERE lineaId > 12
     * </code>
     *
     * @param     mixed $lineaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByLineaid($lineaid = null, $comparison = null)
    {
        if (is_array($lineaid)) {
            $useMinMax = false;
            if (isset($lineaid['min'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_LINEAID, $lineaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lineaid['max'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_LINEAID, $lineaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductosTableMap::COL_LINEAID, $lineaid, $comparison);
    }

    /**
     * Filter the query on the TblLinea_LineaId column
     *
     * Example usage:
     * <code>
     * $query->filterByTbllineaLineaid(1234); // WHERE TblLinea_LineaId = 1234
     * $query->filterByTbllineaLineaid(array(12, 34)); // WHERE TblLinea_LineaId IN (12, 34)
     * $query->filterByTbllineaLineaid(array('min' => 12)); // WHERE TblLinea_LineaId > 12
     * </code>
     *
     * @see       filterByTbllinea()
     *
     * @param     mixed $tbllineaLineaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTbllineaLineaid($tbllineaLineaid = null, $comparison = null)
    {
        if (is_array($tbllineaLineaid)) {
            $useMinMax = false;
            if (isset($tbllineaLineaid['min'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_TBLLINEA_LINEAID, $tbllineaLineaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tbllineaLineaid['max'])) {
                $this->addUsingAlias(TblproductosTableMap::COL_TBLLINEA_LINEAID, $tbllineaLineaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblproductosTableMap::COL_TBLLINEA_LINEAID, $tbllineaLineaid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tbllinea object
     *
     * @param \propel\propel\Tbllinea|ObjectCollection $tbllinea The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTbllinea($tbllinea, $comparison = null)
    {
        if ($tbllinea instanceof \propel\propel\Tbllinea) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_TBLLINEA_LINEAID, $tbllinea->getLineaid(), $comparison);
        } elseif ($tbllinea instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblproductosTableMap::COL_TBLLINEA_LINEAID, $tbllinea->toKeyValue('PrimaryKey', 'Lineaid'), $comparison);
        } else {
            throw new PropelException('filterByTbllinea() only accepts arguments of type \propel\propel\Tbllinea or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tbllinea relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTbllinea($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tbllinea');

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
            $this->addJoinObject($join, 'Tbllinea');
        }

        return $this;
    }

    /**
     * Use the Tbllinea relation Tbllinea object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TbllineaQuery A secondary query class using the current class as primary query
     */
    public function useTbllineaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTbllinea($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tbllinea', '\propel\propel\TbllineaQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblegresodetalle object
     *
     * @param \propel\propel\Tblegresodetalle|ObjectCollection $tblegresodetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTblegresodetalle($tblegresodetalle, $comparison = null)
    {
        if ($tblegresodetalle instanceof \propel\propel\Tblegresodetalle) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblegresodetalle->getTblproductosProductoid(), $comparison);
        } elseif ($tblegresodetalle instanceof ObjectCollection) {
            return $this
                ->useTblegresodetalleQuery()
                ->filterByPrimaryKeys($tblegresodetalle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblegresodetalle() only accepts arguments of type \propel\propel\Tblegresodetalle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblegresodetalle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTblegresodetalle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblegresodetalle');

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
            $this->addJoinObject($join, 'Tblegresodetalle');
        }

        return $this;
    }

    /**
     * Use the Tblegresodetalle relation Tblegresodetalle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblegresodetalleQuery A secondary query class using the current class as primary query
     */
    public function useTblegresodetalleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblegresodetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblegresodetalle', '\propel\propel\TblegresodetalleQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblfacturadetalle object
     *
     * @param \propel\propel\Tblfacturadetalle|ObjectCollection $tblfacturadetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTblfacturadetalle($tblfacturadetalle, $comparison = null)
    {
        if ($tblfacturadetalle instanceof \propel\propel\Tblfacturadetalle) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblfacturadetalle->getTblproductosProductoid(), $comparison);
        } elseif ($tblfacturadetalle instanceof ObjectCollection) {
            return $this
                ->useTblfacturadetalleQuery()
                ->filterByPrimaryKeys($tblfacturadetalle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblfacturadetalle() only accepts arguments of type \propel\propel\Tblfacturadetalle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblfacturadetalle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTblfacturadetalle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblfacturadetalle');

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
            $this->addJoinObject($join, 'Tblfacturadetalle');
        }

        return $this;
    }

    /**
     * Use the Tblfacturadetalle relation Tblfacturadetalle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblfacturadetalleQuery A secondary query class using the current class as primary query
     */
    public function useTblfacturadetalleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblfacturadetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblfacturadetalle', '\propel\propel\TblfacturadetalleQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblingresodetalle object
     *
     * @param \propel\propel\Tblingresodetalle|ObjectCollection $tblingresodetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTblingresodetalle($tblingresodetalle, $comparison = null)
    {
        if ($tblingresodetalle instanceof \propel\propel\Tblingresodetalle) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblingresodetalle->getTblproductosProductoid(), $comparison);
        } elseif ($tblingresodetalle instanceof ObjectCollection) {
            return $this
                ->useTblingresodetalleQuery()
                ->filterByPrimaryKeys($tblingresodetalle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblingresodetalle() only accepts arguments of type \propel\propel\Tblingresodetalle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblingresodetalle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTblingresodetalle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblingresodetalle');

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
            $this->addJoinObject($join, 'Tblingresodetalle');
        }

        return $this;
    }

    /**
     * Use the Tblingresodetalle relation Tblingresodetalle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblingresodetalleQuery A secondary query class using the current class as primary query
     */
    public function useTblingresodetalleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblingresodetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblingresodetalle', '\propel\propel\TblingresodetalleQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductocosto object
     *
     * @param \propel\propel\Tblproductocosto|ObjectCollection $tblproductocosto the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTblproductocosto($tblproductocosto, $comparison = null)
    {
        if ($tblproductocosto instanceof \propel\propel\Tblproductocosto) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblproductocosto->getTblproductosProductoid(), $comparison);
        } elseif ($tblproductocosto instanceof ObjectCollection) {
            return $this
                ->useTblproductocostoQuery()
                ->filterByPrimaryKeys($tblproductocosto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblproductocosto() only accepts arguments of type \propel\propel\Tblproductocosto or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblproductocosto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTblproductocosto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblproductocosto');

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
            $this->addJoinObject($join, 'Tblproductocosto');
        }

        return $this;
    }

    /**
     * Use the Tblproductocosto relation Tblproductocosto object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblproductocostoQuery A secondary query class using the current class as primary query
     */
    public function useTblproductocostoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblproductocosto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblproductocosto', '\propel\propel\TblproductocostoQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductoprecio object
     *
     * @param \propel\propel\Tblproductoprecio|ObjectCollection $tblproductoprecio the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblproductosQuery The current query, for fluid interface
     */
    public function filterByTblproductoprecio($tblproductoprecio, $comparison = null)
    {
        if ($tblproductoprecio instanceof \propel\propel\Tblproductoprecio) {
            return $this
                ->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblproductoprecio->getTblproductosProductoid(), $comparison);
        } elseif ($tblproductoprecio instanceof ObjectCollection) {
            return $this
                ->useTblproductoprecioQuery()
                ->filterByPrimaryKeys($tblproductoprecio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblproductoprecio() only accepts arguments of type \propel\propel\Tblproductoprecio or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblproductoprecio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function joinTblproductoprecio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblproductoprecio');

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
            $this->addJoinObject($join, 'Tblproductoprecio');
        }

        return $this;
    }

    /**
     * Use the Tblproductoprecio relation Tblproductoprecio object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblproductoprecioQuery A secondary query class using the current class as primary query
     */
    public function useTblproductoprecioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblproductoprecio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblproductoprecio', '\propel\propel\TblproductoprecioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblproductos $tblproductos Object to remove from the list of results
     *
     * @return $this|ChildTblproductosQuery The current query, for fluid interface
     */
    public function prune($tblproductos = null)
    {
        if ($tblproductos) {
            $this->addUsingAlias(TblproductosTableMap::COL_PRODUCTOID, $tblproductos->getProductoid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblproductos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblproductosTableMap::clearInstancePool();
            TblproductosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblproductosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblproductosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblproductosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblproductosQuery
