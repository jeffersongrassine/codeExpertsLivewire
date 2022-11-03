<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseEdit extends Component
{
    
    public Expense $expense;

    public $amount;
    public $type;
    public $description;

    protected $rules = [
        'amount' => 'required',
        'type' => 'required',
        'description' => 'required'
    ];
    
    public function mount (/*Expense $expense*/)
    {
        $this->amount = $this->expense->amount;
        $this->type = $this->expense->type;
        $this->description = $this->expense->description;
    }

    public function updateExpense()
    {
        $this->validate();

        $this->expense->update([
            'amount' => $this->amount,
            'type'  => $this->type,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Registro atualizado com sucesso!');

        return redirect(route('expenses.index'));

        // $this->amount = $this->type = $this->description = null;
    }
   
    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
