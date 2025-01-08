<div>
    <h2>تقرير الإجازات</h2>
    <div>
        <label>حالة الإجازة:</label>
        <select wire:model="status" wire:change="loadLeaves">
            <option value="Pending">معلقة</option>
            <option value="Approved">معتمدة</option>
        </select>
    </div>

    <table>
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>نوع الإجازة</th>
                <th>البداية</th>
                <th>النهاية</th>
                <th>الحالة</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $leave)
                <tr>
                    <td>{{ $leave->users->name }}</td>
                    <td>{{ $leave->type }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
