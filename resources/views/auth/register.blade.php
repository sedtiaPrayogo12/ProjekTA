<x-guest-layout>
<body class="min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">


        <header class="max-w-lg mx-auto">
            <a href="#">
            <img style="width: 35%; margin: auto" src="img/logo.jpg" alt="logo bp">
            <h1 class="text-3xl text-gray-700 text-center">Bintang Pelajar</h1>
            </a>
        </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role_id: 1}">
            @csrf

            <div>
                <x-jet-label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Register as') }}" />
                <select name="role_id" x-model="role_id" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3">
                    <option value="1">Student</option>
                    <option value="2">Teacher</option>
                </select>
            </div>

            <div class="mt-4" x-show="role_id == 1">
                <x-jet-label for="student_grade" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Grade') }}" />
                <x-jet-input id="student_grade" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="text" name="student_class" :value="old('student_class')"  />
            </div>

            <div class="mt-4" x-show="role_id == 1">
                <x-jet-label for="students_address" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Adresses') }}" />
                <x-jet-input id="students_address" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="text" name="student_license_number" :value="old('student_license_number')" />
            </div>

            <div class="mt-4" x-show="role_id == 1">
                <x-jet-label for="students_license_number" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('License Number') }}" />
                <x-jet-input id="students_license_number" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="text" name="teacher_qualifications" :value="old('teacher_qualifications')" />
            </div>

            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="teacher_title" class="block text-gray-700 text-sm font-bold mb-2 ml-3" value="{{ __('Title') }}" />
                <x-jet-input id="teacher_title" class="block mt-1 w-full rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-900 transition duration-500 px-3 pb-3" type="text" name="teacher_qualifications" :value="old('teacher_qualifications')" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>


    </main>
</body>
</x-guest-layout>
