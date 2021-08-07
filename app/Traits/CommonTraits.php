<?php

namespace App\Traits;

trait CommonTraits
{
    public function removeSpecialCharacters($str)
    {
        $specialChars = [',', '/', '-', '_', '?', '\''];

        foreach ($specialChars as $char) {
            $str = str_replace($char, '', $str);
        }

        return $str;
    }

    public function noWhiteSpace($str)
    {
        return str_replace(' ', '', $str);
    }

    public function makeDomain($companyName)
    {
        $companyName = $this->removeSpecialCharacters($companyName);
        return  $this->noWhiteSpace($companyName);
    }
}
