<a href="#newEmailAccount" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-success"><i class="fa fa-fw fa-plus"></i></a>
        <b class="text-muted">Email Accounts</b>:<br>
        <div class="@if(old('showForm') == 'newEmailAccount') show @endif collapse"  data-parent="#containerCard"  id="newEmailAccount">
            <form class="form-inline align-bottom m-2" method="post" action="/email-account">
                @csrf
                <input type="hidden" name="showForm" value="newEmailAccount">
                <div class="form-group m-2">
                    <input
                        name="email_address"
                        type="email"
                        class="form-control form-control-sm"
                        placeholder="you@some.domain"
                        value="{{ old('email_address') }}"
                    >
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success ml-2 btn-sm">Add <i class="fa fa-fw fa-plus"></i></button>
                </div>
                {!! $errors->first('email_address', '<div class="text-warning mb-1">:message</div>') !!}
            </form>
        </div>
        @foreach($contact->emailAccounts as $account)
        <div class="mt-0">
            <a href="#editEmailAccount{{ $account->id }}" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <i class="fa fa-fw fa-at text-muted"></i> {{ $account->email_address }}

            <div class="@if(old('showForm') == 'editEmailAccount'.$account->id) show @endif collapse"  data-parent="#containerCard"  id="editEmailAccount{{ $account->id }}">

                <form
                    method="post"
                    action="/email-account/{{ $account->id }}"
                    class="form-inline pull-left m-0"
                    onsubmit="return confirm('Are you sure you want to delete this email address?')"
                >
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-fw fa-remove"></i></button>
                </form>

                <form class="form-inline align-bottom m-0"method="post" action="/email-account/{{ $account->id }}">
                    <input type="hidden" name="_method" value="put" />
                    <input type="hidden" name="showForm" value="editEmailAccount{{ $account->id }}">
                    @csrf
                    <div class="form-group m-2">
                        <input
                            name="email_address"
                            type="email"
                            class="form-control form-control-sm"
                            placeholder="you@some.domain"
                            value="{{ old('email_address', $account->email_address) }}"
                        >
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-fw fa-check"></i></button>
                </form>
                {!! $errors->first('email_address', '<div class="text-warning mb-1">:message</div>') !!}
            </div>
        </div>
        @endforeach

