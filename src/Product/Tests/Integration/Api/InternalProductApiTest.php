<?php

declare(strict_types=1);

namespace Core\Product\Tests\Integration\Api;

use Core\Product\Api\IO\Input\ProductInput;
use Core\Product\Api\ProductApi;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Tests\CreatesApplication;

final class InternalProductApiTest extends TestCase
{
    use CreatesApplication;

    private ProductApi $productApi;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productApi = App::make(ProductApi::class);
    }

    public function testShouldPersistTheProduct(): void
    {
        $productInput = $this->givenProductInput();
        $this->whenCreateProductApiIsExecuted($productInput);
        $this->thenTheProductShouldHaveBeenCreated($productInput);
    }

    private function givenProductInput(): ProductInput
    {
        return new ProductInput(
            null,
            'test product integration',
            'sku-test-integration',
            'description test',
            234.5,
            12
        );
    }

    private function whenCreateProductApiIsExecuted(ProductInput $productInput): void
    {
        $this->productApi->create($productInput);
    }

    private function thenTheProductShouldHaveBeenCreated(ProductInput $productInput): void
    {
        $product = DB::table('products')->where('name', $productInput->name())->first();

        self::assertSame($productInput->name(), $product->name);
        self::assertSame($productInput->sku(), $product->sku);
        self::assertSame($productInput->description(), $product->description);
        self::assertSame($productInput->price(), (float) $product->price);
        self::assertSame($productInput->quantity(), (int) $product->quantity);
    }
}
