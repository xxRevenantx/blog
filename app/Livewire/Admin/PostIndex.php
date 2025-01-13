<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{

    // use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    // public $search;


    // public function updatingSearch() // Reseatear la paginación cuando se realiza una búsqueda en el input de búsqueda de la tabla
    // {
    //     $this->resetPage();
    // }

    public function render()
    {

        $posts = Post::where('user_id', Auth::user()->id)
        ->latest('id')
        ->paginate(20);

        return view('livewire.admin.post-index' , compact('posts'));
    }
}
