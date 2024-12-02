<x-guest-layout>
    <div class="my-5 w-50 bg-white p-5 rounded-3">
        <h1 class="text-center">Login</h1>

        <x-forms.form action="{{route('login')}}" method="POST">

            <x-forms.field>
                <x-forms.input id="email" name="email" type="email" placeholder="Enter your email..." />
                <x-forms.label for="email">Email address</x-forms.label>
                <x-forms.error name="email" />
            </x-forms.field>

            <x-forms.field>
                <x-forms.input id="password" name="password" type="password" placeholder="Enter your password..." />
                <x-forms.label for="password">Password</x-forms.label>
            </x-forms.field>

            <x-forms.divider />

            <x-forms.button>Login</x-forms.button>

            <x-forms.link href="{{route('register')}}">
                <x-slot:description>Don't have an account?</x-slot:description>
                Register
            </x-forms.link>

        </x-forms.form>

    </div>
</x-guest-layout>