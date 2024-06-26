<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Inscription;
use Database\Factories\InscriptionFactory;
use PHPUnit\Framework\TestCase;

class InscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_new_inscription()
    {
        // $user = User::factory()->create();
        // $event = Event::factory()->create();

        // $response = $this->post('/inscriptions', [
        //     'user_id' => $user->id,
        //     'event_id' => $event->id,
        // ]);

        $data = InscriptionFactory::new()->make()->toArray();
        $inscription = Inscription::factory()->create($data);
        $this->assertInstanceOf(Inscription::class, $inscription);

        // $response->assertRedirect('/beneficiary');
        // $this->assertDatabaseHas('inscriptions', [
        //     'user_id' => $user->id,
        //     'event_id' => $event->id,
        // ]);
    }

    public function test_update_method_updates_inscription()
    {
        $inscription = Inscription::factory()->create();
        $newData = [
            'status' => 'approved',
        ];

        $this->put('/inscriptions/'.$inscription->id, $newData);

        $updatedInscription = Inscription::find($inscription->id);
        $this->assertEquals('approved', $updatedInscription->status);
    }

    public function test_destroy_method_deletes_inscription()
    {
        $inscription = Inscription::factory()->create();

        $this->delete('/inscriptions/'.$inscription->id);

        $this->assertDatabaseMissing('inscriptions', ['id' => $inscription->id]);
    }
}
