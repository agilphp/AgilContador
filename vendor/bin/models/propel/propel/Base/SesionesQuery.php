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
use propel\propel\Sesiones as ChildSesiones;
use propel\propel\SesionesQuery as ChildSesionesQuery;
use propel\propel\Map\SesionesTableMap;

/**
 * Base class that represents a query for the 'sesiones' table.
 *
 *
 *
 * @method     ChildSesionesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSesionesQuery orderBySetTime($order = Criteria::ASC) Order by the set_time column
 * @method     ChildSesionesQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildSesionesQuery orderBySessionKey($order = Criteria::ASC) Order by the session_key column
 *
 * @method     ChildSesionesQuery groupById() Group by the id column
 * @method     ChildSesionesQuery groupBySetTime() Group by the set_time column
 * @method     ChildSesionesQuery groupByData() Group by the data column
 * @method     ChildSesionesQuery groupBySessionKey() Group by the session_key column
 *
 * @method     ChildSesionesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSesionesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSesionesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSesionesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSesionesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSesionesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSesiones findOne(ConnectionInterface $con = null) Return the first ChildSesiones matching the query
 * @method     ChildSesiones findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSesiones matching the query, or a new ChildSesiones object populated from the query conditions when no match is found
 *
 * @method     ChildSesiones findOneById(string $id) Return the first ChildSesiones filtered by the id column
 * @method     ChildSesiones findOneBySetTime(string $set_time) Return the first ChildSesiones filtered by the set_time column
 * @method     ChildSesiones findOneByData(string $data) Return the first ChildSesiones filtered by the data column
 * @method     ChildSesiones findOneBySessionKey(string $session_key) Return the first ChildSesiones filtered by the session_key column *

 * @method     ChildSesiones requirePk($key, ConnectionInterface $con = null) Return the ChildSesiones by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSesiones requireOne(ConnectionInterface $con = null) Return the first ChildSesiones matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSesiones requireOneById(string $id) Return the first ChildSesiones filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSesiones requireOneBySetTime(string $set_time) Return the first ChildSesiones filtered by the set_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSesiones requireOneByData(string $data) Return the first ChildSesiones filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSesiones requireOneBySessionKey(string $session_key) Return the first ChildSesiones filtered by the session_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSesiones[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSesiones objects based on current ModelCriteria
 * @method     ChildSesiones[]|ObjectCollection findById(string $id) Return ChildSesiones objects filtered by the id column
 * @method     ChildSesiones[]|ObjectCollection findBySetTime(string $set_time) Return ChildSesiones objects filtered by the set_time column
 * @method     ChildSesiones[]|ObjectCollection findByData(string $data) Return ChildSesiones objects filtered by the data column
 * @method     ChildSesiones[]|ObjectCollection findBySessionKey(string $session_key) Return ChildSesiones objects filtered by the session_key column
 * @method     ChildSesiones[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SesionesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\SesionesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Sesiones', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSesionesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSesionesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSesionesQuery) {
            return $criteria;
        }
        $query = new ChildSesionesQuery();
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
     * @return ChildSesiones|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SesionesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SesionesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSesiones A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, set_time, data, session_key FROM sesiones WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSesiones $obj */
            $obj = new ChildSesiones();
            $obj->hydrate($row);
            SesionesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSesiones|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SesionesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SesionesTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SesionesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the set_time column
     *
     * Example usage:
     * <code>
     * $query->filterBySetTime('fooValue');   // WHERE set_time = 'fooValue'
     * $query->filterBySetTime('%fooValue%', Criteria::LIKE); // WHERE set_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $setTime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterBySetTime($setTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($setTime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SesionesTableMap::COL_SET_TIME, $setTime, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SesionesTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the session_key column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionKey('fooValue');   // WHERE session_key = 'fooValue'
     * $query->filterBySessionKey('%fooValue%', Criteria::LIKE); // WHERE session_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function filterBySessionKey($sessionKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SesionesTableMap::COL_SESSION_KEY, $sessionKey, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSesiones $sesiones Object to remove from the list of results
     *
     * @return $this|ChildSesionesQuery The current query, for fluid interface
     */
    public function prune($sesiones = null)
    {
        if ($sesiones) {
            $this->addUsingAlias(SesionesTableMap::COL_ID, $sesiones->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sesiones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SesionesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SesionesTableMap::clearInstancePool();
            SesionesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SesionesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SesionesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SesionesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SesionesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SesionesQuery
