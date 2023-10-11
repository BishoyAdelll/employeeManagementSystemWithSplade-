<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Create Role</h1>
    <x-splade-form  :action="route('admin.roles.store')"  class="space-y-4 bg-white p-4 rounded-md">
       <x-splade-input name="name" label="Name"/>
       <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices />
        <x-splade-select name="roles[]" :options="$roles" multiple relation choices />
       <x-splade-submit/>
   </x-splade-form>


</x-admin-layout>
