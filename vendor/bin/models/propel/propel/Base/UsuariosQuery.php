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
use propel\propel\Usuarios as ChildUsuarios;
use propel\propel\UsuariosQuery as ChildUsuariosQuery;
use propel\propel\Map\UsuariosTableMap;

/**
 * Base class that represents a query for the 'usuarios' table.
 *
 *
 *
 * @method     ChildUsuariosQuery orderByIdUsuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     ChildUsuariosQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildUsuariosQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildUsuariosQuery orderByNivel($order = Criteria::ASC) Order by the nivel column
 * @method     ChildUsuariosQuery orderByClave($order = Criteria::ASC) Order by the clave column
 * @method     ChildUsuariosQuery orderByRolid($order = Criteria::ASC) Order by the rolId column
 * @method     ChildUsuariosQuery orderByMenuid($order = Criteria::ASC) Order by the menuId column
 *
 * @method     ChildUsuariosQuery groupByIdUsuario() Group by the id_usuario column
 * @method     ChildUsuariosQuery groupByNombre() Group by the nombre column
 * @method     ChildUsuariosQuery groupByEmail() Group by the email column
 * @method     ChildUsuariosQuery groupByNivel() Group by the nivel column
 * @method     ChildUsuariosQuery groupByClave() Group by the clave column
 * @method     ChildUsuariosQuery groupByRolid() Group by the rolId column
 * @method     ChildUsuariosQuery groupByMenuid() Group by the menuId column
 *
 * @method     ChildUsuariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsuariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsuariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsuariosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsuariosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsuariosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsuariosQuery leftJoinTblmenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblmenu relation
 * @method     ChildUsuariosQuery rightJoinTblmenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblmenu relation
 * @method     ChildUsuariosQuery innerJoinTblmenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblmenu relation
 *
 * @method     ChildUsuariosQuery joinWithTblmenu($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblmenu relation
 *
 * @method     ChildUsuariosQuery leftJoinWithTblmenu() Adds a LEFT JOIN clause and with to the query using the Tblmenu relation
 * @method     ChildUsuariosQuery rightJoinWithTblmenu() Adds a RIGHT JOIN clause and with to the query using the Tblmenu relation
 * @method     ChildUsuariosQuery innerJoinWithTblmenu() Adds a INNER JOIN clause and with to the query using the Tblmenu relation
 *
 * @method     ChildUsuariosQuery leftJoinTblrol($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblrol relation
 * @method     ChildUsuariosQuery rightJoinTblrol($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblrol relation
 * @method     ChildUsuariosQuery innerJoinTblrol($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblrol relation
 *
 * @method     ChildUsuariosQuery joinWithTblrol($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblrol relation
 *
 * @method     ChildUsuariosQuery leftJoinWithTblrol() Adds a LEFT JOIN clause and with to the query using the Tblrol relation
 * @method     ChildUsuariosQuery rightJoinWithTblrol() Adds a RIGHT JOIN clause and with to the query using the Tblrol relation
 * @method     ChildUsuariosQuery innerJoinWithTblrol() Adds a INNER JOIN clause and with to the query using the Tblrol relation
 *
 * @method     ChildUsuariosQuery leftJoinTblfactura($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tblfactura relation
 * @method     ChildUsuariosQuery rightJoinTblfactura($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tblfactura relation
 * @method     ChildUsuariosQuery innerJoinTblfactura($relationAlias = null) Adds a INNER JOIN clause to the query using the Tblfactura relation
 *
 * @method     ChildUsuariosQuery joinWithTblfactura($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tblfactura relation
 *
 * @method     ChildUsuariosQuery leftJoinWithTblfactura() Adds a LEFT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildUsuariosQuery rightJoinWithTblfactura() Adds a RIGHT JOIN clause and with to the query using the Tblfactura relation
 * @method     ChildUsuariosQuery innerJoinWithTblfactura() Adds a INNER JOIN clause and with to the query using the Tblfactura relation
 *
 * @method     \propel\propel\TblmenuQuery|\propel\propel\TblrolQuery|\propel\propel\TblfacturaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUsuarios findOne(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query
 * @method     ChildUsuarios findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query, or a new ChildUsuarios object populated from the query conditions when no match is found
 *
 * @method     ChildUsuarios findOneByIdUsuario(string $id_usuario) Return the first ChildUsuarios filtered by the id_usuario column
 * @method     ChildUsuarios findOneByNombre(string $nombre) Return the first ChildUsuarios filtered by the nombre column
 * @method     ChildUsuarios findOneByEmail(string $email) Return the first ChildUsuarios filtered by the email column
 * @method     ChildUsuarios findOneByNivel(string $nivel) Return the first ChildUsuarios filtered by the nivel column
 * @method     ChildUsuarios findOneByClave(string $clave) Return the first ChildUsuarios filtered by the clave column
 * @method     ChildUsuarios findOneByRolid(int $rolId) Return the first ChildUsuarios filtered by the rolId column
 * @method     ChildUsuarios findOneByMenuid(int $menuId) Return the first ChildUsuarios filtered by the menuId column *

 * @method     ChildUsuarios requirePk($key, ConnectionInterface $con = null) Return the ChildUsuarios by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOne(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsuarios requireOneByIdUsuario(string $id_usuario) Return the first ChildUsuarios filtered by the id_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByNombre(string $nombre) Return the first ChildUsuarios filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByEmail(string $email) Return the first ChildUsuarios filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByNivel(string $nivel) Return the first ChildUsuarios filtered by the nivel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByClave(string $clave) Return the first ChildUsuarios filtered by the clave column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByRolid(int $rolId) Return the first ChildUsuarios filtered by the rolId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByMenuid(int $menuId) Return the first ChildUsuarios filtered by the menuId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsuarios[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsuarios objects based on current ModelCriteria
 * @method     ChildUsuarios[]|ObjectCollection findByIdUsuario(string $id_usuario) Return ChildUsuarios objects filtered by the id_usuario column
 * @method     ChildUsuarios[]|ObjectCollection findByNombre(string $nombre) Return ChildUsuarios objects filtered by the nombre column
 * @method     ChildUsuarios[]|ObjectCollection findByEmail(string $email) Return ChildUsuarios objects filtered by the email column
 * @method     ChildUsuarios[]|ObjectCollection findByNivel(string $nivel) Return ChildUsuarios objects filtered by the nivel column
 * @method     ChildUsuarios[]|ObjectCollection findByClave(string $clave) Return ChildUsuarios objects filtered by the clave column
 * @method     ChildUsuarios[]|ObjectCollection findByRolid(int $rolId) Return ChildUsuarios objects filtered by the rolId column
 * @method     ChildUsuarios[]|ObjectCollection findByMenuid(int $menuId) Return ChildUsuarios objects filtered by the menuId column
 * @method     ChildUsuarios[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsuariosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \propel\propel\Base\UsuariosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\propel\\propel\\Usuarios', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsuariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsuariosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsuariosQuery) {
            return $criteria;
        }
        $query = new ChildUsuariosQuery();
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
     * @return ChildUsuarios|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsuariosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsuariosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUsuarios A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_usuario, nombre, email, nivel, clave, rolId, menuId FROM usuarios WHERE id_usuario = :p0';
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
            /** @var ChildUsuarios $obj */
            $obj = new ChildUsuarios();
            $obj->hydrate($row);
            UsuariosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUsuarios|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUsuario(1234); // WHERE id_usuario = 1234
     * $query->filterByIdUsuario(array(12, 34)); // WHERE id_usuario IN (12, 34)
     * $query->filterByIdUsuario(array('min' => 12)); // WHERE id_usuario > 12
     * </code>
     *
     * @param     mixed $idUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdUsuario($idUsuario = null, $comparison = null)
    {
        if (is_array($idUsuario)) {
            $useMinMax = false;
            if (isset($idUsuario['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $idUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUsuario['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $idUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $idUsuario, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the nivel column
     *
     * Example usage:
     * <code>
     * $query->filterByNivel('fooValue');   // WHERE nivel = 'fooValue'
     * $query->filterByNivel('%fooValue%', Criteria::LIKE); // WHERE nivel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nivel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByNivel($nivel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nivel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_NIVEL, $nivel, $comparison);
    }

    /**
     * Filter the query on the clave column
     *
     * Example usage:
     * <code>
     * $query->filterByClave('fooValue');   // WHERE clave = 'fooValue'
     * $query->filterByClave('%fooValue%', Criteria::LIKE); // WHERE clave LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clave The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByClave($clave = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clave)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_CLAVE, $clave, $comparison);
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
     * @see       filterByTblrol()
     *
     * @param     mixed $rolid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByRolid($rolid = null, $comparison = null)
    {
        if (is_array($rolid)) {
            $useMinMax = false;
            if (isset($rolid['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ROLID, $rolid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rolid['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ROLID, $rolid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_ROLID, $rolid, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByMenuid($menuid = null, $comparison = null)
    {
        if (is_array($menuid)) {
            $useMinMax = false;
            if (isset($menuid['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_MENUID, $menuid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menuid['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_MENUID, $menuid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_MENUID, $menuid, $comparison);
    }

    /**
     * Filter the query by a related \propel\propel\Tblmenu object
     *
     * @param \propel\propel\Tblmenu|ObjectCollection $tblmenu The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByTblmenu($tblmenu, $comparison = null)
    {
        if ($tblmenu instanceof \propel\propel\Tblmenu) {
            return $this
                ->addUsingAlias(UsuariosTableMap::COL_MENUID, $tblmenu->getMenuid(), $comparison);
        } elseif ($tblmenu instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuariosTableMap::COL_MENUID, $tblmenu->toKeyValue('PrimaryKey', 'Menuid'), $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
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
     * Filter the query by a related \propel\propel\Tblrol object
     *
     * @param \propel\propel\Tblrol|ObjectCollection $tblrol The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByTblrol($tblrol, $comparison = null)
    {
        if ($tblrol instanceof \propel\propel\Tblrol) {
            return $this
                ->addUsingAlias(UsuariosTableMap::COL_ROLID, $tblrol->getRolid(), $comparison);
        } elseif ($tblrol instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuariosTableMap::COL_ROLID, $tblrol->toKeyValue('PrimaryKey', 'Rolid'), $comparison);
        } else {
            throw new PropelException('filterByTblrol() only accepts arguments of type \propel\propel\Tblrol or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tblrol relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function joinTblrol($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tblrol');

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
            $this->addJoinObject($join, 'Tblrol');
        }

        return $this;
    }

    /**
     * Use the Tblrol relation Tblrol object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \propel\propel\TblrolQuery A secondary query class using the current class as primary query
     */
    public function useTblrolQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTblrol($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tblrol', '\propel\propel\TblrolQuery');
    }

    /**
     * Filter the query by a related \propel\propel\Tblfactura object
     *
     * @param \propel\propel\Tblfactura|ObjectCollection $tblfactura the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByTblfactura($tblfactura, $comparison = null)
    {
        if ($tblfactura instanceof \propel\propel\Tblfactura) {
            return $this
                ->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $tblfactura->getUsuarioid(), $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
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
     * @param   ChildUsuarios $usuarios Object to remove from the list of results
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function prune($usuarios = null)
    {
        if ($usuarios) {
            $this->addUsingAlias(UsuariosTableMap::COL_ID_USUARIO, $usuarios->getIdUsuario(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the usuarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsuariosTableMap::clearInstancePool();
            UsuariosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsuariosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsuariosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsuariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsuariosQuery
