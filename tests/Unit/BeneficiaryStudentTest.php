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

    // public function test_student_update(){
    //     $student = BeneficiaryStudent::factory()->create();

    //     $updatedData = [
    //         'name' => 'Novo nome student',
    //         'email' => 'novoemail@gmail.com'
    //     ];

    //     $student->update($updatedData);

    //     $updatedStudent = BeneficiaryStudent::find($student->id);
    
    //     $this->assertEquals($updatedData['name'], $updatedStudent->name);
    //     $this->assertEquals($updatedData['email'], $updatedStudent->email);
    // }

    // public function test_student_delete(){
    //     $student = BeneficiaryStudent::factory()->create();

    //     $this->assertDatabaseHas('users', ['id' => $student->id]);

    //     $student->delete();

    //     $this->assertDatabaseMissing('users', ['id' => $student->id]);
    // }
}
