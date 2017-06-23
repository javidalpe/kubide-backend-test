<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;

class NoteControllerTest extends TestCase
{
    use DatabaseMigrations;


    public function testListShowEmptyArray()
    {
        $response = $this->json('GET', '/api/notes');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([]);
    }


    public function testPostAndView()
    {
        $response = $this->json('POST', '/api/notes', ['username' => 'Sally', 'body' => 'Hello Kubide']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'username' => 'Sally',
                'body' => 'Hello Kubide'
            ]);
    }

    public function testListShowArrayWithElement()
    {
        $note = factory(Note::class)->create();

        $response = $this->json('GET', '/api/notes');

        $response
            ->assertStatus(200)
            ->assertJson([[
                'username' => $note->username,
                'body' => $note->body,
                'favorite' => $note->favorite
            ]]);
    }

    public function testListFavoriteShowArrayWithElement()
    {
        $note = factory(Note::class)->create(['favorite' => true]);

        $response = $this->json('GET', '/api/notes?favorite=1');

        $response
            ->assertStatus(200)
            ->assertJson([[
                'username' => $note->username,
                'body' => $note->body,
                'favorite' => $note->favorite
            ]]);
    }

    public function testListFavoriteFiltersDatabase()
    {
        $note = factory(Note::class)->create(['favorite' => false]);

        $response = $this->json('GET', '/api/notes?favorite=1');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([]);
    }

    public function testShowNoteReturnsArray()
    {
        $note = factory(Note::class)->create();

        $response = $this->json('GET', '/api/notes/' . $note->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'username' => $note->username,
                'body' => $note->body,
                'favorite' => $note->favorite
            ]);
    }

    public function testPostFavoriteShowNoteWithFavoriteTrue()
    {
        $note = factory(Note::class)->create(['favorite' => false]);

        $response = $this->json('POST', '/api/notes/' . $note->id . '/favorite');
        $response = $this->json('GET', '/api/notes/' . $note->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'username' => $note->username,
                'body' => $note->body,
                'favorite' => true
            ]);
    }

    public function testPostUnfavoriteShowNoteWithFavoriteFalse()
    {
        $note = factory(Note::class)->create(['favorite' => true]);

        $response = $this->json('POST', '/api/notes/' . $note->id . '/unfavorite');
        $response = $this->json('GET', '/api/notes/' . $note->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'username' => $note->username,
                'body' => $note->body,
                'favorite' => false
            ]);
    }

}
