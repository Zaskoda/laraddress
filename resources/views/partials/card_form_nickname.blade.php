<div>
    <a href="#editNickame" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-fw fa-pencil"></i></a>
    <b class="text-muted">Nickname</b>: {{ $contact->nickname ?: 'empty' }}
    <div class="collapse"  data-parent="#containerCard"  id="editNickame">
        <form class="form-inline align-bottom mb-2" method="post" action="/contact">
            <input type="hidden" name="_method" value="put" />
            @csrf
            <div class="form-group m-2">
                <input name="nickname" class="form-control form-control-sm" placeholder="Empty" value="{{ $contact->nickname }}">
            </div>
            <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-fw fa-check"></i></button>
        </form>
    </div>

</div>

