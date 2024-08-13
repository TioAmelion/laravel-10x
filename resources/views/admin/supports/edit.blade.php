<h1>Editar Dúvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" name="subject" value="{{ $support->subject }}" placeholder="Digite o assunto">
    <textarea name="body" cols="30" rows="10" placeholder="Digite o texto">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
