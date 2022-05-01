<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'mouse.jpg',
            'price'         => 100.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'teclado.jpg',
            'price'         => 200.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'fone.jpg',
            'price'         => 150.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'mouse.jpg',
            'price'         => 100.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'teclado.jpg',
            'price'         => 200.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'fone.jpg',
            'price'         => 150.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'mouse.jpg',
            'price'         => 100.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'teclado.jpg',
            'price'         => 200.3
        ]);
        Product::create([
            'title'         => 'Nome do Produto ' . uniqid(date('YmdHis')),
            'description'   => 'Descrição do Produto ' . uniqid(date('YmdHis')),
            'image'         => 'fone.jpg',
            'price'         => 150.3
        ]);
    }
}
