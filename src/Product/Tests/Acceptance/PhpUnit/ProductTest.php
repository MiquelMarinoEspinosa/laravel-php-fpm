<?php

namespace Core\Product\Tests\Acceptance\PhpUnit;

use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

final class ProductTest extends TestCase
{
    use CreatesApplication;

    public function testShouldCreateTheProduct(): void
    {
        $response = $this->post('/api/product', [
            "name" => "another phone",
            "sku" => "UDA-P-10",
            "description" => "great phone",
            "price" => 222.0,
            "quantity" => 3
        ]);

        $response->assertStatus(201);
    }
}
