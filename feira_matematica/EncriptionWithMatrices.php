<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
class EncriptionWithMatrices extends EncriptionWithKey implements Encription
{
    public function encript(string|int $message): string
    {
        $n = 2;
        $size = $n * $n;
        $lettersByNumbers = $this->transformToArray($message);
        $this->key = $this->transformToArray($this->key);
        while (count($lettersByNumbers) % $size !== 0) {
            $lettersByNumbers[] = 0;
        }
        
        
        return "";
    }
    /*public function encript(string|int $message): string
    {
        $n = 2;
        $size = $n * $n;
        $lettersByNumbers = $this->transformToArray($message);
        $this->key = $this->transformToArray($this->key);

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

        $encryptedText = '';
        foreach ($matrices as $matrix) {
            $product = $this->multiplyMatrices($this->key, $matrix);
            foreach ($product as $row) {
                foreach ($row as $value) {
                    $encryptedText .= chr(($value % 26) + ord('a') - 1);
                }
            }
        }

        return $encryptedText;
    }
    */

    private function transformToArray(string|int $message): array
    {
        $lettersByNumbers = [];
        foreach (str_split(strtolower($message)) as $char) {
            if ($char >= 'a' && $char <= 'z') {
                $num = ord($char) - ord('a') + 1;
                $lettersByNumbers[] = $num;
            } else if (is_int($char)) {
                $lettersByNumbers[] = $char;
            }
        }
        return $lettersByNumbers;
    }

    private function multiplyMatrices(array $A1, array $A2): string
    {
        $rowsA = count($A1);
        $colsA = count($A1[0]);
        $rowsB = count($A2);
        $colsB = count($A2[0]);

        if ($colsA !== $rowsB) {
            throw new Exception("As matrizes não podem ser multiplicadas: tamanho incompatível.");
        }

        $result = [];
        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $sum = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $sum += $A1[$i][$k] * $A2[$k][$j];
                }
                $result[$i][$j] = $sum;
            }
        }
        return "";
    }
}
