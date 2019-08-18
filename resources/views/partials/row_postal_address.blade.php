@foreach($contact->postalAddresses as $address)
    <div class="m-0">
            <div><i class="fa fa-address-card text-muted"></i> {{ $address->label }}</div>
            <div>{{ $address->line_1 }}</div>
            <div>{{ $address->line_2 }}</div>
            <div>{{ $address->city }}, {{ $address->state }} {{ $address->country }}, {{ $address->zip }}</div>
    </div>
@endforeach
