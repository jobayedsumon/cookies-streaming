<?php

namespace App\Filament\Resources\CookiePackageResource\Pages;

use App\Filament\Resources\CookiePackageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCookiePackage extends EditRecord
{
    protected static string $resource = CookiePackageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
