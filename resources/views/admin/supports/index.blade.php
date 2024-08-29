<h1>Listagem dos suportes</h1>
<a href="{{ route('supports.create') }}">Nova Dúvida</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descricao</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td><a href="{{ route('supports.show', $support->id) }}">Detalhes</a></td>
                <td><a href="{{ route('supports.edit', $support->id) }}">Editar</a></td>
                {{-- <td><a href="{{ route('supports.edit', $support->id) }}">Excluir</a></td> --}}
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters" />
