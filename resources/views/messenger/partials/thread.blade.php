<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<!--<div class=" {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    <p>
        {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div>-->
<div class="list-group {{ $class }}">
  <a href="{{ route('messages.show', $thread->id) }}" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">

      <h5 class="mb-1">Asunto: {{ $thread->subject }}</h5>
      @if($thread->userUnreadMessagesCount(Auth::id()) > 0)
        <small class="text-muted">({{ $thread->userUnreadMessagesCount(Auth::id()) }} sin leer)</small>
      @else
        <small class="">({{ $thread->userUnreadMessagesCount(Auth::id()) }} sin leer)</small>
      @endif 
    </div>
    <!--<p>{{ $thread->id }}</p>-->
    <p>{{ $thread->latestMessage->body }}</p>
    <p><small><strong>Creador:</strong> {{ $thread->creator()->name }}</small></p>
    <!--<p><small><strong>Participantes:</strong> {{ $thread->participantsString(Auth::id()) }}</small></p>-->
    <!--<button class="btn btn-desactivado" data-toggle="modal" data-target="#create-1" >Finalizar conversación</button>-->
  </a>

</div>
<div style="padding: 5px;"></div>