<?php

namespace App\Http\Livewire;

use App\Models\Genre;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class GenreIndex extends Component
{
    use WithPagination;

    public $tmdbId;
    public $title;
    public $genreId;

    public $search = '';
    public $sort = 'asc';
    public $perPage = 5;

    public $showGenreModal = false;

    protected $rules = [
        'title' => 'required',
    ];

    public function generateGenre()
    {
        $url = 'https://api.themoviedb.org/3/movie/' . $this->tmdbId . '?api_key=8a11aac3fb4ef5f1f9607ee7e0329793&language=en-US';
        $neGenre = Http::get('//api.themoviedb.org/3/genre/movie/list?api_key=5094e4539de46c1abd1461920f3a3fb9')->json();
        // https: //api.themoviedb.org/3/discover/movie?api_key=8a11aac3fb4ef5f1f9607ee7e0329793&with_genres=' . $this->tmdbId . '
        $newGenre = Http::get('//api.themoviedb.org/3/genre/28/movies?api_key=5094e4539de46c1abd1461920f3a3fb9&page_size=2

        ')->json();

        foreach ($newGenre['results'] as $r) {
            $genre = Genre::where('tmdb_id', $r['id'])->first();
            if (!$genre) {
                Genre::create([
                    'tmdb_id' => $r['id'],
                    'title'    => $r['title'],
                    'slug'    => Str::slug($r['title']),
                ]);
                $this->reset();
                $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Genre created']);
            } else {
                $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Genre exisit']);
            }
        }
    }

    public function showEditModal($id)
    {
        $this->genreId = $id;
        $this->loadGenre();
        $this->showGenreModal = true;
    }

    public function loadGenre()
    {
        $genre = Genre::findOrFail($this->genreId);
        $this->title = $genre->title;
    }

    public function updateGenre()
    {
        $this->validate();
        $genre = Genre::findOrFail($this->genreId);
        $genre->update([
            'title' => $this->title,
        ]);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Genre updated']);
        $this->reset();
    }

    public function closeGenreModal()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function deleteGenre($id)
    {
        Genre::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Genre deleted']);
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'sort', 'perPage']);
    }
    public function render()
    {
        return view('livewire.genre-index', [
            'genres' => Genre::search('title', $this->search)->orderBy('title', $this->sort)->paginate($this->perPage)
        ]);
    }
}
