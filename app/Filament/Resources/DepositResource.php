<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepositResource\Pages;
use App\Filament\Resources\DepositResource\RelationManagers;
use App\Models\Customer;
use App\Models\Deposit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepositResource extends Resource
{
    protected static ?string $model = Deposit::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),

                Forms\Components\TextInput::make('purchase_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('purchase_token')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rewards')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(config('constants.transaction_status'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')->sortable()->searchable()
                    ->label('Customer'),
                Tables\Columns\TextColumn::make('purchase_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('purchase_token')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rewards')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable()
                    ->enum(config('constants.transaction_status')),
                Tables\Columns\TextColumn::make('created_at')->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                'status' => Tables\Filters\SelectFilter::make('status')
                    ->options(config('constants.transaction_status')),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeposits::route('/'),
            'create' => Pages\CreateDeposit::route('/create'),
            'edit' => Pages\EditDeposit::route('/{record}/edit'),
        ];
    }
}
