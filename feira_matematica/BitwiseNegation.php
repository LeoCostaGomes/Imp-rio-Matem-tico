<?php
    require_once("Encription.php");
    class BitwiseNegation implements Encription
    {
        public function encript(string | int $message): string
        {
            if (is_int($message))
            {
                $message = chr($message);
            }
            $bytes = unpack('C*', $message);
            
            $encriptMessage = '';
            foreach ($bytes as $byte)
            {
                $bits = str_pad(decbin($byte), 8, "0", STR_PAD_LEFT);
                
                $inverted = '';
                for ($i = 0; $i <strlen($bits); $i++)
                {
                    $inverted .= $bits[$i] == '0' ? '1' : '0';
                }

                $encriptMessage .= $inverted;
            }
            return $encriptMessage;
        }
    }
?>