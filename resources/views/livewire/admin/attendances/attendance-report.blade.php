<div>
    <h2>تقرير الحضور</h2>
    <div>
        <label>تقرير يومي:</label>
        <input type="date" wire:model="date" wire:change="loadDailyReport">
    </div>

    <div>
        <label>تقرير شهري:</label>
        <input type="month" wire:model="month" wire:change="loadMonthlyReport">
    </div>

    <table>
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>التاريخ</th>
                <th>الحالة</th>
                <th>وقت الدخول</th>
                <th>وقت الخروج</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->users->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
