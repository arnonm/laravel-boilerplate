<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $guarded = ['parent_event_id'];
    use SoftDeletes;

    public $table = "events";

    protected $dates = [
        'start_time', 'end_time',
    ];

    public function getIsFullDayAttribute()
    {
        return $this->is_full_day_event;
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }

    private function intTimeFormat()
    {

        return (in_array(app()->getLocale(), ['he', 'ar'])
            ? config('boilerplate.time_format') . ' ' . config('boilerplate.date_format')
            : config('boilerplate.date_format') . ' ' . config('boilerplate.time_format'));
    }


    public function createRecurringEvents()
    {
        $recurrences = [
            'daily' => [
                'times' => 365,
                'function' => 'addDay',
            ],
            'weekly' => [
                'times' => 52,
                'function' => 'addWeek',
            ],
            'biweekly' => [
                'times' => 26,
                'function' => 'addWeek',
                'parameter' => '2',
            ],
            'monthly' => [
                'times' => 12,
                'function' => 'addMonth',
            ],
            'bimonthly' => [
                'times' => 6,
                'function' => 'addMonth',
                'parameter' => '2',
            ],
            'quarterly' => [
                'times' => 4,
                'function' => 'addMonth',
                'parameter' => '3',
            ],
        ];

        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);

        $recurrence = $recurrences[$this->recurrence] ?? null;
        $parameter = $recurrence['parameter'] ?? 1;
        if ($recurrence) {
            for ($i = 0; $i < $recurrence['times'] - 1; $i ++) {
                $startTime->{$recurrence['function']}($parameter);
                $endTime->{$recurrence['function']}($parameter);


                $this->events()->create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'start_time' => $this->formatDateToLocalFormat($startTime),
                    'end_time' => $this->formatDateToLocalFormat($endTime),
                    'recurrence' => $this->recurrence,
                ]);
            }
        }
    }

    private function formatDateToLocalFormat(Carbon $value): string
    {
        return Carbon::parse($value)->format(config('boilerplate.date_format') . ' ' . config('boilerplate.time_format'));
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ?
            Carbon::createFromFormat(config('boilerplate.date_format') . ' ' . config('boilerplate.time_format'), $value)
                ->format('Y-m-d H:i:s') :
            null;
    }

    public function getStartTimeAttribute($value)
    {
        return $value ?
            Carbon::createFromFormat('Y-m-d H:i:s', $value)->format($this->intTimeFormat()) :
            null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ?
            Carbon::createFromFormat('Y-m-d H:i:s', $value)->format($this->intTimeFormat()) :
            null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ?
            Carbon::createFromFormat(config('boilerplate.date_format') . ' ' . config('boilerplate.time_format'), $value)->format('Y-m-d H:i:s') : null;

    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
