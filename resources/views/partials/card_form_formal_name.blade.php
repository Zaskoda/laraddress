<div>
    <a href="#editFormalName" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
    <label><b class="text-muted">Formal Name</b>: {{ $contact->formal_name ?: 'empty' }} </label>
    <div class="collapse"  data-parent="#containerCard"  id="editFormalName">
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
    <a href="#editNickame" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
    <b class="text-muted">Nickname</b>: {{ $contact->nickname ?: 'empty' }}
    <div class="collapse"  data-parent="#containerCard"  id="editNickame">
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

