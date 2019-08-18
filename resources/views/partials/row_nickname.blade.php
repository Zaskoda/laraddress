@if ($contact->nickname)
<div>
    <b class="text-muted">aka</b>:
    {{ $contact->nickname ?: 'empty' }}
</div>
@endif
