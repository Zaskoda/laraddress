<p>Hello,</p>

<p>You or someone using your email address attempted to access {{ $adminName }}'s address book!</p>

<p>To finish your login process, click this <a href="{{ $tokenlink }}">Verification Link</a></p>

<p>In case that link did not display correctly in your email client, you can copy and paste the following link:<p>

<p>{{ $tokenlink }}</p>

<p>Thank you for keeping me up to date!</p>

- {{ $adminName }}




