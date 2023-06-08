<?php

namespace App\Domain\Status\Services;

use App\Domain\Status\Contracts\CheckConnectionContract;
use App\Domain\Status\Exceptions\ConnectionFailedException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MysqlCheckConnection implements CheckConnectionContract
{

    public function check($connection = 'mysql'): bool
    {
        $isReady = true;
        try {
            DB::connection($connection)->getPdo();
        } catch (Exception $e) {
            Log::error(new ConnectionFailedException('mysql', $connection, $e->getCode(), $e));
            $isReady = false;
        }

        return $isReady;
    }
}
