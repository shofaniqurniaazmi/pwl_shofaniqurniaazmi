<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                'fields' => [
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'Name',
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'description',
                        'label' => 'Description',
                    ],
                ],
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('value')->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function (Setting $recod){
                    switch($recod->type){
                        case 'text':
                            return [Forms\Components\TextInput::make('value')->label
                            ($recod->label)];
                            break;
                            case 'longtext':
                                return [Forms\Components\RichEditor::make('value')->label
                                ($recod->label)];
                                break;
                    }
                }),
               // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    } 
       
}
