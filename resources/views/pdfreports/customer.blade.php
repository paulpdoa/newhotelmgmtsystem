
    <div class="pdf-container">
        <h1>List of Customers</h1>
        <p>Hotel Management System</p>
        <hr/>
        <table border="1" style="border-collapse: collapse;" width="100%;">
            <tr>
                <th>Profession</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Mobile Phone</th>
                <th>Email Address</th>
            </tr>
            @foreach($customers as $customer)
            <tr>
                <th>{{ $customer->title }}</th>
                <th>{{ $customer->first_name }} {{ $customer->last_name }}</th>
                <th>{{ $customer->street }} {{ $customer->town }}, {{ $customer->province }}</th>
                <th>{{ $customer->mobile_phone }}</th>
                <th>{{ $customer->email }}</th>
            </tr>
            @endforeach
        </table>
    </div>


