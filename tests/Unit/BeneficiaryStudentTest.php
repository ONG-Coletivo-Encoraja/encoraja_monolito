<?php

namespace Tests\Unit;

use App\Models\BeneficiaryStudent;
use Database\Factories\BeneficiaryStudentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class BeneficiaryStudentTest extends TestCase
{

    public function test_creates_a_new_beneficiary()
    {
        // Arrange
        $beneficiaryAttributes = BeneficiaryStudentFactory::new()->make()->toArray();
        
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
