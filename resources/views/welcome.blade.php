<x-layout meta-title="Colegio Andes" meta-description="Home description">
    <div class="container mt-4">
        <p class="text-center">Bienvenido al Colegio Andes</p>

        <h2 class="text-center mt-4">Artículos Recientes</h2>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="{{ $article['image'] }}" class="card-img-top" alt="{{ $article['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">{{ $article['description'] }}</p>
                            <a href="{{ route('articles.show', $article['id']) }}" class="btn btn-primary">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
