<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Kategorii łącznie', Category::count()),

           
            Stat::make('Kategorii apartamentów', Category::whereJsonContains('type', 'apartamenty')->count()),
            Stat::make('Kategorii postów',  Category::whereJsonContains('type', 'posty')->count()),
        ];
    }
}
