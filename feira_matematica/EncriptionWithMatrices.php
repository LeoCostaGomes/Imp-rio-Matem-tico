<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
class EncriptionWithMatrices extends EncriptionWithKey implements Encription
{
    public function encript(string|int $message): string
    {
        $A1 = $this->transformToArray($message);
        $A2 = $this->transformToArray($this->key);

        $len1 = count($A1);
        $len2 = count($A2);

        $maxLen = max($len1, $len2);
        $n = (int)ceil(sqrt($maxLen)); 
        if ($n < 2) {
            $n = 2;
        }

        $A1 = $this->toMatrix($A1, $n);
        $A2 = $this->toMatrix($A2, $n);

        return $this->multiplyMatrices($A1, $A2);
    }

    private function transformToArray(string|int $message): array
    {
        $lettersByNumbers = [];
        $message = strtolower((string)$message);
        foreach (str_split($message) as $char) {
        if ($char >= 'a' && $char <= 'z') {
            $num = ord($char) - ord('a') + 1;
        } elseif (ctype_digit($char)) {
            $num = (int)$char;
        } else {
            continue;
        }

        $lettersByNumbers[] = $num;
    }
        return $lettersByNumbers;
    }

    private function toMatrix(array $flatArray, int $n): array
    {
        $matrix = [];
        $index = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $matrix[$i][$j] = $flatArray[$index] ?? 0;
                $index++;
            }
        }
        return $matrix;
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
        $message = '';
        foreach ($result as $row) {
            foreach ($row as $num) {
                $letterIndex = (($num - 1) % 26) + 1;
                $char = chr($letterIndex + ord('a') - 1) == '`' ? " " : chr($letterIndex + ord('a') - 1);
                $message .= $char;
                
            }
        }

        return $message;
    }
}

