<?php

namespace Tests\Feature;

use App\Models\Token;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Src\Shared\Enums\RoleTypesEnum;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'RolesSeeder']);
        $this->user = User::factory()->create([
            'username' => 'test',
            'password' => 'testPassword',
            'role_id' => RoleTypesEnum::ADMINISTRADOR->value
        ]);
    }

    public function test_login_invalid_params(){
        $response = $this->postJson('/api/login', [
        ]);
        $response->assertStatus(422);
    }

    public function test_login_valid_credentials(){
        $response = $this->postJson('/api/login', [
            'username' => $this->user->username,
            'password' => 'testPassword'
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure(['user']);
    }

    public function test_login_invalid_username(){
        $response = $this->postJson('/api/login', [
            'username' => 'invalidUser',
            'password' => $this->user->password,
        ]);

        $response->assertStatus(401);
        $response->assertExactJson([
                'message' => 'Credenciales inválidas',
            ]);
    }

    public function test_login_invalid_password(){
        $response = $this->postJson('/api/login', [
            'username' => $this->user->username,
            'password' => 'testWrongPassword',
        ]);

        $response->assertStatus(401);
        $response->assertExactJson([
            'message' => 'Credenciales inválidas',
        ]);
    }

    public function test_login_invalid_username_and_password(){
        $response = $this->postJson('/api/login', [
            'username' => 'testWrongUser',
            'password' => 'testWrongPassword',
        ]);

        $response->assertStatus(401);
        $response->assertExactJson([
            'message' => 'Credenciales inválidas',
        ]);
    }
}
