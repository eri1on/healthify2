<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" wire:submit.prevent="signupSubmit">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input  wire:model="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input   wire:model="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input wire:model="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input wire:model="password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="age" class="col-md-4 col-form-label text-md-end">Age</label>
                    
                        <div class="col-md-6">
                            <input wire:model="age"  id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age" >
                    
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                    
                        <div class="col-md-6">
                            <select wire:model="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" >
                                <option value="">-- Select Gender --</option>
                                <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                            </select>
                    
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

<div class="row mb-3">
<label for="height" class="col-md-4 col-form-label text-md-end">{{ __('Height') }}</label>

<div class="col-md-6">
    <input wire:model="height" id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}"  autocomplete="height" >

    @error('height')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
                   
                          
<div class="row mb-3">
<label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight') }}</label>

<div class="col-md-6">
    <input wire:model="weight" id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" autocomplete="weight" >

    @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>



<div class="row mb-3">
<label for="goal" class="col-md-4 col-form-label text-md-end">{{ __('Goal') }}</label>

<div class="col-md-6">
    <select wire:model="goal" id="goal" class="form-control @error('goal') is-invalid @enderror" name="goal" >
        <option value="">-- Select Goal --</option>
        <option value="lose_weight"  {{ old('goal') == 'lose_weight' ? 'selected' : '' }}>lose weight</option>
        <option value="gain_weight"  {{ old('goal') == 'gain_weight' ? 'selected' : '' }}>gain weight</option>
    
    </select>

    @error('goal')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>

<div class="row mb-3">
<label for="activity" class="col-md-4 col-form-label text-md-end">{{ __('Activity Level') }}</label>

<div class="col-md-6">
    <select  wire:model="activity" id="activity" class="form-control @error('activity') is-invalid @enderror" name="activity" >
        <option value="">-- Select Activity --</option>
        <option value="low_activity"  {{ old('activity') == 'low_activity' ? 'selected' : '' }}>low activity</option>
        <option value="high_activity" {{ old('activity') == 'high_activity' ? 'selected' : '' }}>high activity</option>
    </select>
    <div id="errorDiv" style="color:red"></div>
    
    @error('activity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

</div>
<!--
<div wire:loading>
    Loading...
</div>
-->
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>