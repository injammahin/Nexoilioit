@extends('layouts.app')

@section('content')
    @php
        $featured = $posts->first();
        $others = $posts->slice(1);
    @endphp

    <style>
        .blog-page {
            position: relative;
            overflow: hidden;
            padding: 7rem 0 8rem;
            background:
                radial-gradient(circle at top left, rgba(99, 102, 241, .08), transparent 22%),
                radial-gradient(circle at bottom right, rgba(56, 189, 248, .07), transparent 24%);
        }

        .blog-page__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(90px);
            pointer-events: none;
            opacity: .18;
        }

        .blog-page__glow--one {
            width: 320px;
            height: 320px;
            left: -100px;
            top: 120px;
            background: rgba(99, 102, 241, .22);
        }

        .blog-page__glow--two {
            width: 360px;
            height: 360px;
            right: -120px;
            top: 640px;
            background: rgba(56, 189, 248, .16);
        }

        .blog-hero {
            max-width: 980px;
            margin-bottom: 2.6rem;
        }

        .blog-hero__eyebrow {
            margin: 0 0 .85rem;
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: rgba(6, 6, 22, .42);
        }

        .dark .blog-hero__eyebrow {
            color: rgba(255, 255, 255, .42);
        }

        .blog-hero__title {
            margin: 0;
            font-size: clamp(1.8rem, 3.6vw, 3.6rem);
            line-height: .95;
            letter-spacing: -.075em;
            font-weight: 400;
            color: #060616;
        }

        .dark .blog-hero__title {
            color: #fff;
        }

        .blog-hero__subtitle {
            margin: 1rem 0 0;
            max-width: 760px;
            font-size: 1.05rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
        }

        .dark .blog-hero__subtitle {
            color: rgba(255, 255, 255, .66);
        }

        .blog-featured {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr);
            gap: 1.2rem;
            align-items: stretch;
            margin-bottom: 1.4rem;
        }

        .blog-featured__content,
        .blog-card {
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(247, 249, 252, .72) 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .06),
                inset 0 1px 0 rgba(255, 255, 255, .95);
            text-decoration: none;
            transition:
                transform .32s ease,
                box-shadow .32s ease,
                border-color .32s ease,
                opacity .8s cubic-bezier(.22, 1, .36, 1);
        }

        .dark .blog-featured__content,
        .dark .blog-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, .05) 0%, rgba(255, 255, 255, .03) 100%);
            border-color: rgba(255, 255, 255, .08);
            box-shadow:
                0 18px 40px rgba(0, 0, 0, .2),
                inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .blog-featured__content:hover,
        .blog-card:hover {
            transform: translateY(-6px);
            border-color: rgba(99, 102, 241, .14);
            box-shadow:
                0 24px 48px rgba(15, 23, 42, .1),
                inset 0 1px 0 rgba(255, 255, 255, .95);
        }

        .blog-featured__content {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            gap: .7rem;
            flex-wrap: wrap;
        }

        .blog-meta__pill {
            display: inline-flex;
            align-items: center;
            height: 34px;
            padding: 0 .9rem;
            border-radius: 999px;
            background: rgba(99, 102, 241, .08);
            color: #4f46e5;
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        .dark .blog-meta__pill {
            background: rgba(99, 102, 241, .16);
            color: #c7d2fe;
        }

        .blog-meta__text {
            font-size: .92rem;
            color: rgba(100, 116, 139, .9);
        }

        .dark .blog-meta__text {
            color: rgba(255, 255, 255, .5);
        }

        .blog-featured__title {
            margin: 1.25rem 0 0;
            font-size: clamp(2rem, 2vw, 3rem);
            line-height: .98;
            letter-spacing: -.065em;
            font-weight: 400;
            color: #060616;
        }

        .dark .blog-featured__title {
            color: #fff;
        }

        .blog-featured__excerpt {
            margin: 1rem 0 0;
            font-size: 1rem;
            line-height: 1.82;
            color: rgba(71, 85, 105, .92);
            max-width: 720px;
        }

        .dark .blog-featured__excerpt {
            color: rgba(255, 255, 255, .66);
        }

        .blog-featured__footer {
            margin-top: 2rem;
            display: inline-flex;
            align-items: center;
            gap: .8rem;
            font-size: 1rem;
            font-weight: 700;
            color: #060616;
        }

        .dark .blog-featured__footer {
            color: #fff;
        }

        .blog-featured__footer svg {
            width: 20px;
            height: 20px;
            transition: transform .25s ease;
        }

        .blog-featured__content:hover .blog-featured__footer svg {
            transform: translateX(4px);
        }

        .blog-featured__media {
            position: relative;
            min-height: 420px;
            overflow: hidden;
            border-radius: 30px;
            background:
                linear-gradient(135deg, #0b1020 0%, #111827 100%);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, .08),
                inset 0 1px 0 rgba(255, 255, 255, .05);
        }

        .blog-cover,
        .blog-card__cover {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: inherit;
            overflow: hidden;
        }

        .blog-cover img,
        .blog-card__cover img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .blog-cover.is-fallback,
        .blog-card__cover.is-fallback {
            background:
                radial-gradient(circle at top right, rgba(99, 102, 241, .25) 0%, rgba(99, 102, 241, 0) 34%),
                linear-gradient(135deg, #0b1020 0%, #0f172a 100%);
        }

        .blog-cover.is-fallback::before,
        .blog-card__cover.is-fallback::before {
            content: attr(data-label);
            position: absolute;
            left: 1.2rem;
            bottom: 1.2rem;
            color: #fff;
            font-size: clamp(1.2rem, 2vw, 1.8rem);
            font-weight: 600;
            letter-spacing: -.04em;
            z-index: 2;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 1.2rem;
        }

        .blog-card {
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(26px);
        }

        .blog-card.is-visible,
        .blog-featured__content.is-visible,
        .blog-featured__media.is-visible,
        .blog-section-head.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .blog-card--one {
            grid-column: span 7;
        }

        .blog-card--two {
            grid-column: span 5;
            margin-top: 2.2rem;
        }

        .blog-card--three {
            grid-column: span 5;
            margin-top: -.8rem;
        }

        .blog-card--four {
            grid-column: span 7;
            margin-top: 1.6rem;
        }

        .blog-card__cover {
            min-height: 290px;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
        }

        .dark .blog-card__cover {
            border-bottom-color: rgba(255, 255, 255, .08);
        }

        .blog-card__body {
            padding: 1.3rem 1.3rem 1.4rem;
        }

        .blog-card__title {
            margin: .95rem 0 0;
            font-size: clamp(1.35rem, 2vw, 2rem);
            line-height: 1.08;
            letter-spacing: -.045em;
            font-weight: 500;
            color: #060616;
        }

        .dark .blog-card__title {
            color: #fff;
        }

        .blog-card__excerpt {
            margin: .75rem 0 0;
            font-size: .98rem;
            line-height: 1.75;
            color: rgba(71, 85, 105, .92);
        }

        .dark .blog-card__excerpt {
            color: rgba(255, 255, 255, .66);
        }

        .blog-card__more {
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            color: #060616;
            font-size: .96rem;
            font-weight: 700;
        }

        .dark .blog-card__more {
            color: #fff;
        }

        .blog-card__more svg {
            width: 18px;
            height: 18px;
            transition: transform .25s ease;
        }

        .blog-card:hover .blog-card__more svg {
            transform: translateX(4px);
        }

        .blog-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .82s cubic-bezier(.22, 1, .36, 1),
                transform .92s cubic-bezier(.22, 1, .36, 1);
        }

        .blog-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 1279px) {
            .blog-featured {
                grid-template-columns: 1fr;
            }

            .blog-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .blog-card--one,
            .blog-card--two,
            .blog-card--three,
            .blog-card--four {
                grid-column: span 1;
                margin-top: 0;
            }
        }

        @media (max-width: 767px) {
            .blog-page {
                padding: 4.8rem 0 5.5rem;
            }

            .blog-hero__title {
                font-size: clamp(2.3rem, 11vw, 4rem);
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }

            .blog-featured__content,
            .blog-card {
                border-radius: 22px;
            }

            .blog-featured__media {
                min-height: 280px;
                border-radius: 22px;
            }

            .blog-card__cover {
                min-height: 220px;
            }

            .blog-featured__content {
                padding: 1.25rem;
            }

            .blog-card__body {
                padding: 1rem 1rem 1.1rem;
            }
        }
    </style>

    <section class="blog-page">
        <div class="blog-page__glow blog-page__glow--one"></div>
        <div class="blog-page__glow blog-page__glow--two"></div>

        <div class="site-shell">
            <section class="blog-hero blog-reveal">
                <p class="blog-hero__eyebrow">Blog</p>
                <h1 class="blog-hero__title">
                    Ideas on growth, systems,
                    <br class="hidden md:block">
                    design, and digital execution
                </h1>
                <p class="blog-hero__subtitle">
                    Insights from Nexolio IT on digital marketing, web development, AI automation,
                    lead generation, and practical AI for modern businesses.
                </p>
            </section>

            @if($featured)
                <section class="blog-featured">
                    <a href="{{ route('blog.show', $featured['slug']) }}" class="blog-featured__content blog-reveal">
                        <div>
                            <div class="blog-meta">
                                <span class="blog-meta__pill">{{ $featured['category'] }}</span>
                                <span class="blog-meta__text">{{ $featured['date'] }}</span>
                                <span class="blog-meta__text">{{ $featured['read_time'] }}</span>
                            </div>

                            <h2 class="blog-featured__title">{{ $featured['title'] }}</h2>
                            <p class="blog-featured__excerpt">{{ $featured['excerpt'] }}</p>
                        </div>

                        <span class="blog-featured__footer">
                            Read Article
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>

                    <a href="{{ route('blog.show', $featured['slug']) }}" class="blog-featured__media blog-reveal">
                        <div class="blog-cover" data-label="{{ $featured['title'] }}">
                            <img src="{{ asset($featured['cover']) }}" alt="{{ $featured['title'] }}"
                                onerror="this.parentElement.classList.add('is-fallback'); this.remove();">
                        </div>
                    </a>
                </section>
            @endif

            <section class="blog-grid">
                @foreach($others->values() as $index => $post)
                    @php
                        $cardClass = match ($index) {
                            0 => 'blog-card--one',
                            1 => 'blog-card--two',
                            2 => 'blog-card--three',
                            default => 'blog-card--four',
                        };
                    @endphp

                    <a href="{{ route('blog.show', $post['slug']) }}" class="blog-card {{ $cardClass }} blog-reveal">
                        <div class="blog-card__cover" data-label="{{ $post['title'] }}">
                            <img src="{{ asset($post['cover']) }}" alt="{{ $post['title'] }}"
                                onerror="this.parentElement.classList.add('is-fallback'); this.remove();">
                        </div>

                        <div class="blog-card__body">
                            <div class="blog-meta">
                                <span class="blog-meta__pill">{{ $post['category'] }}</span>
                                <span class="blog-meta__text">{{ $post['read_time'] }}</span>
                            </div>

                            <h2 class="blog-card__title">{{ $post['title'] }}</h2>
                            <p class="blog-card__excerpt">{{ $post['excerpt'] }}</p>

                            <span class="blog-card__more">
                                View Details
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </section>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealItems = document.querySelectorAll('.blog-reveal');

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