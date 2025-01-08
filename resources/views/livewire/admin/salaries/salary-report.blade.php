<div>
    <h2>تقرير الرواتب</h2>
    <div>
        <label>الشهر:</label>
        <select wire:model="month" wire:change="loadSalaries">
            @foreach (range(1, 12) as $m)
                <option value="{{ sprintf('%02d', $m) }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
            @endforeach
        </select>
        <label>السنة:</label>
        <input type="number" wire:model="year" wire:change="loadSalaries">
    </div>

    <table>
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>الشهر</th>
                <th>السنة</th>
                <th>الراتب الأساسي</th>
                <th>المكافآت</th>
                <th>الخصومات</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $salary)
                <tr>
                    <td>{{ $salary->users->name }}</td>
                    <td>{{ date('F', mktime(0, 0, 0, $salary->month, 10)) }}</td>
                    <td>{{ $salary->year }}</td>
                    <td>{{ $salary->base_salary }}</td>
                    <td>{{ $salary->bonus }}</td>
                    <td>{{ $salary->deductions }}</td>
                    <td>{{ $salary->base_salary + $salary->bonus - $salary->deductions }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
