<x-layouts::app title="Editar categoria">
    <section>
        <h1>Editar categoria</h1>

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            @include('categorias.form')

            <button type="submit">Salvar</button>
        </form>
    </section>
</x-layouts::app>