<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="{{ $bodyClasses ?? '' }}">
    <header class="header-landing">
        <div class="logo">
            <a href="/"><img src="/assets/img/usethekeyboard-logo.svg" alt="UseTheKeyboard.com logo" width="106" height="32"></a>
        </div>
    </header>
    <div class="wrapper" id="app" data-mac-only="false" data-windows-only="false">
        <div class="container intro">
            <div class="row">
                <div class="hidden-sm-down col-md-5">
                    <img src="/assets/img/undraw_taking_notes_tjaf.svg" class="py-2 py-md-4" width="100%" alt="Vector illustration of a person hanging up notes courtesy of Undraw.co">
                </div>
                <div class="col-md-7 intro-wrapper">
                    <div class="intro-text">
                        <h1 class="title-primary">Use The Keyboard</h1>
                        <p class="subtitle">A collection of keyboard shortcuts for Mac apps, Windows programs, and websites.</p>
                        <label for="searchInput" class="sr-only">Search for shortcuts</label>
                        <input type="text" class="search-input" id="searchInput" name="searchInput" placeholder="Search..." v-model="searchInput">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div data-ea-publisher="usethekeyboard-com" data-ea-type="text" id="ea-home-page"></div>
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-sm-12">
                    <section class="shortcut-section">
                        <h3 class="title-section"><span>Most Popular</span></h3>
                        <div class="row row-programs">
                            @foreach($popular as $file)
                                @php
                                    $data = json_decode(file_get_contents($contentDir . '/' . $file . '.json'));
                                @endphp
                                <div class="col-sm-12 col-md-4 col-lg-3 data-program" data-title="{{ $data->slug }}" data-slug="{{ $data->slug }}">
                                    <a class="program is-popular" href="/{{ $data->slug }}">
                                        <img src="/assets/img/logo-{{ $data->slug }}.png" alt="{{ $data->title }} icon">
                                        <span>{{ $data->title }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="shortcut-section">
                        <h3 class="title-section"><span>All Programs</span></h3>
                        <div class="row row-programs">
                            @php
                                $contentFiles = array_diff(scandir($contentDir), array('.', '..'));
                            @endphp
                            @foreach($contentFiles as $file)
                                @php
                                    $data = json_decode(file_get_contents($contentDir . '/' . $file));
                                @endphp
                                @if($data->slug === '/')
                                    @continue;
                                @endif
                                <div class="col-sm-12 col-md-4 col-lg-3 data-program" data-title="{{ $data->slug }}" data-slug="{{ $data->slug }}">
                                    <a class="program" href="/{{ $data->slug }}">
                                        <span>{{ $data->title }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-landing">
        <div class="credit">Built by <a href="https://twitter.com/aschmelyun">&commat;aschmelyun</a> &mdash; <a href="https://github.com/aschmelyun/use-the-keyboard/issues/new?labels=new%20page">Make a request</a></div>
    </footer>
    @include('partials.footer')
</body>
</html>
