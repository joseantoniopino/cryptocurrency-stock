<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">Name</th>
                            <th class="py-3 px-6 text-center">Current Bitcoin</th>
                            <th class="py-3 px-6 text-center">Current Ethereum</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">
                                    {{$user->name}}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{$user->stock->bitcoin}} ₿
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{$user->stock->ethereum}} Ξ
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="bg-blue-500 px-4 py-2 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600">Refresh!</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
