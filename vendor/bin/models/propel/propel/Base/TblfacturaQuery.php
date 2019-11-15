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
use propel\propel\Tblfactura as ChildTblfactura;
use propel\propel\TblfacturaQuery as ChildTblfacturaQuery;
use propel\propel\Map\TblfacturaTableMap;

/**
 * Base class that represents a query for the 'tblfactura' table.
 *
 *
 *
 * @method     ChildTblfacturaQuery orderByFacturaid($order = Criteria::ASC) Order by the facturaId column
 * @method     ChildTblfacturaQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     ChildTblfacturaQuery orderByClienteid($order = Criteria::ASC) Order by the clienteId column
 * @method     ChildTblfacturaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ChildTblfacturaQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildTblfacturaQuery orderByUsuarioid($order = Criteria::ASC) Order by the usuarioId column
 * @method     ChildTblfacturaQuery orderByTotatpagado($order = Criteria::ASC) Order by the totatPagado column
 * @method     ChildTblfacturaQuery orderByMetodopagoid($order = Criteria::ASC) Order by the metodoPagoId column
 *
 * @method     ChildTblfacturaQuery groupByFacturaid() Group by the facturaId column
 * @method     ChildTblfacturaQuery groupByNumero() Group by the numero column
 * @method     ChildTblfacturaQuery groupByClienteid() Group by the clienteId column
 * @method     ChildTblfacturaQuery groupByFecha() Group by the fecha column
 * @method     ChildTblfacturaQuery groupByEstado() Group by the estado column
 * @method     ChildTblfacturaQuery groupByUsuarioid() Group by the usuarioId column
 * @method     ChildTblfacturaQuery groupByTotatpagado() Group by the totatPagado column
 * @method     ChildTblfacturaQuery groupByMetodopagoid() Group by the metodoPagoId column
 *
 * @method     ChildTblfacturaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblfacturaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblfacturaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblfacturaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblfacturaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblfacturaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblfacturaQuery leftJoinTblcliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblcliente relation
 * @method     ChildTblfacturaQuery rightJoinTblcliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblcliente relation
 * @method     ChildTblfacturaQuery innerJoinTblcliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblcliente relation
 *
 * @method     ChildTblfacturaQuery joinWithTblcliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblcliente relation
 *
 * @method     ChildTblfacturaQuery leftJoinWithTblcliente() Adds a LEFT JOIN clause and with to the query using the Tblcliente relation
 * @method     ChildTblfacturaQuery rightJoinWithTblcliente() Adds a RIGHT JOIN clause and with to the query using the Tblcliente relation
 * @method     ChildTblfacturaQuery innerJoinWithTblcliente() Adds a INNER JOIN clause and with to the query using the Tblcliente relation
 *
 * @method     ChildTblfacturaQuery leftJoinTblmetodopago($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblmetodopago relation
 * @method     ChildTblfacturaQuery rightJoinTblmetodopago($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblmetodopago relation
 * @method     ChildTblfacturaQuery innerJoinTblmetodopago($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblmetodopago relation
 *
 * @method     ChildTblfacturaQuery joinWithTblmetodopago($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblmetodopago relation
 *
 * @method     ChildTblfacturaQuery leftJoinWithTblmetodopago() Adds a LEFT JOIN clause and with to the query using the Tblmetodopago relation
 * @method     ChildTblfacturaQuery rightJoinWithTblmetodopago() Adds a RIGHT JOIN clause and with to the query using the Tblmetodopago relation
 * @method     ChildTblfacturaQuery innerJoinWithTblmetodopago() Adds a INNER JOIN clause and with to the query using the Tblmetodopago relation
 *
 * @method     ChildTblfacturaQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblfacturaQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildTblfacturaQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     ChildTblfacturaQuery joinWithUsuarios($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Usuarios relation
 *
 * @method     ChildTblfacturaQuery leftJoinWithUsuarios() Adds a LEFT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblfacturaQuery rightJoinWithUsuarios() Adds a RIGHT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildTblfacturaQuery innerJoinWithUsuarios() Adds a INNER JOIN clause and with to the query using the Usuarios relation
 *
 * @method     ChildTblfacturaQuery leftJoinTblfacturadetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfacturadetalle relation
 * @method     ChildTblfacturaQuery rightJoinTblfacturadetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfacturadetalle relation
 * @method     ChildTblfacturaQuery innerJoinTblfacturadetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfacturadetalle relation
 *
 * @method     ChildTblfacturaQuery joinWithTblfacturadetalle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfacturadetalle relation
 *
 * @method     ChildTblfacturaQuery leftJoinWithTblfacturadetalle() Adds a LEFT JOIN clause and with to the query using the Tblfacturadetalle relation
 * @method     ChildTblfacturaQuery rightJoinWithTblfacturadetalle() Adds a RIGHT JOIN clause and with to the query using the Tblfacturadetalle relation
 * @method     ChildTblfacturaQuery innerJoinWithTblfacturadetalle() Adds a INNER JOIN clause and with to the query using the Tblfacturadetalle relation
 *
 * @method     \propel\propel\TblclienteQuery|\propel\propel\TblmetodopagoQuery|\propel\propel\UsuariosQuery|\propel\propel\TblfacturadetalleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTblfactura findOne(ConnectionInterface $con = null) Return the first ChildTblfactura matching the query
 * @method     ChildTblfactura findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblfactura matching the query, or a new ChildTblfactura object populated from the query conditions when no match is found
 *
 * @method     ChildTblfactura findOneByFacturaid(string $facturaId) Return the first ChildTblfactura filtered by the facturaId column
 * @method     ChildTblfactura findOneByNumero(string $numero) Return the first ChildTblfactura filtered by the numero column
 * @method     ChildTblfactura findOneByClienteid(string $clienteId) Return the first ChildTblfactura filtered by the clienteId column
 * @method     ChildTblfactura findOneByFecha(string $fecha) Return the first ChildTblfactura filtered by the fecha column
 * @method     ChildTblfactura findOneByEstado(string $estado) Return the first ChildTblfactura filtered by the estado column
 * @method     ChildTblfactura findOneByUsuarioid(string $usuarioId) Return the first ChildTblfactura filtered by the usuarioId column
 * @method     ChildTblfactura findOneByTotatpagado(int $totatPagado) Return the first ChildTblfactura filtered by the totatPagado column
 * @method     ChildTblfactura findOneByMetodopagoid(int $metodoPagoId) Return the first ChildTblfactura filtered by the metodoPagoId column *

 * @method     ChildTblfactura requirePk($key, ConnectionInterface $con = null) Return the ChildTblfactura by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOne(ConnectionInterface $con = null) Return the first ChildTblfactura matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblfactura requireOneByFacturaid(string $facturaId) Return the first ChildTblfactura filtered by the facturaId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByNumero(string $numero) Return the first ChildTblfactura filtered by the numero column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByClienteid(string $clienteId) Return the first ChildTblfactura filtered by the clienteId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByFecha(string $fecha) Return the first ChildTblfactura filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByEstado(string $estado) Return the first ChildTblfactura filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByUsuarioid(string $usuarioId) Return the first ChildTblfactura filtered by the usuarioId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByTotatpagado(int $totatPagado) Return the first ChildTblfactura filtered by the totatPagado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblfactura requireOneByMetodopagoid(int $metodoPagoId) Return the first ChildTblfactura filtered by the metodoPagoId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblfactura[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblfactura objects based on current ModelCriteria
 * @method     ChildTblfactura[]|ObjectCollection findByFacturaid(string $facturaId) Return ChildTblfactura objects filtered by the facturaId column
 * @method     ChildTblfactura[]|ObjectCollection findByNumero(string $numero) Return ChildTblfactura objects filtered by the numero column
 * @method     ChildTblfactura[]|ObjectCollection findByClienteid(string $clienteId) Return ChildTblfactura objects filtered by the clienteId column
 * @method     ChildTblfactura[]|ObjectCollection findByFecha(string $fecha) Return ChildTblfactura objects filtered by the fecha column
 * @method     ChildTblfactura[]|ObjectCollection findByEstado(string $estado) Return ChildTblfactura objects filtered by the estado column
 * @method     ChildTblfactura[]|ObjectCollection findByUsuarioid(string $usuarioId) Return ChildTblfactura objects filtered by the usuarioId column
 * @method     ChildTblfactura[]|ObjectCollection findByTotatpagado(int $totatPagado) Return ChildTblfactura objects filtered by the totatPagado column
 * @method     ChildTblfactura[]|ObjectCollection findByMetodopagoid(int $metodoPagoId) Return ChildTblfactura objects filtered by the metodoPagoId column
 * @method     ChildTblfactura[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblfacturaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\TblfacturaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Tblfactura', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblfacturaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblfacturaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblfacturaQuery) {
            return $criteria;
        }
        $query = new ChildTblfacturaQuery();
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
     * @return ChildTblfactura|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblfacturaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblfacturaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblfactura A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT facturaId, numero, clienteId, fecha, estado, usuarioId, totatPagado, metodoPagoId FROM tblfactura WHERE facturaId = :p0';
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
            /** @var ChildTblfactura $obj */
            $obj = new ChildTblfactura();
            $obj->hydrate($row);
            TblfacturaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblfactura|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the facturaId column
     *
     * Example usage:
     * <code>
     * $query->filterByFacturaid(1234); // WHERE facturaId = 1234
     * $query->filterByFacturaid(array(12, 34)); // WHERE facturaId IN (12, 34)
     * $query->filterByFacturaid(array('min' => 12)); // WHERE facturaId > 12
     * </code>
     *
     * @param     mixed $facturaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByFacturaid($facturaid = null, $comparison = null)
    {
        if (is_array($facturaid)) {
            $useMinMax = false;
            if (isset($facturaid['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $facturaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($facturaid['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $facturaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $facturaid, $comparison);
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByNumero($numero = null, $comparison = null)
    {
        if (is_array($numero)) {
            $useMinMax = false;
            if (isset($numero['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_NUMERO, $numero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numero['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_NUMERO, $numero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_NUMERO, $numero, $comparison);
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
     * @see       filterByTblcliente()
     *
     * @param     mixed $clienteid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByClienteid($clienteid = null, $comparison = null)
    {
        if (is_array($clienteid)) {
            $useMinMax = false;
            if (isset($clienteid['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_CLIENTEID, $clienteid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clienteid['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_CLIENTEID, $clienteid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_CLIENTEID, $clienteid, $comparison);
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_FECHA, $fecha, $comparison);
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query on the usuarioId column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioid(1234); // WHERE usuarioId = 1234
     * $query->filterByUsuarioid(array(12, 34)); // WHERE usuarioId IN (12, 34)
     * $query->filterByUsuarioid(array('min' => 12)); // WHERE usuarioId > 12
     * </code>
     *
     * @see       filterByUsuarios()
     *
     * @param     mixed $usuarioid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByUsuarioid($usuarioid = null, $comparison = null)
    {
        if (is_array($usuarioid)) {
            $useMinMax = false;
            if (isset($usuarioid['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_USUARIOID, $usuarioid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioid['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_USUARIOID, $usuarioid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_USUARIOID, $usuarioid, $comparison);
    }

    /**
     * Filter the query on the totatPagado column
     *
     * Example usage:
     * <code>
     * $query->filterByTotatpagado(1234); // WHERE totatPagado = 1234
     * $query->filterByTotatpagado(array(12, 34)); // WHERE totatPagado IN (12, 34)
     * $query->filterByTotatpagado(array('min' => 12)); // WHERE totatPagado > 12
     * </code>
     *
     * @param     mixed $totatpagado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByTotatpagado($totatpagado = null, $comparison = null)
    {
        if (is_array($totatpagado)) {
            $useMinMax = false;
            if (isset($totatpagado['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_TOTATPAGADO, $totatpagado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totatpagado['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_TOTATPAGADO, $totatpagado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_TOTATPAGADO, $totatpagado, $comparison);
    }

    /**
     * Filter the query on the metodoPagoId column
     *
     * Example usage:
     * <code>
     * $query->filterByMetodopagoid(1234); // WHERE metodoPagoId = 1234
     * $query->filterByMetodopagoid(array(12, 34)); // WHERE metodoPagoId IN (12, 34)
     * $query->filterByMetodopagoid(array('min' => 12)); // WHERE metodoPagoId > 12
     * </code>
     *
     * @see       filterByTblmetodopago()
     *
     * @param     mixed $metodopagoid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByMetodopagoid($metodopagoid = null, $comparison = null)
    {
        if (is_array($metodopagoid)) {
            $useMinMax = false;
            if (isset($metodopagoid['min'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_METODOPAGOID, $metodopagoid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($metodopagoid['max'])) {
                $this->addUsingAlias(TblfacturaTableMap::COL_METODOPAGOID, $metodopagoid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblfacturaTableMap::COL_METODOPAGOID, $metodopagoid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblcliente object
     *
     * @param \propel\propel\Tblcliente|ObjectCollection $tblcliente The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByTblcliente($tblcliente, $comparison = null)
    {
        if ($tblcliente instanceof \propel\propel\Tblcliente) {
            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_CLIENTEID, $tblcliente->getClienteid(), $comparison);
        } elseif ($tblcliente instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_CLIENTEID, $tblcliente->toKeyValue('PrimaryKey', 'Clienteid'), $comparison);
        } else {
            throw new PropelException('filterByTblcliente() only accepts arguments of type \propel\propel\Tblcliente or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblcliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function joinTblcliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblcliente');

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
            $this->addJoinObject($join, 'Tblcliente');
        }

        return $this;
    }

    /**
     * Use the Tblcliente relation Tblcliente object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblclienteQuery A secondary query class using the current class as primary query
     */
    public function useTblclienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblcliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblcliente', '\propel\propel\TblclienteQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblmetodopago object
     *
     * @param \propel\propel\Tblmetodopago|ObjectCollection $tblmetodopago The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByTblmetodopago($tblmetodopago, $comparison = null)
    {
        if ($tblmetodopago instanceof \propel\propel\Tblmetodopago) {
            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_METODOPAGOID, $tblmetodopago->getMetodopagoid(), $comparison);
        } elseif ($tblmetodopago instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_METODOPAGOID, $tblmetodopago->toKeyValue('PrimaryKey', 'Metodopagoid'), $comparison);
        } else {
            throw new PropelException('filterByTblmetodopago() only accepts arguments of type \propel\propel\Tblmetodopago or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblmetodopago relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function joinTblmetodopago($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblmetodopago');

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
            $this->addJoinObject($join, 'Tblmetodopago');
        }

        return $this;
    }

    /**
     * Use the Tblmetodopago relation Tblmetodopago object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblmetodopagoQuery A secondary query class using the current class as primary query
     */
    public function useTblmetodopagoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblmetodopago($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblmetodopago', '\propel\propel\TblmetodopagoQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Usuarios object
     *
     * @param \propel\propel\Usuarios|ObjectCollection $usuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \propel\propel\Usuarios) {
            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_USUARIOID, $usuarios->getIdUsuario(), $comparison);
        } elseif ($usuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_USUARIOID, $usuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function joinUsuarios($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useUsuariosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuarios', '\propel\propel\UsuariosQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblfacturadetalle object
     *
     * @param \propel\propel\Tblfacturadetalle|ObjectCollection $tblfacturadetalle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTblfacturaQuery The current query, for fluid interface
     */
    public function filterByTblfacturadetalle($tblfacturadetalle, $comparison = null)
    {
        if ($tblfacturadetalle instanceof \propel\propel\Tblfacturadetalle) {
            return $this
                ->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $tblfacturadetalle->getFacturaid(), $comparison);
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
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function joinTblfacturadetalle($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTblfacturadetalleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTblfacturadetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblfacturadetalle', '\propel\propel\TblfacturadetalleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblfactura $tblfactura Object to remove from the list of results
     *
     * @return $this|ChildTblfacturaQuery The current query, for fluid interface
     */
    public function prune($tblfactura = null)
    {
        if ($tblfactura) {
            $this->addUsingAlias(TblfacturaTableMap::COL_FACTURAID, $tblfactura->getFacturaid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tblfactura table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblfacturaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblfacturaTableMap::clearInstancePool();
            TblfacturaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblfacturaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblfacturaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblfacturaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblfacturaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblfacturaQuery
