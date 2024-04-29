<?php

namespace Tests\Unit;

use App\Models\Permission;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_creates_a_new_permission()
    {
        // Arrange
        $user = User::factory()->create();
        $permissionData = [
            'type' => 'administrator',
            'user_id' => $user->id
        ];

        // Act
        $permission = Permission::factory()->create($permissionData);

        // Assert
        $this->assertInstanceOf(Permission::class, $permission);
        $this->assertDatabaseHas('permissions', $permissionData);
        $this->assertEquals($permissionData['type'], $permission->type);
        $this->assertEquals($user->id, $permission->user_id);
    }

    public function test_permission_update()
    {
        // Arrange
        $permission = Permission::factory()->create();
        $updatedData = [
            'type' => 'Voluntary' // Note que estou usando 'Administrator' com a primeira letra maiúscula
        ];

        // Act
        $permission->update($updatedData);
        $updatedPermission = Permission::find($permission->id);

        // Assert
        $this->assertEquals(strtolower($updatedData['type']), strtolower($updatedPermission->type));
    }

    public function test_permission_delete(){
        $permission = Permission::factory()->create();

        $this->assertDatabaseHas('permissions', ['id' => $permission->id]);

        $permission->delete();

        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }

}
