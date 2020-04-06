<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="{{ $bodyClasses ?? '' }}">
    <div class="wrapper" id="app">
        <aside class="header">
            <div class="logo">
                <a href="/" class="img"><img src="/assets/img/usethekeyboard-logo.svg" alt="UseTheKeyboard.com logo" width="106" height="32"></a>
                <a class="switcher" @click.prevent="toggleOperatingSystem" :class="{'is-right': operatingSystem === 'mac' || isMacOnly}"><span class="toggle"></span></a>
            </div>
            <div class="header-wrapper">
                <h1 class="title-primary">{{ $meta_title }}</h1>
                <p class="subtitle">{{ $meta_description }}</p>
                <a href="{{ $reference_link }}" target="_blank" rel="noreferrer" class="btn btn-primary">Original Reference</a>
                <a href="https://github.com/aschmelyun/use-the-keyboard/issues" target="_blank" rel="noreferrer" class="ml-2 btn btn-secondary">Report Issue</a>
            </div>
        </aside>
        <main class="content">
            <div class="content-wrapper">
                @foreach($sections as $section)
                    <section class="shortcut-section" id="{{ str_replace(' ', '', $section->name) }}">
                        <h3 class="title-section"><span>{{ $section->name }}</span></h3>
                        <div class="shortcuts">
                            @foreach($section->shortcuts as $shortcut)
                                <div class="shortcut">
                                    <p class="description">{{ $shortcut->description }}</p>
                                    <ul class="keys">
                                        @foreach($shortcut->keys as $keyIndex => $key)
                                            <li class="key">{{ $key }}</li>
                                            @if($keyIndex < (count($shortcut->keys) - 1))
                                                <li class="plus"></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </main>
        <footer class="footer">
            <div class="credit">Built by <a href="https://twitter.com/aschmelyun">&commat;aschmelyun</a> &mdash; <a href="https://github.com/aschmelyun/use-the-keyboard/issues/new?labels=new%20page">Make a request</a><br>Train your brain for these shortcuts using <a href="https://mouseless.app/?ref=usethekeyboard">Mouseless</a></div>
        </footer>
    </div>
    @include('partials.footer')
</body>
</html>
