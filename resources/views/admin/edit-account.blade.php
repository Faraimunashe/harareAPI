<x-app-layout>
    <div class="row">
        <h2> Edit <b class="bg-secondary">{{$account->account_number}}</b> Account</h2>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
        <form action="{{route('post-edit-account')}}" method="POST">
            @csrf
            <input type="hidden" name="accnum" value="{{$account->account_number}}">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
                <input type="text" name="fname" value="{{$account->fname}}" class="form-control" aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
                <input type="text" name="lname" value="{{$account->lname}}" class="form-control" aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="gender" aria-label="Default select example">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                <input type="text" name="address" value="{{$account->address}}"class="form-control" aria-label="Sizing example input" required>
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-warning btn-lg">Edit Account</button>
            </div>

        </form>
    </div>
</x-app-layout>
