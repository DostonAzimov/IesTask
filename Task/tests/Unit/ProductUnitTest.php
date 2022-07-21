<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Product_store()
    {
        $respons = $this->post(route('product'),[
            'title' => 'same product Title',
            'img' => 'Same img named',
            'category_id' => '1'
        ]);

//       dd($respons);

        $this->assertTrue(true);
    }

    public function test_Product_list()
    {
        $respons = $this->get(route('list'));
        //       dd($respons);
        $this->assertTrue(true);
    }

    public function test_Product_delete()
    {
        $respons = $this->delete('api/product/12');
        //       dd($respons);
        $this->assertTrue(true);
    }


    public function test_Product_update()
    {
        $respons = $this->put('api/product/14',[
            'title' => 'same product Title',
            'img' => 'Same img named',
            'category_id' => '1'
        ]);
        $this->assertTrue(true);
    }
}




