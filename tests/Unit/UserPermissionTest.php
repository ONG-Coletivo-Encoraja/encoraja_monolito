<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_have_permissions()
    {
        $user = User::factory()->create();

        $permission = Permission::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Permission::class, $user->permissions->first());
        $this->assertEquals($permission->type, $user->permissions->first()->type);
    }

    public function test_permission_belongs_to_user()
    {
        $user = User::factory()->create();

        $permission = Permission::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $permission->user);
        $this->assertEquals($user->id, $permission->user->id);
    }
    public function test_user_can_have_multiple_permissions()
    {
        $user = User::factory()->create();

        $permission1 = Permission::factory()->create(['user_id' => $user->id]);
        $permission2 = Permission::factory()->create(['user_id' => $user->id]);

        $this->assertCount(2, $user->permissions);
    }
    public function test_user_permission_deleted_when_user_deleted()
    {
        $user = User::factory()->create();
        $permission = Permission::factory()->create(['user_id' => $user->id]);

        $user->delete();

        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }
}
