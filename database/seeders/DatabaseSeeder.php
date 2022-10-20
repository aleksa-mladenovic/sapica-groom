<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Work;
use App\Models\Product;
use App\Models\Category;
use App\Models\Dog;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@sapica.com',
            'password' => '$2y$10$C80cXtRK1dqAv0870.KZYusHmRobg14vf9eT7ny5cO3uA.Rq7IkKq',
            'role_as' => '1'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@moderator.com',
            'password' => '$2y$10$C80cXtRK1dqAv0870.KZYusHmRobg14vf9eT7ny5cO3uA.Rq7IkKq',
            'role_as' => '2'
        ]);

        // Category seeds
        Category::factory()->create([
            'name' => 'Shampoos',
            'slug' => 'shampoos',
            'description' => 'All good shampoos',
            'status' => '0',
            'image' => '1663539426.jpg',
            'meta_title' => 'Shampoos',
            'meta_descrip' => 'good shampoos, shampoos, all good shampoos, good brus...',
            'meta_keywords' => 'good shampoos, shampoos, all good shampoos',
        ]);

        Category::factory()->create([
            'name' => 'Brushes',
            'slug' => 'brushes',
            'description' => 'All good Brushes',
            'status' => '0',
            'image' => '1663539470.jpg',
            'meta_title' => 'brushes',
            'meta_descrip' => 'good brushes, brushes, all good brushes, good brus...',
            'meta_keywords' => 'good brushes, brushes, all good brushes',
        ]);

        Category::factory()->create([
            'name' => 'Furminators',
            'slug' => 'furminators',
            'description' => 'All good Furminators',
            'status' => '0',
            'image' => '1663539537.jpg',
            'meta_title' => 'furminators',
            'meta_descrip' => 'good Furminators, Furminators, all good Furminators, good brus...',
            'meta_keywords' => 'good Furminators, Furminators, all good Furminators',
        ]);

        Category::factory()->create([
            'name' => 'Tooth care',
            'slug' => 'Tooth care',
            'description' => 'All good Tooth care',
            'status' => '0',
            'image' => '1664548421.jpg',
            'meta_title' => 'tooth-care',
            'meta_descrip' => 'good Tooth care, Tooth care, all good Tooth care, good brus...',
            'meta_keywords' => 'good Tooth care, Tooth care, all good Tooth care',
        ]);

        
        // Product seeds
        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Idk shampoo White breez',
            'slug' => 'idk-white',
            'small_description' => 'Idk shampoo White breez for white fur',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
            'original_price' => 12.25,
            'selling_price' => 9.99,
            'image' => '1663610645.jpg',
            'quantity' => 100,
            'status' => '0',
            'trending' => '1',
            'meta_title' => 'Idk-White-breez',
            'meta_descrip' => 'good shampoos, shampoos, all good shampoos, good brus...',
            'meta_keywords' => 'good shampoos, shampoos, all good shampoos',
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Bad brushes',
            'slug' => 'bad-brushes',
            'small_description' => 'Bad brushes dont buy this',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
            'original_price' => 2.25,
            'selling_price' => 0.99,
            'image' => '1663610770.jpg',
            'quantity' => 0,
            'status' => '0',
            'trending' => '0',
            'meta_title' => 'Bad-brush',
            'meta_descrip' => 'good shampoos, shampoos, all good shampoos, good brus...',
            'meta_keywords' => 'good shampoos, shampoos, all good shampoos',
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Furminator 3000',
            'slug' => 'furminator-3000',
            'small_description' => 'Furminator 3000...',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
            'original_price' => 15.50,
            'selling_price' => 12.99,
            'image' => '1663610725.jpg',
            'quantity' => 50,
            'status' => '0',
            'trending' => '1',
            'meta_title' => 'furminator-3000',
            'meta_descrip' => 'good shampoos, shampoos, all good shampoos, good brus...',
            'meta_keywords' => 'good shampoos, shampoos, all good shampoos',
        ]);

        Product::factory()->create([
            'category_id' => 4,
            'name' => 'Denta sticks',
            'slug' => 'denta-sticks',
            'small_description' => 'Denta sticks.',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
            'original_price' => 5.50,
            'selling_price' => 4.99,
            'quantity' => 59,
            'status' => '0',
            'trending' => '1',
            'meta_title' => 'denta-sticks',
            'meta_descrip' => 'good shampoos, shampoos, all good shampoos, good brus...',
            'meta_keywords' => 'good shampoos, shampoos, all good shampoos',
        ]);       
        
        Dog::factory()->create([
            'user_id' => '1',
            'name' => 'Dogo 1',
            'breed' => 'D.O.D.G.E',
        ]);

        // Work seeds
        Work::factory()->create([
            'dog_id' => 1,
            'title' => 'Dogo',
            'slug' => 'dogo',
            'status' => '0',
            'image1' => '1664733106.jpg',
            'image2' => '1664733111.jpg',
            'image3' => '1664733117.jpg',
            'image4' => '1664733124.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
        ]);

        Work::factory()->create([
            'dog_id' => 1,
            'title' => 'Dogo 2',
            'slug' => 'dogo 2',
            'status' => '0',
            'image2' => '1664733106.jpg',
            'image1' => '1664733111.jpg',
            'image4' => '1664733117.jpg',
            'image3' => '1664733124.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
        ]);

        Work::factory()->create([
            'dog_id' => 1,
            'title' => 'Dogo 3',
            'slug' => 'dogo 3',
            'status' => '0',
            'image4' => '1664733106.jpg',
            'image3' => '1664733111.jpg',
            'image2' => '1664733117.jpg',
            'image1' => '1664733124.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit optio quo voluptates numquam quae cumque molestiae ea inventore aspernatur. Unde illum ducimus tenetur velit harum blanditiis libero beatae repellat perferendis!',
        ]);
    }
}
