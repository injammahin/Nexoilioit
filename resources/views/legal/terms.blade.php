@extends('layouts.app')

@section('content')
    <section class="legal-page">
        <div class="site-shell">
            <div class="legal-hero">
                <div>
                    <p class="legal-eyebrow">Legal</p>
                    <h1 class="legal-title">Terms & Conditions</h1>
                    <p class="legal-subtitle">
                        These terms govern the use of the Nexolio IT website, project discussions, software services,
                        design work, development services, and related deliverables.
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
                        <a href="#acceptance" class="legal-nav-link">Acceptance</a>
                        <a href="#services" class="legal-nav-link">Services</a>
                        <a href="#client-responsibility" class="legal-nav-link">Client Responsibility</a>
                        <a href="#payments" class="legal-nav-link">Payments</a>
                        <a href="#intellectual-property" class="legal-nav-link">Intellectual Property</a>
                        <a href="#delivery" class="legal-nav-link">Delivery</a>
                        <a href="#support" class="legal-nav-link">Support</a>
                        <a href="#limitations" class="legal-nav-link">Limitations</a>
                        <a href="#changes" class="legal-nav-link">Changes</a>
                        <a href="#contact" class="legal-nav-link">Contact</a>
                    </div>
                </aside>

                <div class="legal-content">
                    <section id="acceptance" class="legal-card">
                        <h2>Acceptance of Terms</h2>
                        <p>
                            By accessing this website or engaging Nexolio IT for services, you agree to these
                            Terms & Conditions. If you do not agree, you should not use our website or services.
                        </p>
                    </section>

                    <section id="services" class="legal-card">
                        <h2>Services</h2>
                        <p>
                            Nexolio IT may provide web design, software development, mobile application development,
                            UI/UX services, consultation, maintenance, hosting coordination, and related digital
                            solutions depending on project scope and mutual agreement.
                        </p>
                    </section>

                    <section id="client-responsibility" class="legal-card">
                        <h2>Client Responsibility</h2>
                        <p>Clients are responsible for:</p>
                        <ul>
                            <li>Providing accurate project requirements and timely feedback</li>
                            <li>Supplying lawful content, assets, and credentials where needed</li>
                            <li>Ensuring they have rights to use submitted materials</li>
                            <li>Reviewing deliverables and approvals within agreed timelines</li>
                        </ul>
                    </section>

                    <section id="payments" class="legal-card">
                        <h2>Payments and Commercial Terms</h2>
                        <p>
                            Project fees, milestones, payment schedules, and revisions are governed by proposal,
                            quotation, or agreement. Unless otherwise stated, work may begin only after the agreed
                            advance payment is received.
                        </p>
                    </section>

                    <section id="intellectual-property" class="legal-card">
                        <h2>Intellectual Property</h2>
                        <p>
                            Unless otherwise agreed in writing, intellectual property ownership transfers according
                            to the approved project terms and payment completion status. Nexolio IT may retain rights
                            to reusable frameworks, internal tools, methodologies, and non-exclusive components.
                        </p>
                    </section>

                    <section id="delivery" class="legal-card">
                        <h2>Delivery and Timelines</h2>
                        <p>
                            Estimated delivery dates depend on scope clarity, client responsiveness, content readiness,
                            and technical requirements. Delays caused by change requests, missing materials, or slow
                            approvals may affect timelines.
                        </p>
                    </section>

                    <section id="support" class="legal-card">
                        <h2>Maintenance and Support</h2>
                        <p>
                            Post-delivery support, updates, and maintenance are provided according to the agreed scope.
                            Support outside the original scope may require additional charges or a separate agreement.
                        </p>
                    </section>

                    <section id="limitations" class="legal-card">
                        <h2>Limitation of Liability</h2>
                        <p>
                            Nexolio IT shall not be liable for indirect, incidental, or consequential losses arising
                            from the use of the website or delivered systems, except where liability cannot be excluded
                            under applicable law.
                        </p>
                    </section>

                    <section id="changes" class="legal-card">
                        <h2>Changes to Terms</h2>
                        <p>
                            We may update these Terms & Conditions from time to time. Updated versions will be
                            published on this page, and continued use of the website or services implies acceptance
                            of the revised terms.
                        </p>
                    </section>

                    <section id="contact" class="legal-card">
                        <h2>Contact</h2>
                        <p>
                            For legal, commercial, or service-related questions regarding these terms, please contact
                            Nexolio IT through the official communication details available on the website.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection