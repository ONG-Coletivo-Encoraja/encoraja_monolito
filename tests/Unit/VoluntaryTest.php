<?php

namespace Tests\Unit;

use App\Models\Voluntary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoluntaryTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Testa a criação de um novo voluntário.
     */
    public function test_creates_a_new_voluntary(): void
    {
        // Preparação
        $voluntaryAttributes = Voluntary::factory()->make()->toArray();
        
        // Ação
        $voluntary = Voluntary::factory()->create($voluntaryAttributes);
    
        $this->assertInstanceOf(Voluntary::class, $voluntary);
        $this->assertEquals($voluntaryAttributes['name'], $voluntary->name);
        $this->assertEquals($voluntaryAttributes['email'], $voluntary->email);
        $this->assertEquals($voluntaryAttributes['date_birthday'], $voluntary->date_birthday);
        $this->assertEquals($voluntaryAttributes['cpf'], $voluntary->cpf);
    }


    public function test_voluntary_update()
    {
        $voluntary = Voluntary::factory()->create();

        $updatedData = [
            'name' => 'Novo nome do usuário'
        ];

        $voluntary->update($updatedData);

        $updatedVoluntary = Voluntary::find($voluntary->id);

        $this->assertEquals($updatedData['name'], $updatedVoluntary->name);
    }


    public function test_voluntary_delete()
    {
        $voluntary = Voluntary::factory()->create();

        $this->assertDatabaseHas('users', ['id' => $voluntary->id]);

        $voluntary->delete();

        $this->assertDatabaseMissing('users', ['id' => $voluntary->id]);
    }
}
