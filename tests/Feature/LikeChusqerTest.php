<?php

namespace Tests\Feature;

use App\Chusqer;
use App\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeChusqerTest extends TestCase
{
    /**
     * Probamos que un usuario no logueado no pueda dar a like
     */
    public function testNoLogedUser()
    {
        $user = Factory(User::class)->create();

        $chusquer = Factory(Chusqer::class)->create(['user_id' => $user->id]);

        $response = $this->post('/chusqers/like/' . $chusquer->id);

        $response->assertStatus(302);
        $response->assertSee('Redirecting to http://chusqr.test/login');
        $this->assertDatabaseMissing('like_chusqers', ['user_id' => $user->id, 'chusqer_id' => $chusquer->id]);

    }

    /**
     * Probamos que un usuario logueado pueda dar a like
     */
    public function testLogedUser()
    {
        $user = Factory(User::class)->create();

        $chusquer = Factory(Chusqer::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/chusqers/like/' . $chusquer->id);

        $response->assertStatus(302);
        $this->assertDatabaseHas('like_chusqers', ['user_id' => $user->id, 'chusqer_id' => $chusquer->id]);
    }

    /**
     * Probamos que se pueda eliminar un like
     */
    public function testDeleteLikedChusqer()
    {
        $user = Factory(User::class)->create();

        $chusquer = Factory(Chusqer::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/chusqers/like/' . $chusquer->id);

        $response->assertStatus(302);
        $this->assertDatabaseHas('like_chusqers', ['user_id' => $user->id, 'chusqer_id' => $chusquer->id]);

        $response = $this->actingAs($user)->delete('/chusqers/like/' . $chusquer->id);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('like_chusqers', ['user_id' => $user->id, 'chusqer_id' => $chusquer->id]);
    }

    /**
     * Probamos que podamos los usuarios que le ha dado like a un chusqer
     */
    public function testSeeUserLikesChusqers()
    {
        $user = Factory(User::class)->create();

        $chusquer = Factory(Chusqer::class)->create(['user_id' => $user->id]);

        $this->actingAs($user)->post('/chusqers/like/' . $chusquer->id);

        $response = $this->get('/chusqers/like/' . $chusquer->id);

        $response->assertStatus(200);
        $response->assertSee($user->name);
    }
}
