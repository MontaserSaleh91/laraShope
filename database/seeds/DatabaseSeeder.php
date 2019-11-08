<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Address;
use App\Product;
use App\Image;
use App\Review;
use App\Category;
use App\Tag;
use App\Ticket;
use App\TicketType;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class,1000)->create();
        factory(User::class,500)->create();
        factory(Product::class,1500)->create();
        factory(Image::class,3500)->create();
        factory(Review::class,3500)->create();
        factory(Category::class,50)->create();
        factory(Tag::class,150)->create();
        factory(Ticket::class,150)->create();

        $ticketType = [

            'refund',
            'damage',
            'shipment',
            'missing'
        ];
        foreach($ticketType as $ticket){
            TicketType::create(['name'=>$ticket]);
        }

        $roles = [

            'admin',
            'support',
            'client',
        ];
        foreach($roles as $role){
            Role::create(['role'=>$role]);
        }
    }
}
