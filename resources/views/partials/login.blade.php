<div class="tight-block text-left">
    <p>
        This application allows you to login and update your contact information, helping
        me keep my address book up to date. The application is open source and is
        <a href="https://github.com/Zaskoda/laraddress">available on Github</a>.
    </p>
    <p>
        I will use your email address to verify your identity by sending you a
        verification link.
    <p>
    <div class="card card-body">
        <p>Enter your email address in the form below so I can determine your identity.</p>
            <form action="/identify" method="post" class="form-inline  justify-content-center">
                @csrf
                <div class="form-group">
                    <input name="email_address" placeholder="enter your email" class="form-control">
                </div>
                &nbsp;
                <input type="submit" value="check in" class="btn btn-success">
            </form>
            {!! $errors->first('email_address', '<p class="text-centere text-warning">:message</p>') !!}
            <hr>
            <p class="text-info"><i class="fa fa-exclamation-circle"></i> Emails can sometimes take a few minutes to arrive. Resubmitting this form will invalidate any previously sent verification links.</p>
        </div>
    </div>
</div>