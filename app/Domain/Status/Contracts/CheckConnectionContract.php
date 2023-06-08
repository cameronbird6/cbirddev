<?php

namespace App\Domain\Status\Contracts;

interface CheckConnectionContract
{
    public function check($connection = null): bool;
}
