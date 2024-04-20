 <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntary extends Model
{
    use HasFactory;

    private int $id;
    private string $availability;
    private string $course_experience;
    private string $how_did_know;
    private string $expectations;

    public function __construct(array $data_adm) {
        parent::__construct($data_adm['id'], $data_adm['name'], $data_adm['password'], $data_adm['cpf'], $data_adm['user_type'], $data_adm['email']);
        $this->id = $data_adm['id'];
    }


    public function suggestEvent($suggest_event)
    {
        $event = new EventController();
        $event->registerEvent($suggest_event);

    }
    public function viewInscription()
    {

    }

    public function getAvailability(): string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): void
    {
        $this->availability = $availability;
    }

    public function getCourseExperience(): string
    {
        return $this->course_experience;
    }

    public function setCourseExperience(string $course_experience): void
    {
        $this->course_experience = $course_experience;
    }

    public function getHowDidKnow(): string
    {
        return $this->how_did_know;
    }

    public function setHowDidKnow(string $how_did_know): void
    {
        $this->how_did_know = $how_did_know;
    }

    public function getExpectations(): string
    {
        return $this->expectations;
    }

    public function setExpectations(string $expectations): void
    {
        $this->expectations = $expectations;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}
