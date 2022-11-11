<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => bcrypt('123qwe')
        ]);

        Post::create([
            'title' => 'Title 1',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas excepturi hic, in maiores et soluta dolorem iste obcaecati eum mollitia ipsum facilis animi voluptate nemo nulla culpa magni quidem error, vitae, deleniti atque tempore corrupti. Harum qui ratione alias! Nobis enim ullam perferendis pariatur doloremque dicta esse praesentium, quos distinctio ipsum. Id qui dicta possimus impedit voluptatibus cupiditate nulla quas saepe itaque illum dolores ex cumque a odit sit atque provident, blanditiis beatae animi praesentium non. Distinctio maiores dolores, ab deserunt, nostrum tenetur, consequuntur fuga incidunt facere facilis provident! Dolorum dolor dignissimos autem fuga odit aspernatur qui natus deserunt iure!',
            'image' => null
        ]);
    }
}
