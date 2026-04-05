@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden">
        <div class="site-shell">
            <div
                class="grid min-h-screen items-center gap-10 pb-12 pt-[118px] sm:pt-[128px] lg:pt-[140px] xl:grid-cols-[1.08fr_0.92fr] xl:gap-8">
                <div class="max-w-[980px]">
                    <h1 class="hero-home__title">
                        Smart software
                        <br class="hidden sm:block">
                        for modern business
                    </h1>
                </div>

                <div class="hero-team-art js-home-hero-art">
                    <div class="hero-team-art__motion js-home-hero-motion">
                        <div class="hero-team-art__bg"></div>
                        <div class="hero-team-art__grid"></div>

                        <div class="hero-team-card hero-team-card--left">
                            <div class="hero-team-card__shape hero-team-card__shape--left bg-sky-500">
                                <img src="/images/team/Moses_Amama_.webp" alt="Team member 1" class="hero-team-card__img">
                            </div>
                        </div>

                        <div class="hero-team-card hero-team-card--top">
                            <div class="hero-team-card__shape hero-team-card__shape--top bg-fuchsia-500">
                                <img src="/images/team/Alex_Chen.webp" alt="Team member 2" class="hero-team-card__img">
                            </div>
                        </div>

                        <div class="hero-team-card hero-team-card--bottom">
                            <div class="hero-team-card__shape hero-team-card__shape--bottom bg-emerald-400/90">
                                <img src="/images/team/Eric_Milford.webp" alt="Team member 3"
                                    class="hero-team-card__img hero-team-card__img--faded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="showreel-section js-showreel-section">
        <div class="showreel-sticky">
            <div class="showreel-shell">
                <div class="showreel-card js-showreel-card">
                    <video class="showreel-video js-showreel-video" muted loop playsinline preload="none">
                        <source src="{{ asset('videos/to.mp4') }}" type="video/mp4">
                    </video>

                    <div class="showreel-overlay">
                        <div class="showreel-badge">
                            <span class="showreel-badge__dot"></span>
                            Featured Showreel
                        </div>

                        <button type="button" class="showreel-play js-showreel-play">
                            <span class="showreel-play__icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M8 6.5V17.5L17 12L8 6.5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <span>Play Showreel</span>
                        </button>

                        <div class="showreel-note">
                            Scroll to expand • Click for fullscreen with sound
                        </div>
                    </div>

                    <div class="showreel-glow showreel-glow--left"></div>
                    <div class="showreel-glow showreel-glow--right"></div>
                </div>
            </div>
        </div>
    </section>
    @php
        $serviceTabs = [
            [
                'key' => 'branding',
                'title' => 'Branding',
                'copy' => 'We shape strong visual identities, brand direction, and digital-first presentation systems so your business looks premium, consistent, and memorable across every touchpoint.',
                'image' => '/images/service/img1.webp',
            ],
            [
                'key' => 'digital-products',
                'title' => 'Digital Products',
                'copy' => 'From dashboards to SaaS platforms, we design digital products that feel modern, intuitive, and built around how real users move through a workflow.',
                'image' => '/images/service/img1.webp',
            ],
            [
                'key' => 'websites',
                'title' => 'Websites',
                'copy' => 'We build clean, high-converting company websites, landing pages, and portfolio experiences that reflect trust, clarity, and performance.',
                'image' => '/images/service/img1.webp',
            ],
            [
                'key' => 'development',
                'title' => 'Development',
                'copy' => 'Our team develops fast, scalable web applications, admin systems, automation tools, and custom business platforms using modern technologies.',
                'image' => '/images/service/img1.webp',
            ],
            [
                'key' => 'content',
                'title' => 'Content',
                'copy' => 'We help structure words, visuals, and presentation layers so your products and services communicate clearly, professionally, and persuasively.',
                'image' => '/images/service/img1.webp',
            ],
            [
                'key' => 'generative-ai',
                'title' => 'Generative AI',
                'copy' => 'We explore practical AI solutions, smart assistants, workflow automation, and AI-powered digital experiences that create real business value.',
                'image' => '/images/service/img1.webp',
            ],
        ];
    @endphp
    <section id="services" class="services-showcase-section">
        <div class="site-shell">
            <div class="services-showcase js-services-showcase">
                <div class="services-showcase__copy">
                    <p class="services-showcase__lead">
                        We build transformative digital experiences for modern businesses
                        by blending strategy, design, development, and intelligent systems.
                    </p>
                </div>

                <div class="services-showcase__preview-wrap">
                    <div class="services-preview">
                        <div class="services-preview__halo services-preview__halo--one"></div>
                        <div class="services-preview__halo services-preview__halo--two"></div>

                        @foreach ($serviceTabs as $index => $item)
                            <div class="services-preview__pane js-service-preview-pane {{ $index === 0 ? 'is-active' : '' }}"
                                data-key="{{ $item['key'] }}">
                                <div class="services-preview__surface">
                                    <div class="services-preview__glass"></div>
                                    <div class="services-preview__ring"></div>
                                    <div class="services-preview__inner-shadow"></div>

                                    <div class="services-preview__stage">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}"
                                            class="services-preview__image">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="services-showcase__tabs js-services-tabs">
                    @foreach ($serviceTabs as $index => $item)
                        <div class="service-item js-service-item {{ $index === 0 ? 'is-open' : '' }}"
                            data-key="{{ $item['key'] }}">
                            <button type="button" class="service-item__trigger js-service-trigger"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <span class="service-item__title">{{ $item['title'] }}</span>

                                <span class="service-item__icon">
                                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                        <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </button>

                            <div class="service-item__panel">
                                <div class="service-item__panel-inner">
                                    <p class="service-item__text">{{ $item['copy'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @php
        $clientLogos = [
            ['name' => 'Meta', 'file' => '/images/clients/meta.avif'],
            ['name' => 'Fiverr', 'file' => '/images/clients/fiverr.avif'],
            ['name' => 'Amazon', 'file' => '/images/clients/amazon.avif'],
            ['name' => 'Coinbase', 'file' => '/images/clients/coinbase.avif'],
            ['name' => 'Google', 'file' => '/images/clients/google.avif'],
            ['name' => 'Slack', 'file' => '/images/clients/slack.avif'],
            ['name' => 'Samsung', 'file' => '/images/clients/samsung.avif'],
            ['name' => 'Stripe', 'file' => '/images/clients/stripe.avif'],
            ['name' => 'cisco', 'file' => '/images/clients/cisco.avif'],
            ['name' => 'ups', 'file' => '/images/clients/ups.avif'],
        ];
    @endphp
    <section id="clients" class="clients-strip-section">
        <div class="site-shell">
            <div class="clients-strip">
                <div class="clients-strip__grid">
                    @foreach ($clientLogos as $client)
                        <div class="clients-strip__item">
                            <img src="{{ asset($client['file']) }}" alt="{{ $client['name'] }}" class="clients-strip__logo">
                        </div>
                    @endforeach
                </div>

                <div class="clients-strip__footer">
                    <a href="/client" class="clients-strip__link">
                        <span>View all clients</span>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="fintech-card-section">
        <div class="site-shell">
            <a href="#contact" class="fintech-card js-fintech-card">
                <div class="fintech-card__bg"></div>
                <div class="fintech-card__glow"></div>
                <div class="fintech-card__noise"></div>

                <div class="fintech-card__content">
                    <p class="fintech-card__eyebrow">Fintech</p>

                    <h2 class="fintech-card__title">
                        The Future of Finance
                        <br>
                        is Intelligent
                    </h2>

                    <span class="fintech-card__link">
                        <span>Explore fintech</span>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>

                <div class="fintech-card__visual">
                    <img src="{{ asset('/images/fintech.png') }}" alt="Fintech visual"
                        class="fintech-card__shape js-fintech-shape">
                    <span class="fintech-card__orb js-fintech-orb"></span>
                </div>
            </a>
        </div>
    </section>
    @php
        $works = [
            [
                'title' => 'Keshoriya ',
                'category' => 'E-commerce',
                'type' => 'video',
                'thumb' => '/images/work/keshoriya.webp',
                'video' => null,
                'url' => 'https://keshoriya.com/',
                'size' => 'work-card--xl',
            ],
            [
                'title' => 'TiktoSlang',
                'category' => 'Business Website',
                'type' => 'video',
                'thumb' => '/images/work/tiktokslang.webp',
                'video' => null,
                'url' => 'http://tiktokslang.nexolioit.com/live-trends',
                'size' => 'work-card--sm',
            ],
            [
                'title' => 'VUY-LMS',
                'category' => 'LMS Product',
                'type' => 'video',
                'thumb' => '/images/work/lms.webp',
                'video' => null,
                'url' => 'https://virtualuniversityofyahweh.com/',
                'size' => 'work-card--md',
            ],
            [
                'title' => 'Fluidstream',
                'category' => 'CMS Website',
                'type' => 'image',
                'thumb' => '/images/work/fluidstream.webp',
                'video' => null,
                'url' => 'https://fluidstream.nexolioit.com/',
                'size' => 'work-card--lg',
            ],

        ];
    @endphp
    <section id="our-work" class="work-showcase-section">
        <div class="site-shell">
            <div class="work-showcase-head js-work-reveal">
                <div>
                    <p class="work-showcase-eyebrow">Our Work</p>
                    <h2 class="work-showcase-title">
                        Selected projects built with
                        <br class="hidden md:block">
                        strategy, design, and code
                    </h2>
                </div>

                <p class="work-showcase-copy">
                    A curated mix of software products, business systems, websites, and digital experiences
                    designed to look premium and perform smoothly.
                </p>
            </div>

            <div class="work-grid">
                @foreach ($works as $index => $work)
                    <a href="{{ $work['url'] }}" target="_blank" rel="noopener noreferrer"
                        class="work-card {{ $work['size'] }} js-work-card js-work-reveal"
                        style="transition-delay: {{ $index * 70 }}ms;">
                        <div class="work-card-media">
                            @if ($work['type'] === 'video')
                                <video class="work-card-video js-work-video" muted loop playsinline preload="metadata"
                                    poster="{{ asset($work['thumb']) }}">
                                    <source src="{{ asset($work['video']) }}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{ asset($work['thumb']) }}" alt="{{ $work['title'] }}" class="work-card-image">
                            @endif

                            <div class="work-card-shade"></div>
                            <div class="work-card-glow"></div>
                        </div>

                        <div class="work-card-content">
                            <span class="work-card-category">{{ $work['category'] }}</span>

                            <div class="work-card-footer">
                                <div>
                                    <h3 class="work-card-title">{{ $work['title'] }}</h3>
                                </div>

                                <span class="work-card-arrow">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                        <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
        <div class="clients-strip__footer mt-5">
            <a href="/works" class="clients-strip__link">
                <span>View all works</span>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

    </section>
    @php
        $testimonials = [
            [
                'quote' => 'Nexolio IT somehow pulls off the impossible of blazing speed while simultaneously delivering refined design and reliable execution.',
                'name' => 'Alex James Colville',
                'role' => 'General Partner',
                'company' => 'Age1',
            ],
            [
                'quote' => 'Their team understood our product vision quickly and translated it into a clean, modern experience that felt premium from the first draft.',
                'name' => 'Sarah Mitchell',
                'role' => 'Product Director',
                'company' => 'Northgrid',
            ],
            [
                'quote' => 'From structure to detail, everything was handled with clarity. The final system looked polished, performed well, and made our workflow easier.',
                'name' => 'Daniel Foster',
                'role' => 'Operations Lead',
                'company' => 'VertexWorks',
            ],
            [
                'quote' => 'What stood out most was the combination of fast communication, thoughtful UI decisions, and the confidence to solve complex requirements cleanly.',
                'name' => 'Emma Richardson',
                'role' => 'Founder',
                'company' => 'Lumora Studio',
            ],
        ];
    @endphp

    <section id="testimonials" class="testimonial-section">
        <div class="site-shell">
            <div class="testimonial-slider js-testimonial-slider">
                <div class="testimonial-slider__viewport">
                    @foreach ($testimonials as $index => $item)
                        <article class="testimonial-slide js-testimonial-slide {{ $index === 0 ? 'is-active' : '' }}"
                            data-index="{{ $index }}">
                            <blockquote class="testimonial-quote">
                                “{{ $item['quote'] }}”
                            </blockquote>

                            <div class="testimonial-meta">
                                <h3 class="testimonial-name">{{ $item['name'] }}</h3>
                                <p class="testimonial-role">{{ $item['role'] }}, {{ $item['company'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="testimonial-controls">
                    <button type="button" class="testimonial-arrow js-testimonial-prev" aria-label="Previous testimonial">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M19 12H5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M11 6L5 12L11 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>

                    <button type="button" class="testimonial-arrow js-testimonial-next" aria-label="Next testimonial">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection