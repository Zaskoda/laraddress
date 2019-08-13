
<div class="card col-md-6 col-lg-4">
    <p>
        <div>
            <a href="#editName" data-toggle="collapse" class="pull-right text-info"><i class="fa fa-pencil"></i></a>
            <b>Name</b>: {{ $contact->name ?: 'empty' }}
            <div class="collapse" id="editName">

                <form class="form-inline align-bottom mb-2" method="post" action="/contact">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="name" class="form-control form-control-sm" id="inputName" placeholder="Empty" value="{{ $contact->name }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>

            </div>
        </div>

        <div>
            <a href="#editBirthday" data-toggle="collapse" class="pull-right text-info"><i class="fa fa-pencil"></i></a>
            <b>Birthday</b>: #to-do
            <div class="collapse" id="editBirthday">
                no birthday yet
            </div>
        </div>
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
