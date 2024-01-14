<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        // create user data
        $user = User::factory()->create();

        // acting as an authenticated user
        $this->actingAs($user);

        $response = $this->get(route('product.index'));

        // assert status response
        $response->assertStatus(200);

        // assert view
        $response->assertViewIs('product.index');
    }

    public function test_create(): void
    {
        // create user data
        $user = User::factory()->create();

        // acting as an authenticated user
        $this->actingAs($user);

        // access create route
        $response = $this->get(route('product.create'));

        // assert status response
        $response->assertStatus(200);

        // assert view
        $response->assertViewIs('product.create');
    }

    public function test_store_product_failed(): void
    {
        // create user data
        $user = User::factory()->create();

        // acting as an authenticated user
        $this->actingAs($user);

        // test data
        $testData = [
            'nama' => 'Test Product',
            'deskripsi' => 'Test Description',
            'stok' => 10,
        ];

        // post data
        $response = $this->post(route('product.store'), $testData);

        // assert redirection because of fail condition in validation
        $response->assertStatus(302);

        // check product is missing since process is fail
        $this->assertDatabaseMissing('products', $testData);
    }

    public function test_store_product_successfully(): void
    {
        // create user data
        $user = User::factory()->create();

        // acting as an authenticated user
        $this->actingAs($user);

        // test data
        $testData = [
            'nama' => 'Test Product',
            'deskripsi' => 'Test Description',
            'harga' => 100000.00,
            'stok' => 10,
        ];

        // post data
        $response = $this->post(route('product.store'), $testData);

        // assert redirect after storing data
        $response->assertRedirect(route('product.index'));

        // check data in database
        $this->assertDatabaseHas('products', $testData);
    }
}
