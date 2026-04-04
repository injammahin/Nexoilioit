@extends('layouts.app')

@section('content')
    <section class="legal-page">
        <div class="site-shell">
            <div class="legal-hero">
                <div>
                    <p class="legal-eyebrow">Legal</p>
                    <h1 class="legal-title">Privacy Policy</h1>
                    <p class="legal-subtitle">
                        This page explains how Nexolio IT collects, uses, stores, and protects information when users
                        interact with our website, products, and services.
                    </p>
                </div>

                <div class="legal-hero-card">
                    <div class="legal-hero-card__label">Last updated</div>
                    <div class="legal-hero-card__value">{{ now()->format('F d, Y') }}</div>
                </div>
            </div>

            <div class="legal-layout">
                <aside class="legal-sidebar">
                    <div class="legal-nav-card">
                        <div class="legal-nav-title">On this page</div>
                        <a href="#introduction" class="legal-nav-link">Introduction</a>
                        <a href="#information-we-collect" class="legal-nav-link">Information We Collect</a>
                        <a href="#how-we-use-data" class="legal-nav-link">How We Use Data</a>
                        <a href="#data-sharing" class="legal-nav-link">Data Sharing</a>
                        <a href="#data-security" class="legal-nav-link">Data Security</a>
                        <a href="#cookies" class="legal-nav-link">Cookies</a>
                        <a href="#your-rights" class="legal-nav-link">Your Rights</a>
                        <a href="#retention" class="legal-nav-link">Retention</a>
                        <a href="#contact-us" class="legal-nav-link">Contact Us</a>
                    </div>
                </aside>

                <div class="legal-content">
                    <section id="introduction" class="legal-card">
                        <h2>Introduction</h2>
                        <p>
                            Nexolio IT respects your privacy. We are committed to handling personal and business data
                            responsibly and transparently. This Privacy Policy describes what information we collect,
                            why we collect it, and how we use it across our website, consultation process, software
                            services, and communication channels.
                        </p>
                    </section>

                    <section id="information-we-collect" class="legal-card">
                        <h2>Information We Collect</h2>
                        <p>We may collect the following categories of information:</p>
                        <ul>
                            <li>Name, company name, job title, and contact details</li>
                            <li>Project requirements, inquiry details, and business communication</li>
                            <li>Technical data such as browser type, device type, IP address, and usage logs</li>
                            <li>Information submitted through forms, email, WhatsApp, or meetings</li>
                            <li>Files, media, and business documents shared during project discussion</li>
                        </ul>
                    </section>

                    <section id="how-we-use-data" class="legal-card">
                        <h2>How We Use Data</h2>
                        <p>We use collected information to:</p>
                        <ul>
                            <li>Respond to inquiries and provide quotations or consultation</li>
                            <li>Deliver software, design, development, and support services</li>
                            <li>Improve website performance, usability, and security</li>
                            <li>Maintain communication regarding projects, updates, and support requests</li>
                            <li>Comply with legal, contractual, and operational obligations</li>
                        </ul>
                    </section>

                    <section id="data-sharing" class="legal-card">
                        <h2>Data Sharing</h2>
                        <p>
                            We do not sell personal data. We may share limited information with trusted service providers
                            or infrastructure partners only where necessary to operate our services, host systems, process
                            communication, or maintain security. Any such sharing is limited to legitimate business use.
                        </p>
                    </section>

                    <section id="data-security" class="legal-card">
                        <h2>Data Security</h2>
                        <p>
                            We apply reasonable technical and organizational measures to protect information against
                            unauthorized access, misuse, alteration, or loss. While no online system can guarantee
                            absolute security, we continuously work to maintain safe and reliable handling practices.
                        </p>
                    </section>

                    <section id="cookies" class="legal-card">
                        <h2>Cookies and Analytics</h2>
                        <p>
                            Our website may use cookies or similar technologies to improve browsing experience,
                            remember preferences, and understand website usage trends. You can manage or disable
                            cookies through your browser settings.
                        </p>
                    </section>

                    <section id="your-rights" class="legal-card">
                        <h2>Your Rights</h2>
                        <p>Depending on your location and applicable law, you may have rights to:</p>
                        <ul>
                            <li>Request access to your personal data</li>
                            <li>Request correction of inaccurate information</li>
                            <li>Request deletion of data where applicable</li>
                            <li>Object to certain uses of your data</li>
                            <li>Request clarification about how your data is processed</li>
                        </ul>
                    </section>

                    <section id="retention" class="legal-card">
                        <h2>Data Retention</h2>
                        <p>
                            We retain information only for as long as necessary for project delivery, support,
                            security, recordkeeping, or legal compliance. Retention periods may vary depending
                            on the nature of the engagement and applicable requirements.
                        </p>
                    </section>

                    <section id="contact-us" class="legal-card">
                        <h2>Contact Us</h2>
                        <p>
                            For privacy-related questions, data access requests, or any concern regarding this policy,
                            you may contact Nexolio IT using the details available on our Contact page.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection