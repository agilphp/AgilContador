<?php

namespace propel\propel\Base;

use \DateTime;
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
use Propel\Runtime\Util\PropelDateTime;
use propel\propel\Tblingreso as ChildTblingreso;
use propel\propel\TblingresoQuery as ChildTblingresoQuery;
use propel\propel\Tblingresodetalle as ChildTblingresodetalle;
use propel\propel\TblingresodetalleQuery as ChildTblingresodetalleQuery;
use propel\propel\Map\TblingresoTableMap;
use propel\propel\Map\TblingresodetalleTableMap;

/**
 * Base class that represents a row from the 'tblingreso' table.
 *
 *
 *
 * @package    propel.generator.propel.propel.Base
 */
abstract class Tblingreso implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\propel\\propel\\Map\\TblingresoTableMap';


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
     * The value for the ingresoid field.
     *
     * @var        string
     */
    protected $ingresoid;

    /**
     * The value for the numero field.
     *
     * @var        int
     */
    protected $numero;

    /**
     * The value for the fecha field.
     *
     * @var        DateTime
     */
    protected $fecha;

    /**
     * The value for the comentario field.
     *
     * @var        string
     */
    protected $comentario;

    /**
     * @var        ObjectCollection|ChildTblingresodetalle[] Collection to store aggregation of ChildTblingresodetalle objects.
     */
    protected $collTblingresodetalles;
    protected $collTblingresodetallesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTblingresodetalle[]
     */
    protected $tblingresodetallesScheduledForDeletion = null;

    /**
     * Initializes internal state of propel\propel\Base\Tblingreso object.
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
     * Compares this with another <code>Tblingreso</code> instance.  If
     * <code>obj</code> is an instance of <code>Tblingreso</code>, delegates to
     * <code>equals(Tblingreso)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Tblingreso The current object, for fluid interface
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
     * Get the [ingresoid] column value.
     *
     * @return string
     */
    public function getIngresoid()
    {
        return $this->ingresoid;
    }

    /**
     * Get the [numero] column value.
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get the [optionally formatted] temporal [fecha] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFecha($format = NULL)
    {
        if ($format === null) {
            return $this->fecha;
        } else {
            return $this->fecha instanceof \DateTimeInterface ? $this->fecha->format($format) : null;
        }
    }

    /**
     * Get the [comentario] column value.
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of [ingresoid] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblingreso The current object (for fluent API support)
     */
    public function setIngresoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ingresoid !== $v) {
            $this->ingresoid = $v;
            $this->modifiedColumns[TblingresoTableMap::COL_INGRESOID] = true;
        }

        return $this;
    } // setIngresoid()

    /**
     * Set the value of [numero] column.
     *
     * @param int $v new value
     * @return $this|\propel\propel\Tblingreso The current object (for fluent API support)
     */
    public function setNumero($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->numero !== $v) {
            $this->numero = $v;
            $this->modifiedColumns[TblingresoTableMap::COL_NUMERO] = true;
        }

        return $this;
    } // setNumero()

    /**
     * Sets the value of [fecha] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\propel\propel\Tblingreso The current object (for fluent API support)
     */
    public function setFecha($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha !== null || $dt !== null) {
            if ($this->fecha === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->fecha->format("Y-m-d H:i:s.u")) {
                $this->fecha = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TblingresoTableMap::COL_FECHA] = true;
            }
        } // if either are not null

        return $this;
    } // setFecha()

    /**
     * Set the value of [comentario] column.
     *
     * @param string $v new value
     * @return $this|\propel\propel\Tblingreso The current object (for fluent API support)
     */
    public function setComentario($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comentario !== $v) {
            $this->comentario = $v;
            $this->modifiedColumns[TblingresoTableMap::COL_COMENTARIO] = true;
        }

        return $this;
    } // setComentario()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TblingresoTableMap::translateFieldName('Ingresoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ingresoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TblingresoTableMap::translateFieldName('Numero', TableMap::TYPE_PHPNAME, $indexType)];
            $this->numero = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TblingresoTableMap::translateFieldName('Fecha', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->fecha = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TblingresoTableMap::translateFieldName('Comentario', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comentario = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = TblingresoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\propel\\propel\\Tblingreso'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TblingresoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTblingresoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTblingresodetalles = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Tblingreso::setDeleted()
     * @see Tblingreso::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTblingresoQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblingresoTableMap::DATABASE_NAME);
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
                TblingresoTableMap::addInstanceToPool($this);
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TblingresoTableMap::COL_INGRESOID)) {
            $modifiedColumns[':p' . $index++]  = 'ingresoId';
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_NUMERO)) {
            $modifiedColumns[':p' . $index++]  = 'numero';
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_FECHA)) {
            $modifiedColumns[':p' . $index++]  = 'fecha';
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_COMENTARIO)) {
            $modifiedColumns[':p' . $index++]  = 'comentario';
        }

        $sql = sprintf(
            'INSERT INTO tblingreso (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ingresoId':
                        $stmt->bindValue($identifier, $this->ingresoid, PDO::PARAM_INT);
                        break;
                    case 'numero':
                        $stmt->bindValue($identifier, $this->numero, PDO::PARAM_INT);
                        break;
                    case 'fecha':
                        $stmt->bindValue($identifier, $this->fecha ? $this->fecha->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'comentario':
                        $stmt->bindValue($identifier, $this->comentario, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

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
        $pos = TblingresoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIngresoid();
                break;
            case 1:
                return $this->getNumero();
                break;
            case 2:
                return $this->getFecha();
                break;
            case 3:
                return $this->getComentario();
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

        if (isset($alreadyDumpedObjects['Tblingreso'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Tblingreso'][$this->hashCode()] = true;
        $keys = TblingresoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIngresoid(),
            $keys[1] => $this->getNumero(),
            $keys[2] => $this->getFecha(),
            $keys[3] => $this->getComentario(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
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
     * @return $this|\propel\propel\Tblingreso
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TblingresoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\propel\propel\Tblingreso
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIngresoid($value);
                break;
            case 1:
                $this->setNumero($value);
                break;
            case 2:
                $this->setFecha($value);
                break;
            case 3:
                $this->setComentario($value);
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
        $keys = TblingresoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIngresoid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNumero($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFecha($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setComentario($arr[$keys[3]]);
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
     * @return $this|\propel\propel\Tblingreso The current object, for fluid interface
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
        $criteria = new Criteria(TblingresoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TblingresoTableMap::COL_INGRESOID)) {
            $criteria->add(TblingresoTableMap::COL_INGRESOID, $this->ingresoid);
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_NUMERO)) {
            $criteria->add(TblingresoTableMap::COL_NUMERO, $this->numero);
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_FECHA)) {
            $criteria->add(TblingresoTableMap::COL_FECHA, $this->fecha);
        }
        if ($this->isColumnModified(TblingresoTableMap::COL_COMENTARIO)) {
            $criteria->add(TblingresoTableMap::COL_COMENTARIO, $this->comentario);
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
        $criteria = ChildTblingresoQuery::create();
        $criteria->add(TblingresoTableMap::COL_INGRESOID, $this->ingresoid);

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
        $validPk = null !== $this->getIngresoid();

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
        return $this->getIngresoid();
    }

    /**
     * Generic method to set the primary key (ingresoid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIngresoid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIngresoid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \propel\propel\Tblingreso (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIngresoid($this->getIngresoid());
        $copyObj->setNumero($this->getNumero());
        $copyObj->setFecha($this->getFecha());
        $copyObj->setComentario($this->getComentario());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTblingresodetalles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTblingresodetalle($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \propel\propel\Tblingreso Clone of current object.
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
        if ('Tblingresodetalle' == $relationName) {
            $this->initTblingresodetalles();
            return;
        }
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
     * If this ChildTblingreso is new, it will return
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
                    ->filterByTblingreso($this)
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
     * @return $this|ChildTblingreso The current object (for fluent API support)
     */
    public function setTblingresodetalles(Collection $tblingresodetalles, ConnectionInterface $con = null)
    {
        /** @var ChildTblingresodetalle[] $tblingresodetallesToDelete */
        $tblingresodetallesToDelete = $this->getTblingresodetalles(new Criteria(), $con)->diff($tblingresodetalles);


        $this->tblingresodetallesScheduledForDeletion = $tblingresodetallesToDelete;

        foreach ($tblingresodetallesToDelete as $tblingresodetalleRemoved) {
            $tblingresodetalleRemoved->setTblingreso(null);
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
                ->filterByTblingreso($this)
                ->count($con);
        }

        return count($this->collTblingresodetalles);
    }

    /**
     * Method called to associate a ChildTblingresodetalle object to this object
     * through the ChildTblingresodetalle foreign key attribute.
     *
     * @param  ChildTblingresodetalle $l ChildTblingresodetalle
     * @return $this|\propel\propel\Tblingreso The current object (for fluent API support)
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
        $tblingresodetalle->setTblingreso($this);
    }

    /**
     * @param  ChildTblingresodetalle $tblingresodetalle The ChildTblingresodetalle object to remove.
     * @return $this|ChildTblingreso The current object (for fluent API support)
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
            $tblingresodetalle->setTblingreso(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Tblingreso is new, it will return
     * an empty collection; or if this Tblingreso has previously
     * been saved, it will retrieve related Tblingresodetalles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Tblingreso.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTblingresodetalle[] List of ChildTblingresodetalle objects
     */
    public function getTblingresodetallesJoinTblproductos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTblingresodetalleQuery::create(null, $criteria);
        $query->joinWith('Tblproductos', $joinBehavior);

        return $this->getTblingresodetalles($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->ingresoid = null;
        $this->numero = null;
        $this->fecha = null;
        $this->comentario = null;
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
            if ($this->collTblingresodetalles) {
                foreach ($this->collTblingresodetalles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTblingresodetalles = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TblingresoTableMap::DEFAULT_STRING_FORMAT);
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
