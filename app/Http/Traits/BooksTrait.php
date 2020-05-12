<?php

namespace App\Http\Traits;

use App\Book;

trait BooksTrait
{
    public function booksAll()
    {
        $books = \App\Book::paginate(10);
        foreach ($books as $book) {
            $book_id = $book->id;
            $character_array = array();
            $characters = \App\Character::whereHas('films', function ($q) use ($book_id) {
                $q->where('films.id', $book_id);
            })->get(['id']);

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $book->characters = $character_array;
        }
        return $books;
    }

    public function booksOne($id)
    {
        $books = \App\Book::where('id', $id)->get();
        foreach ($books as $book) {
            $book_id = $book->id;
            $character_array = array();
            $characters = \App\Character::whereHas('films', function ($q) use ($book_id) {
                $q->where('films.id', $book_id);
            })->get(['id']);

            foreach ($characters as $character) {
                array_push($character_array, env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $book->characters = $character_array;
        }
        return $books;
    }
}