<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Contact</h1>
        </div>
        <div class="consplit">
            <div class="consplitl">
                <img src="{{ asset('media/cameron_headshot_2.jpg') }}" alt="">
            </div>
            <div class="consplitr">
                <div id="greeting">
                    <p>Feel free to reach out to Cameron by phone, email or the contact form below.</p>
                </div>
                <div id="phone">
                    <p>Phone:</p>
                    <h2>07581 647855</h2>
                </div>
                <div id="mail">
                    <p>Email:</p>
                    <h2>cameron.trend@gmail.com</h2>
                </div>
            </div>
        </div>
        <div class="confull">
            <div class="formcontainer">
                <form method="post" action="includes/email.php" autocomplete="off">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="example@domain.com" required>
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject" required>
                        <option value="">Please select</option>
                        <option value="Design Consultation">Design Consultation</option>
                        <option value="Garden Design">Garden Design</option>
                        <option value="Planting Plan">Planting Plan</option>
                        <option value="General Enquiry">General Enquiry</option>
                    </select>
                    <label for="message">Message</label>
                    <textarea id="body" name="body" placeholder="" style="height:200px" required></textarea>

                    <label for="subject">How did you find this website?</label>
                    <select name="" id="">
                        <option value="">Please select</option>
                        <option value="Fiend/Family">Friend/Family</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Google">Google</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="submit" name="submit" value="Send">
                </form>
            </div>
        </div>
        <div class="full" style="display: flex;">
            <a href="https://www.inchbald.co.uk" target="_blank"><img src="{{ asset('media/inchbald.jpg') }}" alt="" id="inchbald"></a>
        </div>
    </div>
</x-layout>
