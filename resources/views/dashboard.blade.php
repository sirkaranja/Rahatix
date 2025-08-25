<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Personalized Greeting --}}
                    <div id="greeting-message" 
                         class="p-4 mb-4 text-lg font-semibold bg-green-100 text-green-800 rounded-lg shadow-md transition-opacity duration-1000 opacity-100">
                        {{-- This will be replaced by JS --}}
                    </div>

                    <p class="mt-2">Welcome, <strong>{{ auth()->user()->name }}</strong>!</p>

                </div>
            </div>
        </div>
    </div>

    {{-- Script for Greeting --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hours = new Date().getHours();
            let greeting = "Hello";

            if (hours < 12) {
                greeting = "Good Morning 🌅";
            } else if (hours < 18) {
                greeting = "Good Afternoon ☀️";
            } else {
                greeting = "Good Evening 🌙";
            }

            const name = @json(auth()->user()->name);
            const messageEl = document.getElementById("greeting-message");

            messageEl.innerText = `${greeting}, ${name}!`;

            // Flash effect: fade out after 5s
            setTimeout(() => {
                messageEl.style.opacity = "0";
            }, 5000);
        });
    </script>
</x-app-layout>
