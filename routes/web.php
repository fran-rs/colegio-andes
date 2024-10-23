<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

$articles = [
    [
        'id' => 1,
        'title' => 'Cuaderno',
        'description' => 'Cuaderno Vegeta',
        'image' => 'https://http2.mlstatic.com/D_NQ_NP_620161-MLU74272678546_022024-O.webp',
        'content' => 'Cuaderno Vegeta, para estudiar como un prícipe sayayin'
    ],
    [
        'id' => 2,
        'title' => 'Segundo artículo',
        'description' => 'Estuche arcoíris.',
        'image' => 'https://cdnx.jumpseller.com/cocholate/image/46411785/Photoroom_20240313_115548.jpg?1710346889',
        'content' => 'Estuche arcoíris, donde guardarás los mágicos útiles escolares.'
    ],
    [
        'id' => 3,
        'title' => 'Tercer artículo',
        'description' => 'Mochila One Piece.',
        'image' => 'https://lojamundootaku.com.br/cdn/shop/files/3FB07245-458B-40CB-B6E3-DE3AEC159D0A.jpg?v=1706484752',
        'content' => 'Mochila One Piece para lograr conseguir ser el rey de los piratas.'
    ],
    [
        'id' => 4,
        'title' => 'Cuarto artículo',
        'description' => 'Cuaderno Pokemon.',
        'image' => 'https://www.ekiz.cl/cdn/shop/products/454.CuadernodeAnimePokemon_SeparadoraTono-PokemonTipoAgua.jpg?v=1682003112',
        'content' => 'Cuaderno Pokémon, para atrapar todos los conocimientos.'
    ],
    [
        'id' => 5,
        'title' => 'Quinto artículo',
        'description' => 'Uniforme oficial.',
        'image' => 'https://www.confeccioneskamy.cl/wp-content/uploads/2022/01/SKU-913050100-scaled.jpg',
        'content' => 'Uniforme oficial Colegio Andes.'
    ],
    [
        'id' => 6,
        'title' => 'Sexto artículo',
        'description' => 'Polera oficial.',
        'image' => 'https://www.artiydiseno.cl/image/cache/data/mayor/06M-900x900.jpg',
        'content' => 'Polera oficial del Colegio Andes.'
    ]
];



Route::view('/', 'welcome', ['articles' => $articles])->name('home');
Route::view('contacto', 'contact')->name('contact');
Route::view('blog', 'blog', ['articles'=> $articles])->name('blog');
Route::get('articulos/{id}', function ($id) use ($articles) {
    $article = collect($articles)->firstWhere('id', $id); // Busca el artículo por ID
    if (!$article) {
        abort(404); // Si no se encuentra el artículo, lanzar un error 404
    }
    return view('articles.show', ['article' => $article]);
})->name('articles.show')->where('id', '[0-9]+');


Route::view('nosotros', 'about')->name('about');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
