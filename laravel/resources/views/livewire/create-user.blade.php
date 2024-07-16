<div class="mt-5 row">


    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>User : {{ $usersCount }}</h3>

            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>fullname</td>
                        <td>email</td>
                        <td>profile</td>
                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <img class="w-100" src="{{ asset('storage/' . $user->profile) }}" alt="">
                            </td>
                        </tr>
                    @endforeach

                    
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Create User</h2>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="" wire:submit="createUser" >
                    <div class="form-floating mb-3">
                        <input wire:model="fullname" type="text" class="form-control" id="floatingFullname"
                            placeholder="fullname">
                        <label for="floatingFullname">
                            Fullname
                        </label>

                        @error('fullname')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model="email" type="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>

                        @error('email')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model="password" type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>

                        @error('password')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <input wire:model="profile" accept=".jpg , .jpeg, .png" type="file" class="form-control"
                            id="floatingProfile" placeholder="Profile">

                        @error('profile')
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-success">submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- <h1>hello livewire component</h1> --}}

</div>
