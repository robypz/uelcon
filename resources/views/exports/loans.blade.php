<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>MONTO BRUTO</th>
            <th>COMISION FLAG</th>
            <th>MONTO NETO</th>
            <th>CUOTAS</th>
            <th>INTERES TOTAL</th>
            <th>RENDIMIENTO</th>

        </tr>
    </thead>
    <tbody>
        @php
            $flag = 0;
            $performance = 0;
        @endphp
        @foreach ($loans as $loan)
            @php
                $interest = 0;
            @endphp
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->gross_amount }}</td>
                <td>{{ $loan->flat_commission }}</td>
                <td>{{ $loan->net_amount }}</td>
                <td>{{ $loan->fees()->count() }}</td>
                @foreach ($loan->fees as $fee)
                    @php
                        $interest += $fee->interest_amount;
                    @endphp
                @endforeach
                <td>{{ $interest }}</td>
                <td>{{ $interest + $loan->flat_commission }}</td>
            </tr>
            @php
                $flag += $loan->flat_commission;
            @endphp
            @php
                $performance += $interest;
            @endphp
        @endforeach
        <tr>
            <td colspan="3">
                {{ $flag }}
            </td>
            <td colspan="3">
                {{ $performance }}
            </td>
            <td>
                {{ $performance + $flag }}
            </td>
        </tr>
    </tbody>
</table>
