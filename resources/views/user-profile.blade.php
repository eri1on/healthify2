


<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')



    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
       
    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="{{ old('age', $user->age) }}" class="form-control @error('age') is-invalid @enderror">
        @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" class="form-control">
            <option value="">Select gender </option>
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
        @error('gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    
    <div class="form-group">
        <label for="height">Height:</label>
        <input type="number" id="height" name="height" value="{{ old('height', $user->height) }}" class="form-control">
        @error('height')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight" value="{{ old('weight', $user->weight) }}" class="form-control">
        @error('weight')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="goal">Goal:</label>
        <select id="goal" name="goal" class="form-control">
            <option value="">-- Select Your Goal --</option>
            <option value="lose_weight" {{ $user->goal == 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
            <option value="gain_weight" {{ $user->goal == 'gain_weight' ? 'selected' : '' }}>Gain Weight</option>
        </select>
        
        @error('goal')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    
    <div class="form-group">
        <label for="activity">Activity:</label>
        <select id="activity" name="activity" class="form-control">
            <option value="">-- Select Activity --</option>
            <option value="low_activity" {{ $user->activity == 'low_activity' ? 'selected' : '' }}>Low Activity</option>
            <option value="high_activity" {{ $user->activity == 'high_activity' ? 'selected' : '' }}>High Activity</option>
        </select>
        
        @error('activity')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>