<h1>Detalhes da Dúvida</h1>

<ul>
    <li>{{ $support->subject }}</li>
    <li>{{ getStatusSupport($support->status) }}</li>
    <li>{{ $support->body }}</li>
</ul>

<form action="{{route('supports.destroy', $support->id)}}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
