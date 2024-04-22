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
use PHPUnit\Framework\TestCase;
use App\Models\Event;
use Database\Factories\EventFactory;

class EventTest extends TestCase
{
    use DatabaseTransactions;

    public function test_creates_a_new_event()
    {
        // Arrange
        $eventAttributes = EventFactory::new()->make()->toArray();

        // Act
        $event = Event::all();

        // Assert
        // $this->assertInstanceOf(Event::class, $event);
        // $this->assertEquals($eventAttributes['name'], $event->name);
        // $this->assertEquals($eventAttributes['description'], $event->description);
        // $this->assertEquals($eventAttributes['date'], $event->date);
        // $this->assertEquals($eventAttributes['time'], $event->time);
        // $this->assertEquals($eventAttributes['modality'], $event->modality);
        // $this->assertEquals($eventAttributes['status'], $event->status);
        // $this->assertEquals($eventAttributes['type'], $event->type);
        // $this->assertEquals($eventAttributes['target_audience'], $event->target_audience);
        // $this->assertEquals($eventAttributes['vacancies'], $event->vacancies);
        // $this->assertEquals($eventAttributes['social_vacancies'], $event->social_vacancies);
        // $this->assertEquals($eventAttributes['regular_vacancies'], $event->regular_vacancies);
        // $this->assertEquals($eventAttributes['material'], $event->material);
        // $this->assertEquals($eventAttributes['interest_area'], $event->interest_area);
        // $this->assertEquals($eventAttributes['price'], $event->price);
    }
}

