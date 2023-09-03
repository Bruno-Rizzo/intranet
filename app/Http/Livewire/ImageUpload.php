<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ImageUpload extends Component
{

    use WithFileUploads;

    public $image;

    public function mount()
    {
            
    }

    public function updated($fields)
    {
        
    }

    public function uploadImage()
    {
        $this->validate([
            'image' => ['required','image']
        ]);

       dd($this->image->extension());
    }

    public function render()
    {
        return view('livewire.image-upload');
    }

}
