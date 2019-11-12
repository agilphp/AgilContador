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
use propel\propel\Tblingreso as ChildTblingreso;
use propel\propel\TblingresoQuery as ChildTblingresoQuery;
use propel\propel\Map\TblingresoTableMap;

/**
 * Base class that represents a query for the 'tblingreso' table.
 *
 *
 *
 * @method     ChildTblingresoQuery orderByIngresoid($order = Criteria::ASC) Order by the ingresoId column
 * @method     ChildTblingresoQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     ChildTblingresoQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ChildTblingresoQuery orderByComentario($order = Criteria::ASC) Order by the comentario column
 *
 * @method     ChildTblingresoQuery groupByIngresoid() Group by the ingresoId column
 * @method     ChildTblingresoQuery groupByNumero() Group by the numero column
 * @method     ChildTblingresoQuery groupByFecha() Group by the fecha column
 * @method     ChildTblingresoQuery groupByComentario() Group by the comentario column
 *
 * @method     ChildTblingresoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblingresoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblingresoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblingresoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblingresoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblingresoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblingresoQuery leftJoinTblingresodetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblingresodetalle relation
 * @method     ChildTblingresoQuery rightJoinTblingresodetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblingresodetalle relation
 * @method     ChildTblingresoQuery innerJoinTblingresodetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblingresodetalle relation
 *
 * @method     ChildTblingresoQuery joinWithTblingresodetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblingresodetalle relation
 *
 * @method     ChildTblingresoQuery leftJoinWithTblingresodetalle() Adds a LEFT JOIN clause and with to the query using the Tblingresodetalle relation
 * @method     ChildTblingresoQuery rightJoinWithTblingresodetalle() Adds a RIGHT JOIN clause and with to the query using the Tblingresodetalle relation
 * @method     ChildTblingresoQuery innerJoinWithTblingresodetalle() Adds a INNER JOIN clause and with to the query using the Tblingresodetalle relation
 *
 * @method     \propel\propel\TblingresodetalleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblingreso findOne(ConnectionInterface $con = null) Return the first ChildTblingreso matching the query
 * @method     ChildTblingreso findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblingreso matching the query, or a new ChildTblingreso object populated from the query conditions when no match is found
 *
 * @method     ChildTblingreso findOneByIngresoid(string $ingresoId) Return the first ChildTblingreso filtered by the ingresoId column
 * @method     ChildTblingreso findOneByNumero(int $numero) Return the first ChildTblingreso filtered by the numero column
 * @method     ChildTblingreso findOneByFecha(string $fecha) Return the first ChildTblingreso filtered by the fecha column
 * @method     ChildTblingreso findOneByComentario(string $comentario) Return the first ChildTblingreso filtered by the comentario column *

 * @method     ChildTblingreso requirePk($key, ConnectionInterface $con = null) Return the ChildTblingreso by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingreso requireOne(ConnectionInterface $con = null) Return the first ChildTblingreso matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblingreso requireOneByIngresoid(string $ingresoId) Return the first ChildTblingreso filtered by the ingresoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingreso requireOneByNumero(int $numero) Return the first ChildTblingreso filtered by the numero column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingreso requireOneByFecha(string $fecha) Return the first ChildTblingreso filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblingreso requireOneByComentario(string $comentario) Return the first ChildTblingreso filtered by the comentario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblingreso[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblingreso objects based on current ModelCriteria
 * @method     ChildTblingreso[]|ObjectCollection findByIngresoid(string $ingresoId) Return ChildTblingreso objects filtered by the ingresoId column
 * @method     ChildTblingreso[]|ObjectCollection findByNumero(int $numero) Return ChildTblingreso objects filtered by the numero column
 * @method     ChildTblingreso[]|ObjectCollection findByFecha(string $fecha) Return ChildTblingreso objects filtered by the fecha column
 * @method     ChildTblingreso[]|ObjectCollection findByComentario(string $comentario) Return ChildTblingreso objects filtered by the comentario column
 * @method     ChildTblingreso[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblingresoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblingresoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblingreso', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblingresoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblingresoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblingresoQuery) {
            return $criteria;
        }
        $query = new ChildTblingresoQuery();
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
     * @return ChildTblingreso|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblingresoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblingresoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblingreso A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ingresoId, numero, fecha, comentario FROM tblingreso WHERE ingresoId = :p0';
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
            /** @var ChildTblingreso $obj */
            $obj = new ChildTblingreso();
            $obj->hydrate($row);
            TblingresoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblingreso|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $keys, Criteria::IN);
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByIngresoid($ingresoid = null, $comparison = null)
    {
        if (is_array($ingresoid)) {
            $useMinMax = false;
            if (isset($ingresoid['min'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $ingresoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ingresoid['max'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $ingresoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $ingresoid, $comparison);
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByNumero($numero = null, $comparison = null)
    {
        if (is_array($numero)) {
            $useMinMax = false;
            if (isset($numero['min'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_NUMERO, $numero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numero['max'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_NUMERO, $numero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresoTableMap::COL_NUMERO, $numero, $comparison);
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(TblingresoTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresoTableMap::COL_FECHA, $fecha, $comparison);
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByComentario($comentario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentario)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblingresoTableMap::COL_COMENTARIO, $comentario, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblingresodetalle object
     *
     * @param \propel\propel\Tblingresodetalle|ObjectCollection $tblingresodetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblingresoQuery The current query, for fluid interface
     */
    public function filterByTblingresodetalle($tblingresodetalle, $comparison = null)
    {
        if ($tblingresodetalle instanceof \propel\propel\Tblingresodetalle) {
            return $this
                ->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $tblingresodetalle->getTblingresoIngresoid(), $comparison);
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
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildTblingreso $tblingreso Object to remove from the list of results
     *
     * @return $this|ChildTblingresoQuery The current query, for fluid interface
     */
    public function prune($tblingreso = null)
    {
        if ($tblingreso) {
            $this->addUsingAlias(TblingresoTableMap::COL_INGRESOID, $tblingreso->getIngresoid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblingreso table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblingresoTableMap::clearInstancePool();
            TblingresoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblingresoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblingresoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblingresoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblingresoQuery
