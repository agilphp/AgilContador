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
use propel\propel\Tblcategoria as ChildTblcategoria;
use propel\propel\TblcategoriaQuery as ChildTblcategoriaQuery;
use propel\propel\Map\TblcategoriaTableMap;

/**
 * Base class that represents a query for the 'tblcategoria' table.
 *
 *
 *
 * @method     ChildTblcategoriaQuery orderByLineaid($order = Criteria::ASC) Order by the LineaId column
 * @method     ChildTblcategoriaQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ChildTblcategoriaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildTblcategoriaQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 *
 * @method     ChildTblcategoriaQuery groupByLineaid() Group by the LineaId column
 * @method     ChildTblcategoriaQuery groupByCodigo() Group by the codigo column
 * @method     ChildTblcategoriaQuery groupByNombre() Group by the nombre column
 * @method     ChildTblcategoriaQuery groupByDescripcion() Group by the descripcion column
 *
 * @method     ChildTblcategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblcategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblcategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblcategoriaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblcategoriaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblcategoriaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblcategoriaQuery leftJoinTblproductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblcategoriaQuery rightJoinTblproductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblproductos relation
 * @method     ChildTblcategoriaQuery innerJoinTblproductos($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblproductos relation
 *
 * @method     ChildTblcategoriaQuery joinWithTblproductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblproductos relation
 *
 * @method     ChildTblcategoriaQuery leftJoinWithTblproductos() Adds a LEFT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblcategoriaQuery rightJoinWithTblproductos() Adds a RIGHT JOIN clause and with to the query using the Tblproductos relation
 * @method     ChildTblcategoriaQuery innerJoinWithTblproductos() Adds a INNER JOIN clause and with to the query using the Tblproductos relation
 *
 * @method     \propel\propel\TblproductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblcategoria findOne(ConnectionInterface $con = null) Return the first ChildTblcategoria matching the query
 * @method     ChildTblcategoria findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblcategoria matching the query, or a new ChildTblcategoria object populated from the query conditions when no match is found
 *
 * @method     ChildTblcategoria findOneByLineaid(int $LineaId) Return the first ChildTblcategoria filtered by the LineaId column
 * @method     ChildTblcategoria findOneByCodigo(string $codigo) Return the first ChildTblcategoria filtered by the codigo column
 * @method     ChildTblcategoria findOneByNombre(string $nombre) Return the first ChildTblcategoria filtered by the nombre column
 * @method     ChildTblcategoria findOneByDescripcion(string $descripcion) Return the first ChildTblcategoria filtered by the descripcion column *

 * @method     ChildTblcategoria requirePk($key, ConnectionInterface $con = null) Return the ChildTblcategoria by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcategoria requireOne(ConnectionInterface $con = null) Return the first ChildTblcategoria matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblcategoria requireOneByLineaid(int $LineaId) Return the first ChildTblcategoria filtered by the LineaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcategoria requireOneByCodigo(string $codigo) Return the first ChildTblcategoria filtered by the codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcategoria requireOneByNombre(string $nombre) Return the first ChildTblcategoria filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcategoria requireOneByDescripcion(string $descripcion) Return the first ChildTblcategoria filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblcategoria[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblcategoria objects based on current ModelCriteria
 * @method     ChildTblcategoria[]|ObjectCollection findByLineaid(int $LineaId) Return ChildTblcategoria objects filtered by the LineaId column
 * @method     ChildTblcategoria[]|ObjectCollection findByCodigo(string $codigo) Return ChildTblcategoria objects filtered by the codigo column
 * @method     ChildTblcategoria[]|ObjectCollection findByNombre(string $nombre) Return ChildTblcategoria objects filtered by the nombre column
 * @method     ChildTblcategoria[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildTblcategoria objects filtered by the descripcion column
 * @method     ChildTblcategoria[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblcategoriaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblcategoriaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblcategoria', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblcategoriaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblcategoriaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblcategoriaQuery) {
            return $criteria;
        }
        $query = new ChildTblcategoriaQuery();
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
     * @return ChildTblcategoria|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblcategoriaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblcategoriaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblcategoria A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT LineaId, codigo, nombre, descripcion FROM tblcategoria WHERE LineaId = :p0';
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
            /** @var ChildTblcategoria $obj */
            $obj = new ChildTblcategoria();
            $obj->hydrate($row);
            TblcategoriaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblcategoria|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the LineaId column
     *
     * Example usage:
     * <code>
     * $query->filterByLineaid(1234); // WHERE LineaId = 1234
     * $query->filterByLineaid(array(12, 34)); // WHERE LineaId IN (12, 34)
     * $query->filterByLineaid(array('min' => 12)); // WHERE LineaId > 12
     * </code>
     *
     * @param     mixed $lineaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByLineaid($lineaid = null, $comparison = null)
    {
        if (is_array($lineaid)) {
            $useMinMax = false;
            if (isset($lineaid['min'])) {
                $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $lineaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lineaid['max'])) {
                $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $lineaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $lineaid, $comparison);
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
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblcategoriaTableMap::COL_CODIGO, $codigo, $comparison);
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
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblcategoriaTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%', Criteria::LIKE); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblcategoriaTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblproductos object
     *
     * @param \propel\propel\Tblproductos|ObjectCollection $tblproductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function filterByTblproductos($tblproductos, $comparison = null)
    {
        if ($tblproductos instanceof \propel\propel\Tblproductos) {
            return $this
                ->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $tblproductos->getLineaid(), $comparison);
        } elseif ($tblproductos instanceof ObjectCollection) {
            return $this
                ->useTblproductosQuery()
                ->filterByPrimaryKeys($tblproductos->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function joinTblproductos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTblproductosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblproductos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblproductos', '\propel\propel\TblproductosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblcategoria $tblcategoria Object to remove from the list of results
     *
     * @return $this|ChildTblcategoriaQuery The current query, for fluid interface
     */
    public function prune($tblcategoria = null)
    {
        if ($tblcategoria) {
            $this->addUsingAlias(TblcategoriaTableMap::COL_LINEAID, $tblcategoria->getLineaid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblcategoria table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblcategoriaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblcategoriaTableMap::clearInstancePool();
            TblcategoriaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblcategoriaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblcategoriaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblcategoriaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblcategoriaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblcategoriaQuery
