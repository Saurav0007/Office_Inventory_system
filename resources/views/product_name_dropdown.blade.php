@if (!empty($value))
    @foreach ($value as $val)
        <option value="{{ $val['pr_name'] }}">{{ $val['pr_name'] }}</option>
    @endforeach

@endif
