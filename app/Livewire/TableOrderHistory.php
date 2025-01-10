<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TableOrderHistory extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query()->where('user_id', Auth::user()->id))
            ->columns([
                TextColumn::make('order_id')
                    ->label('Order ID')
                    ->searchable(),
                TextColumn::make('products')
                    ->formatStateUsing(function ($state) {
                        $products = json_decode($state, true);
                        return collect($products)->map(function ($product) {
                            return "{$product['name']} ({$product['quantity']}x) - Rp " . number_format($product['price'], 0, ',', '.') . " = Rp " . number_format($product['price'] * $product['quantity'], 0, ',', '.');
                        })->join('<br>');
                    })
                    ->html(),
                TextColumn::make('total')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'pending' => 'warning',
                        'settlement' => 'success',
                        'cancel' => 'danger',
                        'expire' => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:i:s')
                    ->sortable(),
                ViewColumn::make('bayar')->view('filament.tables.columns.pay'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ])->defaultSort('created_at', 'desc');
    }

    public function render()
    {
        return view('livewire.table-order-history');
    }
}