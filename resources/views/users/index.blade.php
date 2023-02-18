<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{route('users.create')}}" class="bg-green-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Users</a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Name</th>
                            <th class="border px-6 py-4">Email</th>
                            <th class="border px-6 py-4">Roles</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="border px-6 py-4 text-center">{{$user->id}}</td>
                                <td class="border px-6">{{$user->name}}</td>
                                <td class="border px-6">{{$user->email}}</td>
                                <td class="border px-6 text-center">{{$user->roles}}</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{route('users.edit', $user->id)}}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit</a>
                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        @csrf
                                        <button type="submit" href="{{route('users.edit', $user->id)}}" class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty  
                            <tr>
                                <td colspan="5" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>    
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{$users->links()}}
            </div>
        </div>
    </div>
</x-app-layout>