@if ($user)
    @if(config('app.multilang'))
    <li class="switcher">
        <div class="dropdown">
            <button class="btn dropdown-toggle" style="margin-top: 7px;background: #3c8dbc;color: #FFFFFF;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                @if(session('lang'))
                    {{session('lang')}}
                @else
                    {{config('locale')}}
                @endif
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" style="background: #3c8dbc;" aria-labelledby="dropdownMenu1">
                @foreach(config('app.langs') as $lang)
                    <li role="presentation">

                        <a role="menuitem" tabindex="-1" style="color: #FFFFFF;" href="{{config('app.url')}}/{{config('sleeping_owl.url_prefix')}}/lang/{{$lang}}">{{$lang}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
    @endif
    <li>
        <a href="/" target="_blank">
            <i class="fa fa-btn fa-globe"></i> @lang('sleeping_owl::lang.links.index_page')
        </a>
    </li>
    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <img src="{{ $user->avatar_url_or_blank }}" class="user-image" />
            <span class="hidden-xs">{{ $user->name }}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="{{ $user->avatar_url_or_blank }}" class="img-circle" />
                <p>
                    {{ $user->name }}
                    <small>@lang('sleeping_owl::lang.auth.since', ['date' => $user->created_at->format('d.m.Y')])</small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
                </a>
            </li>
        </ul>
    </li>
@endif

