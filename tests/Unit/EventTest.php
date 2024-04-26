<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Models\Event;
use Database\Factories\EventFactory;


class EventTest extends TestCase
{
    use RefreshDatabase;


    public function test_creates_a_new_event()
    {
        // Arrange
        $eventAttributes = EventFactory::new()->make()->toArray();

        // Act
        $event = Event::factory()->create($eventAttributes);

        // Assert
        $this->assertInstanceOf(Event::class, $event);
        $this->assertEquals($eventAttributes['name'], $event->name);
        $this->assertEquals($eventAttributes['description'], $event->description);
        $this->assertEquals($eventAttributes['date'], $event->date);
        $this->assertEquals($eventAttributes['time'], $event->time);
        $this->assertEquals($eventAttributes['modality'], $event->modality);
        $this->assertEquals($eventAttributes['status'], $event->status);
        $this->assertEquals($eventAttributes['type'], $event->type);
        $this->assertEquals($eventAttributes['target_audience'], $event->target_audience);
        $this->assertEquals($eventAttributes['vacancies'], $event->vacancies);
        $this->assertEquals($eventAttributes['social_vacancies'], $event->social_vacancies);
        $this->assertEquals($eventAttributes['regular_vacancies'], $event->regular_vacancies);
        $this->assertEquals($eventAttributes['material'], $event->material);
        $this->assertEquals($eventAttributes['interest_area'], $event->interest_area);
        $this->assertEquals($eventAttributes['price'], $event->price);
    }
    public function test_creates_a_new_event_wrong_data()
    {
        // Arrange
        $invalidEvent = Event::factory()->invalid();

        // Act
        $validator = Validator::make($invalidEvent, [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'modality' => 'required|in:Presential,Hybrid,Remote',
            'status' => 'required|in:Active,Inactive,Pending',
            'type' => 'required|in:Course,Workshop,Lecture',
            'target_audience' => 'required',
            'vacancies' => 'required|integer',
            'social_vacancies' => 'required|integer',
            'regular_vacancies' => 'required|integer',
            'material' => 'required',
            'interest_area' => 'required',
            'price' => 'required|numeric',
        ]);

        // Assert
        $this->assertTrue($validator->fails());
    }
    public function test_event_update()
    {
        $event = Event::factory()->create();

        $updatedData = [
            'name' => 'Novo nome do evento',
            'description' => 'Nova descrição do evento',
        ];

        $event->update($updatedData);

        $updatedEvent = Event::find($event->id);

        // Assert
        $this->assertEquals($updatedData['name'], $updatedEvent->name);
        $this->assertEquals($updatedData['description'], $updatedEvent->description);
    }
    public function test_event_delete(){
        $event = Event::factory()->create();

        $this->assertDatabaseHas('events', ['id' => $event->id]);

        $event->delete();

        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
    public function test_event_filtering_by_name()
    {
        Event::factory()->create(['name' => 'Curso A']);
        Event::factory()->create(['name' => 'Curso B']);
        Event::factory()->create(['name' => 'Palestra A']);

        $filter = new Event;

        $filteredEvents = $filter->search_event_by_name('Curso');

        $this->assertCount(2, $filteredEvents);
        $this->assertTrue($filteredEvents->contains('name', 'Curso A'));
        $this->assertTrue($filteredEvents->contains('name', 'Curso B'));
        $this->assertFalse($filteredEvents->contains('name', 'Palestra A')); // Testa se esse evento, que não corresponde a pesquisa, está na lista
    }
}
