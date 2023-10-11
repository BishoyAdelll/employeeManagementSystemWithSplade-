<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold py-4">All Countries </h1>
        <div class="py-4">
            <Link href="{{route('admin.countries.create')}}" class="bg-indigo-500 px-4 py-2  hover:bg-indigo-700 text-white ">Create countries</Link>
        </div>
    </div>
    <x-splade-table :for="$countries">

        @cell('action',$country )
        <div class="space-x-2">
           <Link href="{{route('admin.countries.edit',$country)}}" class=" font-semibold text-green-400">Edit</Link>
           <Link href="{{route('admin.countries.destroy',$country)}}" method="DELETE" class=" font-semibold text-red-400" confirm="Delete The country" confirm-text="Are You Sure?" confirm-button="yes" cancel-button="No">Destroy</Link>
        </div>
        @endcell

    </x-splade-table>

</x-admin-layout>
