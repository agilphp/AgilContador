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
use propel\propel\Tblcategoria as ChildTblcategoria;
use propel\propel\TblcategoriaQuery as ChildTblcategoriaQuery;
use propel\propel\Tblegresodetalle as ChildTblegresodetalle;
use propel\propel\TblegresodetalleQuery as ChildTblegresodetalleQuery;
use propel\propel\Tblfacturadetalle as ChildTblfacturadetalle;
use propel\propel\TblfacturadetalleQuery as ChildTblfacturadetalleQuery;
use propel\propel\Tblingresodetalle as ChildTblingresodetalle;
use propel\propel\TblingresodetalleQuery as ChildTblingresodetalleQuery;
use propel\propel\Tblproductocosto as ChildTblproductocosto;
use propel\propel\TblproductocostoQuery as ChildTblproductocostoQuery;
use propel\propel\Tblproductoprecio as ChildTblproductoprecio;
use propel\propel\TblproductoprecioQuery as ChildTblproductoprecioQuery;
use propel\propel\Tblproductos as ChildTblproductos;
use propel\propel\TblproductosQuery as ChildTblproductosQuery;
use propel\propel\Map\TblegresodetalleTableMap;
use propel\propel\Map\TblfacturadetalleTableMap;
use propel\propel\Map\TblingresodetalleTableMap;
use propel\propel\Map\TblproductocostoTableMap;
use propel\propel\Map\TblproductoprecioTableMap;
use propel\propel\Map\TblproductosTableMap;

/**
 * Base class that represents a row from the 'tblproductos' table.
 *
 *
 *
 * @package    propel.generator.propel.propel.Base
 */
