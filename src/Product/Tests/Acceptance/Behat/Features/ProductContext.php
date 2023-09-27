<?php

namespace Core\Product\Tests\Acceptance\Behat\Features;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;

final class ProductContext implements Context
{
    private array $productData;
    private string | bool $response;
    private mixed $httpCode;

    /**
     * @Given a product data
     */
    public function aProduct(TableNode $table): void
    {
        $this->productData = $table->getColumnsHash()[0];
    }

    /**
     * @When make the create product request
     */
    public function makeTheCreateProductRequest(): void
    {
        $data = [
            'name' => $this->productData['name'],
            'sku' => $this->productData['sku'],
            'description' => $this->productData['description'],
            'price' => (float) $this->productData['price'],
            'quantity' => (int) $this->productData['quantity'],
        ];

        $this->makePostRequest('http://app.nginx/api/product', $data);
    }

    private function makePostRequest(string $url, array $data): void
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            json_encode($data)
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json'
        ]);

        $this->response = curl_exec($ch);
        $this->httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    /**
     * @Then the product should have been created
     */
    public function theUserHasBeenCreated(): void
    {
        if (false === $this->response || $this->httpCode !== 201) {
            throw new \RuntimeException(json_decode($this->response, true)['message']);
        }
    }
}
