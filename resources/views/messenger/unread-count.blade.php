<?php $count = 0;//Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="tool-notificacion">{{ $count }}</span>
@endif