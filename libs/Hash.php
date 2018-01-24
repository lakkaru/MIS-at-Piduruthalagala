<?php

class HASH{
    /**
     * 
     * @param string $algo The algorithm (md5, sha1, whirpool, etc)
     * @param strring $data The data to be encode
     * @param strring $salt The salt (This should be the same throughout the system probably)
     * @return strring The hashed/salted data
     */
    public static function create($algo, $data, $salt){
        $context=hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        return hash_final($context);
    }
    
}

