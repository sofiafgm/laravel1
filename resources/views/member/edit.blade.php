<x-app-layout>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="form-wrapper">
            <div class="header-wrapper">
                <h1 class="headline">
                    Modificar Miembro
                </h1>
                <div class="back-link">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="form-body">
                <form action="{{ route('member.update', $member->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $member->first_name }}">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $member->last_name }}">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Correo Electronico</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $member->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gender" class="col-md-4 col-form-label text-md-end text-start">Genero</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ $member->gender }}">
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <input type="hidden" id="ip_address" name="ip_address" value="1.1.1.1">

                    <div class="mb-3 row">
                        <input type="submit" class="btn btn-blue" value="Actualizar Miembro">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
</x-app-layout>