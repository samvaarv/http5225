<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_students_index_page_render(): void
    {
        $user = User::factory()->create();
        $response = $this -> actingAs($user)->get('profile');

        $response = $this -> get('/students');
        $response->assertStatus(200);
    }

    public function test_student_creation_using_post_method(): void
    {
        $user = User::factory()->create();
        $response = $this -> actingAs($user)->get('profile');

        $response = $this -> post('/students/store', [
            'fname' => "Sam",
            'lname' => 'Set',
            'email' => 'samset@mail.com'
        ]);

        if($response) {
            
        }
    }
}
