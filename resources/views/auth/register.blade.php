<x-guest-layout>
    <div class="my-5 w-50 bg-white p-5 rounded-3">
        <h1 class="text-center">Register</h1>

        <x-forms.form action="{{route('register')}}" method="POST">

            <x-forms.field>
                <x-forms.input id="email" name="email" type="email" placeholder="Enter your email..." />
                <x-forms.label for="email">Email address</x-forms.label>
                <x-forms.error name="email" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="name" name="name" type="name" placeholder="Enter your name..." />
                <x-forms.label for="name">Name</x-forms.label>
                <x-forms.error name="name" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="password" name="password" type="password" placeholder="Enter your password..." />
                <x-forms.label for="password">Password</x-forms.label>
                <x-forms.error name="password" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Retype your password..." />
                <x-forms.label for="password_confirmation">Confirm Password</x-forms.label>
                <x-forms.error name="password_confirmation" />
            </x-forms.field>

            <x-forms.divider />

            <x-forms.button>Register</x-forms.button>

            <x-forms.link href="{{route('login')}}">
                <x-slot:description>Already have an account?</x-slot:description>
                Login
            </x-forms.link>

        </x-forms.form>

    </div>
</x-guest-layout>