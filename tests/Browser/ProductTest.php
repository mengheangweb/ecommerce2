<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Product;

class ProductTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListProduct()
    {
        $this->browse(function (Browser $browser) {
            $product = Product::factory()->create();
            $browser->visit('/product')
                    ->assertSee($product->name);
        });
    }
}
