<?php

namespace App\Filament\Resources\AdvantageResource\Widgets;

use App\Models\Advantage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Zalet Łącznie', Advantage::count())->description('Dodaj min. 7'),
           

        ];
    }
}
