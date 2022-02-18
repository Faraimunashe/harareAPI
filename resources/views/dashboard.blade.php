<x-app-layout>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Number</div>
                <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">{{$users}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Number</div>
                <div class="card-body">
                <h5 class="card-title">Accounts</h5>
                <p class="card-text">{{$accounts}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Number</div>
                <div class="card-body">
                <h5 class="card-title">Transactions</h5>
                <p class="card-text">{{$logs}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Number</div>
                <div class="card-body">
                <h5 class="card-title">Paynow</h5>
                <p class="card-text">{{$paynow}}</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
