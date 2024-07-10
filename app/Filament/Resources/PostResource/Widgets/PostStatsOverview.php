<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Postów Łącznie', Post::count()),
            Stat::make('Opublikowane', Post::where('published_at', '<=', Carbon::now())->count()),
            Stat::make('Czekają na publikację', Post::where('published_at', '>=', Carbon::now())->count()),

           
        ];
    }
}
