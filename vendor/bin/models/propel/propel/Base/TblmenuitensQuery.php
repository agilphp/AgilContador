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
use propel\propel\Tblmenuitens as ChildTblmenuitens;
use propel\propel\TblmenuitensQuery as ChildTblmenuitensQuery;
use propel\propel\Map\TblmenuitensTableMap;

/**
 * Base class that represents a query for the 'tblmenuitens' table.
 *
 *
 *
 * @method     ChildTblmenuitensQuery orderByMenuitensid($order = Criteria::ASC) Order by the menuItensId column
 * @method     ChildTblmenuitensQuery orderByItem($order = Criteria::ASC) Order by the item column
 * @method     ChildTblmenuitensQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildTblmenuitensQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 * @method     ChildTblmenuitensQuery orderByPadre($order = Criteria::ASC) Order by the padre column
 * @method     ChildTblmenuitensQuery orderByMenuid($order = Criteria::ASC) Order by the menuId column
 *
 * @method     ChildTblmenuitensQuery groupByMenuitensid() Group by the menuItensId column
 * @method     ChildTblmenuitensQuery groupByItem() Group by the item column
 * @method     ChildTblmenuitensQuery groupByEstado() Group by the estado column
 * @method     ChildTblmenuitensQuery groupByActivo() Group by the activo column
 * @method     ChildTblmenuitensQuery groupByPadre() Group by the padre column
 * @method     ChildTblmenuitensQuery groupByMenuid() Group by the menuId column
 *
 * @method     ChildTblmenuitensQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblmenuitensQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblmenuitensQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblmenuitensQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblmenuitensQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblmenuitensQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblmenuitensQuery leftJoinTblmenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblmenu relation
 * @method     ChildTblmenuitensQuery rightJoinTblmenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblmenu relation
 * @method     ChildTblmenuitensQuery innerJoinTblmenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblmenu relation
 *
 * @method     ChildTblmenuitensQuery joinWithTblmenu($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblmenu relation
 *
 * @method     ChildTblmenuitensQuery leftJoinWithTblmenu() Adds a LEFT JOIN clause and with to the query using the Tblmenu relation
 * @method     ChildTblmenuitensQuery rightJoinWithTblmenu() Adds a RIGHT JOIN clause and with to the query using the Tblmenu relation
 * @method     ChildTblmenuitensQuery innerJoinWithTblmenu() Adds a INNER JOIN clause and with to the query using the Tblmenu relation
 *
 * @method     \propel\propel\TblmenuQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblmenuitens findOne(ConnectionInterface $con = null) Return the first ChildTblmenuitens matching the query
 * @method     ChildTblmenuitens findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblmenuitens matching the query, or a new ChildTblmenuitens object populated from the query conditions when no match is found
 *
 * @method     ChildTblmenuitens findOneByMenuitensid(string $menuItensId) Return the first ChildTblmenuitens filtered by the menuItensId column
 * @method     ChildTblmenuitens findOneByItem(string $item) Return the first ChildTblmenuitens filtered by the item column
 * @method     ChildTblmenuitens findOneByEstado(string $estado) Return the first ChildTblmenuitens filtered by the estado column
 * @method     ChildTblmenuitens findOneByActivo(string $activo) Return the first ChildTblmenuitens filtered by the activo column
 * @method     ChildTblmenuitens findOneByPadre(string $padre) Return the first ChildTblmenuitens filtered by the padre column
 * @method     ChildTblmenuitens findOneByMenuid(int $menuId) Return the first ChildTblmenuitens filtered by the menuId column *

 * @method     ChildTblmenuitens requirePk($key, ConnectionInterface $con = null) Return the ChildTblmenuitens by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOne(ConnectionInterface $con = null) Return the first ChildTblmenuitens matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmenuitens requireOneByMenuitensid(string $menuItensId) Return the first ChildTblmenuitens filtered by the menuItensId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOneByItem(string $item) Return the first ChildTblmenuitens filtered by the item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOneByEstado(string $estado) Return the first ChildTblmenuitens filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOneByActivo(string $activo) Return the first ChildTblmenuitens filtered by the activo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOneByPadre(string $padre) Return the first ChildTblmenuitens filtered by the padre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenuitens requireOneByMenuid(int $menuId) Return the first ChildTblmenuitens filtered by the menuId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmenuitens[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblmenuitens objects based on current ModelCriteria
 * @method     ChildTblmenuitens[]|ObjectCollection findByMenuitensid(string $menuItensId) Return ChildTblmenuitens objects filtered by the menuItensId column
 * @method     ChildTblmenuitens[]|ObjectCollection findByItem(string $item) Return ChildTblmenuitens objects filtered by the item column
 * @method     ChildTblmenuitens[]|ObjectCollection findByEstado(string $estado) Return ChildTblmenuitens objects filtered by the estado column
 * @method     ChildTblmenuitens[]|ObjectCollection findByActivo(string $activo) Return ChildTblmenuitens objects filtered by the activo column
 * @method     ChildTblmenuitens[]|ObjectCollection findByPadre(string $padre) Return ChildTblmenuitens objects filtered by the padre column
 * @method     ChildTblmenuitens[]|ObjectCollection findByMenuid(int $menuId) Return ChildTblmenuitens objects filtered by the menuId column
 * @method     ChildTblmenuitens[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblmenuitensQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblmenuitensQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblmenuitens', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblmenuitensQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblmenuitensQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblmenuitensQuery) {
            return $criteria;
        }
        $query = new ChildTblmenuitensQuery();
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
     * @return ChildTblmenuitens|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblmenuitensTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblmenuitensTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblmenuitens A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT menuItensId, item, estado, activo, padre, menuId FROM tblmenuitens WHERE menuItensId = :p0';
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
            /** @var ChildTblmenuitens $obj */
            $obj = new ChildTblmenuitens();
            $obj->hydrate($row);
            TblmenuitensTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblmenuitens|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the menuItensId column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuitensid(1234); // WHERE menuItensId = 1234
     * $query->filterByMenuitensid(array(12, 34)); // WHERE menuItensId IN (12, 34)
     * $query->filterByMenuitensid(array('min' => 12)); // WHERE menuItensId > 12
     * </code>
     *
     * @param     mixed $menuitensid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByMenuitensid($menuitensid = null, $comparison = null)
    {
        if (is_array($menuitensid)) {
            $useMinMax = false;
            if (isset($menuitensid['min'])) {
                $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $menuitensid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuitensid['max'])) {
                $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $menuitensid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $menuitensid, $comparison);
    }

    /**
     * Filter the query on the item column
     *
     * Example usage:
     * <code>
     * $query->filterByItem('fooValue');   // WHERE item = 'fooValue'
     * $query->filterByItem('%fooValue%', Criteria::LIKE); // WHERE item LIKE '%fooValue%'
     * </code>
     *
     * @param     string $item The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByItem($item = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($item)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_ITEM, $item, $comparison);
    }

    /**
     * Filter the query on the estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstado('fooValue');   // WHERE estado = 'fooValue'
     * $query->filterByEstado('%fooValue%', Criteria::LIKE); // WHERE estado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query on the activo column
     *
     * Example usage:
     * <code>
     * $query->filterByActivo('fooValue');   // WHERE activo = 'fooValue'
     * $query->filterByActivo('%fooValue%', Criteria::LIKE); // WHERE activo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByActivo($activo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_ACTIVO, $activo, $comparison);
    }

    /**
     * Filter the query on the padre column
     *
     * Example usage:
     * <code>
     * $query->filterByPadre('fooValue');   // WHERE padre = 'fooValue'
     * $query->filterByPadre('%fooValue%', Criteria::LIKE); // WHERE padre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $padre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByPadre($padre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($padre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_PADRE, $padre, $comparison);
    }

    /**
     * Filter the query on the menuId column
     *
     * Example usage:
     * <code>
     * $query->filterByMenuid(1234); // WHERE menuId = 1234
     * $query->filterByMenuid(array(12, 34)); // WHERE menuId IN (12, 34)
     * $query->filterByMenuid(array('min' => 12)); // WHERE menuId > 12
     * </code>
     *
     * @see       filterByTblmenu()
     *
     * @param     mixed $menuid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByMenuid($menuid = null, $comparison = null)
    {
        if (is_array($menuid)) {
            $useMinMax = false;
            if (isset($menuid['min'])) {
                $this->addUsingAlias(TblmenuitensTableMap::COL_MENUID, $menuid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuid['max'])) {
                $this->addUsingAlias(TblmenuitensTableMap::COL_MENUID, $menuid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuitensTableMap::COL_MENUID, $menuid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblmenu object
     *
     * @param \propel\propel\Tblmenu|ObjectCollection $tblmenu The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function filterByTblmenu($tblmenu, $comparison = null)
    {
        if ($tblmenu instanceof \propel\propel\Tblmenu) {
            return $this
                ->addUsingAlias(TblmenuitensTableMap::COL_MENUID, $tblmenu->getMenuid(), $comparison);
        } elseif ($tblmenu instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblmenuitensTableMap::COL_MENUID, $tblmenu->toKeyValue('PrimaryKey', 'Menuid'), $comparison);
        } else {
            throw new PropelException('filterByTblmenu() only accepts arguments of type \propel\propel\Tblmenu or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblmenu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function joinTblmenu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblmenu');

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
            $this->addJoinObject($join, 'Tblmenu');
        }

        return $this;
    }

    /**
     * Use the Tblmenu relation Tblmenu object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblmenuQuery A secondary query class using the current class as primary query
     */
    public function useTblmenuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblmenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblmenu', '\propel\propel\TblmenuQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblmenuitens $tblmenuitens Object to remove from the list of results
     *
     * @return $this|ChildTblmenuitensQuery The current query, for fluid interface
     */
    public function prune($tblmenuitens = null)
    {
        if ($tblmenuitens) {
            $this->addUsingAlias(TblmenuitensTableMap::COL_MENUITENSID, $tblmenuitens->getMenuitensid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblmenuitens table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuitensTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblmenuitensTableMap::clearInstancePool();
            TblmenuitensTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuitensTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblmenuitensTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblmenuitensTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblmenuitensTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblmenuitensQuery
