<?php

namespace Support\Traits;

use \Support\General\Config AS Support;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Helpers
{
    /**
     * get token from header
     *
     * @return string
     */
    public function getToken()
    {
        $authorization = request()->header(Support::AUTH_KEY);
        if (!Str::startsWith($authorization, Support::AUTH_PREFIX)) {
            return "";
        }

        return Str::substr($authorization, Str::length(Support::AUTH_PREFIX));
    }

    /**
     * db begin transaction
     */
    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    /**
     * db commit
     */
    public function commit()
    {
        DB::commit();
    }

    /**
     * db rollback
     */
    public function rollBack()
    {
        DB::rollBack();
    }

    public function currency_format(string $number)
    {
        return number_format($number, 0, ",", ".");
    }

    public function create_token(): string
    {
        return Str::random(Support::TOKEN_LENGTH);
    }
}
