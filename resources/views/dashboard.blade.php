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

                    <table class="w-full table-auto border-2 border-gre">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">Name</th>
                            <th class="py-3 px-6 text-center">Current Bitcoin</th>
                            <th class="py-3 px-6 text-center">Your Bitcoins in Euros</th>
                            <th class="py-3 px-6 text-center">Actual Bitcoin Value</th>

                            <th class="py-3 px-6 text-center">Current Ethereum</th>
                            <th class="py-3 px-6 text-center">Your Ethereums in Euros</th>
                            <th class="py-3 px-6 text-center">Actual Ethereum value</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">
                                    {{$user->name}}
                                </td>
                                <td class="py-3 px-6 text-center bg-yellow-200">
                                    {{number_format($user->stock->bitcoin, 5)}} ₿
                                </td>
                                <td class="py-3 px-6 text-center bg-yellow-200">
                                    {{number_format($user->stock->bitcoin * $currency->euro_bitcoin, 2)}} €
                                </td>

                                <td class="py-3 px-6 text-center bg-yellow-200">
                                    {{number_format($currency->euro_bitcoin, 5)}} €
                                </td>

                                <td class="py-3 px-6 text-center bg-blue-200">
                                    {{number_format($user->stock->ethereum, 5)}} Ξ
                                </td>

                                <td class="py-3 px-6 text-center bg-blue-200">
                                    {{number_format($user->stock->ethereum * $currency->euro_ethereum, 2)}} €
                                </td>

                                <td class="py-3 px-6 text-center bg-blue-200">
                                    {{number_format($currency->euro_ethereum, 5)}} €
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <button id="refresh_button" type="button" class="bg-blue-500 px-4 py-2 mt-6 text-xs font-semibold tracking-wider text-white rounded hover:bg-blue-600">Refresh!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function refresh(){
        const http = new XMLHttpRequest();
        const url = "{{route('currency.update')}}";

        http.open("POST", url, true);
        http.setRequestHeader('X-CSRF-TOKEN', "{!! csrf_token() !!}")
        http.send();

        http.onreadystatechange = function (){
            if (this.readyState === 4){
                if (this.status === 200){
                    let res = JSON.parse(this.responseText)
                    // In the future we could create a div alert that would show the "message" of the json.
                    // To simplify we reload the page.
                    window.location.reload()
                } else {
                    console.log('Error: status ' + this.status)
                }
            }

        }
    }
    document.getElementById("refresh_button").addEventListener("click", refresh)
</script>
