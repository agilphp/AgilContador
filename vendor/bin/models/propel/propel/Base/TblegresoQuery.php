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
use propel\propel\Tblegreso as ChildTblegreso;
use propel\propel\TblegresoQuery as ChildTblegresoQuery;
use propel\propel\Map\TblegresoTableMap;

/**
 * Base class that represents a query for the 'tblegreso' table.
 *
 *
 *
 * @method     ChildTblegresoQuery orderByEgresoid($order = Criteria::ASC) Order by the egresoId column
 * @method     ChildTblegresoQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     ChildTblegresoQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ChildTblegresoQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 *
 * @method     ChildTblegresoQuery groupByEgresoid() Group by the egresoId column
 * @method     ChildTblegresoQuery groupByNumero() Group by the numero column
 * @method     ChildTblegresoQuery groupByFecha() Group by the fecha column
 * @method     ChildTblegresoQuery groupByComentario() Group by the comentario column
 *
 * @method     ChildTblegresoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblegresoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblegresoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblegresoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblegresoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblegresoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblegresoQuery leftJoinTblegresodetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblegresodetalle relation
 * @method     ChildTblegresoQuery rightJoinTblegresodetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblegresodetalle relation
 * @method     ChildTblegresoQuery innerJoinTblegresodetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblegresodetalle relation
 *
 * @method     ChildTblegresoQuery joinWithTblegresodetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblegresodetalle relation
 *
 * @method     ChildTblegresoQuery leftJoinWithTblegresodetalle() Adds a LEFT JOIN clause and with to the query using the Tblegresodetalle relation
 * @method     ChildTblegresoQuery rightJoinWithTblegresodetalle() Adds a RIGHT JOIN clause and with to the query using the Tblegresodetalle relation
 * @method     ChildTblegresoQuery innerJoinWithTblegresodetalle() Adds a INNER JOIN clause and with to the query using the Tblegresodetalle relation
 *
 * @method     \propel\propel\TblegresodetalleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblegreso findOne(ConnectionInterface $con = null) Return the first ChildTblegreso matching the query
 * @method     ChildTblegreso findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblegreso matching the query, or a new ChildTblegreso object populated from the query conditions when no match is found
 *
 * @method     ChildTblegreso findOneByEgresoid(string $egresoId) Return the first ChildTblegreso filtered by the egresoId column
 * @method     ChildTblegreso findOneByNumero(int $numero) Return the first ChildTblegreso filtered by the numero column
 * @method     ChildTblegreso findOneByFecha(string $fecha) Return the first ChildTblegreso filtered by the fecha column
 * @method     ChildTblegreso findOneByComentario(string $comentario) Return the first ChildTblegreso filtered by the comentario column *

 * @method     ChildTblegreso requirePk($key, ConnectionInterface $con = null) Return the ChildTblegreso by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegreso requireOne(ConnectionInterface $con = null) Return the first ChildTblegreso matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblegreso requireOneByEgresoid(string $egresoId) Return the first ChildTblegreso filtered by the egresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegreso requireOneByNumero(int $numero) Return the first ChildTblegreso filtered by the numero column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegreso requireOneByFecha(string $fecha) Return the first ChildTblegreso filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblegreso requireOneByComentario(string $comentario) Return the first ChildTblegreso filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblegreso[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblegreso objects based on current ModelCriteria
 * @method     ChildTblegreso[]|ObjectCollection findByEgresoid(string $egresoId) Return ChildTblegreso objects filtered by the egresoId column
 * @method     ChildTblegreso[]|ObjectCollection findByNumero(int $numero) Return ChildTblegreso objects filtered by the numero column
 * @method     ChildTblegreso[]|ObjectCollection findByFecha(string $fecha) Return ChildTblegreso objects filtered by the fecha column
 * @method     ChildTblegreso[]|ObjectCollection findByComentario(string $comentario) Return ChildTblegreso objects filtered by the comentario column
 * @method     ChildTblegreso[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblegresoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblegresoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblegreso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblegresoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblegresoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblegresoQuery) {
            return $criteria;
        }
        $query = new ChildTblegresoQuery();
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
     * @return ChildTblegreso|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblegresoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblegresoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblegreso A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT egresoId, numero, fecha, comentario FROM tblegreso WHERE egresoId = :p0';
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
            /** @var ChildTblegreso $obj */
            $obj = new ChildTblegreso();
            $obj->hydrate($row);
            TblegresoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblegreso|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $keys, Criteria::IN);
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
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByEgresoid($egresoid = null, $comparison = null)
    {
        if (is_array($egresoid)) {
            $useMinMax = false;
            if (isset($egresoid['min'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $egresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($egresoid['max'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $egresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $egresoid, $comparison);
    }

    /**
     * Filter the query on the numero column
     *
     * Example usage:
     * <code>
     * $query->filterByNumero(1234); // WHERE numero = 1234
     * $query->filterByNumero(array(12, 34)); // WHERE numero IN (12, 34)
     * $query->filterByNumero(array('min' => 12)); // WHERE numero > 12
     * </code>
     *
     * @param     mixed $numero The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByNumero($numero = null, $comparison = null)
    {
        if (is_array($numero)) {
            $useMinMax = false;
            if (isset($numero['min'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_NUMERO, $numero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numero['max'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_NUMERO, $numero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresoTableMap::COL_NUMERO, $numero, $comparison);
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
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(TblegresoTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresoTableMap::COL_FECHA, $fecha, $comparison);
    }

    /**
     * Filter the query on the comentario column
     *
     * Example usage:
     * <code>
     * $query->filterByComentario('fooValue');   // WHERE comentario = 'fooValue'
     * $query->filterByComentario('%fooValue%', Criteria::LIKE); // WHERE comentario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentario The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblegresoTableMap::COL_COMENTARIO, $comentario, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblegresodetalle object
     *
     * @param \propel\propel\Tblegresodetalle|ObjectCollection $tblegresodetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblegresoQuery The current query, for fluid interface
     */
    public function filterByTblegresodetalle($tblegresodetalle, $comparison = null)
    {
        if ($tblegresodetalle instanceof \propel\propel\Tblegresodetalle) {
            return $this
                ->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $tblegresodetalle->getTblegresoEgresoid(), $comparison);
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
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildTblegreso $tblegreso Object to remove from the list of results
     *
     * @return $this|ChildTblegresoQuery The current query, for fluid interface
     */
    public function prune($tblegreso = null)
    {
        if ($tblegreso) {
            $this->addUsingAlias(TblegresoTableMap::COL_EGRESOID, $tblegreso->getEgresoid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblegreso table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblegresoTableMap::clearInstancePool();
            TblegresoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblegresoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblegresoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblegresoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblegresoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblegresoQuery
