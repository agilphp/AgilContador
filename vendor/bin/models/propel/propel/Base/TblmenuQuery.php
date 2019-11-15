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
use propel\propel\Tblmenu as ChildTblmenu;
use propel\propel\TblmenuQuery as ChildTblmenuQuery;
use propel\propel\Map\TblmenuTableMap;

/**
 * Base class that represents a query for the 'tblmenu' table.
 *
 *
 *
 * @method     ChildTblmenuQuery orderByMenuid($order = Criteria::ASC) Order by the menuId column
 * @method     ChildTblmenuQuery orderByMenu($order = Criteria::ASC) Order by the menu column
 * @method     ChildTblmenuQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildTblmenuQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 *
 * @method     ChildTblmenuQuery groupByMenuid() Group by the menuId column
 * @method     ChildTblmenuQuery groupByMenu() Group by the menu column
 * @method     ChildTblmenuQuery groupByUrl() Group by the url column
 * @method     ChildTblmenuQuery groupByEstado() Group by the estado column
 *
 * @method     ChildTblmenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblmenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblmenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblmenuQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblmenuQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblmenuQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblmenuQuery leftJoinTblmenuitens($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblmenuitens relation
 * @method     ChildTblmenuQuery rightJoinTblmenuitens($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblmenuitens relation
 * @method     ChildTblmenuQuery innerJoinTblmenuitens($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblmenuitens relation
 *
 * @method     ChildTblmenuQuery joinWithTblmenuitens($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblmenuitens relation
 *
 * @method     ChildTblmenuQuery leftJoinWithTblmenuitens() Adds a LEFT JOIN clause and with to the query using the Tblmenuitens relation
 * @method     ChildTblmenuQuery rightJoinWithTblmenuitens() Adds a RIGHT JOIN clause and with to the query using the Tblmenuitens relation
 * @method     ChildTblmenuQuery innerJoinWithTblmenuitens() Adds a INNER JOIN clause and with to the query using the Tblmenuitens relation
 *
 * @method     ChildTblmenuQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblmenuQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblmenuQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     ChildTblmenuQuery joinWithUsuarios($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Usuarios relation
 *
 * @method     ChildTblmenuQuery leftJoinWithUsuarios() Adds a LEFT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblmenuQuery rightJoinWithUsuarios() Adds a RIGHT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblmenuQuery innerJoinWithUsuarios() Adds a INNER JOIN clause and with to the query using the Usuarios relation
 *
 * @method     \propel\propel\TblmenuitensQuery|\propel\propel\UsuariosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblmenu findOne(ConnectionInterface $con = null) Return the first ChildTblmenu matching the query
 * @method     ChildTblmenu findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblmenu matching the query, or a new ChildTblmenu object populated from the query conditions when no match is found
 *
 * @method     ChildTblmenu findOneByMenuid(int $menuId) Return the first ChildTblmenu filtered by the menuId column
 * @method     ChildTblmenu findOneByMenu(string $menu) Return the first ChildTblmenu filtered by the menu column
 * @method     ChildTblmenu findOneByUrl(string $url) Return the first ChildTblmenu filtered by the url column
 * @method     ChildTblmenu findOneByEstado(string $estado) Return the first ChildTblmenu filtered by the estado column *

 * @method     ChildTblmenu requirePk($key, ConnectionInterface $con = null) Return the ChildTblmenu by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenu requireOne(ConnectionInterface $con = null) Return the first ChildTblmenu matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmenu requireOneByMenuid(int $menuId) Return the first ChildTblmenu filtered by the menuId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenu requireOneByMenu(string $menu) Return the first ChildTblmenu filtered by the menu column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenu requireOneByUrl(string $url) Return the first ChildTblmenu filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblmenu requireOneByEstado(string $estado) Return the first ChildTblmenu filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblmenu[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblmenu objects based on current ModelCriteria
 * @method     ChildTblmenu[]|ObjectCollection findByMenuid(int $menuId) Return ChildTblmenu objects filtered by the menuId column
 * @method     ChildTblmenu[]|ObjectCollection findByMenu(string $menu) Return ChildTblmenu objects filtered by the menu column
 * @method     ChildTblmenu[]|ObjectCollection findByUrl(string $url) Return ChildTblmenu objects filtered by the url column
 * @method     ChildTblmenu[]|ObjectCollection findByEstado(string $estado) Return ChildTblmenu objects filtered by the estado column
 * @method     ChildTblmenu[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblmenuQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblmenuQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblmenu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblmenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblmenuQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblmenuQuery) {
            return $criteria;
        }
        $query = new ChildTblmenuQuery();
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
     * @return ChildTblmenu|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblmenuTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblmenuTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblmenu A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT menuId, menu, url, estado FROM tblmenu WHERE menuId = :p0';
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
            /** @var ChildTblmenu $obj */
            $obj = new ChildTblmenu();
            $obj->hydrate($row);
            TblmenuTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblmenu|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $keys, Criteria::IN);
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
     * @param     mixed $menuid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByMenuid($menuid = null, $comparison = null)
    {
        if (is_array($menuid)) {
            $useMinMax = false;
            if (isset($menuid['min'])) {
                $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $menuid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuid['max'])) {
                $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $menuid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $menuid, $comparison);
    }

    /**
     * Filter the query on the menu column
     *
     * Example usage:
     * <code>
     * $query->filterByMenu('fooValue');   // WHERE menu = 'fooValue'
     * $query->filterByMenu('%fooValue%', Criteria::LIKE); // WHERE menu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menu The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByMenu($menu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menu)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuTableMap::COL_MENU, $menu, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblmenuTableMap::COL_ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblmenuitens object
     *
     * @param \propel\propel\Tblmenuitens|ObjectCollection $tblmenuitens the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByTblmenuitens($tblmenuitens, $comparison = null)
    {
        if ($tblmenuitens instanceof \propel\propel\Tblmenuitens) {
            return $this
                ->addUsingAlias(TblmenuTableMap::COL_MENUID, $tblmenuitens->getMenuid(), $comparison);
        } elseif ($tblmenuitens instanceof ObjectCollection) {
            return $this
                ->useTblmenuitensQuery()
                ->filterByPrimaryKeys($tblmenuitens->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTblmenuitens() only accepts arguments of type \propel\propel\Tblmenuitens or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblmenuitens relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function joinTblmenuitens($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblmenuitens');

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
            $this->addJoinObject($join, 'Tblmenuitens');
        }

        return $this;
    }

    /**
     * Use the Tblmenuitens relation Tblmenuitens object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblmenuitensQuery A secondary query class using the current class as primary query
     */
    public function useTblmenuitensQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblmenuitens($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblmenuitens', '\propel\propel\TblmenuitensQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Usuarios object
     *
     * @param \propel\propel\Usuarios|ObjectCollection $usuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblmenuQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \propel\propel\Usuarios) {
            return $this
                ->addUsingAlias(TblmenuTableMap::COL_MENUID, $usuarios->getMenuid(), $comparison);
        } elseif ($usuarios instanceof ObjectCollection) {
            return $this
                ->useUsuariosQuery()
                ->filterByPrimaryKeys($usuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuarios() only accepts arguments of type \propel\propel\Usuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuarios relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function joinUsuarios($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuarios');

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
            $this->addJoinObject($join, 'Usuarios');
        }

        return $this;
    }

    /**
     * Use the Usuarios relation Usuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\UsuariosQuery A secondary query class using the current class as primary query
     */
    public function useUsuariosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuarios', '\propel\propel\UsuariosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblmenu $tblmenu Object to remove from the list of results
     *
     * @return $this|ChildTblmenuQuery The current query, for fluid interface
     */
    public function prune($tblmenu = null)
    {
        if ($tblmenu) {
            $this->addUsingAlias(TblmenuTableMap::COL_MENUID, $tblmenu->getMenuid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblmenu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblmenuTableMap::clearInstancePool();
            TblmenuTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblmenuTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblmenuTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblmenuTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblmenuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblmenuQuery
