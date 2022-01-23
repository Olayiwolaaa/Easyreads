<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBookRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['author.user', 'category'])->get();

        return view('dashboard.admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->select('name', 'id')
            ->get()
            ->prepend(new User(['name' => '-- Please choose category --']));

        return view('dashboard.admin.books.create', compact('categories'));
    }
    
    public function store(StoreBookRequest $request)
    {
        $input = $request->validated();
        $input['discount_price'] = isset($request['discount_price']) ?
            $request['init_price'] - ($request['init_price'] * ($request['discount_price'] / 100)) :
            $request['init_price'];
        $input['author_id'] = auth()->id();
        
        $book = Book::create($input);

        if ($request->hasFile('cover_image')) 
        {
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_images');
        }

        return redirect()->route('admin.books.index')->with('success_message', 'Book Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('categories')
            ->select('name', 'id')
            ->get();
        $book = Book::findOrFail($id);

        return view('dashboard.admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $input = $request->validated();
        $input['discount_price'] = isset($request['discount_price']) ?
            $request['init_price'] - ($request['init_price'] * ($request['discount_price'] / 100)) :
            $request['init_price'];
        
        $book->update($input);
        
        if ($request->hasFile('cover_image')) 
        {
            $book->media()->delete('cover_image');
            $book->addMediaFromRequest('cover_image')->toMediaCollection('cover_images');
        }

        return redirect()->route('admin.books.index')->with('success_message', 'Book Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('alert_message', 'Book moved to trash');
    }
    
    public function trashBooks() 
    {
        $books = Book::onlyTrashed()->with(['author.user', 'category'])->orderBy('id', 'DESC')->get();
        return view('dashboard.admin.books.trash-books', compact('books'));
    }
    
    public function restore($id) 
    {
        $trash = Book::onlyTrashed()->findOrFail($id);
        $trash->restore();
        return redirect()->back()->with('success_message', 'Book restored');
    }
    
    public function forceDelete($id) 
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->clearMediaCollection();
        $book->forceDelete();
        return redirect()->back()->with('alert_message', 'Book permanenetly deleted');
    }
}