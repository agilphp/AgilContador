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
use propel\propel\Tblmetodopago as ChildTblmetodopago;
use propel\propel\TblmetodopagoQuery as ChildTblmetodopagoQuery;
use propel\propel\Map\TblmetodopagoTableMap;

/**
 * Base class that represents a query for the 'tblmetodopago' table.
 *
 *
 *
 * @method     ChildTblmetodopagoQuery orderByMetodopagoid($order = Criteria::ASC) Order by the metodopagoId column
 * @method     ChildTblmetodopagoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildTblmetodopagoQuery orderByDetalle($order = Criteria::ASC) Order by the detalle column
 *
 * @method     ChildTblmetodopagoQuery groupByMetodopagoid() Group by the metodopagoId column
 * @method     ChildTblmetodopagoQuery groupByNombre() Group by the nombre column
 * @method     ChildTblmetodopagoQuery groupByDetalle() Group by the detalle column
 *
 * @method     ChildTblmetodopagoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblmetodopagoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblmetodopagoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblmetodopagoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblmetodopagoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblmetodopagoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblmetodopagoQuery leftJoinTblfactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblmetodopagoQuery rightJoinTblfactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblmetodopagoQuery innerJoinTblfactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfactura relation
 *
 * @method     ChildTblmetodopagoQuery joinWithTblfactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfactura relation
 *
 * @method     ChildTblmetodopagoQuery leftJoinWithTblfactura() Adds a LEFT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblmetodopagoQuery rightJoinWithTblfactura() Adds a RIGHT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblmetodopagoQuery innerJoinWithTblfactura() Adds a INNER JOIN clause and with to the query using the Tblfactura relation
 *
 * @method     \propel\propel\TblfacturaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblmetodopago findOne(ConnectionInterface $con = null) Return the first ChildTblmetodopago matching the query
 * @method     ChildTblmetodopago findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblmetodopago matching the query, or a new ChildTblmetodopago object populated from the query conditions when no match is found
 *
 * @method     ChildTblmetodopago findOneByMetodopagoid(int $metodopagoId) Return the first ChildTblmetodopago filtered by the metodopagoId column
 * @method     ChildTblmetodopago findOneByNombre(string $nombre) Return the first ChildTblmetodopago filtered by the nombre column
 * @method     ChildTblmetodopago findOneByDetalle(string $detalle) Return the first ChildTblmetodopago filtered by the detalle column *

 * @method     ChildTblmetodopago requirePk($key, ConnectionInterface $con = null) Return the ChildTblmetodopago by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmetodopago requireOne(ConnectionInterface $con = null) Return the first ChildTblmetodopago matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmetodopago requireOneByMetodopagoid(int $metodopagoId) Return the first ChildTblmetodopago filtered by the metodopagoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmetodopago requireOneByNombre(string $nombre) Return the first ChildTblmetodopago filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmetodopago requireOneByDetalle(string $detalle) Return the first ChildTblmetodopago filtered by the detalle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmetodopago[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblmetodopago objects based on current ModelCriteria
 * @method     ChildTblmetodopago[]|ObjectCollection findByMetodopagoid(int $metodopagoId) Return ChildTblmetodopago objects filtered by the metodopagoId column
 * @method     ChildTblmetodopago[]|ObjectCollection findByNombre(string $nombre) Return ChildTblmetodopago objects filtered by the nombre column
 * @method     ChildTblmetodopago[]|ObjectCollection findByDetalle(string $detalle) Return ChildTblmetodopago objects filtered by the detalle column
 * @method     ChildTblmetodopago[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblmetodopagoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblmetodopagoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblmetodopago', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblmetodopagoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblmetodopagoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblmetodopagoQuery) {
            return $criteria;
        }
        $query = new ChildTblmetodopagoQuery();
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
     * @return ChildTblmetodopago|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblmetodopagoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblmetodopagoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblmetodopago A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT metodopagoId, nombre, detalle FROM tblmetodopago WHERE metodopagoId = :p0';
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
            /** @var ChildTblmetodopago $obj */
            $obj = new ChildTblmetodopago();
            $obj->hydrate($row);
            TblmetodopagoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblmetodopago|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the metodopagoId column
     *
     * Example usage:
     * <code>
     * $query->filterByMetodopagoid(1234); // WHERE metodopagoId = 1234
     * $query->filterByMetodopagoid(array(12, 34)); // WHERE metodopagoId IN (12, 34)
     * $query->filterByMetodopagoid(array('min' => 12)); // WHERE metodopagoId > 12
     * </code>
     *
     * @param     mixed $metodopagoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByMetodopagoid($metodopagoid = null, $comparison = null)
    {
        if (is_array($metodopagoid)) {
            $useMinMax = false;
            if (isset($metodopagoid['min'])) {
                $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $metodopagoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($metodopagoid['max'])) {
                $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $metodopagoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $metodopagoid, $comparison);
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
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmetodopagoTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalle('fooValue');   // WHERE detalle = 'fooValue'
     * $query->filterByDetalle('%fooValue%', Criteria::LIKE); // WHERE detalle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByDetalle($detalle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmetodopagoTableMap::COL_DETALLE, $detalle, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblfactura object
     *
     * @param \propel\propel\Tblfactura|ObjectCollection $tblfactura the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function filterByTblfactura($tblfactura, $comparison = null)
    {
        if ($tblfactura instanceof \propel\propel\Tblfactura) {
            return $this
                ->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $tblfactura->getMetodopagoid(), $comparison);
        } elseif ($tblfactura instanceof ObjectCollection) {
            return $this
                ->useTblfacturaQuery()
                ->filterByPrimaryKeys($tblfactura->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function joinTblfactura($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTblfacturaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblfactura($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblfactura', '\propel\propel\TblfacturaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblmetodopago $tblmetodopago Object to remove from the list of results
     *
     * @return $this|ChildTblmetodopagoQuery The current query, for fluid interface
     */
    public function prune($tblmetodopago = null)
    {
        if ($tblmetodopago) {
            $this->addUsingAlias(TblmetodopagoTableMap::COL_METODOPAGOID, $tblmetodopago->getMetodopagoid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblmetodopago table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblmetodopagoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblmetodopagoTableMap::clearInstancePool();
            TblmetodopagoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblmetodopagoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblmetodopagoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblmetodopagoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblmetodopagoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblmetodopagoQuery
