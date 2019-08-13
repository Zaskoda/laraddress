<div class="card">
    <div class="row">
        <div class="col-sm">
            <p>
                <b>Name</b>: @if(strlen($contact->name) > 0) {{ $contact->name }} @else <span class="text-alert">none</span> @endif<br>
                <b>Birthday</b> to do
            </p>
            </div>
        <div class="col-sm">
            <p>
                <b>Postal Address</b>:<br>
            </p>
        </div>
        <div class="col-sm">
            <p>
                <b>Email:</b>:
                @foreach($contact->emailAccounts as $account)
                    <div><i class="fa fa-at"></i> {{ $account->email_address }}</div>
                @endforeach
            </p>
        </div>
    </div>
</div>
<br>