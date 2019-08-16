
<div class="card col-md-6 col-lg-4">
    <p>

        <div>
            <a href="#editFormalName" data-toggle="collapse" class="pull-right text-info"><i class="fa fa-pencil"></i></a>
            <label><b>Formal Name</b>: {{ $contact->formal_name ?: 'empty' }} </label>
            <div class="collapse" id="editFormalName">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="formal_name" class="form-control form-control-sm" placeholder="Empty" value="{{ $contact->formal_name }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>

        <div>
            <a href="#editNickame" data-toggle="collapse" class="pull-right text-info"><i class="fa fa-pencil"></i></a>
            <b>Nickname</b>: {{ $contact->nickname ?: 'empty' }}
            <div class="collapse" id="editNickame">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="nickname" class="form-control form-control-sm" placeholder="Empty" value="{{ $contact->nickname }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>

        </div>

        <div>
            <a href="#editBirthday" data-toggle="collapse" class="pull-right text-info"><i class="fa fa-pencil"></i></a>
            <b>Birthday</b>: {{ date('D M jS, Y', strtotime($contact->birthday)) }}
            <div class="collapse" id="editBirthday">
                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="birthday" type="date" class="form-control form-control-sm" placeholder="Empty" value="{{ date('Y-m-d', strtotime($contact->birthday)) }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
    </p>


    <p>
        <a href="/address/create"  class="pull-right text-success"><i class="fa fa-plus"></i></a>
        <b>Phone Numbers</b>:<br>
        @foreach($contact->phoneNumbers as $phone)
            <a href="/address/delete" class="pull-right text-danger"><i class="fa fa-remove"></i></a>
            <i class="fa fa-at"></i> {{ $phone->number }}
        @endforeach
    </p>

    <p>
        <a href="/address/create"  class="pull-right text-success"><i class="fa fa-plus"></i></a>
        <b>Postal Address</b>:<br>
    </p>

    <p>
    <a href="/address/email-account" class="pull-right text-success"><i class="fa fa-plus"></i></a>
        <b>Email</b>:<br>
        @foreach($contact->emailAccounts as $account)
            <a href="/address/delete" class="pull-right text-danger"><i class="fa fa-remove"></i></a>
            <i class="fa fa-at"></i> {{ $account->email_address }}
        @endforeach
    </p>

</div>
