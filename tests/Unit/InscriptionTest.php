<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Event;
use Database\Factories\InscriptionFactory;

class InscriptionTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_store_method_creates_new_inscription()
{
        // $user_id = User::factory()->create();
        // $event_id = Event::factory()->create();
        // $data = [
        //     'proof' => 'alala',
        //     'user_id' => $user_id->id,
        //     'event_id' => $event_id->id,
        //     'status' => 'approved',
        // ];
        
        $data = InscriptionFactory::new()->make()->toArray();


        $inscription = Inscription::factory()->create($data);


        $this->assertInstanceOf(Inscription::class, $inscription);
        $this->assertDatabaseHas('inscription', $data);
        // $this->assertEquals($inscription['proof'], $inscription->proof);
        // $this->assertEquals($user_id->id, $inscription->user_id);
        // $this->assertEquals($event_id->id, $inscription->event_id);
        // $this->assertEquals($inscription['status'], $inscription->status);


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
