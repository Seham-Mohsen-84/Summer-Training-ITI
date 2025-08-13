<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Posts',function () {
    $posts=[
        [
            'Id'=>1,
            'Title'=>'First Post',
            'Content'=>'This is First Post',
            'Author'=>'Seham',
        ],
        [
           'Id'=>2,
           'Title'=>'Second Post',
           'Content'=>'This is Second Post',
           'Author'=>'Rahma',
        ],
        [
            'Id'=>3,
            'Title'=>'Third Post',
            'Content'=>'This is Third Post',
            'Author'=>'Sara',
        ],
        [
            'Id'=>4,
            'Title'=>'Fourth Post',
            'Content'=>'This is Fourth Post',
            'Author'=>'Mohamed',
        ]
    ];
    return view('Posts.Posts', compact('posts'));
})->name('ViewPosts');

Route::get('/Posts/Post/{id}', function (int $id) {
    $posts = [
        [
            'Id' => 1,
            'Title' => 'First Post',
            'Content' => 'This is First Post',
            'Author' => 'Seham',
        ],
        [
            'Id' => 2,
            'Title' => 'Second Post',
            'Content' => 'This is Second Post',
            'Author' => 'Rahma',
        ],
        [
            'Id' => 3,
            'Title' => 'Third Post',
            'Content' => 'This is Third Post',
            'Author' => 'Sara',
        ],
        [
            'Id' => 4,
            'Title' => 'Fourth Post',
            'Content' => 'This is Fourth Post',
            'Author' => 'Mohamed',
        ]
    ];

    return view('Posts.View_Post', [
        'id' => $id,
        'posts' => $posts
    ]);
})->name('View');



Route::get('/Posts/Create', function () {
    return view('Posts.Create_Post');
})->name('Create');

Route::get('/Posts/Created', function () {
    return view('Posts.Post_Created');
})->name('Created');

Route::get('/Posts/Edit/{id}', function (int $id) {
    $posts = [
        [
            'Id' => 1,
            'Title' => 'First Post',
            'Content' => 'This is First Post',
            'Author' => 'Seham',
        ],
        [
            'Id' => 2,
            'Title' => 'Second Post',
            'Content' => 'This is Second Post',
            'Author' => 'Rahma',
        ],
        [
            'Id' => 3,
            'Title' => 'Third Post',
            'Content' => 'This is Third Post',
            'Author' => 'Sara',
        ],
        [
            'Id' => 4,
            'Title' => 'Fourth Post',
            'Content' => 'This is Fourth Post',
            'Author' => 'Mohamed',
        ]
    ];
    return view('Posts.Edit_Post', [
        'id' => $id,
        'posts' => $posts
    ]);
})->name('Edit');

Route::get('/Posts/Edited', function () {
    return view('Posts.Post_Edited');
})->name('Edited');

Route::get('/Posts/Deleted', function () {
    return view('Posts.Post_Deleted');
})->name('Deleted');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
