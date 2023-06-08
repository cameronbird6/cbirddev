<?php

namespace App\Domain\Status\Services;

use App\Domain\Status\Contracts\CheckConnectionContract;
use App\Domain\Status\Exceptions\ConnectionFailedException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Throwable;

class RedisCheckConnection implements CheckConnectionContract
{

    public function check($connection = 'default'): bool
    {
        $isReady = true;
        try {
            $redis = Redis::connection($connection);
            $redis->info("server");
        } catch (Throwable $e) {
            Log::error(new ConnectionFailedException('redis', $connection, $e->getCode(), $e));
            $isReady = false;
        }

        return $isReady;
    }
}
