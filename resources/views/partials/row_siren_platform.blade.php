@if($contact->sirenAccounts->count())
    <p class="lead">Please take a moment to connect with me on any of the following platforms:</p>
@endif
@foreach($contact->sirenAccounts as $account)
<div class="m-1">
    <i class="fa fa-fw fa-{{ $account->platform->icon }} text-muted mr-1"></i>
    <a href="{{ $account->profile_url }}">{{ $account->account_name }}</a>
</div>
@endforeach
