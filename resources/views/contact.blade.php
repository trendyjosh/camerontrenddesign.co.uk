<x-layout>
    <x-hero :page="$page" />
    <section>
        <div class="ct-text">
            <p>Feel free to reach out to Cameron by phone, email, social media or the contact form below.</p>
        </div>
    </section>
    <section class="ct-contact">
        <article>
            <p><a href="mailto:{{ $site_email }}"><i class="fa-solid fa-envelope"></i> {{ $site_email }}</a></p>
            <p><a href="tel:{{ $site_phone }}"><i class="fa-solid fa-phone"></i> {{ $site_phone }}</a></p>
            <p class="contact-info">
                <a href="https://www.facebook.com/camerontrendgardendesign" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.pinterest.co.uk/camerontrend/" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                <a href="https://www.instagram.com/camerontrenddesign/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </p>
        </article>
        <article>
            <form class="ct-form" method="post" action="{{ route('send-contact-form') }}" autocomplete="off">
                @csrf
                <label for="email">
                    <input type="text" id="email" name="email" required placeholder=" ">
                    <span>Email</span>
                </label>
                <div class="ct-select">
                    <select name="subject" id="subject" required>
                        <option value="" disabled selected>Subject...</option>
                        <option value="Design Consultation">Design Consultation</option>
                        <option value="Garden Design">Garden Design</option>
                        <option value="Planting Plan">Planting Plan</option>
                        <option value="General Enquiry">General Enquiry</option>
                    </select>
                </div>
                <label for="body">
                    <textarea id="body" name="body" placeholder=" " required></textarea>
                    <span>Message</span>
                </label>
                <div class="ct-select">
                    <select name="heard" id="heard">
                        <option value="" disabled selected>How did you find this site...</option>
                        <option value="Fiend/Family">Friend/Family</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Google">Google</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <button class="ct-btn" type="submit" name="submit">
                    Send
                </button>
                @honeypot
            </form>
        </article>
    </section>
    <section class="section-bottom">
        <a href="https://www.inchbald.co.uk" target="_blank"><img src="{{ asset('media/inchbald.jpg') }}" alt="Inchbald School of Design Logo"></a>
    </section>
</x-layout>