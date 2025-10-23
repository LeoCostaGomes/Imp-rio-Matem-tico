<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
class EncriptionWithMatrices extends EncriptionWithKey implements Encription
{
    public function encript(string|int $message): string
    {
        foreach (str_split(strtolower($message)) as $char) {
            if ($char >= 'a' && $char <= 'z') {
                $num = ord($char) - ord('a') + 1;
                $lettersByNumbers[] = $num;
            } else if (is_int($char)) {
                $lettersByNumbers[] = $char;
            }
        }
        $lettersByNumbers = [];
        $n = 2;
        $size = $n * $n;

        while (count($lettersByNumbers) % $size !== 0) {
            $lettersByNumbers[] = 0;
        }
        $matrices = [];

        for ($i = 0; $i < count($lettersByNumbers); $i += $size) {
            $block = array_slice($lettersByNumbers, $i, $size);
            $matrix = [];

            for ($row = 0; $row < $n; $row++) {
                $start = $row * $n;
                $matrix[] = array_slice($block, $start, $n);
            }

            $matrices[] = $matrix;
        }

        return "";
    }
}
