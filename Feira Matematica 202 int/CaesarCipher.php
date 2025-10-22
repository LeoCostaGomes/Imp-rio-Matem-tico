<?php
include("Encription.php");
class CaesarCipher implements Encription
{
    public function encript(string $message, $key): string
    {
        $characters = str_split($message);
        $encrypted_chars = [];
        $key = (int) $key;
        if ($key < 0)
        {
            new Exception("Chave negativa", 1);
            return "Erro! chave negativa";
        }
        $key = $key % 26;
        $encrypted_message = '';

        for ($i = 0; $i < strlen($message); $i++) {
        $char = $message[$i];
        
        if (ctype_alpha($char)) {
            $offset = ctype_upper($char) ? ord('A') : ord('a');
            
            $char_num = ord($char) - $offset;
            $encrypted_num = ($char_num + $key) % 26;
            $encrypted_char = chr($encrypted_num + $offset);
            
            $encrypted_message .= $encrypted_char;
        } else {
            $encrypted_message .= $char;
        }
    }
    return $encrypted_message;
}
}