<?php

namespace propel\propel\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use propel\propel\Tblcliente as ChildTblcliente;
use propel\propel\TblclienteQuery as ChildTblclienteQuery;
use propel\propel\Tblfactura as ChildTblfactura;
use propel\propel\TblfacturaQuery as ChildTblfacturaQuery;
use propel\propel\Map\TblclienteTableMap;
use propel\propel\Map\TblfacturaTableMap;

/**
 * Base class that represents a row from the 'tblcliente' table.
 *
 *
 *
 * @package    propel.generator.propel.propel.Base
 */
abstract class Tblcliente implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\propel\\propel\\Map\\TblclienteTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the clienteid field.
     *
     * @var        string
     */
    protected $clienteid;

    /**
     * The value for the codigo field.
     *
     * @var        string
     */
    protected $codigo;

    /**
     * The value for the nombre field.
     *
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the direccion field.
     *
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the telefono field.
     *
     * @var        string
     */
    protected $telefono;

    /**
     * The value for the ciudadid field.
     *
     * @var        int
     */
    protected $ciudadid;

    /**
     * @var        ObjectCollection|ChildTblfactura[] Collection to store aggregation of ChildTblfactura objects.
     */
    protected $collTblfacturas;
    protected $collTblfacturasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblfactura[]
     */
    protected $tblfacturasScheduledForDeletion = null;

    /**
     * Initializes internal state of propel\propel\Base\Tblcliente object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Tblcliente</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblcliente</code>, delegates to
     * <code>equals(Tblcliente)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Tblcliente The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [clienteid] column value.
     *
     * @return string
     */
    public function getClienteid()
    {
        return $this->clienteid;
    }

    /**
     * Get the [codigo] column value.
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Get the [nombre] column value.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the [direccion] column value.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Get the [telefono] column value.
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Get the [ciudadid] column value.
     *
     * @return int
     */
    public function getCiudadid()
    {
        return $this->ciudadid;
    }

    /**
     * Set the value of [clienteid] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setClienteid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->clienteid !== $v) {
            $this->clienteid = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_CLIENTEID] = true;
        }

        return $this;
    } // setClienteid()

    /**
     * Set the value of [codigo] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setCodigo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo !== $v) {
            $this->codigo = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_CODIGO] = true;
        }

        return $this;
    } // setCodigo()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [direccion] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_DIRECCION] = true;
        }

        return $this;
    } // setDireccion()

    /**
     * Set the value of [telefono] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telefono !== $v) {
            $this->telefono = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_TELEFONO] = true;
        }

        return $this;
    } // setTelefono()

    /**
     * Set the value of [ciudadid] column.
     *
     * @param int $v new value
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function setCiudadid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ciudadid !== $v) {
            $this->ciudadid = $v;
            $this->modifiedColumns[TblclienteTableMap::COL_CIUDADID] = true;
        }

        return $this;
    } // setCiudadid()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblclienteTableMap::translateFieldName('Clienteid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->clienteid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblclienteTableMap::translateFieldName('Codigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->codigo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblclienteTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblclienteTableMap::translateFieldName('Direccion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->direccion = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TblclienteTableMap::translateFieldName('Telefono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telefono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TblclienteTableMap::translateFieldName('Ciudadid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ciudadid = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = TblclienteTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\propel\\propel\\Tblcliente'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblclienteTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblclienteQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTblfacturas = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblcliente::setDeleted()
     * @see Tblcliente::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblclienteQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblclienteTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TblclienteTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->tblfacturasScheduledForDeletion !== null) {
                if (!$this->tblfacturasScheduledForDeletion->isEmpty()) {
                    \propel\propel\TblfacturaQuery::create()
                        ->filterByPrimaryKeys($this->tblfacturasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tblfacturasScheduledForDeletion = null;
                }
            }

            if ($this->collTblfacturas !== null) {
                foreach ($this->collTblfacturas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TblclienteTableMap::COL_CLIENTEID] = true;
        if (null !== $this->clienteid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblclienteTableMap::COL_CLIENTEID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblclienteTableMap::COL_CLIENTEID)) {
            $modifiedColumns[':p' . $index++]  = 'clienteId';
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'codigo';
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = 'direccion';
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = 'telefono';
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_CIUDADID)) {
            $modifiedColumns[':p' . $index++]  = 'ciudadId';
        }

        $sql = sprintf(
            'INSERT INTO tblcliente (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'clienteId':
                        $stmt->bindValue($identifier, $this->clienteid, PDO::PARAM_INT);
                        break;
                    case 'codigo':
                        $stmt->bindValue($identifier, $this->codigo, PDO::PARAM_STR);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'direccion':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case 'telefono':
                        $stmt->bindValue($identifier, $this->telefono, PDO::PARAM_STR);
                        break;
                    case 'ciudadId':
                        $stmt->bindValue($identifier, $this->ciudadid, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setClienteid($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblclienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getClienteid();
                break;
            case 1:
                return $this->getCodigo();
                break;
            case 2:
                return $this->getNombre();
                break;
            case 3:
                return $this->getDireccion();
                break;
            case 4:
                return $this->getTelefono();
                break;
            case 5:
                return $this->getCiudadid();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Tblcliente'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblcliente'][$this->hashCode()] = true;
        $keys = TblclienteTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getClienteid(),
            $keys[1] => $this->getCodigo(),
            $keys[2] => $this->getNombre(),
            $keys[3] => $this->getDireccion(),
            $keys[4] => $this->getTelefono(),
            $keys[5] => $this->getCiudadid(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collTblfacturas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblfacturas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblfacturas';
                        break;
                    default:
                        $key = 'Tblfacturas';
                }

                $result[$key] = $this->collTblfacturas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\propel\propel\Tblcliente
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblclienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\propel\propel\Tblcliente
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setClienteid($value);
                break;
            case 1:
                $this->setCodigo($value);
                break;
            case 2:
                $this->setNombre($value);
                break;
            case 3:
                $this->setDireccion($value);
                break;
            case 4:
                $this->setTelefono($value);
                break;
            case 5:
                $this->setCiudadid($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TblclienteTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setClienteid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCodigo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNombre($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDireccion($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTelefono($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCiudadid($arr[$keys[5]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\propel\propel\Tblcliente The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TblclienteTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblclienteTableMap::COL_CLIENTEID)) {
            $criteria->add(TblclienteTableMap::COL_CLIENTEID, $this->clienteid);
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_CODIGO)) {
            $criteria->add(TblclienteTableMap::COL_CODIGO, $this->codigo);
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_NOMBRE)) {
            $criteria->add(TblclienteTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_DIRECCION)) {
            $criteria->add(TblclienteTableMap::COL_DIRECCION, $this->direccion);
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_TELEFONO)) {
            $criteria->add(TblclienteTableMap::COL_TELEFONO, $this->telefono);
        }
        if ($this->isColumnModified(TblclienteTableMap::COL_CIUDADID)) {
            $criteria->add(TblclienteTableMap::COL_CIUDADID, $this->ciudadid);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTblclienteQuery::create();
        $criteria->add(TblclienteTableMap::COL_CLIENTEID, $this->clienteid);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getClienteid();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getClienteid();
    }

    /**
     * Generic method to set the primary key (clienteid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setClienteid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getClienteid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \propel\propel\Tblcliente (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCodigo($this->getCodigo());
        $copyObj->setNombre($this->getNombre());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setTelefono($this->getTelefono());
        $copyObj->setCiudadid($this->getCiudadid());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTblfacturas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblfactura($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setClienteid(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \propel\propel\Tblcliente Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Tblfactura' == $relationName) {
            $this->initTblfacturas();
            return;
        }
    }

    /**
     * Clears out the collTblfacturas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblfacturas()
     */
    public function clearTblfacturas()
    {
        $this->collTblfacturas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblfacturas collection loaded partially.
     */
    public function resetPartialTblfacturas($v = true)
    {
        $this->collTblfacturasPartial = $v;
    }

    /**
     * Initializes the collTblfacturas collection.
     *
     * By default this just sets the collTblfacturas collection to an empty array (like clearcollTblfacturas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblfacturas($overrideExisting = true)
    {
        if (null !== $this->collTblfacturas && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblfacturaTableMap::getTableMap()->getCollectionClassName();

        $this->collTblfacturas = new $collectionClassName;
        $this->collTblfacturas->setModel('\propel\propel\Tblfactura');
    }

    /**
     * Gets an array of ChildTblfactura objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblcliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblfactura[] List of ChildTblfactura objects
     * @throws PropelException
     */
    public function getTblfacturas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblfacturasPartial && !$this->isNew();
        if (null === $this->collTblfacturas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblfacturas) {
                // return empty collection
                $this->initTblfacturas();
            } else {
                $collTblfacturas = ChildTblfacturaQuery::create(null, $criteria)
                    ->filterByTblcliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblfacturasPartial && count($collTblfacturas)) {
                        $this->initTblfacturas(false);

                        foreach ($collTblfacturas as $obj) {
                            if (false == $this->collTblfacturas->contains($obj)) {
                                $this->collTblfacturas->append($obj);
                            }
                        }

                        $this->collTblfacturasPartial = true;
                    }

                    return $collTblfacturas;
                }

                if ($partial && $this->collTblfacturas) {
                    foreach ($this->collTblfacturas as $obj) {
                        if ($obj->isNew()) {
                            $collTblfacturas[] = $obj;
                        }
                    }
                }

                $this->collTblfacturas = $collTblfacturas;
                $this->collTblfacturasPartial = false;
            }
        }

        return $this->collTblfacturas;
    }

    /**
     * Sets a collection of ChildTblfactura objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblfacturas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblcliente The current object (for fluent API support)
     */
    public function setTblfacturas(Collection $tblfacturas, ConnectionInterface $con = null)
    {
        /** @var ChildTblfactura[] $tblfacturasToDelete */
        $tblfacturasToDelete = $this->getTblfacturas(new Criteria(), $con)->diff($tblfacturas);


        $this->tblfacturasScheduledForDeletion = $tblfacturasToDelete;

        foreach ($tblfacturasToDelete as $tblfacturaRemoved) {
            $tblfacturaRemoved->setTblcliente(null);
        }

        $this->collTblfacturas = null;
        foreach ($tblfacturas as $tblfactura) {
            $this->addTblfactura($tblfactura);
        }

        $this->collTblfacturas = $tblfacturas;
        $this->collTblfacturasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblfactura objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblfactura objects.
     * @throws PropelException
     */
    public function countTblfacturas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblfacturasPartial && !$this->isNew();
        if (null === $this->collTblfacturas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblfacturas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblfacturas());
            }

            $query = ChildTblfacturaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblcliente($this)
                ->count($con);
        }

        return count($this->collTblfacturas);
    }

    /**
     * Method called to associate a ChildTblfactura object to this object
     * through the ChildTblfactura foreign key attribute.
     *
     * @param  ChildTblfactura $l ChildTblfactura
     * @return $this|\propel\propel\Tblcliente The current object (for fluent API support)
     */
    public function addTblfactura(ChildTblfactura $l)
    {
        if ($this->collTblfacturas === null) {
            $this->initTblfacturas();
            $this->collTblfacturasPartial = true;
        }

        if (!$this->collTblfacturas->contains($l)) {
            $this->doAddTblfactura($l);

            if ($this->tblfacturasScheduledForDeletion and $this->tblfacturasScheduledForDeletion->contains($l)) {
                $this->tblfacturasScheduledForDeletion->remove($this->tblfacturasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblfactura $tblfactura The ChildTblfactura object to add.
     */
    protected function doAddTblfactura(ChildTblfactura $tblfactura)
    {
        $this->collTblfacturas[]= $tblfactura;
        $tblfactura->setTblcliente($this);
    }

    /**
     * @param  ChildTblfactura $tblfactura The ChildTblfactura object to remove.
     * @return $this|ChildTblcliente The current object (for fluent API support)
     */
    public function removeTblfactura(ChildTblfactura $tblfactura)
    {
        if ($this->getTblfacturas()->contains($tblfactura)) {
            $pos = $this->collTblfacturas->search($tblfactura);
            $this->collTblfacturas->remove($pos);
            if (null === $this->tblfacturasScheduledForDeletion) {
                $this->tblfacturasScheduledForDeletion = clone $this->collTblfacturas;
                $this->tblfacturasScheduledForDeletion->clear();
            }
            $this->tblfacturasScheduledForDeletion[]= clone $tblfactura;
            $tblfactura->setTblcliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblcliente is new, it will return
     * an empty collection; or if this Tblcliente has previously
     * been saved, it will retrieve related Tblfacturas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblcliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblfactura[] List of ChildTblfactura objects
     */
    public function getTblfacturasJoinTblmetodopago(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblfacturaQuery::create(null, $criteria);
        $query->joinWith('Tblmetodopago', $joinBehavior);

        return $this->getTblfacturas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblcliente is new, it will return
     * an empty collection; or if this Tblcliente has previously
     * been saved, it will retrieve related Tblfacturas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblcliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblfactura[] List of ChildTblfactura objects
     */
    public function getTblfacturasJoinUsuarios(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblfacturaQuery::create(null, $criteria);
        $query->joinWith('Usuarios', $joinBehavior);

        return $this->getTblfacturas($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->clienteid = null;
        $this->codigo = null;
        $this->nombre = null;
        $this->direccion = null;
        $this->telefono = null;
        $this->ciudadid = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collTblfacturas) {
                foreach ($this->collTblfacturas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblfacturas = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblclienteTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
