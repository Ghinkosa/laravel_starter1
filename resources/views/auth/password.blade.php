<!-- resources/views/auth/passwords/change.blade.php -->

<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white text-center py-4 px-6">
                    {{ __('Change Password') }}
                </div>

                <div class="p-6">
                    @if (session('status'))
                        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password_update') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="current_password" class="block text-gray-700">{{ __('Current Password') }}</label>
                            <input id="current_password" type="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('current_password') border-red-500 @enderror" name="current_password" required autocomplete="current-password">

                            @error('current_password')
                                <span class="text-red-500 text-sm mt-1 block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="new_password" class="block text-gray-700">{{ __('New Password') }}</label>
                            <input id="new_password" type="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 @error('new_password') border-red-500 @enderror" name="new_password" required autocomplete="new-password">

                            @error('new_password')
                                <span class="text-red-500 text-sm mt-1 block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="new_password_confirmation" class="block text-gray-700">{{ __('Confirm New Password') }}</label>
                            <input id="new_password_confirmation" type="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" name="new_password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                {{ __('Change Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
