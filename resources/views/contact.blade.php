<x-app-layout>

    <x-slot:header>
        <x-page-heading style="background-image: url({{ Vite::asset('resources/assets/img/contact-bg.jpg')}})">
            <div class="page-heading">
                <h1>Contact Us</h1>
                <span class="subheading">Have questions? I have answers.</span>
            </div>
        </x-page-heading>
    </x-slot:header>

    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as
        soon
        as possible!</p>
    <div class="my-5">
        <x-forms.form action="{{route('contact')}}" method="POST">

            <x-forms.success name="message-sent" />

            <x-forms.field>
                <x-forms.input id="name" name="name" type="text" placeholder="Enter your name..." />
                <x-forms.label for="name">Name</x-forms.label>
                <x-forms.error name="name" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="email" name="email" type="email" placeholder="Enter your email..." />
                <x-forms.label for="email">Email address</x-forms.label>
                <x-forms.error name="email" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="phone" name="phone" type="tel" placeholder="Enter your phone number..." />
                <x-forms.label for="phone">Phone Number</x-forms.label>
                <x-forms.error name="phone" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input field="textarea" id="message" name="message" placeholder="Enter your message here...">
                </x-forms.input>
                <x-forms.label for="message">Message</x-forms.label>
                <x-forms.error name="message" />
            </x-forms.field>

            <x-forms.divider />

            <x-forms.button>Send</x-forms.button>

        </x-forms.form>
    </div>

</x-app-layout>
