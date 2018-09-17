<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" style="color: #ffb13b;" href="/">Giraffe Board</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
    <div class="navbar-form navbar-right">
        @if (Route::has('login'))
            <div class="top-right links" style="height: 30px">
                @auth
                    <div style="padding-top: 5px; padding-bottom: 5px; padding-left: 10px;padding-right: 10px; border: 1px #5a5a5a solid;">
                        <?php if ($userName) : ?>
                        <span style="color:#fff; font-size: 16px">{{ $userName }}</span>
                            <?php endif; ?>
                        <span style="color: coral; padding-left: 10px;" class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                        <a style="font-size: 16px; color: coral" href="{{ url('/logout') }}">Logout</a>
                    </div>
                @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="login" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                @endauth
            </div>
        @endif

    </div>

</div><!--/.navbar-collapse -->