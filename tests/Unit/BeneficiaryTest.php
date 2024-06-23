<?php

namespace Tests\Unit;

use App\Models\BeneficiaryStudent;
use Database\Factories\BeneficiaryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class BeneficiaryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }

    public function test_creates_a_new_beneficiary()
    {
        // Arrange
        $beneficiaryAttributes = BeneficiaryFactory::new()->make()->toArray();
        
        // Act
        $beneficiary = BeneficiaryStudent::factory()-> create($beneficiaryAttributes);
    
        // Assert
        $this->assertInstanceOf(BeneficiaryStudent::class, $beneficiary);
        $this->assertEquals($beneficiaryAttributes['name'], $beneficiary->name);
        $this->assertEquals($beneficiaryAttributes['email'], $beneficiary->email);
        $this->assertEquals($beneficiaryAttributes['date_birthday'], $beneficiary->date_birthday);
        $this->assertEquals($beneficiaryAttributes['cpf'], $beneficiary->cpf);
        $this->assertEquals($beneficiaryAttributes['password'], $beneficiary->password);
    }
}
