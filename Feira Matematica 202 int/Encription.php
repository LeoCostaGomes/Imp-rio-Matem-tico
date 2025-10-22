<?php
    interface Encription
    {
        public function encript(string $message, $key): string;
    }
?>