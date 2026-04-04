@extends('layouts.app')

@section('content')
    <section class="legal-page">
        <div class="site-shell">
            <div class="legal-hero">
                <div>
                    <p class="legal-eyebrow">Navigation</p>
                    <h1 class="legal-title">Sitemap</h1>
                    <p class="legal-subtitle">
                        Browse all main pages, service pages, legal pages, and useful website destinations from one place.
                    </p>
                </div>

                <div class="legal-hero-card">
                    <div class="legal-hero-card__label">Quick access</div>
                    <div class="legal-hero-card__value">All pages</div>
                </div>
            </div>

            <div class="sitemap-grid">
                <div class="sitemap-card">
                    <h2>Main Pages</h2>
                    <div class="sitemap-links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('home') }}#our-work">Our Work</a>
                        <a href="{{ route('home') }}#services">Services</a>
                        <a href="{{ route('home') }}#clients">Clients</a>
                        <a href="{{ route('home') }}#contact">Contact</a>
                    </div>
                </div>

                <div class="sitemap-card">
                    <h2>Service Sections</h2>
                    <div class="sitemap-links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('our-work') }}">Our Work</a>
                        <a href="{{ route('services') }}">Services</a>
                        <a href="{{ route('clients') }}">Clients</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>

                <div class="sitemap-card">
                    <h2>Legal Pages</h2>
                    <div class="sitemap-links">
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                        <a href="{{ route('terms') }}">Terms & Conditions</a>
                        <a href="{{ route('sitemap') }}">Sitemap</a>
                    </div>
                </div>

                <div class="sitemap-card">
                    <h2>Communication</h2>
                    <div class="sitemap-links">
                        <a href="mailto:hello@nexolioit.com">Email Us</a>
                        <a href="tel:+8801978675507">Call Us</a>
                        <a href="https://wa.me/8801978675507" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection