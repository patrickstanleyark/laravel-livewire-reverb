<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use App\Events\TodoAdded;

class Todolist extends Component
{
    public $title = 'Todo list';

    public $todo;

    public $todos = [];


    public function addTodo()
    {
        $this->validate([
            'todo' => 'required|min:2',
        ]);
        TodoAdded::dispatch($this->todo);
        $this->reset('todo');
    }

    #[On('echo:todos,TodoAdded')]
    public function listenForMessage($data)
    {
       $this->todos[] = $data['todo'];
    }

    public function render()
    {
        return view('livewire.todolist');
    }

}
