<?php

namespace Core\Product\Api;

final class InternalProductApi implements ProductApi
{
    public function create(): void
    {
        dd('hello world');
    }
}
