<?php

namespace Tests\Unit;

use App\Models\Address;
use Database\Factories\AddressFactory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class AddressTest extends TestCase
{

    use RefreshDatabase;
    
    public function test_creates_a_new_address(): void
    {
        $user = User::factory()->create();
        
        $addressAttributes = Address::factory()->make()->toArray();

        $address = Address::factory()->create(['user_id' => $user->id] + $addressAttributes);
        
    
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($addressAttributes['street'], $address->street);
        $this->assertEquals($addressAttributes['number'], $address->number);
        $this->assertEquals($addressAttributes['neighbourhood'], $address->neighbourhood);
        $this->assertEquals($addressAttributes['city'], $address->city);
        $this->assertEquals($addressAttributes['zip_code'], $address->zip_code);
    }

    public function test_address_update()
    {
        $user = User::factory()->create();
        $address = Address::factory()->create(['user_id' => $user->id]);

        $updatedData = [
            'street' => 'Nova rua do endereço'
        ];

        $address->update($updatedData);

        $updatedAddress = Address::find($address->id);

        $this->assertEquals($updatedData['street'], $updatedAddress->street);
    }

    public function test_address_delete()
    {
        $user = User::factory()->create();
        $address = Address::factory()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('address', ['id' => $address->id]);

        $address->delete();

        $this->assertDatabaseMissing('address', ['id' => $address->id]);
    }

}


