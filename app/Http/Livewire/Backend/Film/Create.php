<?php

namespace App\Http\Livewire\Backend\Film;

use App\Models\Film;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $image, $trailer, $judul, $deskripsi, $tahun;

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'image' => 'required',
            'trailer' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'required',
        ]);
    }

    public function store()
    {
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/x-www-form-urlencoded',
        //     'Authorization' => 'Bearer 1|vczmQnkWEyCj1TpgQQpPlv2nCMjDFDm4GDW25wl7',
        // ])->post('http://localhost/web_film/public/api/film/store', [
        //     "image" => $this->image,
        //     "trailer" => $this->trailer,
        //     "judul" => $this->judul,
        //     "deskripsi" => $this->deskripsi,
        //     "tahun" => $this->tahun,
        // ]);
        // $responseData = json_decode($response->body(), true);
        // dd($responseData);
        // TIDAK SEMPAT LAGI MEMPERBAIKINYA

        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'trailer' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'required',
        ]);

        $image = $this->image;
        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            $imageName  = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('images')) {
                Storage::disk('public')->makeDirectory('images');
            }

            $filmImage = Image::make($image)->resize(230, 325)->stream();

            Storage::disk('public')->put('images/' . $imageName, $filmImage);
        } else {
            $imageName = "default.png";
        }

        $film = new film();
        $film->image = $imageName;
        $film->trailer = $this->trailer;
        $film->judul = $this->judul;
        $film->deskripsi = $this->deskripsi;
        $film->tahun = $this->tahun;
        $film->save();
        return redirect()->route('admin.film.index');
    }

    public function render()
    {
        return view('livewire.backend.film.create')->layout('livewire.backend.layouts.app', ['title' => 'Film']);
    }
}
