<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

$articles = [
    [
        'id' => 1,
        'title' => 'La Importancia de la Educación en el Siglo XXI',
        'description' => 'Un análisis sobre el papel fundamental de la educación en el mundo moderno.',
        'image' => 'https://www.lampadia.com/assets/uploads_images/images/Using-ipads-in-the-classroom.jpeg',
        'content' => 'La educación es un pilar esencial para el desarrollo personal y social. En este artículo, exploramos cómo la educación ha evolucionado y por qué es crucial adaptarse a los cambios tecnológicos y culturales.',
        'author' => 'Laura Gómez'
    ],
    [
        'id' => 2,
        'title' => 'Técnicas de Estudio Efectivas',
        'description' => 'Consejos prácticos para mejorar tus hábitos de estudio.',
        'image' => 'https://images.griddo.universitatcarlemany.com/10-tecnicas-de-estudio-para-potenciar-tu-aprendizaje',
        'content' => 'Estudiar de manera efectiva es un arte. En este artículo, compartimos técnicas que han demostrado ser útiles para estudiantes de todas las edades, desde la toma de apuntes hasta la planificación del tiempo.',
        'author' => 'Miguel Fernández'
    ],
    [
        'id' => 3,
        'title' => 'El Futuro de la Educación a Distancia',
        'description' => 'Reflexiones sobre el impacto de la tecnología en la educación.',
        'image' => 'https://geekeducativo.com/wp-content/uploads/2024/07/El-impacto-de-la-pandemia-en-la-educacion-a-distancia-y-el-futuro-del-aprendizaje-en-linea.webp',
        'content' => 'La educación a distancia ha ganado popularidad en los últimos años. Este artículo examina sus beneficios, desafíos y el futuro de esta modalidad educativa en el contexto actual.',
        'author' => 'Ana Ruiz'
    ],
    [
        'id' => 4,
        'title' => 'Cómo Fomentar la Creatividad en los Estudiantes',
        'description' => 'Estrategias para estimular la creatividad en el aula.',
        'image' => 'https://img.becasinternacionales.net/webapp/img/upload/fc5209_propuestas-de-clase-para-fomentar-la-creatividad-en-los-estudiantes.jpg',
        'content' => 'La creatividad es esencial para el aprendizaje. En este artículo, exploramos métodos para inspirar a los estudiantes y ayudarles a desarrollar su pensamiento creativo dentro y fuera del aula.',
        'author' => 'Carlos Martínez'
    ],
    [
        'id' => 5,
        'title' => 'El Papel de la Educación Ambiental',
        'description' => 'La necesidad de incorporar la educación ambiental en el currículo.',
        'image' => 'https://educacion.mma.gob.cl/wp-content/uploads/2019/06/arbol-600x334.jpg',
        'content' => 'La educación ambiental es fundamental para concienciar a las nuevas generaciones sobre la importancia de cuidar nuestro planeta. Este artículo ofrece ideas sobre cómo integrar este tema en la educación diaria.',
        'author' => 'Sofía López'
    ],
    [
        'id' => 6,
        'title' => 'Los Beneficios de la Lectura en los Niños',
        'description' => 'Explorando cómo la lectura impacta el desarrollo infantil.',
        'image' => 'https://static.guiainfantil.com/pictures/articulos/39083-3-juegos-para-mejorar-la-comprension-lectora-de-los-ninos.jpg',
        'content' => 'La lectura es una actividad esencial para el desarrollo cognitivo de los niños. En este artículo, discutimos los múltiples beneficios que trae consigo el hábito de la lectura desde una edad temprana.',
        'author' => 'Javier Torres'
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
