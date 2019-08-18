<div>
    <div>
        <a href="#editBirthday" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-fw fa-pencil"></i></a>
        <b class="text-muted">Birthday:</b>
        <div>
            @if($contact->birthday) <i class="fa fa-fw fa-birthday-cake text-muted"></i>{{ date('D M jS, Y', strtotime($contact->birthday)) }} @endif
        </div>
    </div>
    <div class="collapse"  data-parent="#containerCard"  id="editBirthday">
        <form class="form-inline align-bottom mb-2" method="post" action="/contact">
            <input type="hidden" name="_method" value="put" />
            @csrf
            <div class="form-group m-2">
                <input name="birthday" type="date" class="form-control form-control-sm" placeholder="Empty" value="@if($contact->birthday) {{ date('Y-m-d', strtotime($contact->birthday))  }} @endif">
            </div>
            <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-fw fa-check"></i></button>
        </form>
    </div>
</div>
