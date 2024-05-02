<?php

namespace Tests\Unit;

use App\Models\BeneficiaryStudent;
use Database\Factories\BeneficiaryStudentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    public function test_creates_a_new_student()
    {
        // Arrange
        $studentAttributes = BeneficiaryStudentFactory::new()->make()->toArray();
        
        // Act
        $student = BeneficiaryStudent::factory()-> create($studentAttributes);
    
        // Assert
        $this->assertInstanceOf(BeneficiaryStudent::class, $student);
        $this->assertEquals($studentAttributes['name'], $student->name);
        $this->assertEquals($studentAttributes['email'], $student->email);
        $this->assertEquals($studentAttributes['date_birthday'], $student->date_birthday);
        $this->assertEquals($studentAttributes['cpf'], $student->cpf);
        $this->assertEquals($studentAttributes['password'], $student->password);
    }

    public function test_student_update(){
        $student = BeneficiaryStudent::factory()->create();

        $updatedData = [
            'name' => 'Novo nome student',
            'email' => 'novoemail@gmail.com'
        ];

        $student->update($updatedData);

        $updatedStudent = BeneficiaryStudent::find($student->id);
    
        $this->assertEquals($updatedData['name'], $updatedStudent->name);
        $this->assertEquals($updatedData['email'], $updatedStudent->email);
    }

    public function test_student_delete(){
        $student = BeneficiaryStudent::factory()->create();

        $this->assertDatabaseHas('users', ['id' => $student->id]);

        $student->delete();

        $this->assertDatabaseMissing('users', ['id' => $student->id]);
    }
}