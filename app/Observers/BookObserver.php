<?php

namespace App\Observers;

use App\Models\{User, Book};
use Illuminate\Support\Facades\Notification;
use App\Notifications\{NewBookAdded, BookUpdated};

class BookObserver
{
    /**
     * Handle the Book "created" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function created(Book $book)
    {
        $users = User::where('role', User::ROLE_USER)->whereNotNull('email_verified_at')->get();
        Notification::send($users, new NewBookAdded($book));
    }

    /**
     * Handle the Book "updated" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function updated(Book $book)
    {
        $users = User::where('role', User::ROLE_USER)->whereNotNull('email_verified_at')->get();
        Notification::send($users, new BookUpdated($book));
    }

    /**
     * Handle the Book "deleted" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function deleted(Book $book)
    {
        //
    }

    /**
     * Handle the Book "restored" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function restored(Book $book)
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        //
    }
}