abstract class Tblproductos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\propel\\propel\\Map\\TblproductosTableMap';


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
     * The value for the productoid field.
     *
     * @var        string
     */
    protected $productoid;

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
     * The value for the lineaid field.
     *
     * @var        int
     */
    protected $lineaid;

    /**
     * @var        ChildTblcategoria
     */
    protected $aTblcategoria;

    /**
     * @var        ObjectCollection|ChildTblegresodetalle[] Collection to store aggregation of ChildTblegresodetalle objects.
     */
    protected $collTblegresodetalles;
    protected $collTblegresodetallesPartial;

    /**
     * @var        ObjectCollection|ChildTblfacturadetalle[] Collection to store aggregation of ChildTblfacturadetalle objects.
     */
    protected $collTblfacturadetalles;
    protected $collTblfacturadetallesPartial;

    /**
     * @var        ObjectCollection|ChildTblingresodetalle[] Collection to store aggregation of ChildTblingresodetalle objects.
     */
    protected $collTblingresodetalles;
    protected $collTblingresodetallesPartial;

    /**
     * @var        ObjectCollection|ChildTblproductocosto[] Collection to store aggregation of ChildTblproductocosto objects.
     */
    protected $collTblproductocostos;
    protected $collTblproductocostosPartial;

    /**
     * @var        ObjectCollection|ChildTblproductoprecio[] Collection to store aggregation of ChildTblproductoprecio objects.
     */
    protected $collTblproductoprecios;
    protected $collTblproductopreciosPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblegresodetalle[]
     */
    protected $tblegresodetallesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblfacturadetalle[]
     */
    protected $tblfacturadetallesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblingresodetalle[]
     */
    protected $tblingresodetallesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblproductocosto[]
     */
    protected $tblproductocostosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblproductoprecio[]
     */
    protected $tblproductopreciosScheduledForDeletion = null;

    /**
     * Initializes internal state of propel\propel\Base\Tblproductos object.
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
     * Compares this with another <code>Tblproductos</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblproductos</code>, delegates to
     * <code>equals(Tblproductos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tblproductos The current object, for fluid interface
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
     * Get the [productoid] column value.
     *
     * @return string
     */
    public function getProductoid()
    {
        return $this->productoid;
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
     * Get the [lineaid] column value.
     *
     * @return int
     */
    public function getLineaid()
    {
        return $this->lineaid;
    }

    /**
     * Set the value of [productoid] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function setProductoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->productoid !== $v) {
            $this->productoid = $v;
            $this->modifiedColumns[TblproductosTableMap::COL_PRODUCTOID] = true;
        }

        return $this;
    } // setProductoid()

    /**
     * Set the value of [codigo] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function setCodigo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo !== $v) {
            $this->codigo = $v;
            $this->modifiedColumns[TblproductosTableMap::COL_CODIGO] = true;
        }

        return $this;
    } // setCodigo()

    /**
     * Set the value of [nombre] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[TblproductosTableMap::COL_NOMBRE] = true;
        }

        return $this;
    } // setNombre()

    /**
     * Set the value of [lineaid] column.
     *
     * @param int $v new value
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function setLineaid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lineaid !== $v) {
            $this->lineaid = $v;
            $this->modifiedColumns[TblproductosTableMap::COL_LINEAID] = true;
        }

        if ($this->aTblcategoria !== null && $this->aTblcategoria->getLineaid() !== $v) {
            $this->aTblcategoria = null;
        }

        return $this;
    } // setLineaid()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblproductosTableMap::translateFieldName('Productoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->productoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblproductosTableMap::translateFieldName('Codigo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->codigo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblproductosTableMap::translateFieldName('Nombre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nombre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblproductosTableMap::translateFieldName('Lineaid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lineaid = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = TblproductosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\propel\\propel\\Tblproductos'), 0, $e);
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
        if ($this->aTblcategoria !== null && $this->lineaid !== $this->aTblcategoria->getLineaid()) {
            $this->aTblcategoria = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(TblproductosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblproductosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTblcategoria = null;
            $this->collTblegresodetalles = null;

            $this->collTblfacturadetalles = null;

            $this->collTblingresodetalles = null;

            $this->collTblproductocostos = null;

            $this->collTblproductoprecios = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblproductos::setDeleted()
     * @see Tblproductos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblproductosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblproductosTableMap::DATABASE_NAME);
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
                TblproductosTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTblcategoria !== null) {
                if ($this->aTblcategoria->isModified() || $this->aTblcategoria->isNew()) {
                    $affectedRows += $this->aTblcategoria->save($con);
                }
                $this->setTblcategoria($this->aTblcategoria);
            }

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

            if ($this->tblegresodetallesScheduledForDeletion !== null) {
                if (!$this->tblegresodetallesScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblegresodetallesScheduledForDeletion as $tblegresodetalle) {
                        // need to save related object because we set the relation to null
                        $tblegresodetalle->save($con);
                    }
                    $this->tblegresodetallesScheduledForDeletion = null;
                }
            }

            if ($this->collTblegresodetalles !== null) {
                foreach ($this->collTblegresodetalles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblfacturadetallesScheduledForDeletion !== null) {
                if (!$this->tblfacturadetallesScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblfacturadetallesScheduledForDeletion as $tblfacturadetalle) {
                        // need to save related object because we set the relation to null
                        $tblfacturadetalle->save($con);
                    }
                    $this->tblfacturadetallesScheduledForDeletion = null;
                }
            }

            if ($this->collTblfacturadetalles !== null) {
                foreach ($this->collTblfacturadetalles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblingresodetallesScheduledForDeletion !== null) {
                if (!$this->tblingresodetallesScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblingresodetallesScheduledForDeletion as $tblingresodetalle) {
                        // need to save related object because we set the relation to null
                        $tblingresodetalle->save($con);
                    }
                    $this->tblingresodetallesScheduledForDeletion = null;
                }
            }

            if ($this->collTblingresodetalles !== null) {
                foreach ($this->collTblingresodetalles as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblproductocostosScheduledForDeletion !== null) {
                if (!$this->tblproductocostosScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblproductocostosScheduledForDeletion as $tblproductocosto) {
                        // need to save related object because we set the relation to null
                        $tblproductocosto->save($con);
                    }
                    $this->tblproductocostosScheduledForDeletion = null;
                }
            }

            if ($this->collTblproductocostos !== null) {
                foreach ($this->collTblproductocostos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tblproductopreciosScheduledForDeletion !== null) {
                if (!$this->tblproductopreciosScheduledForDeletion->isEmpty()) {
                    foreach ($this->tblproductopreciosScheduledForDeletion as $tblproductoprecio) {
                        // need to save related object because we set the relation to null
                        $tblproductoprecio->save($con);
                    }
                    $this->tblproductopreciosScheduledForDeletion = null;
                }
            }

            if ($this->collTblproductoprecios !== null) {
                foreach ($this->collTblproductoprecios as $referrerFK) {
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

        $this->modifiedColumns[TblproductosTableMap::COL_PRODUCTOID] = true;
        if (null !== $this->productoid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblproductosTableMap::COL_PRODUCTOID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblproductosTableMap::COL_PRODUCTOID)) {
            $modifiedColumns[':p' . $index++]  = 'productoId';
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_CODIGO)) {
            $modifiedColumns[':p' . $index++]  = 'codigo';
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = 'nombre';
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_LINEAID)) {
            $modifiedColumns[':p' . $index++]  = 'lineaId';
        }

        $sql = sprintf(
            'INSERT INTO tblproductos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'productoId':
                        $stmt->bindValue($identifier, $this->productoid, PDO::PARAM_INT);
                        break;
                    case 'codigo':
                        $stmt->bindValue($identifier, $this->codigo, PDO::PARAM_STR);
                        break;
                    case 'nombre':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case 'lineaId':
                        $stmt->bindValue($identifier, $this->lineaid, PDO::PARAM_INT);
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
        $this->setProductoid($pk);

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
        $pos = TblproductosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getProductoid();
                break;
            case 1:
                return $this->getCodigo();
                break;
            case 2:
                return $this->getNombre();
                break;
            case 3:
                return $this->getLineaid();
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

        if (isset($alreadyDumpedObjects['Tblproductos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblproductos'][$this->hashCode()] = true;
        $keys = TblproductosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getProductoid(),
            $keys[1] => $this->getCodigo(),
            $keys[2] => $this->getNombre(),
            $keys[3] => $this->getLineaid(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTblcategoria) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblcategoria';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblcategoria';
                        break;
                    default:
                        $key = 'Tblcategoria';
                }

                $result[$key] = $this->aTblcategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTblegresodetalles) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblegresodetalles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblegresodetalles';
                        break;
                    default:
                        $key = 'Tblegresodetalles';
                }

                $result[$key] = $this->collTblegresodetalles->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblfacturadetalles) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblfacturadetalles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblfacturadetalles';
                        break;
                    default:
                        $key = 'Tblfacturadetalles';
                }

                $result[$key] = $this->collTblfacturadetalles->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblingresodetalles) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblingresodetalles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblingresodetalles';
                        break;
                    default:
                        $key = 'Tblingresodetalles';
                }

                $result[$key] = $this->collTblingresodetalles->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblproductocostos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblproductocostos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblproductocostos';
                        break;
                    default:
                        $key = 'Tblproductocostos';
                }

                $result[$key] = $this->collTblproductocostos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTblproductoprecios) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tblproductoprecios';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tblproductoprecios';
                        break;
                    default:
                        $key = 'Tblproductoprecios';
                }

                $result[$key] = $this->collTblproductoprecios->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\propel\propel\Tblproductos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblproductosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\propel\propel\Tblproductos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setProductoid($value);
                break;
            case 1:
                $this->setCodigo($value);
                break;
            case 2:
                $this->setNombre($value);
                break;
            case 3:
                $this->setLineaid($value);
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
        $keys = TblproductosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setProductoid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCodigo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNombre($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLineaid($arr[$keys[3]]);
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
     * @return $this|\propel\propel\Tblproductos The current object, for fluid interface
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
        $criteria = new Criteria(TblproductosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblproductosTableMap::COL_PRODUCTOID)) {
            $criteria->add(TblproductosTableMap::COL_PRODUCTOID, $this->productoid);
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_CODIGO)) {
            $criteria->add(TblproductosTableMap::COL_CODIGO, $this->codigo);
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_NOMBRE)) {
            $criteria->add(TblproductosTableMap::COL_NOMBRE, $this->nombre);
        }
        if ($this->isColumnModified(TblproductosTableMap::COL_LINEAID)) {
            $criteria->add(TblproductosTableMap::COL_LINEAID, $this->lineaid);
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
        $criteria = ChildTblproductosQuery::create();
        $criteria->add(TblproductosTableMap::COL_PRODUCTOID, $this->productoid);

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
        $validPk = null !== $this->getProductoid();

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
        return $this->getProductoid();
    }

    /**
     * Generic method to set the primary key (productoid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setProductoid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getProductoid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \propel\propel\Tblproductos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCodigo($this->getCodigo());
        $copyObj->setNombre($this->getNombre());
        $copyObj->setLineaid($this->getLineaid());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTblegresodetalles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblegresodetalle($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblfacturadetalles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblfacturadetalle($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblingresodetalles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblingresodetalle($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblproductocostos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblproductocosto($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTblproductoprecios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblproductoprecio($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setProductoid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \propel\propel\Tblproductos Clone of current object.
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
     * Declares an association between this object and a ChildTblcategoria object.
     *
     * @param  ChildTblcategoria $v
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTblcategoria(ChildTblcategoria $v = null)
    {
        if ($v === null) {
            $this->setLineaid(NULL);
        } else {
            $this->setLineaid($v->getLineaid());
        }

        $this->aTblcategoria = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTblcategoria object, it will not be re-added.
        if ($v !== null) {
            $v->addTblproductos($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTblcategoria object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTblcategoria The associated ChildTblcategoria object.
     * @throws PropelException
     */
    public function getTblcategoria(ConnectionInterface $con = null)
    {
        if ($this->aTblcategoria === null && ($this->lineaid != 0)) {
            $this->aTblcategoria = ChildTblcategoriaQuery::create()->findPk($this->lineaid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTblcategoria->addTblproductoss($this);
             */
        }

        return $this->aTblcategoria;
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
        if ('Tblegresodetalle' == $relationName) {
            $this->initTblegresodetalles();
            return;
        }
        if ('Tblfacturadetalle' == $relationName) {
            $this->initTblfacturadetalles();
            return;
        }
        if ('Tblingresodetalle' == $relationName) {
            $this->initTblingresodetalles();
            return;
        }
        if ('Tblproductocosto' == $relationName) {
            $this->initTblproductocostos();
            return;
        }
        if ('Tblproductoprecio' == $relationName) {
            $this->initTblproductoprecios();
            return;
        }
    }

    /**
     * Clears out the collTblegresodetalles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblegresodetalles()
     */
    public function clearTblegresodetalles()
    {
        $this->collTblegresodetalles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblegresodetalles collection loaded partially.
     */
    public function resetPartialTblegresodetalles($v = true)
    {
        $this->collTblegresodetallesPartial = $v;
    }

    /**
     * Initializes the collTblegresodetalles collection.
     *
     * By default this just sets the collTblegresodetalles collection to an empty array (like clearcollTblegresodetalles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblegresodetalles($overrideExisting = true)
    {
        if (null !== $this->collTblegresodetalles && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblegresodetalleTableMap::getTableMap()->getCollectionClassName();

        $this->collTblegresodetalles = new $collectionClassName;
        $this->collTblegresodetalles->setModel('\propel\propel\Tblegresodetalle');
    }

    /**
     * Gets an array of ChildTblegresodetalle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblproductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblegresodetalle[] List of ChildTblegresodetalle objects
     * @throws PropelException
     */
    public function getTblegresodetalles(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblegresodetallesPartial && !$this->isNew();
        if (null === $this->collTblegresodetalles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblegresodetalles) {
                // return empty collection
                $this->initTblegresodetalles();
            } else {
                $collTblegresodetalles = ChildTblegresodetalleQuery::create(null, $criteria)
                    ->filterByTblproductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblegresodetallesPartial && count($collTblegresodetalles)) {
                        $this->initTblegresodetalles(false);

                        foreach ($collTblegresodetalles as $obj) {
                            if (false == $this->collTblegresodetalles->contains($obj)) {
                                $this->collTblegresodetalles->append($obj);
                            }
                        }

                        $this->collTblegresodetallesPartial = true;
                    }

                    return $collTblegresodetalles;
                }

                if ($partial && $this->collTblegresodetalles) {
                    foreach ($this->collTblegresodetalles as $obj) {
                        if ($obj->isNew()) {
                            $collTblegresodetalles[] = $obj;
                        }
                    }
                }

                $this->collTblegresodetalles = $collTblegresodetalles;
                $this->collTblegresodetallesPartial = false;
            }
        }

        return $this->collTblegresodetalles;
    }

    /**
     * Sets a collection of ChildTblegresodetalle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblegresodetalles A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function setTblegresodetalles(Collection $tblegresodetalles, ConnectionInterface $con = null)
    {
        /** @var ChildTblegresodetalle[] $tblegresodetallesToDelete */
        $tblegresodetallesToDelete = $this->getTblegresodetalles(new Criteria(), $con)->diff($tblegresodetalles);


        $this->tblegresodetallesScheduledForDeletion = $tblegresodetallesToDelete;

        foreach ($tblegresodetallesToDelete as $tblegresodetalleRemoved) {
            $tblegresodetalleRemoved->setTblproductos(null);
        }

        $this->collTblegresodetalles = null;
        foreach ($tblegresodetalles as $tblegresodetalle) {
            $this->addTblegresodetalle($tblegresodetalle);
        }

        $this->collTblegresodetalles = $tblegresodetalles;
        $this->collTblegresodetallesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblegresodetalle objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblegresodetalle objects.
     * @throws PropelException
     */
    public function countTblegresodetalles(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblegresodetallesPartial && !$this->isNew();
        if (null === $this->collTblegresodetalles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblegresodetalles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblegresodetalles());
            }

            $query = ChildTblegresodetalleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblproductos($this)
                ->count($con);
        }

        return count($this->collTblegresodetalles);
    }

    /**
     * Method called to associate a ChildTblegresodetalle object to this object
     * through the ChildTblegresodetalle foreign key attribute.
     *
     * @param  ChildTblegresodetalle $l ChildTblegresodetalle
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function addTblegresodetalle(ChildTblegresodetalle $l)
    {
        if ($this->collTblegresodetalles === null) {
            $this->initTblegresodetalles();
            $this->collTblegresodetallesPartial = true;
        }

        if (!$this->collTblegresodetalles->contains($l)) {
            $this->doAddTblegresodetalle($l);

            if ($this->tblegresodetallesScheduledForDeletion and $this->tblegresodetallesScheduledForDeletion->contains($l)) {
                $this->tblegresodetallesScheduledForDeletion->remove($this->tblegresodetallesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblegresodetalle $tblegresodetalle The ChildTblegresodetalle object to add.
     */
    protected function doAddTblegresodetalle(ChildTblegresodetalle $tblegresodetalle)
    {
        $this->collTblegresodetalles[]= $tblegresodetalle;
        $tblegresodetalle->setTblproductos($this);
    }

    /**
     * @param  ChildTblegresodetalle $tblegresodetalle The ChildTblegresodetalle object to remove.
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function removeTblegresodetalle(ChildTblegresodetalle $tblegresodetalle)
    {
        if ($this->getTblegresodetalles()->contains($tblegresodetalle)) {
            $pos = $this->collTblegresodetalles->search($tblegresodetalle);
            $this->collTblegresodetalles->remove($pos);
            if (null === $this->tblegresodetallesScheduledForDeletion) {
                $this->tblegresodetallesScheduledForDeletion = clone $this->collTblegresodetalles;
                $this->tblegresodetallesScheduledForDeletion->clear();
            }
            $this->tblegresodetallesScheduledForDeletion[]= $tblegresodetalle;
            $tblegresodetalle->setTblproductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblproductos is new, it will return
     * an empty collection; or if this Tblproductos has previously
     * been saved, it will retrieve related Tblegresodetalles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblproductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblegresodetalle[] List of ChildTblegresodetalle objects
     */
    public function getTblegresodetallesJoinTblegreso(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblegresodetalleQuery::create(null, $criteria);
        $query->joinWith('Tblegreso', $joinBehavior);

        return $this->getTblegresodetalles($query, $con);
    }

    /**
     * Clears out the collTblfacturadetalles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblfacturadetalles()
     */
    public function clearTblfacturadetalles()
    {
        $this->collTblfacturadetalles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblfacturadetalles collection loaded partially.
     */
    public function resetPartialTblfacturadetalles($v = true)
    {
        $this->collTblfacturadetallesPartial = $v;
    }

    /**
     * Initializes the collTblfacturadetalles collection.
     *
     * By default this just sets the collTblfacturadetalles collection to an empty array (like clearcollTblfacturadetalles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblfacturadetalles($overrideExisting = true)
    {
        if (null !== $this->collTblfacturadetalles && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblfacturadetalleTableMap::getTableMap()->getCollectionClassName();

        $this->collTblfacturadetalles = new $collectionClassName;
        $this->collTblfacturadetalles->setModel('\propel\propel\Tblfacturadetalle');
    }

    /**
     * Gets an array of ChildTblfacturadetalle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblproductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblfacturadetalle[] List of ChildTblfacturadetalle objects
     * @throws PropelException
     */
    public function getTblfacturadetalles(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblfacturadetallesPartial && !$this->isNew();
        if (null === $this->collTblfacturadetalles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblfacturadetalles) {
                // return empty collection
                $this->initTblfacturadetalles();
            } else {
                $collTblfacturadetalles = ChildTblfacturadetalleQuery::create(null, $criteria)
                    ->filterByTblproductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblfacturadetallesPartial && count($collTblfacturadetalles)) {
                        $this->initTblfacturadetalles(false);

                        foreach ($collTblfacturadetalles as $obj) {
                            if (false == $this->collTblfacturadetalles->contains($obj)) {
                                $this->collTblfacturadetalles->append($obj);
                            }
                        }

                        $this->collTblfacturadetallesPartial = true;
                    }

                    return $collTblfacturadetalles;
                }

                if ($partial && $this->collTblfacturadetalles) {
                    foreach ($this->collTblfacturadetalles as $obj) {
                        if ($obj->isNew()) {
                            $collTblfacturadetalles[] = $obj;
                        }
                    }
                }

                $this->collTblfacturadetalles = $collTblfacturadetalles;
                $this->collTblfacturadetallesPartial = false;
            }
        }

        return $this->collTblfacturadetalles;
    }

    /**
     * Sets a collection of ChildTblfacturadetalle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblfacturadetalles A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function setTblfacturadetalles(Collection $tblfacturadetalles, ConnectionInterface $con = null)
    {
        /** @var ChildTblfacturadetalle[] $tblfacturadetallesToDelete */
        $tblfacturadetallesToDelete = $this->getTblfacturadetalles(new Criteria(), $con)->diff($tblfacturadetalles);


        $this->tblfacturadetallesScheduledForDeletion = $tblfacturadetallesToDelete;

        foreach ($tblfacturadetallesToDelete as $tblfacturadetalleRemoved) {
            $tblfacturadetalleRemoved->setTblproductos(null);
        }

        $this->collTblfacturadetalles = null;
        foreach ($tblfacturadetalles as $tblfacturadetalle) {
            $this->addTblfacturadetalle($tblfacturadetalle);
        }

        $this->collTblfacturadetalles = $tblfacturadetalles;
        $this->collTblfacturadetallesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblfacturadetalle objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblfacturadetalle objects.
     * @throws PropelException
     */
    public function countTblfacturadetalles(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblfacturadetallesPartial && !$this->isNew();
        if (null === $this->collTblfacturadetalles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblfacturadetalles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblfacturadetalles());
            }

            $query = ChildTblfacturadetalleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblproductos($this)
                ->count($con);
        }

        return count($this->collTblfacturadetalles);
    }

    /**
     * Method called to associate a ChildTblfacturadetalle object to this object
     * through the ChildTblfacturadetalle foreign key attribute.
     *
     * @param  ChildTblfacturadetalle $l ChildTblfacturadetalle
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function addTblfacturadetalle(ChildTblfacturadetalle $l)
    {
        if ($this->collTblfacturadetalles === null) {
            $this->initTblfacturadetalles();
            $this->collTblfacturadetallesPartial = true;
        }

        if (!$this->collTblfacturadetalles->contains($l)) {
            $this->doAddTblfacturadetalle($l);

            if ($this->tblfacturadetallesScheduledForDeletion and $this->tblfacturadetallesScheduledForDeletion->contains($l)) {
                $this->tblfacturadetallesScheduledForDeletion->remove($this->tblfacturadetallesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblfacturadetalle $tblfacturadetalle The ChildTblfacturadetalle object to add.
     */
    protected function doAddTblfacturadetalle(ChildTblfacturadetalle $tblfacturadetalle)
    {
        $this->collTblfacturadetalles[]= $tblfacturadetalle;
        $tblfacturadetalle->setTblproductos($this);
    }

    /**
     * @param  ChildTblfacturadetalle $tblfacturadetalle The ChildTblfacturadetalle object to remove.
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function removeTblfacturadetalle(ChildTblfacturadetalle $tblfacturadetalle)
    {
        if ($this->getTblfacturadetalles()->contains($tblfacturadetalle)) {
            $pos = $this->collTblfacturadetalles->search($tblfacturadetalle);
            $this->collTblfacturadetalles->remove($pos);
            if (null === $this->tblfacturadetallesScheduledForDeletion) {
                $this->tblfacturadetallesScheduledForDeletion = clone $this->collTblfacturadetalles;
                $this->tblfacturadetallesScheduledForDeletion->clear();
            }
            $this->tblfacturadetallesScheduledForDeletion[]= $tblfacturadetalle;
            $tblfacturadetalle->setTblproductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblproductos is new, it will return
     * an empty collection; or if this Tblproductos has previously
     * been saved, it will retrieve related Tblfacturadetalles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblproductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblfacturadetalle[] List of ChildTblfacturadetalle objects
     */
    public function getTblfacturadetallesJoinTblfactura(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblfacturadetalleQuery::create(null, $criteria);
        $query->joinWith('Tblfactura', $joinBehavior);

        return $this->getTblfacturadetalles($query, $con);
    }

    /**
     * Clears out the collTblingresodetalles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblingresodetalles()
     */
    public function clearTblingresodetalles()
    {
        $this->collTblingresodetalles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblingresodetalles collection loaded partially.
     */
    public function resetPartialTblingresodetalles($v = true)
    {
        $this->collTblingresodetallesPartial = $v;
    }

    /**
     * Initializes the collTblingresodetalles collection.
     *
     * By default this just sets the collTblingresodetalles collection to an empty array (like clearcollTblingresodetalles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblingresodetalles($overrideExisting = true)
    {
        if (null !== $this->collTblingresodetalles && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblingresodetalleTableMap::getTableMap()->getCollectionClassName();

        $this->collTblingresodetalles = new $collectionClassName;
        $this->collTblingresodetalles->setModel('\propel\propel\Tblingresodetalle');
    }

    /**
     * Gets an array of ChildTblingresodetalle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblproductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblingresodetalle[] List of ChildTblingresodetalle objects
     * @throws PropelException
     */
    public function getTblingresodetalles(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblingresodetallesPartial && !$this->isNew();
        if (null === $this->collTblingresodetalles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblingresodetalles) {
                // return empty collection
                $this->initTblingresodetalles();
            } else {
                $collTblingresodetalles = ChildTblingresodetalleQuery::create(null, $criteria)
                    ->filterByTblproductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblingresodetallesPartial && count($collTblingresodetalles)) {
                        $this->initTblingresodetalles(false);

                        foreach ($collTblingresodetalles as $obj) {
                            if (false == $this->collTblingresodetalles->contains($obj)) {
                                $this->collTblingresodetalles->append($obj);
                            }
                        }

                        $this->collTblingresodetallesPartial = true;
                    }

                    return $collTblingresodetalles;
                }

                if ($partial && $this->collTblingresodetalles) {
                    foreach ($this->collTblingresodetalles as $obj) {
                        if ($obj->isNew()) {
                            $collTblingresodetalles[] = $obj;
                        }
                    }
                }

                $this->collTblingresodetalles = $collTblingresodetalles;
                $this->collTblingresodetallesPartial = false;
            }
        }

        return $this->collTblingresodetalles;
    }

    /**
     * Sets a collection of ChildTblingresodetalle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblingresodetalles A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function setTblingresodetalles(Collection $tblingresodetalles, ConnectionInterface $con = null)
    {
        /** @var ChildTblingresodetalle[] $tblingresodetallesToDelete */
        $tblingresodetallesToDelete = $this->getTblingresodetalles(new Criteria(), $con)->diff($tblingresodetalles);


        $this->tblingresodetallesScheduledForDeletion = $tblingresodetallesToDelete;

        foreach ($tblingresodetallesToDelete as $tblingresodetalleRemoved) {
            $tblingresodetalleRemoved->setTblproductos(null);
        }

        $this->collTblingresodetalles = null;
        foreach ($tblingresodetalles as $tblingresodetalle) {
            $this->addTblingresodetalle($tblingresodetalle);
        }

        $this->collTblingresodetalles = $tblingresodetalles;
        $this->collTblingresodetallesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblingresodetalle objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblingresodetalle objects.
     * @throws PropelException
     */
    public function countTblingresodetalles(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblingresodetallesPartial && !$this->isNew();
        if (null === $this->collTblingresodetalles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblingresodetalles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblingresodetalles());
            }

            $query = ChildTblingresodetalleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblproductos($this)
                ->count($con);
        }

        return count($this->collTblingresodetalles);
    }

    /**
     * Method called to associate a ChildTblingresodetalle object to this object
     * through the ChildTblingresodetalle foreign key attribute.
     *
     * @param  ChildTblingresodetalle $l ChildTblingresodetalle
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function addTblingresodetalle(ChildTblingresodetalle $l)
    {
        if ($this->collTblingresodetalles === null) {
            $this->initTblingresodetalles();
            $this->collTblingresodetallesPartial = true;
        }

        if (!$this->collTblingresodetalles->contains($l)) {
            $this->doAddTblingresodetalle($l);

            if ($this->tblingresodetallesScheduledForDeletion and $this->tblingresodetallesScheduledForDeletion->contains($l)) {
                $this->tblingresodetallesScheduledForDeletion->remove($this->tblingresodetallesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblingresodetalle $tblingresodetalle The ChildTblingresodetalle object to add.
     */
    protected function doAddTblingresodetalle(ChildTblingresodetalle $tblingresodetalle)
    {
        $this->collTblingresodetalles[]= $tblingresodetalle;
        $tblingresodetalle->setTblproductos($this);
    }

    /**
     * @param  ChildTblingresodetalle $tblingresodetalle The ChildTblingresodetalle object to remove.
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function removeTblingresodetalle(ChildTblingresodetalle $tblingresodetalle)
    {
        if ($this->getTblingresodetalles()->contains($tblingresodetalle)) {
            $pos = $this->collTblingresodetalles->search($tblingresodetalle);
            $this->collTblingresodetalles->remove($pos);
            if (null === $this->tblingresodetallesScheduledForDeletion) {
                $this->tblingresodetallesScheduledForDeletion = clone $this->collTblingresodetalles;
                $this->tblingresodetallesScheduledForDeletion->clear();
            }
            $this->tblingresodetallesScheduledForDeletion[]= $tblingresodetalle;
            $tblingresodetalle->setTblproductos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblproductos is new, it will return
     * an empty collection; or if this Tblproductos has previously
     * been saved, it will retrieve related Tblingresodetalles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblproductos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblingresodetalle[] List of ChildTblingresodetalle objects
     */
    public function getTblingresodetallesJoinTblingreso(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblingresodetalleQuery::create(null, $criteria);
        $query->joinWith('Tblingreso', $joinBehavior);

        return $this->getTblingresodetalles($query, $con);
    }

    /**
     * Clears out the collTblproductocostos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblproductocostos()
     */
    public function clearTblproductocostos()
    {
        $this->collTblproductocostos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblproductocostos collection loaded partially.
     */
    public function resetPartialTblproductocostos($v = true)
    {
        $this->collTblproductocostosPartial = $v;
    }

    /**
     * Initializes the collTblproductocostos collection.
     *
     * By default this just sets the collTblproductocostos collection to an empty array (like clearcollTblproductocostos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblproductocostos($overrideExisting = true)
    {
        if (null !== $this->collTblproductocostos && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblproductocostoTableMap::getTableMap()->getCollectionClassName();

        $this->collTblproductocostos = new $collectionClassName;
        $this->collTblproductocostos->setModel('\propel\propel\Tblproductocosto');
    }

    /**
     * Gets an array of ChildTblproductocosto objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblproductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblproductocosto[] List of ChildTblproductocosto objects
     * @throws PropelException
     */
    public function getTblproductocostos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblproductocostosPartial && !$this->isNew();
        if (null === $this->collTblproductocostos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblproductocostos) {
                // return empty collection
                $this->initTblproductocostos();
            } else {
                $collTblproductocostos = ChildTblproductocostoQuery::create(null, $criteria)
                    ->filterByTblproductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblproductocostosPartial && count($collTblproductocostos)) {
                        $this->initTblproductocostos(false);

                        foreach ($collTblproductocostos as $obj) {
                            if (false == $this->collTblproductocostos->contains($obj)) {
                                $this->collTblproductocostos->append($obj);
                            }
                        }

                        $this->collTblproductocostosPartial = true;
                    }

                    return $collTblproductocostos;
                }

                if ($partial && $this->collTblproductocostos) {
                    foreach ($this->collTblproductocostos as $obj) {
                        if ($obj->isNew()) {
                            $collTblproductocostos[] = $obj;
                        }
                    }
                }

                $this->collTblproductocostos = $collTblproductocostos;
                $this->collTblproductocostosPartial = false;
            }
        }

        return $this->collTblproductocostos;
    }

    /**
     * Sets a collection of ChildTblproductocosto objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblproductocostos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function setTblproductocostos(Collection $tblproductocostos, ConnectionInterface $con = null)
    {
        /** @var ChildTblproductocosto[] $tblproductocostosToDelete */
        $tblproductocostosToDelete = $this->getTblproductocostos(new Criteria(), $con)->diff($tblproductocostos);


        $this->tblproductocostosScheduledForDeletion = $tblproductocostosToDelete;

        foreach ($tblproductocostosToDelete as $tblproductocostoRemoved) {
            $tblproductocostoRemoved->setTblproductos(null);
        }

        $this->collTblproductocostos = null;
        foreach ($tblproductocostos as $tblproductocosto) {
            $this->addTblproductocosto($tblproductocosto);
        }

        $this->collTblproductocostos = $tblproductocostos;
        $this->collTblproductocostosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblproductocosto objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblproductocosto objects.
     * @throws PropelException
     */
    public function countTblproductocostos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblproductocostosPartial && !$this->isNew();
        if (null === $this->collTblproductocostos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblproductocostos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblproductocostos());
            }

            $query = ChildTblproductocostoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblproductos($this)
                ->count($con);
        }

        return count($this->collTblproductocostos);
    }

    /**
     * Method called to associate a ChildTblproductocosto object to this object
     * through the ChildTblproductocosto foreign key attribute.
     *
     * @param  ChildTblproductocosto $l ChildTblproductocosto
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function addTblproductocosto(ChildTblproductocosto $l)
    {
        if ($this->collTblproductocostos === null) {
            $this->initTblproductocostos();
            $this->collTblproductocostosPartial = true;
        }

        if (!$this->collTblproductocostos->contains($l)) {
            $this->doAddTblproductocosto($l);

            if ($this->tblproductocostosScheduledForDeletion and $this->tblproductocostosScheduledForDeletion->contains($l)) {
                $this->tblproductocostosScheduledForDeletion->remove($this->tblproductocostosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblproductocosto $tblproductocosto The ChildTblproductocosto object to add.
     */
    protected function doAddTblproductocosto(ChildTblproductocosto $tblproductocosto)
    {
        $this->collTblproductocostos[]= $tblproductocosto;
        $tblproductocosto->setTblproductos($this);
    }

    /**
     * @param  ChildTblproductocosto $tblproductocosto The ChildTblproductocosto object to remove.
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function removeTblproductocosto(ChildTblproductocosto $tblproductocosto)
    {
        if ($this->getTblproductocostos()->contains($tblproductocosto)) {
            $pos = $this->collTblproductocostos->search($tblproductocosto);
            $this->collTblproductocostos->remove($pos);
            if (null === $this->tblproductocostosScheduledForDeletion) {
                $this->tblproductocostosScheduledForDeletion = clone $this->collTblproductocostos;
                $this->tblproductocostosScheduledForDeletion->clear();
            }
            $this->tblproductocostosScheduledForDeletion[]= $tblproductocosto;
            $tblproductocosto->setTblproductos(null);
        }

        return $this;
    }

    /**
     * Clears out the collTblproductoprecios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTblproductoprecios()
     */
    public function clearTblproductoprecios()
    {
        $this->collTblproductoprecios = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTblproductoprecios collection loaded partially.
     */
    public function resetPartialTblproductoprecios($v = true)
    {
        $this->collTblproductopreciosPartial = $v;
    }

    /**
     * Initializes the collTblproductoprecios collection.
     *
     * By default this just sets the collTblproductoprecios collection to an empty array (like clearcollTblproductoprecios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTblproductoprecios($overrideExisting = true)
    {
        if (null !== $this->collTblproductoprecios && !$overrideExisting) {
            return;
        }

        $collectionClassName = TblproductoprecioTableMap::getTableMap()->getCollectionClassName();

        $this->collTblproductoprecios = new $collectionClassName;
        $this->collTblproductoprecios->setModel('\propel\propel\Tblproductoprecio');
    }

    /**
     * Gets an array of ChildTblproductoprecio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTblproductos is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTblproductoprecio[] List of ChildTblproductoprecio objects
     * @throws PropelException
     */
    public function getTblproductoprecios(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTblproductopreciosPartial && !$this->isNew();
        if (null === $this->collTblproductoprecios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTblproductoprecios) {
                // return empty collection
                $this->initTblproductoprecios();
            } else {
                $collTblproductoprecios = ChildTblproductoprecioQuery::create(null, $criteria)
                    ->filterByTblproductos($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTblproductopreciosPartial && count($collTblproductoprecios)) {
                        $this->initTblproductoprecios(false);

                        foreach ($collTblproductoprecios as $obj) {
                            if (false == $this->collTblproductoprecios->contains($obj)) {
                                $this->collTblproductoprecios->append($obj);
                            }
                        }

                        $this->collTblproductopreciosPartial = true;
                    }

                    return $collTblproductoprecios;
                }

                if ($partial && $this->collTblproductoprecios) {
                    foreach ($this->collTblproductoprecios as $obj) {
                        if ($obj->isNew()) {
                            $collTblproductoprecios[] = $obj;
                        }
                    }
                }

                $this->collTblproductoprecios = $collTblproductoprecios;
                $this->collTblproductopreciosPartial = false;
            }
        }

        return $this->collTblproductoprecios;
    }

    /**
     * Sets a collection of ChildTblproductoprecio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $tblproductoprecios A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function setTblproductoprecios(Collection $tblproductoprecios, ConnectionInterface $con = null)
    {
        /** @var ChildTblproductoprecio[] $tblproductopreciosToDelete */
        $tblproductopreciosToDelete = $this->getTblproductoprecios(new Criteria(), $con)->diff($tblproductoprecios);


        $this->tblproductopreciosScheduledForDeletion = $tblproductopreciosToDelete;

        foreach ($tblproductopreciosToDelete as $tblproductoprecioRemoved) {
            $tblproductoprecioRemoved->setTblproductos(null);
        }

        $this->collTblproductoprecios = null;
        foreach ($tblproductoprecios as $tblproductoprecio) {
            $this->addTblproductoprecio($tblproductoprecio);
        }

        $this->collTblproductoprecios = $tblproductoprecios;
        $this->collTblproductopreciosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tblproductoprecio objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Tblproductoprecio objects.
     * @throws PropelException
     */
    public function countTblproductoprecios(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTblproductopreciosPartial && !$this->isNew();
        if (null === $this->collTblproductoprecios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTblproductoprecios) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTblproductoprecios());
            }

            $query = ChildTblproductoprecioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTblproductos($this)
                ->count($con);
        }

        return count($this->collTblproductoprecios);
    }

    /**
     * Method called to associate a ChildTblproductoprecio object to this object
     * through the ChildTblproductoprecio foreign key attribute.
     *
     * @param  ChildTblproductoprecio $l ChildTblproductoprecio
     * @return $this|\propel\propel\Tblproductos The current object (for fluent API support)
     */
    public function addTblproductoprecio(ChildTblproductoprecio $l)
    {
        if ($this->collTblproductoprecios === null) {
            $this->initTblproductoprecios();
            $this->collTblproductopreciosPartial = true;
        }

        if (!$this->collTblproductoprecios->contains($l)) {
            $this->doAddTblproductoprecio($l);

            if ($this->tblproductopreciosScheduledForDeletion and $this->tblproductopreciosScheduledForDeletion->contains($l)) {
                $this->tblproductopreciosScheduledForDeletion->remove($this->tblproductopreciosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTblproductoprecio $tblproductoprecio The ChildTblproductoprecio object to add.
     */
    protected function doAddTblproductoprecio(ChildTblproductoprecio $tblproductoprecio)
    {
        $this->collTblproductoprecios[]= $tblproductoprecio;
        $tblproductoprecio->setTblproductos($this);
    }

    /**
     * @param  ChildTblproductoprecio $tblproductoprecio The ChildTblproductoprecio object to remove.
     * @return $this|ChildTblproductos The current object (for fluent API support)
     */
    public function removeTblproductoprecio(ChildTblproductoprecio $tblproductoprecio)
    {
        if ($this->getTblproductoprecios()->contains($tblproductoprecio)) {
            $pos = $this->collTblproductoprecios->search($tblproductoprecio);
            $this->collTblproductoprecios->remove($pos);
            if (null === $this->tblproductopreciosScheduledForDeletion) {
                $this->tblproductopreciosScheduledForDeletion = clone $this->collTblproductoprecios;
                $this->tblproductopreciosScheduledForDeletion->clear();
            }
            $this->tblproductopreciosScheduledForDeletion[]= $tblproductoprecio;
            $tblproductoprecio->setTblproductos(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aTblcategoria) {
            $this->aTblcategoria->removeTblproductos($this);
        }
        $this->productoid = null;
        $this->codigo = null;
        $this->nombre = null;
        $this->lineaid = null;
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
            if ($this->collTblegresodetalles) {
                foreach ($this->collTblegresodetalles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblfacturadetalles) {
                foreach ($this->collTblfacturadetalles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblingresodetalles) {
                foreach ($this->collTblingresodetalles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblproductocostos) {
                foreach ($this->collTblproductocostos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTblproductoprecios) {
                foreach ($this->collTblproductoprecios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblegresodetalles = null;
        $this->collTblfacturadetalles = null;
        $this->collTblingresodetalles = null;
        $this->collTblproductocostos = null;
        $this->collTblproductoprecios = null;
        $this->aTblcategoria = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblproductosTableMap::DEFAULT_STRING_FORMAT);
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
