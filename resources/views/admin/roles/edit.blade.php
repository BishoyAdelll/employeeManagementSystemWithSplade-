<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Role edit</h1>
    <x-splade-form :default="$role" :action="route('admin.roles.update',$role)" method="PUT"  class="space-y-4 bg-white p-4 rounded-md">
        <x-splade-input name="name" label="Name"/>
        <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices />
        <x-splade-submit/>
    </x-splade-form>

</x-admin-layout>
