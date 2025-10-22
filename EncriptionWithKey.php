<?php
    abstract class EncriptionWithKey
    {
        public $key;
        public function __construct($key)
        {
            $this->key = $key;
        }
    }
?>