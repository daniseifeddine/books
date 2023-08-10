<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Book;
use App\Models\BookComment;
use App\Models\BookUser;
use App\Models\User_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class BookController extends BaseController
{
    function Add_Book()
    {
        return $this->authRedirectWithData('books/Add_book', 'data', 'home');
    }

    function book_store(Request $request)
    {

        // dd($request);
        $image = $request->book_cover;
        $extension = strtolower($image->extension());
        $filename = time() . rand(1, 10000) . "." . $extension;
        $image->move(public_path('books_cover'), $filename);
        $pdfFile = $request->file('pdf_file');
        $pdf_name = $this->uploadPdf($pdfFile, 'pdfs');


        $data = [
            'cover_image' => $filename,
            'pdf' => $pdf_name,
            'name' => $request->book_title,
            'author' => $request->book_author,
            'publication_date' => $request->publication_date,
            'category' => $request->book_category,
            'category_arabic' => $request->book_category_arabic,
            'description_arabic' => $request->book_description_arabic,
            'language_arabic' => $request->book_language_arabic,
            'language' => $request->book_language,
            'pages' => $request->book_page,
            'world_rate' => $request->book_rate,
            'description' => $request->book_description
        ];

        $this->Create_Update_Delete(new Book(), null, 'create', $data);
        return $this->RedirectWithMessage('Add_Book', 'success', 'Book Added');
    }

    function AllBooks()
    {
        if (auth()->user()) {
            $user = auth()->user();
            // $books = $this->Get_cols_where_paginate(Book::class, 'created_at', 'DESC', null, 100, ['*']);
            $books = Book::inRandomOrder()->paginate(48);
            return view('books/allbooks', [
                "books" => $books,
                "data" => $user
            ]);
        } else {
            $books = Book::inRandomOrder()->paginate(48);
            return view('books/allbooks', [
                "books" => $books,
            ]);
        }
    }

    public function search_book(Request $request)
    {
        $query = $request->input('query');
        $searchOption1 = $request->input('searchOption_1');
        $searchOption2 = $request->input('searchOption_2');
        $searchOption3 = $request->input('searchOption_3');
        $searchOption4 = $request->input('searchOption_4');

        $books = Book::query();

        if ($query) {
            $books->where(function ($queryBuilder) use ($query, $searchOption1, $searchOption2, $searchOption3, $searchOption4) {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%');

                if ($searchOption1 === 'byAuthor') {
                    $queryBuilder->orWhere('author', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption2 === 'byPublished_date') {
                    $queryBuilder->orWhere('publication_date', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption3 === 'byLanguage') {
                    $queryBuilder->orWhere('language', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption4 === 'byPages') {
                    $queryBuilder->orWhere('Pages', 'LIKE', '%' . $query . '%');
                }
            });
        }

        $books = $books->paginate(100);

        return view('books/search/searching_allbooks', [
            'books' => $books,
        ]);
        // $query = $request->input('query');
        // $searchOption1 = $request->input('searchOption_1');
        // $searchOption2 = $request->input('searchOption_2');
        // $searchOption3 = $request->input('searchOption_3');
        // $searchOption4 = $request->input('searchOption_4');



        // if ($query !== '') {
        //     $conditions = [['name', 'LIKE', '%' . $query . '%']];

        //     if ($searchOption1 === 'byAuthor') {
        //         $conditions = [['author', 'LIKE', '%' . $query . '%']];
        //     }

        //     if ($searchOption2 === 'byPublished_date') {
        //         $conditions = [['publication_date', 'LIKE', '%' . $query . '%']];
        //     }

        //     if ($searchOption3 === 'byLanguage') {
        //         $conditions = [['language', 'LIKE', '%' . $query . '%']];
        //     }
        //     if ($searchOption4 === 'byPages') {
        //         $conditions = [['Pages', 'LIKE', '%' . $query . '%']];
        //     }

        //     $datas = Get_cols_where_paginate(Book::class, 'id', 'ASC', $conditions, 100, ['*']);
        //     $iterationCount = ($datas->currentPage() - 1) * $datas->perPage();

        //     return view('books/search/searching_allbooks', [
        //         'books' => $datas,
        //         'iteration' => $iterationCount
        //     ]);
        // } else {
        //     $allBooks = Book::paginate(100);
        //     return view('books/search/searching_allbooks', [
        //         'books' => $allBooks,
        //     ]);
        // }
    }


    //category
    function category($category)
    {
        if (auth()->user()) {
            $user = auth()->user();
            $books = $this->Get_cols_where_paginate(Book::class, 'id', 'DESC', [['category', '=', $category]], 24, ['*']);
            return view('books/Categories/' . $category, [
                "books" => $books,
                "data" => $user
            ]);
        } else {
            $books = $this->Get_cols_where_paginate(Book::class, 'id', 'DESC', [['category', '=', $category]], 100, ['*']);
            return view('books/Categories/' . $category, [
                "books" => $books,
            ]);
        }
    }

    public function searching_book(Request $request)
    {
        $query = $request->input('query');
        $searchOption1 = $request->input('searchOption_1');
        $searchOption2 = $request->input('searchOption_2');
        $searchOption3 = $request->input('searchOption_3');
        $searchOption4 = $request->input('searchOption_4');

        $books = Book::where('category',  $request->input('category'));

        if ($query) {
            $books->where(function ($queryBuilder) use ($query, $searchOption1, $searchOption2, $searchOption3, $searchOption4) {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%');

                if ($searchOption1 === 'byAuthor') {
                    $queryBuilder->orWhere('author', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption2 === 'byPublished_date') {
                    $queryBuilder->orWhere('publication_date', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption3 === 'byLanguage') {
                    $queryBuilder->orWhere('language', 'LIKE', '%' . $query . '%');
                }

                if ($searchOption4 === 'byPages') {
                    $queryBuilder->orWhere('Pages', 'LIKE', '%' . $query . '%');
                }
            });
        }
        $books = $books->paginate(100);

        return view('books/search/searching_allbooks', [
            'books' => $books,
        ]);
    }

    function single_book($book_name)
    {
        $books = $this->Get_cols_where_first(Book::class, 'name', 'ASC', ['name' => $book_name], ['*']);
        $suggestedBooks = Book::take(20)->inRandomOrder()->get();
        $authorBooks = $this->Get_cols_where_paginate(Book::class, 'created_at', 'DESC', NULL, 100, ['*']);
        $allcomment = BookComment::where(['book_id' => $books->id])->orderBy('created_at', 'DESC')->inRandomOrder()->get();

        $comment = $allcomment->take(4);

        if (auth()->user()) {
            $user = auth()->user();

            return view('books/single_book', [
                "book" => $books,
                "data" => $user,
                'suggestedBooks' => $suggestedBooks,
                'comments' => $comment,
                'allcomment' => $allcomment,
                'authorBooks' => $authorBooks
            ]);
        } else {
            return view('books/single_book', [
                "book" => $books,
                'suggestedBooks' => $suggestedBooks,
                'comments' => $comment,
                'authorBooks' => $authorBooks
            ]);
        }
    }

    public function downloadPDF($bookId)
    {
        $book = $this->SelectWhere(Book::class, 'id', $bookId);
        if ($book) {
            $data = [
                'download_count' => $book->download_count + 1,
            ];

            $store = [
                'user_id' => auth()->user()->id,
                'book_id' => $bookId,
            ];
            $this->Create_Update_Delete(Book::class, ['id' => $bookId], 'update', $data);

            $find =  BookUser::where(['user_id' => auth()->user()->id, 'book_id' => $bookId])->first();

            if (!$find) {
                $this->Create_Update_Delete(BookUser::class, null, 'create', $store);
            }
            $pdfPath = public_path('pdfs/' . $book->pdf);
            return response()->download($pdfPath, $book->name . '.pdf');
        }
    }

    function embed_pdf($bookId)
    {
        $bookId = Crypt::decrypt($bookId);

        if (auth()->user()) {
            $user = auth()->user();
            $book = $this->SelectWhere(Book::class, "id", $bookId);
            return view('books/embed_pdf', [
                "book" => $book,
                "data" => $user
            ]);
        }
    }

    function comment(CommentRequest $request, $bookId)
    {
        if (auth()->check()) {
            $check = BookComment::where(['book_id' => $bookId, 'user_id' => Auth::id()])->first();
            if ($check) {
                return response()->json([
                    'false' => 'Sorry, you have already commented on this book!',
                ]);
            } else {
                $comment = new BookComment();
                $comment->user_id = auth()->user()->id;
                $comment->book_id = $bookId;
                $comment->comment = $request->input('review');
                $comment->save();

                return response()->json([
                    'commentId' => $comment->id,
                    'date' => $comment->created_at,
                    'comment' => $request->review,
                    'username' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'ProfileImage' => auth()->user()->ProfileImage,
                ]);
            }
        }
    }



    public function commentDelete(Request $request)
    {


        $commentId = $request->input('comment_id');
        $comment = BookComment::find($commentId);

        if ($comment->user_id == auth()->user()->id) {
            if ($comment) {
                $comment->delete();
                return response()->json(['message' => 'Comment deleted successfully']);
            } else {
                return response()->json(['error' => 'Comment not found'], 404);
            }
        } else {
            return false;
        }
    }


    function AllComment($bookId)
    {
        $bookId = Crypt::decrypt($bookId);
        if (auth()->check()) {
            $user = auth()->user();

            $book = $this->SelectWhere(Book::class, 'id', $bookId);
            $comments = BookComment::where(['book_id' => $bookId])->get();

            return view('books/all_comments', [
                "book" => $book,
                "data" => $user,
                'comments' => $comments,
            ]);
        }
    }
}
