<?php

namespace App\Filament\Resources\CookiePackageResource\Pages;

use App\Filament\Resources\CookiePackageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookiePackages extends ListRecords
{
    protected static string $resource = CookiePackageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
