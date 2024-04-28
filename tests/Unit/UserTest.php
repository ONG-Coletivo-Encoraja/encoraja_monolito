<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_creates_a_new_user(): void
    {
        // Arrange
        $userAttributes = UserFactory::new()->make()->toArray();
        
        // Act
        $user = User::factory()-> create($userAttributes);
    
        // Assert
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($userAttributes['name'], $user->name);
        $this->assertEquals($userAttributes['email'], $user->email);
        $this->assertEquals($userAttributes['date_birthday'], $user->date_birthday);
        $this->assertEquals($userAttributes['cpf'], $user->cpf);
        // $this->assertEquals($userAttributes['password'], $user->password);
    }
    public function test_user_update()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Novo nome do usuário'
        ];

        $user->update($updatedData);

        $updatedEvent = User::find($user->id);

        $this->assertEquals($updatedData['name'], $updatedEvent->name);
    }
    public function test_user_delete(){
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', ['id' => $user->id]);

        $user->delete();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
