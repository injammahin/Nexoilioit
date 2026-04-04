@extends('layouts.app')

@section('content')
    @php
        $industries = [
            [
                'number' => '01',
                'title' => 'Corporate & Professional Services',
                'subtitle' => 'Clean websites, service pages, inquiry systems, and modern company presentation for growing businesses.',
                'points' => [
                    'Corporate websites',
                    'Service presentation pages',
                    'Company profile systems',
                    'Lead-focused contact flows',
                ],
            ],
            [
                'number' => '02',
                'title' => 'Education & Training',
                'subtitle' => 'ERP, LMS, portals, and workflow-based platforms for institutes, colleges, training centers, and academic operations.',
                'points' => [
                    'Student and academic portals',
                    'Learning platforms',
                    'Institute ERP systems',
                    'Admin and reporting dashboards',
                ],
            ],
            [
                'number' => '03',
                'title' => 'E-commerce & Retail',
                'subtitle' => 'Brand-led shopping experiences, product showcases, order flow systems, and digital storefront support.',
                'points' => [
                    'Product-focused websites',
                    'Order and inventory support',
                    'Brand storefronts',
                    'Customer inquiry flow',
                ],
            ],
            [
                'number' => '04',
                'title' => 'Travel & Hospitality',
                'subtitle' => 'Travel, visa, and hospitality websites with structured information flow, service discovery, and conversion-ready design.',
                'points' => [
                    'Travel service websites',
                    'Visa information systems',
                    'Booking inquiry flows',
                    'Destination content structure',
                ],
            ],
            [
                'number' => '05',
                'title' => 'Startups & SaaS',
                'subtitle' => 'Modern product websites, MVP interfaces, dashboards, and digital systems for fast-moving new ventures.',
                'points' => [
                    'MVP frontends',
                    'SaaS dashboards',
                    'Product landing pages',
                    'User workflow design',
                ],
            ],
            [
                'number' => '06',
                'title' => 'Operations & Internal Management',
                'subtitle' => 'Custom admin systems, workflow platforms, and process-driven tools for structured business operations.',
                'points' => [
                    'Internal dashboards',
                    'Approval workflows',
                    'Custom reporting tools',
                    'Operational visibility systems',
                ],
            ],
        ];

        $highlights = [
            [
                'title' => 'Business-first approach',
                'text' => 'We shape each solution around the real operational or communication needs of the industry.',
            ],
            [
                'title' => 'Flexible execution',
                'text' => 'From simple presentation sites to advanced systems, the structure adapts to the project scope.',
            ],
            [
                'title' => 'Modern visual language',
                'text' => 'The final experience stays clean, premium, and easy to understand for the intended audience.',
            ],
        ];
    @endphp

    <style>
        .industries-page {
            position: relative;
            overflow: hidden;
            padding: 7rem 0 8rem;
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, 0.10), transparent 24%),
                radial-gradient(circle at bottom right, rgba(56, 189, 248, 0.08), transparent 22%);
        }

        .industries-page__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            pointer-events: none;
            opacity: 0.22;
        }

        .industries-page__glow--one {
            width: 320px;
            height: 320px;
            left: -120px;
            top: 120px;
            background: rgba(99, 102, 241, 0.22);
        }

        .industries-page__glow--two {
            width: 380px;
            height: 380px;
            right: -120px;
            top: 720px;
            background: rgba(34, 197, 94, 0.12);
        }

        .industries-hero {
            display: grid;
            /* grid-template-columns: minmax(0, 1.05fr) minmax(320px, 0.95fr); */
            gap: 1.2rem;
            align-items: center;
            min-height: 74vh;
            margin-bottom: 1.4rem;
        }


        .industries-hero__visual,
        .industries-highlight,
        .industry-card,
        .industries-cta {
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, .90) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .industries-hero__content,
        .dark .industries-hero__visual,
        .dark .industries-highlight,
        .dark .industry-card,
        .dark .industries-cta {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .20),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .industries-hero__content {
            padding: 2rem;
        }

        .industries-hero__eyebrow,
        .industries-section__eyebrow,
        .industry-card__eyebrow,
        .industries-cta__eyebrow {
            margin: 0 0 .85rem;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: rgba(6, 6, 22, .42);
        }

        .dark .industries-hero__eyebrow,
        .dark .industries-section__eyebrow,
        .dark .industry-card__eyebrow,
        .dark .industries-cta__eyebrow {
            color: rgba(255, 255, 255, .42);
        }

        .industries-hero__title {
            margin: 0;
            font-size: clamp(2.8rem, 4.8vw, 4.8rem);
            line-height: .94;
            letter-spacing: -.078em;
            font-weight: 500;
            color: #060616;
        }

        .dark .industries-hero__title {
            color: #fff;
        }

        .industries-hero__subtitle {
            margin: 1rem 0 0;
            max-width: 760px;
            font-size: 1.05rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
        }

        .dark .industries-hero__subtitle {
            color: rgba(255, 255, 255, .66);
        }

        .industries-hero__actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .industries-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .75rem;
            height: 56px;
            padding: 0 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            letter-spacing: -.02em;
            transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .industries-btn:hover {
            transform: translateY(-2px);
        }

        .industries-btn--dark {
            background: #050b25;
            color: #fff;
            box-shadow: 0 16px 36px rgba(11, 16, 32, .18);
        }

        .dark .industries-btn--dark {
            background: #fff;
            color: #060616;
        }

        .industries-btn--light {
            background: rgba(255, 255, 255, .88);
            color: #060616;
            border: 1px solid rgba(15, 23, 42, .06);
        }

        .dark .industries-btn--light {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-color: rgba(255, 255, 255, .08);
        }

        .industries-hero__visual {
            position: relative;
            min-height: 470px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .industries-visual {
            position: relative;
            width: min(500px, 100%);
            aspect-ratio: 1 / 1;
        }

        .industries-visual__ring {
            position: absolute;
            inset: 0;
            border-radius: 999px;
            border: 1px dashed rgba(99, 102, 241, .22);
            animation: industriesSpin 24s linear infinite;
        }

        .industries-visual__ring::before,
        .industries-visual__ring::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            inset: 15%;
            border: 1px dashed rgba(56, 189, 248, .18);
        }

        .industries-visual__ring::after {
            inset: 30%;
            border-color: rgba(168, 85, 247, .16);
        }

        .industries-visual__core {
            position: absolute;
            inset: 20% 16%;
            border-radius: 32px;
            padding: 1.6rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: .8rem;
            background: linear-gradient(180deg, rgba(255, 255, 255, .92) 0%, rgba(247, 249, 252, .74) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .08),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            backdrop-filter: blur(10px);
            animation: industriesFloat 6.2s ease-in-out infinite;
        }

        .dark .industries-visual__core {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 24px 48px rgba(0, 0, 0, .24),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .industries-visual__label {
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(100, 116, 139, .84);
        }

        .dark .industries-visual__label {
            color: rgba(255, 255, 255, .46);
        }

        .industries-visual__title {
            margin: 0;
            font-size: clamp(1.6rem, 2vw, 2.35rem);
            line-height: 1.02;
            letter-spacing: -.05em;
            font-weight: 600;
            color: #060616;
        }

        .dark .industries-visual__title {
            color: #fff;
        }

        .industries-visual__text {
            margin: 0;
            font-size: 1rem;
            line-height: 1.72;
            color: rgba(71, 85, 105, .92);
        }

        .dark .industries-visual__text {
            color: rgba(255, 255, 255, .64);
        }

        .industries-visual__pill {
            position: absolute;
            padding: .85rem 1rem;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .90) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 16px 34px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            font-size: .95rem;
            font-weight: 700;
            color: #060616;
            letter-spacing: -.02em;
        }

        .dark .industries-visual__pill {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .industries-visual__pill--one {
            top: 8%;
            right: 6%;
            animation: industriesFloatSmall 5.6s ease-in-out infinite;
        }

        .industries-visual__pill--two {
            left: 2%;
            bottom: 14%;
            animation: industriesFloatSmall 6.4s ease-in-out infinite reverse;
        }

        .industries-highlights {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-bottom: 1.4rem;
        }

        .industries-highlight {
            padding: 1.35rem;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .industries-highlight:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .10),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .industries-highlight h3 {
            margin: 0;
            font-size: 1.35rem;
            line-height: 1.12;
            letter-spacing: -.04em;
            font-weight: 700;
            color: #060616;
        }

        .dark .industries-highlight h3 {
            color: #fff;
        }

        .industries-highlight p {
            margin: .75rem 0 0;
            font-size: 1rem;
            line-height: 1.78;
            color: rgba(71, 85, 105, .92);
        }

        .dark .industries-highlight p {
            color: rgba(255, 255, 255, .66);
        }

        .industries-section-head {
            margin: 2.8rem 0 1.2rem;
        }

        .industries-section-head__title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.7rem);
            line-height: .98;
            letter-spacing: -.06em;
            font-weight: 600;
            color: #060616;
        }

        .dark .industries-section-head__title {
            color: #fff;
        }

        .industries-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .industry-card {
            padding: 1.5rem;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .industry-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .10),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .industry-card__number {
            display: inline-flex;
            margin-bottom: .9rem;
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(99, 102, 241, .9);
        }

        .industry-card__title {
            margin: 0;
            font-size: clamp(1.5rem, 2vw, 2.2rem);
            line-height: 1.05;
            letter-spacing: -.045em;
            font-weight: 700;
            color: #060616;
        }

        .dark .industry-card__title {
            color: #fff;
        }

        .industry-card__subtitle {
            margin: .85rem 0 0;
            font-size: 1rem;
            line-height: 1.8;
            color: rgba(71, 85, 105, .92);
        }

        .dark .industry-card__subtitle {
            color: rgba(255, 255, 255, .66);
        }

        .industry-card__list {
            display: grid;
            gap: .55rem;
            margin-top: 1.35rem;
        }

        .industry-card__item {
            display: flex;
            align-items: flex-start;
            gap: .8rem;
            font-size: .98rem;
            line-height: 1.7;
            color: rgba(71, 85, 105, .94);
        }

        .dark .industry-card__item {
            color: rgba(255, 255, 255, .68);
        }

        .industry-card__dot {
            width: 10px;
            height: 10px;
            margin-top: .48rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #6366f1 0%, #38bdf8 100%);
            flex-shrink: 0;
        }

        .industries-cta {
            margin-top: 3rem;
            padding: 2rem;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 2rem;
            align-items: end;
            background: linear-gradient(135deg, #0b1020 0%, #070b18 100%);
            color: #fff;
        }

        .industries-cta__title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.8rem);
            line-height: .98;
            letter-spacing: -.06em;
            font-weight: 600;
            color: #fff;
        }

        .industries-cta__text {
            margin: .9rem 0 0;
            max-width: 760px;
            font-size: 1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, .72);
        }

        .industries-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .85s cubic-bezier(.22, 1, .36, 1),
                transform .95s cubic-bezier(.22, 1, .36, 1);
        }

        .industries-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes industriesSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes industriesFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes industriesFloatSmall {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @media (max-width: 1279px) {

            .industries-hero,
            .industries-cta {
                grid-template-columns: 1fr;
            }

            .industries-highlights,
            .industries-grid {
                grid-template-columns: 1fr 1fr;
            }

            .industries-hero {
                min-height: auto;
                padding-top: 1rem;
            }

            .industries-hero__visual {
                min-height: 320px;
            }
        }

        @media (max-width: 767px) {
            .industries-page {
                padding: 4.8rem 0 5.5rem;
            }

            .industries-hero__title {
                font-size: clamp(2.3rem, 11vw, 4rem);
            }

            .industries-hero__content,
            .industries-hero__visual,
            .industries-highlight,
            .industry-card,
            .industries-cta {
                border-radius: 22px;
            }

            .industries-hero__content,
            .industries-highlight,
            .industry-card,
            .industries-cta {
                padding: 1.2rem;
            }

            .industries-highlights,
            .industries-grid {
                grid-template-columns: 1fr;
            }

            .industries-hero__actions {
                flex-direction: column;
            }

            .industries-btn {
                width: 100%;
            }

            .industries-visual__core {
                inset: 20% 8%;
                padding: 1.2rem;
                border-radius: 22px;
            }
        }
    </style>

    <section class="industries-page">
        <div class="industries-page__glow industries-page__glow--one"></div>
        <div class="industries-page__glow industries-page__glow--two"></div>

        <div class="site-shell">
            <section class="industries-hero industries-reveal">
                <div class="industries-hero__content">
                    <p class="industries-hero__eyebrow">Industries</p>
                    <h1 class="industries-hero__title">
                        Digital solutions for
                        <br class="hidden md:block">
                        different business sectors
                    </h1>
                    <p class="industries-hero__subtitle">
                        Nexolio IT works with businesses, institutions, and growing brands that need
                        clean websites, structured software, better workflow systems, and modern digital presentation.
                    </p>

                    <div class="industries-hero__actions">
                        <a href="{{ route('services') }}" class="industries-btn industries-btn--dark">View Services</a>
                        <a href="{{ route('contact') }}" class="industries-btn industries-btn--light">Discuss Your
                            Project</a>
                    </div>
                </div>

                {{-- <div class="industries-hero__visual">
                    <div class="industries-visual">
                        <div class="industries-visual__ring"></div>

                        <div class="industries-visual__core">
                            <span class="industries-visual__label">Nexolio IT</span>
                            <h2 class="industries-visual__title">Solutions shaped around real industry needs</h2>
                            <p class="industries-visual__text">
                                Every sector has different priorities, workflows, and user expectations.
                                We design with that context in mind.
                            </p>
                        </div>

                        <div class="industries-visual__pill industries-visual__pill--one">Web + Systems</div>
                        <div class="industries-visual__pill industries-visual__pill--two">Business Focus</div>
                    </div>
                </div> --}}
            </section>

            <section class="industries-highlights">
                @foreach($highlights as $item)
                    <article class="industries-highlight industries-reveal">
                        <p class="industries-section__eyebrow">Highlight</p>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </section>

            <section class="industries-section-head industries-reveal">
                <p class="industries-section__eyebrow">Where We Work</p>
                <h2 class="industries-section-head__title">Industries we can support</h2>
            </section>

            <section class="industries-grid">
                @foreach($industries as $industry)
                    <article class="industry-card industries-reveal">
                        <span class="industry-card__number">{{ $industry['number'] }}</span>
                        <h3 class="industry-card__title">{{ $industry['title'] }}</h3>
                        <p class="industry-card__subtitle">{{ $industry['subtitle'] }}</p>

                        <div class="industry-card__list">
                            @foreach($industry['points'] as $point)
                                <div class="industry-card__item">
                                    <span class="industry-card__dot"></span>
                                    <span>{{ $point }}</span>
                                </div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </section>

            <section class="industries-cta industries-reveal">
                <div>
                    <p class="industries-cta__eyebrow">Need something specific?</p>
                    <h2 class="industries-cta__title">Your industry may need a custom approach</h2>
                    <p class="industries-cta__text">
                        If your business model or workflow does not fit a generic system, we can help design
                        a solution that aligns with your actual process, audience, and growth direction.
                    </p>
                </div>

                <div>
                    <a href="{{ route('contact') }}" class="industries-btn industries-btn--light">Contact Nexolio IT</a>
                </div>
            </section>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealItems = document.querySelectorAll('.industries-reveal');

            if (revealItems.length) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -8% 0px'
                });

                revealItems.forEach((item) => observer.observe(item));
            }
        });
    </script>
@endsection