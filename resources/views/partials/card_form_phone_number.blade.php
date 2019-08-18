
        <a href="#newPhoneNumber" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-success"><i class="fa fa-plus"></i></a>
        <b class="text-muted">Phone Numbers:</b>
        <div class="collapse"  data-parent="#containerCard"  id="newPhoneNumber">
            <form class="form-inline align-bottom mt-0" method="post" action="/phone-number">
                @csrf
                <div class="form-group m-2">
                    <input name="number" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control form-control-sm" placeholder="XXX-XXX-XXXX">
                </div>
                <button type="submit" class="btn btn-success m-2 btn-sm"><i class="fa fa-plus"></i></button>
            </form>
        </div>

        @foreach($contact->phoneNumbers as $phone)
        <div class="mt-0">
            <a href="#editPhoneNumber{{ $phone->id }}" data-toggle="collapse"  class="pull-right pl-1 pr-1 text-info"><i class="fa fa-pencil"></i></a>
            <i class="fa fa-phone text-muted"></i> {{ $phone->number }}
            <div class="collapse"  data-parent="#containerCard"  id="editPhoneNumber{{ $phone->id }}">
                <form
                    method="post"
                    action="/phone-number/{{ $phone->id }}"
                    class="form-inline pull-left mt-0 mr-1"
                    onsubmit="return confirm('Are you sure you want to delete this phone number?')"
                >
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <button
                        type="submit"
                        class="btn btn-sm btn-danger m-2"
                        ><i class="fa fa-remove"></i></button>
                </form>

                <form class="form-inline align-bottom mt-0" method="post" action="/phone-number/{{ $phone->id }}">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="form-group m-2">
                        <input name="number" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control form-control-sm" value="{{ $phone->number }}">
                    </div>
                    <button type="submit" class="btn btn-info m-2 btn-sm"><i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
        @endforeach
