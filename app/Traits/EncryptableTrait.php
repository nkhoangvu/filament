<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str; 

trait EncryptableTrait
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            if ($this->isEncrypted($value)) {
                $value = Crypt::decrypt($value);
            }
        }

        return $value;
    }

    private function isEncrypted($value)
    {
        return !empty($value) && is_string($value) && Str::startsWith($value, ['eyJ', 'base64:']);
    }
    
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }
    
        return parent::setAttribute($key, $value);
    }    

}