<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;

class CreateEventsTest extends TestCase
{
    /** @test
     * Name: create_recurring_daily
     */
    public function create_regular_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $this->assertDatabaseCount('events', 1);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 1);
    }

    /** @test
     * Name: create_recurring_daily
     */
    public function create_daily_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'daily',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 365);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-02 10:00:00',
            'end_time' => '2020-05-02 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-11-02 10:00:00',
            'end_time' => '2020-11-02 11:00:00',
        ]);
    }

    /** @test
     * Name: create_weekly_event
     */
    public function create_weekly_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'weekly',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 52);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-01 10:00:00',
            'end_time' => '2020-05-01 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-08 10:00:00',
            'end_time' => '2020-05-08 11:00:00',
        ]);
        $this->assertDatabaseMissing('events', [
            'start_time' => '2020-05-02 10:00:00',
            'end_time' => '2020-05-02 11:00:00',
        ]);
    }

    /** @test
     * Name: create_monthly_event
     */
    public function create_monthly_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'monthly',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 12);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-01 10:00:00',
            'end_time' => '2020-05-01 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-06-01 10:00:00',
            'end_time' => '2020-06-01 11:00:00',
        ]);
        $this->assertDatabaseMissing('events', [
            'start_time' => '2020-05-02 10:00:00',
            'end_time' => '2020-05-02 11:00:00',
        ]);
    }

    /** @test
     * Name: create_biweekly_event
     */
    public function create_biweekly_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'biweekly',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 26);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-01 10:00:00',
            'end_time' => '2020-05-01 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-15 10:00:00',
            'end_time' => '2020-05-15 11:00:00',
        ]);
        $this->assertDatabaseMissing('events', [
            'start_time' => '2020-05-02 10:00:00',
            'end_time' => '2020-05-02 11:00:00',
        ]);
    }

    /** @test
     * Name: create_bimonthly_event
     */
    public function create_bimonthly_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'bimonthly',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 6);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-01 10:00:00',
            'end_time' => '2020-05-01 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-07-01 10:00:00',
            'end_time' => '2020-07-01 11:00:00',
        ]);
        $this->assertDatabaseMissing('events', [
            'start_time' => '2020-06-01 10:00:00',
            'end_time' => '2020-06-01 11:00:00',
        ]);
    }

    /** @test
     * Name: create_quarterly_event
     */
    public function create_quarterly_event()
    {
        $this->assertDatabaseCount('events', 0);
        $event = factory(Event::class)->create([
            'recurrence' => 'quarterly',
            'start_time' => '01-05-2020 10:00:00',
            'end_time' => '01-05-2020 11:00:00',
        ]);
        $event->createRecurringEvents();
        $this->assertDatabaseCount('events', 4);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-05-01 10:00:00',
            'end_time' => '2020-05-01 11:00:00',
        ]);
        $this->assertDatabaseHas('events', [
            'start_time' => '2020-08-01 10:00:00',
            'end_time' => '2020-08-01 11:00:00',
        ]);
        $this->assertDatabaseMissing('events', [
            'start_time' => '2020-09-01 10:00:00',
            'end_time' => '2020-09-01 11:00:00',
        ]);
    }
}
