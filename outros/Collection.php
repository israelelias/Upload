<?php


abstract class Collection implements SeekableIterator , Countable {
  
    protected $object = array();
    private $pointer = 0;
    protected $total = 0;

    public function add($object) {
        $class = $this->getTargetClass();

        if(!$object instanceof $class) {
            throw new UnexpectedValueException("This is a {$class} collection");
        }

        $this->object[$this->total] = $object;
        $this->total++;

        return $this;
    }

    public function current() {
        if(isset($this->object[$this->key()])) {
            return $this->object[$this->key()];
        }

        throw new RuntimeException("Index {$this->key()} not exists as a object index");
    }

    public function key() {
        return $this->pointer;
    }

    public function next() {
        $this->pointer++;
    }

    public function rewind() {
        $this->pointer = 0;
    }

    public function valid() {
        return (isset($this->object[$this->key()]));
    }

    public function count() {
        return (int)$this->total;
    }

    public function seek($position) {
        if (!isset($this->object[$position])) {
            throw new RuntimeException("invalid seek position ($position)");
        }

        $this->pointer = $position;
    }    

    abstract public function getTargetClass();
}