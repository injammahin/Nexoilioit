@extends('layouts.app')

@section('content')
    <style>
        .about-page {
            position: relative;
            overflow: hidden;
            padding: 7rem 0 8rem;
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, 0.10), transparent 24%),
                radial-gradient(circle at bottom right, rgba(56, 189, 248, 0.08), transparent 22%);
        }

        .about-page__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            pointer-events: none;
            opacity: 0.22;
        }

        .about-page__glow--one {
            width: 320px;
            height: 320px;
            left: -120px;
            top: 140px;
            background: rgba(99, 102, 241, 0.22);
        }

        .about-page__glow--two {
            width: 360px;
            height: 360px;
            right: -120px;
            top: 520px;
            background: rgba(34, 197, 94, 0.14);
        }

        .about-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, 0.95fr);
            gap: 2rem;
            align-items: center;
            min-height: 78vh;
        }

        .about-hero__eyebrow,
        .about-block__eyebrow,
        .about-cta__eyebrow {
            margin: 0 0 .9rem;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: rgba(6, 6, 22, .45);
        }

        .dark .about-hero__eyebrow,
        .dark .about-block__eyebrow,
        .dark .about-cta__eyebrow {
            color: rgba(255, 255, 255, .42);
        }

        .about-hero__title {
            margin: 0;
            font-size: clamp(2.7rem, 6vw, 5.8rem);
            line-height: .95;
            letter-spacing: -.075em;
            font-weight: 600;
            color: #060616;
        }

        .dark .about-hero__title {
            color: #fff;
        }

        .about-hero__subtitle {
            margin: 1.2rem 0 0;
            max-width: 760px;
            font-size: 1.06rem;
            line-height: 1.85;
            color: rgba(71, 85, 105, .92);
        }

        .dark .about-hero__subtitle {
            color: rgba(255, 255, 255, .66);
        }

        .about-hero__actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .about-btn {
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

        .about-btn:hover {
            transform: translateY(-2px);
        }

        .about-btn--dark {
            background: #050b25;
            color: #fff;
            box-shadow: 0 16px 36px rgba(11, 16, 32, .18);
        }

        .dark .about-btn--dark {
            background: #fff;
            color: #060616;
        }

        .about-btn--light {
            background: rgba(255, 255, 255, .88);
            color: #060616;
            border: 1px solid rgba(15, 23, 42, .06);
        }

        .dark .about-btn--light {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-color: rgba(255, 255, 255, .08);
        }

        .about-hero__visual {
            position: relative;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-visual {
            position: relative;
            width: min(520px, 100%);
            aspect-ratio: 1 / 1;
        }

        .about-visual__ring {
            position: absolute;
            inset: 0;
            border-radius: 999px;
            border: 1px dashed rgba(99, 102, 241, .22);
            animation: aboutSpin 24s linear infinite;
        }

        .about-visual__ring::before,
        .about-visual__ring::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            inset: 15%;
            border: 1px dashed rgba(56, 189, 248, .18);
        }

        .about-visual__ring::after {
            inset: 30%;
            border-color: rgba(168, 85, 247, .16);
        }

        .about-visual__card {
            position: absolute;
            inset: 18% 14%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: .8rem;
            padding: 1.8rem;
            border-radius: 32px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .08),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            backdrop-filter: blur(10px);
            animation: aboutFloat 6.2s ease-in-out infinite;
        }

        .dark .about-visual__card {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 24px 48px rgba(0, 0, 0, .24),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .about-visual__label {
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(100, 116, 139, .84);
        }

        .dark .about-visual__label {
            color: rgba(255, 255, 255, .46);
        }

        .about-visual__title {
            margin: 0;
            font-size: clamp(1.6rem, 2vw, 2.4rem);
            line-height: 1.02;
            letter-spacing: -.05em;
            font-weight: 600;
            color: #060616;
        }

        .dark .about-visual__title {
            color: #fff;
        }

        .about-visual__text {
            margin: 0;
            font-size: 1rem;
            line-height: 1.72;
            color: rgba(71, 85, 105, .9);
        }

        .dark .about-visual__text {
            color: rgba(255, 255, 255, .64);
        }

        .about-visual__pill {
            position: absolute;
            padding: .85rem 1rem;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 16px 34px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            font-size: .95rem;
            font-weight: 700;
            color: #060616;
            letter-spacing: -.02em;
        }

        .dark .about-visual__pill {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            color: #fff;
        }

        .about-visual__pill--one {
            top: 8%;
            right: 8%;
            animation: aboutFloatSmall 5.4s ease-in-out infinite;
        }

        .about-visual__pill--two {
            left: 2%;
            bottom: 16%;
            animation: aboutFloatSmall 6.4s ease-in-out infinite reverse;
        }

        .about-stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .about-stat {
            padding: 1.25rem 1.2rem;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .88) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .about-stat {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .about-stat__value {
            display: block;
            font-size: 1.9rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: -.05em;
            color: #060616;
        }

        .dark .about-stat__value {
            color: #fff;
        }

        .about-stat__label {
            display: block;
            margin-top: .55rem;
            font-size: .95rem;
            line-height: 1.55;
            color: rgba(71, 85, 105, .9);
        }

        .dark .about-stat__label {
            color: rgba(255, 255, 255, .66);
        }

        .about-block {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 1.2rem;
            align-items: stretch;
            margin-top: 4.5rem;
        }

        .about-card {
            padding: 1.6rem;
            border-radius: 30px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .88) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .about-card:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .1),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .about-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .about-block__title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.4rem);
            line-height: .98;
            letter-spacing: -.06em;
            font-weight: 600;
            color: #060616;
        }

        .dark .about-block__title {
            color: #fff;
        }

        .about-block__text {
            margin: 1rem 0 0;
            font-size: 1rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
        }

        .dark .about-block__text {
            color: rgba(255, 255, 255, .66);
        }

        .about-list {
            display: grid;
            gap: .8rem;
            margin-top: 1.5rem;
        }

        .about-list__item {
            display: flex;
            gap: .85rem;
            align-items: flex-start;
            font-size: 1rem;
            line-height: 1.75;
            color: rgba(71, 85, 105, .94);
        }

        .dark .about-list__item {
            color: rgba(255, 255, 255, .7);
        }

        .about-list__dot {
            width: 10px;
            height: 10px;
            margin-top: .55rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #6366f1 0%, #38bdf8 100%);
            flex-shrink: 0;
        }

        .about-values {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 4.5rem;
        }

        .about-value {
            padding: 1.5rem;
            border-radius: 28px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .88) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .about-value:hover {
            transform: translateY(-4px);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .1),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .dark .about-value {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .about-value__number {
            display: inline-flex;
            margin-bottom: 1rem;
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(99, 102, 241, .9);
        }

        .about-value h3 {
            margin: 0;
            font-size: 1.45rem;
            line-height: 1.12;
            letter-spacing: -.04em;
            font-weight: 700;
            color: #060616;
        }

        .dark .about-value h3 {
            color: #fff;
        }

        .about-value p {
            margin: .8rem 0 0;
            font-size: 1rem;
            line-height: 1.78;
            color: rgba(71, 85, 105, .92);
        }

        .dark .about-value p {
            color: rgba(255, 255, 255, .66);
        }

        .about-cta {
            margin-top: 4.5rem;
            padding: 2rem;
            border-radius: 36px;
            background: linear-gradient(135deg, #0b1020 0%, #070b18 100%);
            color: #fff;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 2rem;
            align-items: end;
        }

        .about-cta__title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.8rem);
            line-height: .98;
            letter-spacing: -.06em;
            font-weight: 600;
            color: #fff;
        }

        .about-cta__text {
            margin: .9rem 0 0;
            max-width: 760px;
            font-size: 1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, .72);
        }

        .about-reveal {
            opacity: 0;
            transform: translateY(26px);
            transition:
                opacity .85s cubic-bezier(.22, 1, .36, 1),
                transform .95s cubic-bezier(.22, 1, .36, 1);
        }

        .about-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes aboutSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes aboutFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes aboutFloatSmall {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @media (max-width: 1279px) {

            .about-hero,
            .about-block,
            .about-cta {
                grid-template-columns: 1fr;
            }

            .about-hero {
                min-height: auto;
                padding-top: 1rem;
            }

            .about-stats,
            .about-values {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .about-page {
                padding: 4.8rem 0 5.5rem;
            }

            .about-hero__title {
                font-size: clamp(2.3rem, 11vw, 4rem);
            }

            .about-hero__subtitle,
            .about-block__text,
            .about-value p,
            .about-cta__text {
                font-size: 1rem;
                line-height: 1.72;
            }

            .about-hero__visual {
                min-height: 320px;
            }

            .about-visual__card {
                inset: 20% 8%;
                padding: 1.2rem;
                border-radius: 22px;
            }

            .about-stats,
            .about-values {
                grid-template-columns: 1fr;
            }

            .about-card,
            .about-value {
                padding: 1.2rem;
                border-radius: 22px;
            }

            .about-cta {
                padding: 1.35rem;
                border-radius: 24px;
            }

            .about-btn {
                width: 100%;
            }

            .about-hero__actions {
                flex-direction: column;
            }
        }
    </style>

    <section class="about-page">
        <div class="about-page__glow about-page__glow--one"></div>
        <div class="about-page__glow about-page__glow--two"></div>

        <div class="site-shell">
            <section class="about-hero about-reveal">
                <div>
                    <p class="about-hero__eyebrow">About Us</p>
                    <h1 class="about-hero__title">
                        We build clean digital
                        <br class="hidden md:block">
                        systems for modern businesses
                    </h1>
                    <p class="about-hero__subtitle">
                        Nexolio IT is a software and digital solutions company focused on creating
                        premium websites, custom web systems, business platforms, and modern digital
                        experiences that are practical, scalable, and visually polished.
                    </p>

                    <div class="about-hero__actions">
                        <a href="{{ route('services') }}" class="about-btn about-btn--dark">Explore Services</a>
                        <a href="{{ route('contact') }}" class="about-btn about-btn--light">Contact Us</a>
                    </div>
                </div>

                <div class="about-hero__visual">
                    <div class="about-visual">
                        <div class="about-visual__ring"></div>

                        <div class="about-visual__card">
                            <span class="about-visual__label">Nexolio IT</span>
                            <h2 class="about-visual__title">Design, software, and business-focused execution</h2>
                            <p class="about-visual__text">
                                We help brands move from ideas to modern digital products, websites,
                                and systems with clarity and precision.
                            </p>
                        </div>

                        <div class="about-visual__pill about-visual__pill--one">Clean UI</div>
                        <div class="about-visual__pill about-visual__pill--two">Custom Solutions</div>
                    </div>
                </div>
            </section>

            <section class="about-stats about-reveal">
                <div class="about-stat">
                    <span class="about-stat__value">Web</span>
                    <span class="about-stat__label">Modern business and company websites</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat__value">Software</span>
                    <span class="about-stat__label">Custom admin panels and business systems</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat__value">UI/UX</span>
                    <span class="about-stat__label">Clear, useful, and visually refined interfaces</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat__value">Growth</span>
                    <span class="about-stat__label">Digital solutions aligned with business goals</span>
                </div>
            </section>

            <section class="about-block">
                <div class="about-card about-reveal">
                    <p class="about-block__eyebrow">Who We Are</p>
                    <h2 class="about-block__title">A practical digital partner, not just a vendor</h2>
                    <p class="about-block__text">
                        At Nexolio IT, we do not only build websites or software. We help businesses
                        shape digital systems that look professional, work smoothly, and support real
                        operations. Our goal is to combine strong visual presentation with useful,
                        dependable execution.
                    </p>
                    <p class="about-block__text">
                        We focus on solutions that are clean, modern, and business-ready, whether that
                        means a corporate website, a custom workflow platform, an internal admin system,
                        or a digital product interface.
                    </p>
                </div>

                <div class="about-card about-reveal">
                    <p class="about-block__eyebrow">What We Do</p>
                    <h2 class="about-block__title">Services built around business needs</h2>

                    <div class="about-list">
                        <div class="about-list__item">
                            <span class="about-list__dot"></span>
                            <span>Custom web development for businesses and operational workflows</span>
                        </div>
                        <div class="about-list__item">
                            <span class="about-list__dot"></span>
                            <span>Modern WordPress websites with strong presentation and usability</span>
                        </div>
                        <div class="about-list__item">
                            <span class="about-list__dot"></span>
                            <span>Digital marketing support for visibility and online growth</span>
                        </div>
                        <div class="about-list__item">
                            <span class="about-list__dot"></span>
                            <span>Lead generation systems and conversion-focused digital structure</span>
                        </div>
                        <div class="about-list__item">
                            <span class="about-list__dot"></span>
                            <span>AI automation ideas and smart workflow enhancement</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-values">
                <div class="about-value about-reveal">
                    <span class="about-value__number">01</span>
                    <h3>Clarity</h3>
                    <p>
                        We prefer simple, useful, and structured digital experiences that make information
                        easier to understand and systems easier to use.
                    </p>
                </div>

                <div class="about-value about-reveal">
                    <span class="about-value__number">02</span>
                    <h3>Quality</h3>
                    <p>
                        We care about clean design, polished user interface, and reliable execution so
                        the final result feels premium and trustworthy.
                    </p>
                </div>

                <div class="about-value about-reveal">
                    <span class="about-value__number">03</span>
                    <h3>Practical Value</h3>
                    <p>
                        Our work is shaped around real business problems, not unnecessary complexity.
                        The goal is always usefulness, scalability, and impact.
                    </p>
                </div>
            </section>

            <section class="about-cta about-reveal">
                <div>
                    <p class="about-cta__eyebrow">Let’s Work Together</p>
                    <h2 class="about-cta__title">Need a clean digital solution for your business?</h2>
                    <p class="about-cta__text">
                        Whether you need a company website, a custom software system, a marketing-ready
                        digital presence, or workflow automation, Nexolio IT can help turn the idea into
                        a clear and modern solution.
                    </p>
                </div>

                <div>
                    <a href="{{ route('contact') }}" class="about-btn about-btn--light">Start a Conversation</a>
                </div>
            </section>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealItems = document.querySelectorAll('.about-reveal');

            if (revealItems.length) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, {
                    threshold: 0.14,
                    rootMargin: '0px 0px -8% 0px'
                });

                revealItems.forEach((item) => observer.observe(item));
            }
        });
    </script>
@endsection