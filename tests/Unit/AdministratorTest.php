<?php

namespace Tests\Unit;

use App\Models\Administrator;
use Database\Factories\AdministratorFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdministratorTest extends TestCase
{
    use RefreshDatabase;
    public function test_creates_a_new_admin()
    {
        // Arrange
        $adminAttributes = AdministratorFactory::new()->make()->toArray();
        
        // Act
        $admin = Administrator::factory()-> create($adminAttributes);
    
        // Assert
        $this->assertInstanceOf(Administrator::class, $admin);
        $this->assertEquals($adminAttributes['name'], $admin->name);
        $this->assertEquals($adminAttributes['email'], $admin->email);
        $this->assertEquals($adminAttributes['date_birthday'], $admin->date_birthday);
        $this->assertEquals($adminAttributes['cpf'], $admin->cpf);
        $this->assertEquals($adminAttributes['password'], $admin->password);
    }

    public function test_admin_update(){
        $admin = Administrator::factory()->create();

        $updatedData = [
            'name' => 'Novo nome adm',
            'email' => 'novoemail@gmail.com'
        ];

        $admin->update($updatedData);

        $updatedAdmin = Administrator::find($admin->id);
    
        $this->assertEquals($updatedData['name'], $updatedAdmin->name);
        $this->assertEquals($updatedData['email'], $updatedAdmin->email);
    }

    public function test_admin_delete(){
        $admin = Administrator::factory()->create();

        $this->assertDatabaseHas('users', ['id' => $admin->id]);

        $admin->delete();

        $this->assertDatabaseMissing('users', ['id' => $admin->id]);
    }

    public function test_admin_filtering_by_name(){
        Administrator::factory()->create(['name' => 'Maria Eduarda']);
        Administrator::factory()->create(['name' => 'Maria Carolina']);
        Administrator::factory()->create(['name' => 'Lucas Marino']);

        $filter = new Administrator;

        $filteredAdmin = $filter->search_user_by_name('Maria');
    
        $this->assertCount(2, $filteredAdmin);
        $this->assertTrue($filteredAdmin->contains('name', 'Maria Eduarda'));
        $this->assertTrue($filteredAdmin->contains('name', 'Maria Carolina'));
        $this->assertFalse($filteredAdmin->contains('name', 'Lucas Marino'));
    }
}
