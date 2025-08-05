<?php

namespace App\Livewire;

use App\Models\Transaction;
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

        $this->totalWithdrawals = Transaction::where('user_id', auth()->id())
            ->sum('amount');

        info(print_r($this->transactions, true));
    }

    public function render()
    {
        return view('livewire.transaction-list');
    }
}
