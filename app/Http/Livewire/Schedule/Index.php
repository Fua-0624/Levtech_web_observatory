<?php

namespace App\Http\Livewire\Schedule;

use App\Models\EventSchedule;
use App\Models\Observatory;
use Carbon\CarbonImmutable;
use Livewire\Component;

trait TrimAndNullEmptyStrings
{
    public function updatedTrimAndNullEmptyStrings($name, $value)
    {
        if (is_string($value)) {
            $value = trim($value);
            $value = $value === '' ? null : $value;

            data_set($this, $name, $value);
        }
    }
}

class Index extends Component
{
    use TrimAndNullEmptyStrings;
    //選択中の天文台id群
    public array $selectedObservatoryIds = [];

    //カレンダー更新用イベントリスナー
    protected $listeners = ['refreshCalendar'];

    public function mount(): void
    {
        $this->selectedObservatoryIds = Observatory::all()->pluck('id')->toArray();
    }

    //選択中の天文台id群に更新があった時のライフサイクルイベント
    public function updatedSelectedObservatoryIds(): void
    {
        $this->dispatchBrowserEvent('refreshCalendar');
    }

    public function render()
    {
        $observatories = Observatory::all();
        return view('livewire.schedule.index', compact('observatories'))
            ->extends('adminlte::page')
            ->section('content');
    }

    //FullCalendarレンダリング時に取得するResources
    public function getResources(): array
    {
        return Observatory::query()->findMany($this->selectedObservatoryIds)
            ->map(fn($observatory) => $this->convertToResourceByObservatoryForFullcalendar($observatory))
            ->toArray();
    }

    //FullCalendarで使えるresourceの配列に整形
    private function convertToResourceByObservatoryForFullcalendar(User $observatory): array
    {
        return [
            'id' => $observatory->id,
            'title' => $observatory->observatory,
        ];
    }

    //FullCalendarレンダリング時に取得するEvents
    public function getEvents($start, $end): array
    {
        $range = [
            CarbonImmutable::create($start)->format('Y-m-d'),
            CarbonImmutable::create($end)->format('Y-m-d'),
        ];

        return EventSchedule::query()->whereIn('observatory_id', $this->selectedObservatoryIds)
            ->whereBetween('day', $range)
            ->get()
            ->map(fn($schedule) => $this->convertToEventByScheduleForFullcalendar($schedule))
            ->toArray();
    }

    //FullCalendarで使えるeventの配列に整形
    private function convertToEventByScheduleForFullcalendar(Schedule $schedule): array
    {
        $startDateTime = new CarbonImmutable($schedule->day . ' ' . $schedule->start);
        $endDateTime = new CarbonImmutable($schedule->day . ' ' . $schedule->end);
        return [
            'title' => $schedule->title,
            'resourceId' => $schedule->user_id,
            'extendedProps' => [
                'schedule_id' => $schedule->id
            ]
        ];
    }

    //カレンダー更新用イベント
    public function refreshCalendar(): void
    {
        $this->dispatchBrowserEvent('refreshCalendar');
    }
}