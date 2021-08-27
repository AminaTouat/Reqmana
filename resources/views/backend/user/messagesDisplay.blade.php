<form method="post" action="{{ url('/user/message/store') }}">
    @csrf
@foreach($messages as $message)
    <div class="display-comment">
        <strong>{{ $message->user->name }}</strong>
        <p>{{ $message->body }}</p>
        <a href="" id="reply"></a>
        
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="projet_id" value="{{ $projet_id }}" />
                <input type="hidden" name="parent_id" value="{{ $message->id }}" />
            </div>
        </form>
        @include('backend.user.messagesDisplay', ['messages' => $message->replies])
    </div>
    @endforeach
    {{-- <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Reply" />
    </div> --}}
</form>