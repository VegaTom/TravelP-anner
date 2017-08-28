<?php
namespace TravelPlanner\Transformers;

use League\Fractal;
use TravelPlanner\Models\Trip;

class TripTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'user',
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Trip $trip)
    {
        return [
            'id' => $trip->id,
            'destination' => $trip->destination,
            'comment' => $trip->comment,
            'start_date' => $trip->start_date->toW3cString(),
            'end_date' => $trip->end_date->toW3cString(),
            'time_left' => $trip->time_left,
        ];
    }

    /**
     * Include User
     *
     * @param Trip $trip
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Trip $trip)
    {
        $user = $trip->user;
        return $this->item($user, new UserTransformer);
    }
}
