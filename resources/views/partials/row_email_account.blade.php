
@foreach($contact->emailAccounts as $account)
<div class="mt-0">
    <a href="mailto: {{ $account->email_address }}">{{ $account->email_address }}</a>
</div>
@endforeach

