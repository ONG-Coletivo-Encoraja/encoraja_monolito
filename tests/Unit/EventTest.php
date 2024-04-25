<?php

// use App\Models\Event;
// use Database\Factories\EventFactory;

// test('example', function () {
//     expect(true)->toBeTrue();
// });

// test('creates a new event', function () {
//     // Arrange
//     $eventAttributes = EventFactory::new()->make()->toArray();

//     // // Act
//     $event = Event::factory()->create($eventAttributes);

//     // // Assert
//     // expect($event)->toBeInstanceOf(Event::class);
//     // expect($event->name)->toBe($eventAttributes['name']);
//     // expect($event->description)->toBe($eventAttributes['description']);
//     // expect($event->date)->toBe($eventAttributes['date']);
//     // expect($event->time)->toBe($eventAttributes['time']);
//     // expect($event->modality)->toBe($eventAttributes['modality']);
//     // expect($event->status)->toBe($eventAttributes['status']);
//     // expect($event->type)->toBe($eventAttributes['type']);
//     // expect($event->target_audience)->toBe($eventAttributes['target_audience']);
//     // expect($event->vacancies)->toBe($eventAttributes['vacancies']);
//     // expect($event->social_vacancies)->toBe($eventAttributes['social_vacancies']);
//     // expect($event->regular_vacancies)->toBe($eventAttributes['regular_vacancies']);
//     // expect($event->material)->toBe($eventAttributes['material']);
//     // expect($event->interest_area)->toBe($eventAttributes['interest_area']);
//     // expect($event->price)->toBe($eventAttributes['price']);
// });


namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Event;
use Database\Factories\EventFactory;

class EventTest extends TestCase
{
    use RefreshDatabase;


    public function test_creates_a_new_event()
    {
        // Arrange
        $eventAttributes = EventFactory::new()->create()->toArray();

        // Act
        $events = Event::all();
        // Assert
        $this->assertCount(1, $events); // Verifica se há apenas um evento no banco de dados
        $this->assertEquals($eventAttributes['name'], $events->first()->name); // Verifica o nome do evento, por exemplo
        // Você pode adicionar mais verificações para os outros atributos do evento aqui
    }
}