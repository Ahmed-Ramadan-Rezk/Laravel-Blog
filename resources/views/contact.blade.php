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
        <form action="{{route('contact')}}" method="POST">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="form-floating">
                <input class="form-control" name="name" type="text" placeholder="Enter your name..."
                    data-sb-validations="required" />
                <div class="text-danger sm pt-2">{{ $errors->first('name') }}</div>
                <label for="name">Name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-floating">
                <input class="form-control" name="email" type="email" placeholder="Enter your email..."
                    data-sb-validations="required,email" />
                <div class="text-danger sm pt-2">{{ $errors->first('email') }}</div>
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                </div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-floating">
                <input class="form-control" name="phone" type="tel" placeholder="Enter your phone number..."
                    data-sb-validations="required" />
                <div class="text-danger sm pt-2">{{ $errors->first('phone') }}</div>
                <label for="phone">Phone Number</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                    required.
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="message" placeholder="Enter your message here..."
                    style="height: 12rem" data-sb-validations="required"></textarea>
                <div class="text-danger sm pt-2">{{ $errors->first('message') }}</div>
                <label for="message">Message</label>
                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                </div>
            </div>
            <br />
            <!-- Submit Button-->
            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
        </form>
    </div>

</x-app-layout>