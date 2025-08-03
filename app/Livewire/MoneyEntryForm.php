<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;

class MoneyEntryForm extends Component
{
    use Toast;

    public $amount = 0;

    #[Locked]
    public $categories = [];

    public $selectedCategory;
    public $description;
    public $date;

    #[Locked]
    public $txUuid;

    public function mount($uuid = null)
    {
        $this->categories = Category::with('children')
            ->select('id', 'name')
            ->whereNull('parent_id')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->children->map(function ($child) {
                    return ['id' => $child->id, 'name' => $child->name];
                })];
            })
            ->toArray();

        if ($uuid) {
            $this->txUuid = $uuid;
            $transaction = Transaction::with('category')
                ->where('uuid', $uuid)
                ->where('user_id', auth()->id())
                ->first();

            $this->fill([
                'amount' => $transaction->amount,
                'selectedCategory' => $transaction->category_id,
                'description' => $transaction->description,
                'date' => $transaction->date,
            ]);
        }
    }

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric|gt:0',
            'selectedCategory' => 'required:exists:categories,id',
            'description' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        try {

            if ($this->txUuid) {
                $transaction = Transaction::where('uuid', $this->txUuid)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

                $transaction->update([
                    'category_id' => $this->selectedCategory,
                    'description' => $this->description,
                    'amount' => $this->amount,
                    'date' => $this->date,
                ]);
            } else {
                Transaction::create([
                    'category_id' => $this->selectedCategory,
                    'description' => $this->description,
                    'amount' => $this->amount,
                    'user_id' => auth()->id(),
                    'date' => $this->date,
                ]);
            }

            $this->reset(['amount', 'selectedCategory', 'description', 'date']);

            $this->success("Transaction saved successfully!");
        } catch (\Exception $e) {
            $this->error('Failed to save transaction: ' . $e->getMessage());
            return;
        }
    }

    public function render()
    {
        return view('livewire.money-entry-form');
    }
}
