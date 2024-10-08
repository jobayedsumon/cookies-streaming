<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WithdrawalResource\Pages;
use App\Filament\Resources\WithdrawalResource\RelationManagers;
use App\Models\Withdrawal;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use JetBrains\PhpStorm\NoReturn;

class WithdrawalResource extends Resource
{
    protected static ?string $model = Withdrawal::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),
                Forms\Components\Select::make('payout_method')
                    ->options(config('constants.payout_method'))
                    ->required(),
                Forms\Components\TextInput::make('payout_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('beneficiary_name')
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
                Tables\Columns\TextColumn::make('payout_method')->sortable()->searchable()
                    ->enum(config('constants.payout_method')),
                Tables\Columns\TextColumn::make('payout_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('beneficiary_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rewards')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->enum(config('constants.transaction_status'))->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWithdrawals::route('/'),
            'create' => Pages\CreateWithdrawal::route('/create'),
            'edit' => Pages\EditWithdrawal::route('/{record}/edit'),
        ];
    }
}
