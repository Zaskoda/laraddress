
<div class="" id="containerCard">
    <div class="mt-1 mb-2">
        <h2>{{ $adminName }}'s Contact Info</h2>

        @include('partials.row_formal_name', ['contact' => $adminContact])
        @include('partials.row_nickname')

        <hr>

        @include('partials.row_birthday')
        <hr>


        @include('partials.row_phone_number')

        <hr>

        @include('partials.row_postal_address')

        <hr>

        @include('partials.row_email_account')

        <hr>

        @include('partials.row_siren_platform')


    </div>

</div>
