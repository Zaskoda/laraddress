@foreach($contact->phoneNumbers as $phone)
<div class="m-0">
    <i class="fa fa-fw fa-phone text-muted"></i> <a href="tel:{{ $phone->number }}">{{ $phone->number }}</a>
</div>
@endforeach
