<?php

namespace Dashifen\Collection;

abstract class AbstractCollection implements CollectionInterface
{
    protected array $collection = [];
    
    /**
     * getCollection
     * 
     * Returns the entire collection.
     * 
     * @return array
     */
    public function getCollection (): array
    {
        return $this->collection;
    }
    
    /**
     * resetCollection
     * 
     * Resets the entire collection.
     * 
     * @return void
     */
    public function resetCollection (): void
    {
        $this->collection = [];
    }
    
    /**
     * current
     * 
     * Returns the value at the current index in our collection.
     * 
     * @return mixed
     */
    public function current ()
    {
        return current($this->collection);
    }
    
    /**
     * next
     * 
     * Moves to the next index within the collection
     */
    public function next (): void
    {
        next($this->collection);
    }
    
    /**
     * key
     * 
     * Returns the current index within the collection.
     * 
     * @return mixed|null
     */
    public function key ()
    {
        return key($this->collection);
    }
    
    /**
     * valid
     * 
     * Returns true if the current index is valid.
     * 
     * @return bool
     */
    public function valid (): bool
    {
        return ($key = $this->key()) !== null && $key !== false;
    }
    
    /**
     * rewind
     * 
     * Moves back to the beginning of the collection.
     * 
     * @return void
     */
    public function rewind (): void
    {
        reset($this->collection);
    }
    
    /**
     * offsetExists
     * 
     * Returns true if the specified index exists within the collection.
     * 
     * @param mixed $index
     *
     * @return bool
     */
    public function offsetExists ($index): bool
    {
        return isset($this->collection[$index]);
    }
    
    /**
     * offsetGet
     *
     * Returns the value at the specified index within the collection.
     *
     * @param mixed $index
     *
     * @return mixed|null
     */
    public function offsetGet ($index)
    {
        return $this->collection[$index] ?? null;
    }
    
    /**
     * offsetSet
     *
     * Adds the value to the collection at the specified index.
     *
     * @param mixed $index
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet ($index, $value)
    {
        $this->collection[$index] = $value;
    }
    
    /**
     * offsetUnset
     *
     * Removes the specified index from the collection.
     *
     * @param mixed $index
     *
     * @return void
     */
    public function offsetUnset ($index)
    {
        unset($this->collection[$index]);
    }
}
