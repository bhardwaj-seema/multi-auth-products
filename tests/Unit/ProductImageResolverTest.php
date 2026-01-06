<?php

namespace Tests\Unit;

use App\Services\ProductImgResolver;
use PHPUnit\Framework\TestCase;

class ProductImageResolverTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function it_returns_default_image_when_image_is_null()
    {
        $this->assertEquals(
            'default.png',
            ProductImgResolver::resolve(null)
        );
    }

    /** @test */
    public function it_returns_default_image_when_image_is_empty()
    {
        $this->assertEquals(
            'default.png',
            ProductImgResolver::resolve('')
        );
    }

    /** @test */
    public function it_returns_given_image_when_present()
    {
        $this->assertEquals(
            'phone.png',
            ProductImgResolver::resolve('phone.png')
        );
    }
}
