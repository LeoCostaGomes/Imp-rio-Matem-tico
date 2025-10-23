<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
class CaesarCipher extends EncriptionWithKey implements Encription
{

    public function encript(string | int $message): string
    {
        if ($this->key === null)
        {
            throw new Exception("Chave não definida");
        }
        $key = (int) $this->key;
        if ($key < 0)
        {
            throw new Exception("Chave negativa");
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