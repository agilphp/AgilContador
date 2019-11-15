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
use propel\propel\Tblrol as ChildTblrol;
use propel\propel\TblrolQuery as ChildTblrolQuery;
use propel\propel\Map\TblrolTableMap;

/**
 * Base class that represents a query for the 'tblrol' table.
 *
 *
 *
 * @method     ChildTblrolQuery orderByRolid($order = Criteria::ASC) Order by the rolId column
 * @method     ChildTblrolQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildTblrolQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildTblrolQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 *
 * @method     ChildTblrolQuery groupByRolid() Group by the rolId column
 * @method     ChildTblrolQuery groupByNombre() Group by the nombre column
 * @method     ChildTblrolQuery groupByEstado() Group by the estado column
 * @method     ChildTblrolQuery groupByFecha() Group by the fecha column
 *
 * @method     ChildTblrolQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblrolQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblrolQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblrolQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblrolQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblrolQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblrolQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblrolQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblrolQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     ChildTblrolQuery joinWithUsuarios($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Usuarios relation
 *
 * @method     ChildTblrolQuery leftJoinWithUsuarios() Adds a LEFT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblrolQuery rightJoinWithUsuarios() Adds a RIGHT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblrolQuery innerJoinWithUsuarios() Adds a INNER JOIN clause and with to the query using the Usuarios relation
 *
 * @method     \propel\propel\UsuariosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblrol findOne(ConnectionInterface $con = null) Return the first ChildTblrol matching the query
 * @method     ChildTblrol findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblrol matching the query, or a new ChildTblrol object populated from the query conditions when no match is found
 *
 * @method     ChildTblrol findOneByRolid(int $rolId) Return the first ChildTblrol filtered by the rolId column
 * @method     ChildTblrol findOneByNombre(string $nombre) Return the first ChildTblrol filtered by the nombre column
 * @method     ChildTblrol findOneByEstado(string $estado) Return the first ChildTblrol filtered by the estado column
 * @method     ChildTblrol findOneByFecha(string $fecha) Return the first ChildTblrol filtered by the fecha column *

 * @method     ChildTblrol requirePk($key, ConnectionInterface $con = null) Return the ChildTblrol by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblrol requireOne(ConnectionInterface $con = null) Return the first ChildTblrol matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblrol requireOneByRolid(int $rolId) Return the first ChildTblrol filtered by the rolId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblrol requireOneByNombre(string $nombre) Return the first ChildTblrol filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblrol requireOneByEstado(string $estado) Return the first ChildTblrol filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblrol requireOneByFecha(string $fecha) Return the first ChildTblrol filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblrol[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblrol objects based on current ModelCriteria
 * @method     ChildTblrol[]|ObjectCollection findByRolid(int $rolId) Return ChildTblrol objects filtered by the rolId column
 * @method     ChildTblrol[]|ObjectCollection findByNombre(string $nombre) Return ChildTblrol objects filtered by the nombre column
 * @method     ChildTblrol[]|ObjectCollection findByEstado(string $estado) Return ChildTblrol objects filtered by the estado column
 * @method     ChildTblrol[]|ObjectCollection findByFecha(string $fecha) Return ChildTblrol objects filtered by the fecha column
 * @method     ChildTblrol[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblrolQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblrolQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblrol', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblrolQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblrolQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblrolQuery) {
            return $criteria;
        }
        $query = new ChildTblrolQuery();
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
     * @return ChildTblrol|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblrolTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblrolTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblrol A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rolId, nombre, estado, fecha FROM tblrol WHERE rolId = :p0';
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
            /** @var ChildTblrol $obj */
            $obj = new ChildTblrol();
            $obj->hydrate($row);
            TblrolTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblrol|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblrolTableMap::COL_ROLID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblrolTableMap::COL_ROLID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the rolId column
     *
     * Example usage:
     * <code>
     * $query->filterByRolid(1234); // WHERE rolId = 1234
     * $query->filterByRolid(array(12, 34)); // WHERE rolId IN (12, 34)
     * $query->filterByRolid(array('min' => 12)); // WHERE rolId > 12
     * </code>
     *
     * @param     mixed $rolid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByRolid($rolid = null, $comparison = null)
    {
        if (is_array($rolid)) {
            $useMinMax = false;
            if (isset($rolid['min'])) {
                $this->addUsingAlias(TblrolTableMap::COL_ROLID, $rolid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rolid['max'])) {
                $this->addUsingAlias(TblrolTableMap::COL_ROLID, $rolid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblrolTableMap::COL_ROLID, $rolid, $comparison);
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
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblrolTableMap::COL_NOMBRE, $nombre, $comparison);
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
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblrolTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(TblrolTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(TblrolTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblrolTableMap::COL_FECHA, $fecha, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Usuarios object
     *
     * @param \propel\propel\Usuarios|ObjectCollection $usuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblrolQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \propel\propel\Usuarios) {
            return $this
                ->addUsingAlias(TblrolTableMap::COL_ROLID, $usuarios->getRolid(), $comparison);
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
     * @return $this|ChildTblrolQuery The current query, for fluid interface
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
     * @param   ChildTblrol $tblrol Object to remove from the list of results
     *
     * @return $this|ChildTblrolQuery The current query, for fluid interface
     */
    public function prune($tblrol = null)
    {
        if ($tblrol) {
            $this->addUsingAlias(TblrolTableMap::COL_ROLID, $tblrol->getRolid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblrol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblrolTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblrolTableMap::clearInstancePool();
            TblrolTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblrolTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblrolTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblrolTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblrolTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblrolQuery
