<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>Transaction List</h1>
        <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Account#</th>
                        <th>Activity</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Start Balance</th>
                        <th>End Balance</th>
                        <th>Status</th>
                        <th>Reference</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $item)
                        <tr>
                            <td>{{$item->account_number}}</td>
                            <td>{{$item->action}}</td>
                            <td>{{$item->method}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->start_balance}}</td>
                            <td>{{$item->start_balance}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->reference}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Account#</th>
                        <th>Activity</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Start Balance</th>
                        <th>End Balance</th>
                        <th>Status</th>
                        <th>Reference</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</x-app-layout>
