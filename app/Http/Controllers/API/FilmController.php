<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FilmController extends Controller
{
    public function index()
    {
        $data = Film::all();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show($id)
    {
        $data = Film::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'trailer' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'tahun' => 'required',
            ]);

            $image = $request->file('image');
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
            $film->trailer = $request->trailer;
            $film->judul = $request->judul;
            $film->deskripsi = $request->deskripsi;
            $film->tahun = $request->tahun;
            $film->save();

            $data = Film::where('id', '=', $film->id)->get();
            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'image',
                'trailer' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'tahun' => 'required',
            ]);

            $film = Film::find($id);
            $image = $request->file('image');
            if (isset($image)) {

                $currentDate = Carbon::now()->toDateString();
                $imageName  = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('images')) {
                    Storage::disk('public')->makeDirectory('images');
                }

                if (Storage::disk('public')->exists('images/' . $film->image)) {
                    Storage::disk('public')->delete('images/' . $film->image);
                }

                $filmImage = Image::make($image)->resize(230, 325)->stream();

                Storage::disk('public')->put('images/' . $imageName, $filmImage);
            } else {
                $imageName = $film->image;;
            }

            $film->image = $imageName;
            $film->trailer = $request->trailer;
            $film->judul = $request->judul;
            $film->deskripsi = $request->deskripsi;
            $film->tahun = $request->tahun;
            $film->save();

            $data = Film::where('id', '=', $film->id)->get();
            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        try {

            $film = Film::find($id);
            if (Storage::disk('public')->exists('images/' . $film->image)) {
                Storage::disk('public')->delete('images/' . $film->image);
            }

            $film = $film->delete();
            if ($film) {
                return ApiFormatter::createApi(200, 'Success');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
