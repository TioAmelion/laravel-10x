<h1>Adicionar Dúvida</h1>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="{{ route('supports.store') }}" method="POST">
    @csrf()
    <input type="text" name="subject" placeholder="Digite o assunto" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="10" placeholder="Digite o texto">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
