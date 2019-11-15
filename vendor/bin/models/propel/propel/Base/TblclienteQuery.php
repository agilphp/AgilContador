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
use propel\propel\Tblcliente as ChildTblcliente;
use propel\propel\TblclienteQuery as ChildTblclienteQuery;
use propel\propel\Map\TblclienteTableMap;

/**
 * Base class that represents a query for the 'tblcliente' table.
 *
 *
 *
 * @method     ChildTblclienteQuery orderByClienteid($order = Criteria::ASC) Order by the clienteId column
 * @method     ChildTblclienteQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ChildTblclienteQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildTblclienteQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ChildTblclienteQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ChildTblclienteQuery orderByCiudadid($order = Criteria::ASC) Order by the ciudadId column
 *
 * @method     ChildTblclienteQuery groupByClienteid() Group by the clienteId column
 * @method     ChildTblclienteQuery groupByCodigo() Group by the codigo column
 * @method     ChildTblclienteQuery groupByNombre() Group by the nombre column
 * @method     ChildTblclienteQuery groupByDireccion() Group by the direccion column
 * @method     ChildTblclienteQuery groupByTelefono() Group by the telefono column
 * @method     ChildTblclienteQuery groupByCiudadid() Group by the ciudadId column
 *
 * @method     ChildTblclienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblclienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblclienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblclienteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblclienteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblclienteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblclienteQuery leftJoinTblfactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblclienteQuery rightJoinTblfactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfactura relation
 * @method     ChildTblclienteQuery innerJoinTblfactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfactura relation
 *
 * @method     ChildTblclienteQuery joinWithTblfactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfactura relation
 *
 * @method     ChildTblclienteQuery leftJoinWithTblfactura() Adds a LEFT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblclienteQuery rightJoinWithTblfactura() Adds a RIGHT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildTblclienteQuery innerJoinWithTblfactura() Adds a INNER JOIN clause and with to the query using the Tblfactura relation
 *
 * @method     \propel\propel\TblfacturaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblcliente findOne(ConnectionInterface $con = null) Return the first ChildTblcliente matching the query
 * @method     ChildTblcliente findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblcliente matching the query, or a new ChildTblcliente object populated from the query conditions when no match is found
 *
 * @method     ChildTblcliente findOneByClienteid(string $clienteId) Return the first ChildTblcliente filtered by the clienteId column
 * @method     ChildTblcliente findOneByCodigo(string $codigo) Return the first ChildTblcliente filtered by the codigo column
 * @method     ChildTblcliente findOneByNombre(string $nombre) Return the first ChildTblcliente filtered by the nombre column
 * @method     ChildTblcliente findOneByDireccion(string $direccion) Return the first ChildTblcliente filtered by the direccion column
 * @method     ChildTblcliente findOneByTelefono(string $telefono) Return the first ChildTblcliente filtered by the telefono column
 * @method     ChildTblcliente findOneByCiudadid(int $ciudadId) Return the first ChildTblcliente filtered by the ciudadId column *

 * @method     ChildTblcliente requirePk($key, ConnectionInterface $con = null) Return the ChildTblcliente by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOne(ConnectionInterface $con = null) Return the first ChildTblcliente matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblcliente requireOneByClienteid(string $clienteId) Return the first ChildTblcliente filtered by the clienteId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOneByCodigo(string $codigo) Return the first ChildTblcliente filtered by the codigo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOneByNombre(string $nombre) Return the first ChildTblcliente filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOneByDireccion(string $direccion) Return the first ChildTblcliente filtered by the direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOneByTelefono(string $telefono) Return the first ChildTblcliente filtered by the telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblcliente requireOneByCiudadid(int $ciudadId) Return the first ChildTblcliente filtered by the ciudadId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblcliente[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblcliente objects based on current ModelCriteria
 * @method     ChildTblcliente[]|ObjectCollection findByClienteid(string $clienteId) Return ChildTblcliente objects filtered by the clienteId column
 * @method     ChildTblcliente[]|ObjectCollection findByCodigo(string $codigo) Return ChildTblcliente objects filtered by the codigo column
 * @method     ChildTblcliente[]|ObjectCollection findByNombre(string $nombre) Return ChildTblcliente objects filtered by the nombre column
 * @method     ChildTblcliente[]|ObjectCollection findByDireccion(string $direccion) Return ChildTblcliente objects filtered by the direccion column
 * @method     ChildTblcliente[]|ObjectCollection findByTelefono(string $telefono) Return ChildTblcliente objects filtered by the telefono column
 * @method     ChildTblcliente[]|ObjectCollection findByCiudadid(int $ciudadId) Return ChildTblcliente objects filtered by the ciudadId column
 * @method     ChildTblcliente[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblclienteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblclienteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblcliente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblclienteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblclienteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblclienteQuery) {
            return $criteria;
        }
        $query = new ChildTblclienteQuery();
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
     * @return ChildTblcliente|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblclienteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblclienteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblcliente A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT clienteId, codigo, nombre, direccion, telefono, ciudadId FROM tblcliente WHERE clienteId = :p0';
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
            /** @var ChildTblcliente $obj */
            $obj = new ChildTblcliente();
            $obj->hydrate($row);
            TblclienteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblcliente|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the clienteId column
     *
     * Example usage:
     * <code>
     * $query->filterByClienteid(1234); // WHERE clienteId = 1234
     * $query->filterByClienteid(array(12, 34)); // WHERE clienteId IN (12, 34)
     * $query->filterByClienteid(array('min' => 12)); // WHERE clienteId > 12
     * </code>
     *
     * @param     mixed $clienteid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByClienteid($clienteid = null, $comparison = null)
    {
        if (is_array($clienteid)) {
            $useMinMax = false;
            if (isset($clienteid['min'])) {
                $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $clienteid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clienteid['max'])) {
                $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $clienteid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $clienteid, $comparison);
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
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_CODIGO, $codigo, $comparison);
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
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%', Criteria::LIKE); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%', Criteria::LIKE); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the ciudadId column
     *
     * Example usage:
     * <code>
     * $query->filterByCiudadid(1234); // WHERE ciudadId = 1234
     * $query->filterByCiudadid(array(12, 34)); // WHERE ciudadId IN (12, 34)
     * $query->filterByCiudadid(array('min' => 12)); // WHERE ciudadId > 12
     * </code>
     *
     * @param     mixed $ciudadid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByCiudadid($ciudadid = null, $comparison = null)
    {
        if (is_array($ciudadid)) {
            $useMinMax = false;
            if (isset($ciudadid['min'])) {
                $this->addUsingAlias(TblclienteTableMap::COL_CIUDADID, $ciudadid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ciudadid['max'])) {
                $this->addUsingAlias(TblclienteTableMap::COL_CIUDADID, $ciudadid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblclienteTableMap::COL_CIUDADID, $ciudadid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblfactura object
     *
     * @param \propel\propel\Tblfactura|ObjectCollection $tblfactura the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblclienteQuery The current query, for fluid interface
     */
    public function filterByTblfactura($tblfactura, $comparison = null)
    {
        if ($tblfactura instanceof \propel\propel\Tblfactura) {
            return $this
                ->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $tblfactura->getClienteid(), $comparison);
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
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function joinTblfactura($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useTblfacturaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblfactura($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblfactura', '\propel\propel\TblfacturaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblcliente $tblcliente Object to remove from the list of results
     *
     * @return $this|ChildTblclienteQuery The current query, for fluid interface
     */
    public function prune($tblcliente = null)
    {
        if ($tblcliente) {
            $this->addUsingAlias(TblclienteTableMap::COL_CLIENTEID, $tblcliente->getClienteid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblcliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblclienteTableMap::clearInstancePool();
            TblclienteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblclienteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblclienteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblclienteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblclienteQuery
