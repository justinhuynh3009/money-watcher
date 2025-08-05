<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Number;
use Livewire\Attributes\Locked;
use Livewire\Component;

class TransactionList extends Component
{
    #[Locked]
    public $transactions = [];

    #[Locked]
    public $totalWithdrawals = 0;

    #[Locked]
    public $totalDeposits = 0;

    public function mount()
    {
        $this->transactions = Transaction::with('category')
            ->select('id', 'uuid', 'category_id', 'description', 'amount', 'date')
            ->where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->get()
            ->append('display_amount', 'format_date')
            ->groupBy('format_date')
            ->toArray();

        $totalWithdrawalsAmount = Transaction::where('user_id', auth()->id())
            ->sum('amount');

        $this->totalWithdrawals = Number::currency($totalWithdrawalsAmount, 'VND');
        $this->totalDeposits = Number::currency(0, 'VND');
    }

    public function render()
    {
        return view('livewire.transaction-list');
    }
}
