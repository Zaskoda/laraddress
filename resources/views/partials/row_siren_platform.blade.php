@foreach($contact->sirenAccounts as $account)
<div class="m-1">
    <i class="fa fa-{{ $account->platform->icon }} text-muted mr-1"></i>
    <a href="{{ $account->profile_url }}">{{ $account->account_name }}</a>
</div>
@endforeach
