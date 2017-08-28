<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use TravelPlanner\Extensions\Traits\DoesLogins;
use TravelPlanner\Models\Trip;
use TravelPlanner\Models\User;

class TravelTest extends TestCase
{
    use DatabaseTransactions, DoesLogins;

    protected $url = 'api/v1/trips';

    /**
     * Test get all trips as user case.
     *
     * @return void
     */
    public function testAllTripsAsUser()
    {
        $this->getJson($this->url, $this->authUserHeader())
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test get all trips as admin case.
     *
     * @return void
     */
    public function testAllTripsAsAdmin()
    {
        $this->getJson($this->url, $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'destination',
                        'comment',
                        'start_date',
                        'end_date',
                        'time_left',
                    ],
                ],
            ]);
    }

    /**
     * Test create a new trip case.
     *
     * @return void
     */
    public function testCreateTrip()
    {
        $data = factory(Trip::class)->raw();

        $this->postJson($this->url, collect($data)->except('destination')->toArray(), $this->authUserHeader())
            ->assertStatus(422)
            ->assertJsonStructure(['destination']);

        $this->postJson($this->url,
            collect($data)->except('start_date', 'end_date')->toArray() +
            [
                'start_date' => Carbon::now()->addDays(3)->toW3cString(),
                'end_date' => Carbon::now()->toW3cString(),
            ], $this->authUserHeader())
            ->assertStatus(422)
            ->assertJsonStructure(['end_date']);

        $this->postJson($this->url, $data, $this->authUserHeader())
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'destination',
                    'comment',
                    'start_date',
                    'end_date',
                    'time_left',
                ],
            ]);
    }

    /**
     * Test show trip as admin case.
     *
     * @return void
     */
    public function testShowTripAsAdmin()
    {
        $trip = Trip::has('user.userRole')->inRandomOrder()->first();

        $this->getJson("{$this->url}/not-a-valid-id", $this->authAdminHeader())
            ->assertStatus(404)
            ->assertSeeText('The resource you have requested is not found');

        $this->getJson("{$this->url}/{$trip->id}", $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'destination',
                    'comment',
                    'start_date',
                    'end_date',
                    'time_left',
                ],
            ]);
    }

    /**
     * Test show other's trip as user case.
     *
     * @return void
     */
    public function testShowOthersTripAsUser()
    {
        $trip = Trip::has('user.adminRole')->inRandomOrder()->first();

        $this->getJson("{$this->url}/{$trip->id}", $this->authUserHeader())
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test show owns trip as user case.
     *
     * @return void
     */
    public function testShowOwnsTripAsUser()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $trip = $user->trips()->inRandomOrder()->first();
        $this->getJson("{$this->url}/{$trip->id}", $this->authUserHeader($user))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'destination',
                    'comment',
                    'start_date',
                    'end_date',
                    'time_left',
                ],
            ]);
    }

    /**
     * Test update trip case.
     *
     * @return void
     */
    public function testUpdateTrip()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $trip = $user->trips()->inRandomOrder()->first();
        $this->putJson("{$this->url}/{$trip->id}", ['comment' => 'This is a new comment.'], $this->authUserHeader($user))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'destination',
                    'comment',
                    'start_date',
                    'end_date',
                    'time_left',
                ],
            ]);
    }

    /**
     * Test delete anothers trip as user case.
     *
     * @return void
     */
    public function testDeleteAnothersTripAsUser()
    {
        $trip = Trip::has('user.adminRole')->inRandomOrder()->first();

        $this->deleteJson("{$this->url}/{$trip->id}", [], $this->authUserHeader())
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test delete anothers trip as admin case.
     *
     * @return void
     */
    public function testDeleteAnothersTripAsAdmin()
    {
        $trip = User::onlyUser()->inRandomOrder()->first()->trips()->inRandomOrder()->first();

        $this->deleteJson("{$this->url}/{$trip->id}", [], $this->authAdminHeader())
            ->assertStatus(204);
    }

    /**
     * Test delete trip case.
     *
     * @return void
     */
    public function testDeleteTrip()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $trip = $user->trips()->inRandomOrder()->first();
        $this->deleteJson("{$this->url}/{$trip->id}", [], $this->authUserHeader($user))
            ->assertStatus(204);
    }

}
