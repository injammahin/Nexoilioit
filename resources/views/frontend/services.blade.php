@extends('layouts.app')

@section('content')
    @php
        $services = [
            [
                'title' => 'Custom Web Development',
                'subtitle' => 'Custom-built websites and web systems tailored to your workflow, brand, and business goals.',
                'image' => '/images/service/web development.png',
                'points' => [
                    'Business website development',
                    'Custom admin panels',
                    'Laravel-based web applications',
                    'API integration and workflow automation',
                    'Scalable backend architecture',
                ],
                'details' => 'We build custom websites and web-based systems from the ground up. This service is ideal for businesses that need more than a template, including company websites, internal dashboards, booking systems, portals, and custom process-driven software. Our focus is clean UI, strong performance, and long-term scalability.',
            ],
            [
                'title' => 'WordPress Website',
                'subtitle' => 'Professional WordPress websites with clean design, easy content management, and modern presentation.',
                'image' => '/images/service/wordpress.png',
                'points' => [
                    'Corporate website setup',
                    'Landing pages and service pages',
                    'Theme customization',
                    'Speed and SEO optimization',
                    'Easy content management',
                ],
                'details' => 'We create polished WordPress websites for companies, agencies, service providers, and product-based businesses. This is a strong option if you want a premium-looking website that your team can manage easily after launch. We focus on clean design, structured layout, speed, and usability.',
            ],
            [
                'title' => 'Digital Marketing',
                'subtitle' => 'Smart digital campaigns and brand communication strategies designed to improve visibility and growth.',
                'image' => '/images/service/digital marketing.png',
                'points' => [
                    'Campaign planning',
                    'Content direction',
                    'Brand presence improvement',
                    'Landing page support',
                    'Performance-focused digital strategy',
                ],
                'details' => 'Our digital marketing service helps businesses improve visibility, communicate clearly, and reach the right audience online. We support campaign strategy, digital content direction, landing page alignment, and execution planning so your online efforts are structured and growth-focused.',
            ],
            [
                'title' => 'Lead Generation',
                'subtitle' => 'Lead-focused systems and digital funnels that help businesses attract and convert potential clients.',
                'image' => '/images/service/Lead Generation.png',
                'points' => [
                    'Lead funnel design',
                    'Contact capture pages',
                    'Business inquiry optimization',
                    'Audience targeting support',
                    'Conversion-focused structure',
                ],
                'details' => 'We help businesses build lead generation systems that are more structured and conversion-focused. This can include landing pages, inquiry flows, form systems, campaign support, and content positioning designed to attract qualified leads and make follow-up easier.',
            ],
            [
                'title' => 'AI Automation',
                'subtitle' => 'Practical AI-powered workflow solutions that save time, reduce manual work, and improve efficiency.',
                'image' => '/images/service/ai automation.png',
                'points' => [
                    'Business process automation',
                    'AI-assisted workflow ideas',
                    'Smart internal tools',
                    'Productivity enhancement',
                    'Custom automation logic',
                ],
                'details' => 'Our AI automation service focuses on practical business use. We help identify manual workflows that can be streamlined with AI or rule-based automation, then design lightweight solutions that improve speed, consistency, and team productivity without unnecessary complexity.',
            ],
        ];
    @endphp

    <section class="services-page">
        <div class="services-page__glow services-page__glow--one"></div>
        <div class="services-page__glow services-page__glow--two"></div>

        <div class="site-shell">
            <section class="services-page-hero js-service-page-reveal">
                <div class="services-page-hero__content">
                    <p class="services-page-hero__eyebrow">Services</p>
                    <h1 class="services-page-hero__title">
                        A digital partner for
                        <br class="hidden md:block">
                        business growth and execution
                    </h1>
                    <p class="services-page-hero__subtitle">
                        We provide modern web, marketing, lead generation, and automation services
                        designed to help businesses build better systems, stronger visibility, and
                        cleaner digital experiences.
                    </p>
                </div>

                <div class="services-page-hero__shape">
                    <div class="services-page-hero__shape-orbit"></div>
                    <div class="services-page-hero__shape-card">
                        <span>5 Core Services</span>
                        <strong>Modern. Clear. Practical.</strong>
                    </div>
                </div>
            </section>

            <section class="services-page-list">
                @foreach ($services as $index => $service)
                    <article
                        class="service-feature js-service-page-reveal {{ $index % 2 !== 0 ? 'service-feature--reverse' : '' }}">
                        <div class="service-feature__media">
                            <div class="service-feature__media-frame">
                                <div class="service-feature__media-glow"></div>
                                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}"
                                    class="service-feature__image">
                            </div>
                        </div>

                        <div class="service-feature__content">
                            <p class="service-feature__eyebrow">Service {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</p>
                            <h2 class="service-feature__title">{{ $service['title'] }}</h2>
                            <p class="service-feature__subtitle">{{ $service['subtitle'] }}</p>

                            <div class="service-feature__points">
                                @foreach ($service['points'] as $point)
                                    <div class="service-feature__point">{{ $point }}</div>
                                @endforeach
                            </div>

                            <div class="service-feature__more js-service-more">
                                <button type="button" class="service-feature__button js-service-more-toggle"
                                    aria-expanded="false">
                                    <span class="service-feature__button-text">View More</span>
                                    <span class="service-feature__button-icon">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M12 5V19" stroke="currentColor" stroke-width="1.8"
                                                stroke-linecap="round" />
                                            <path d="M5 12H19" stroke="currentColor" stroke-width="1.8"
                                                stroke-linecap="round" />
                                        </svg>
                                    </span>
                                </button>

                                <div class="service-feature__details js-service-more-panel">
                                    <p>{{ $service['details'] }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </section>
@endsection