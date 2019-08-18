@if($contact->birthday)
<div>
    <i class="fa fa-fw fa-birthday-cake text-muted"></i> {{ date('D M jS, Y', strtotime($contact->birthday)) }}
</div>
@endif