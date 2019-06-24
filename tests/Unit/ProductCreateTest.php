<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function productCreate()
    {
        $product = \App\Product::create([
            'title' => "",
            'image_url' => "",
            'director' => "",
            'detail' => "",
            'open_date' => "",
        ]);

        $this->assertInstanceOf(\App\Product::class, $product);

        // $product = \App\Product::find(2);

        // $this->assertArrayHasKey('title', $product);
        // $this->assertArrayHasKey('image_url', $product);
        // $this->assertArrayHasKey('director', $product);
        // $this->assertArrayHasKey('detail', $product);
        // $this->assertArrayHasKey('open_date', $product);

        // $this->assertInternalType('string', $product->title);
        // $this->assertInternalType('string', $product->image_url);
        // $this->assertInternalType('string', $product->director);
        // $this->assertInternalType('string', $product->detail);
        // $this->assertInternalType('string', $product->open_date);
    }
}
