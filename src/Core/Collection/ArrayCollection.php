<?php

namespace ShiptorRussiaApiClient\Client\Core\Collection;

/**
 * Collection class
 */
class ArrayCollection implements \Iterator {
    protected $elements = null;
    public function __construct($elements = []) {
        $this->elements = !empty($elements)?$elements:[];
    }
    public function get($key) {
        return isset($this->elements[$key]) ?$this->elements[$key]: null;
    }
    public function add($key, $value) {
        return $this->elements[$key] = $value;
    }
    public function containsKey($key) {
        return isset($this->elements[$key]) || array_key_exists($key, $this->elements);
    }
    public function contains($value) {
        return (bool) array_search($value, $this->elements);
    }
    public function hasValue($key){
        return boolval($this->containsKey($key) && !empty($this->elements[$key]));
    }
    public function count() {
        return count($this->elements);
    }
    function rewind() {
        return reset($this->elements);
    }
    function current() {
        return current($this->elements);
    }
    function key() {
        return key($this->elements);
    }
    function next() {
        return next($this->elements);
    }
    function valid() {
        return key($this->elements) !== null;
    }
    function toArray(){
        return $this->elements;
    }
}
