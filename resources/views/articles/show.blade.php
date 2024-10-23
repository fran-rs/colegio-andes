<x-layout meta-title="{{ $article['title'] }}" meta-description="Detalle de {{ $article['title'] }}">
    <div class="container mt-4">
        <h1>{{ $article['title'] }}</h1>
        <img src="{{ $article['image'] }}" class="img-fluid" alt="{{ $article['title'] }}">
        <p class="mt-3">{{ $article['content'] }}</p>
        <a href="{{ route('blog') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
</x-layout>
