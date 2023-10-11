<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Users edit</h1>
    <x-splade-form :default="$country" :action="route('admin.countries.update',$country)" method="PUT" class="space-y-4 bg-white p-4 rounded-md">
        <x-splade-input name="name" label="Name"/>
        <x-splade-input name="country_code" label="Country Code"/>
        <x-splade-submit/>
    </x-splade-form>

</x-admin-layout>

