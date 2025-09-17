<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::create(["title" => "Dashboard", "menu_id" => null, "path" => "dashboard", "icon" => "fas fa-home", "sort" => 1]);

        Menu::create(["title" => "Clientes", "menu_id" => null, "path" => "clients", "icon" => "fa-solid fa-user-group", "sort" => 2]);

        Menu::create(["title" => "Usuarios", "menu_id" => null, "path" => "users", "icon" => "user", "sort" => 3]);

        Menu::create(["title" => "Menus", "menu_id" => null, "path" => "menus", "icon" => "list", "sort" => 12]);

        Menu::create(["title" => "Roles", "menu_id" => null, "path" => "roles", "icon" => "user-secret", "sort" => 13]);


        // seed guest
        Menu::create(["title" => "Home", "menu_id" => null, "path" => "home", "icon" => "fas fa-home", "sort" => 1]);

    }
}
