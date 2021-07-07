<?php
use App\Tag;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Hiring'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);
        $category4 = Category::create([
            'name' => 'Offers'
        ]);
        $category5 = Category::create([
            'name' => 'Updates'
        ]);
        $category6 = Category::create([
            'name' => 'Marketing'
        ]);

        $author1=User::create([
            'name'=>'Sandesh Bahak K.C.',
            'email'=>'kcsandesh@gmail.com',
            'password'=>Hash::make('password')
        ]);
        $author2=User::create([
            'name'=>'Tika Datta K.C.',
            'email'=>'tikadatta@gmail.com',
            'password'=>Hash::make('password')
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology..
            ',
            'content' => 'T accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category1->id,
            'image'=>'posts/1.jpg',
            'user_id'=>$author1->id
        ]);
        $post2 = Post::create([
            'title' => 'New published books to read by a product designer',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology.',
            'content' => ' accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.',
            'category_id' => $category2->id,
            'image'=>'posts/2.jpg',
            'user_id'=>$author2->id
        ]);
        $post3 = Post::create([
            'title' => 'This is why it time to ditch dress codes at work',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology.
            ',
            'content' => ' accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category3->id,
            'image'=>'posts/3.jpg',
            'user_id'=>$author1->id

        ]);
        $post4 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology.
            ',
            'content' => ' accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category4->id,
            'image'=>'posts/4.jpg',
            'user_id'=>$author2->id
        ]);
        $post5 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology.
            ',
            'content' => ' accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category5->id,
            'image'=>'posts/5.jpg',
            'user_id'=>$author2->id
        ]);
        $post6 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
            Computer Science and Information Technology.
            ',
            'content' => ' accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category6->id,
            'image'=>'posts/6.jpg',
            'user_id'=>$author1->id
        ]);
        $post7 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'is accepted as fulfilling in partial requirements for the degree of Bachelor of Science in
             Computer Science and Information Technology.
            ',
            'content' => '
             accepted as fulfilling in partial requirements for the degree of Bachelor of Science
            in Computer Science and Information Technology.
            ',
            'category_id' => $category1->id,
            'image'=>'posts/7.jpg',
            'user_id'=>$author2->id
        ]);
         $tag1=Tag::create([
             'name'=>'Job',
         ]);
         $tag2=Tag::create([
            'name'=>'Record',
        ]);
        $tag3=Tag::create([
            'name'=>'Progress',
        ]);
        $tag4=Tag::create([
            'name'=>'Customers',
        ]);
        $tag5=Tag::create([
            'name'=>'Milestone',
        ]);
        $tag6=Tag::create([
            'name'=>'Version',
        ]);

        $post1->tags()->attach([$tag1->id ,$tag4->id]);
        $post2->tags()->attach([$tag3->id ,$tag6->id]);
        $post3->tags()->attach([$tag5->id ,$tag2->id]);
        $post4->tags()->attach([$tag1->id ,$tag4->id]);
        $post5->tags()->attach([$tag3->id ,$tag6->id]);
        $post6->tags()->attach([$tag5->id ,$tag2->id]);
        $post7->tags()->attach([$tag1->id ,$tag4->id]);
    }
}
