<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Permissions edit</h1>
    <x-splade-form :default="$permission" :action="route('admin.permissions.update',$permission)" method="PUT" class="space-y-4 bg-white p-4 rounded-md">
        <x-splade-input name="name" label="Name"/>
        <x-splade-select name="roles[]" :options="$roles" multiple relation choices />
        <x-splade-submit/>
    </x-splade-form>

</x-admin-layout>
