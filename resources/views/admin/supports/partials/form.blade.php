@csrf()
<input type="text" name="subject" placeholder="Digite o assunto" value="{{ $support->subject ?? old('subject') }}">
<textarea name="body" cols="30" rows="10" placeholder="Digite o texto">{{ $support->body ?? old('body') }}</textarea>
<button type="submit">Enviar</button>
