<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Locked;
use Livewire\Component;

class TransactionList extends Component
{
    #[Locked]
    public $transactions = [];

    public function mount()
    {
        $this->transactions = Transaction::with('category')
            ->select('id', 'uuid', 'category_id', 'description', 'amount', 'date')
            ->where('user_id', auth()->id())
            ->get()
            ->append('display_amount')
            ->toArray();

        info(print_r($this->transactions, true));
    }

    public function render()
    {
        return view('livewire.transaction-list');
    }
}
