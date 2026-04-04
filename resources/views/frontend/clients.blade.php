@extends('layouts.app')

@section('content')
    @php
        $clientLogos = [
            ['name' => 'Keshoriya', 'file' => '/images/clients/keshoriya-client.png'],
            ['name' => 'VYU', 'file' => '/images/clients/logo_lms.png'],
            ['name' => 'Fluidstream', 'file' => '/images/clients/fluidstream-logo.png'],
            ['name' => 'OrbitOne', 'file' => '/images/clients/UCM logo.png'],
            ['name' => 'Tiktokslang', 'file' => '/images/clients/tiktokslang-logo.png'],
            ['name' => 'Fiverr', 'file' => '/images/clients/fiverr.avif'],
        ];

        $clientCards = [
            [
                'title' => 'Enterprise Systems',
                'text' => 'We work with organizations that need dashboards, admin systems, workflow tools, and scalable internal platforms.',
                'tag' => 'Operations',
            ],
            [
                'title' => 'Growing Businesses',
                'text' => 'From service companies to product-driven brands, we help businesses modernize their digital presence and systems.',
                'tag' => 'Business',
            ],
            [
                'title' => 'Education & Institutions',
                'text' => 'We build portals, management systems, ERP-style workflows, and digital platforms tailored to structured environments.',
                'tag' => 'Education',
            ],
        ];

        $trustPoints = [
            'Clean premium UI with business-focused structure',
            'Fast delivery with strong communication',
            'Scalable Laravel-based systems and websites',
            'Custom solutions instead of one-size-fits-all templates',
        ];
    @endphp

    <section class="client-page">
        <div class="client-page__bg client-page__bg--one"></div>
        <div class="client-page__bg client-page__bg--two"></div>

        <div class="site-shell">
            <section class="client-hero js-client-reveal">
                <div class="client-hero__content">
                    <p class="client-hero__eyebrow">Clients</p>

                    <h1 class="client-hero__title">
                        Trusted by businesses
                        <br class="hidden md:block">
                        that want modern digital execution
                    </h1>

                    <p class="client-hero__subtitle">
                        Nexolio IT works with companies, institutions, and growing brands that need
                        polished websites, custom systems, and premium software experiences.
                    </p>

                    <div class="client-hero__actions">
                        <a href="{{ route('contact') }}" class="client-btn client-btn--dark">Start a Project</a>
                        <a href="{{ route('our-work') }}" class="client-btn client-btn--light">See Our Work</a>
                    </div>

                    <div class="client-stats">
                        <div class="client-stat">
                            <span class="client-stat__value">20+</span>
                            <span class="client-stat__label">Projects delivered</span>
                        </div>
                        <div class="client-stat">
                            <span class="client-stat__value">10+</span>
                            <span class="client-stat__label">Industries served</span>
                        </div>
                        <div class="client-stat">
                            <span class="client-stat__value">100%</span>
                            <span class="client-stat__label">Custom execution focus</span>
                        </div>
                    </div>
                </div>

                <div class="client-hero__visual">
                    <div class="client-orbit js-client-orbit">
                        <div class="client-orbit__core">
                            <div class="client-orbit__card client-orbit__card--main">
                                <span class="client-orbit__mini-label">Nexolio IT</span>
                                <h3>Client-first digital systems</h3>
                                <p>Design, software, websites, and business-focused execution.</p>
                            </div>

                            <div class="client-orbit__card client-orbit__card--floating client-orbit__card--one">
                                <span>UI / UX</span>
                            </div>

                            <div class="client-orbit__card client-orbit__card--floating client-orbit__card--two">
                                <span>Laravel Systems</span>
                            </div>

                            <div class="client-orbit__card client-orbit__card--floating client-orbit__card--three">
                                <span>Business Websites</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="client-logos js-client-reveal">
                <div class="client-logos__track">
                    @foreach(array_merge($clientLogos, $clientLogos) as $logo)
                        <div class="client-logos__item">
                            <img src="{{ asset($logo['file']) }}" alt="{{ $logo['name'] }}" class="client-logos__image">
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="client-grid-section js-client-reveal">
                <div class="client-section-head js-client-reveal">
                    <p class="client-section-head__eyebrow">Who we work with</p>
                    <h2 class="client-section-head__title">Built for serious brands and growing teams</h2>
                </div>

                <div class="client-grid">
                    @foreach($clientCards as $index => $card)
                        <article class="client-info-card js-client-reveal" style="transition-delay: {{ $index * 90 }}ms;">
                            <span class="client-info-card__tag">{{ $card['tag'] }}</span>
                            <h3>{{ $card['title'] }}</h3>
                            <p>{{ $card['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="client-highlight js-client-reveal">
                <div class="client-highlight__content">
                    <p class="client-highlight__eyebrow">Why clients choose us</p>
                    <h2 class="client-highlight__title">
                        Premium design language with
                        <br class="hidden md:block">
                        practical business thinking
                    </h2>
                    <p class="client-highlight__text">
                        We focus on clean execution, strong interface quality, and real operational value.
                        The result is software and websites that look modern, feel reliable, and support growth.
                    </p>
                </div>

                <div class="client-highlight__list">
                    @foreach($trustPoints as $i => $point)
                        <div class="client-point js-client-reveal" style="transition-delay: {{ $i * 80 }}ms;">
                            <span class="client-point__number">0{{ $i + 1 }}</span>
                            <p>{{ $point }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="client-cta js-client-reveal">
                <div class="client-cta__content">
                    <p class="client-cta__eyebrow">Let’s build together</p>
                    <h2 class="client-cta__title text-white">Looking for a reliable digital partner?</h2>
                    <p class="client-cta__text">
                        We can help you create a premium business website, custom software system,
                        or clean platform experience tailored to your workflow.
                    </p>
                </div>

                <div class="client-cta__actions">
                    <a href="{{ route('contact') }}" class="client-btn client-btn--white">Contact Nexolio IT</a>
                    <a href="{{ route('our-work') }}" class="client-btn client-btn--ghost">View Portfolio</a>
                </div>
            </section>
        </div>
    </section>
@endsection