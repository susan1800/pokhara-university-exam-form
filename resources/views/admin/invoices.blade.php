<table border="1">
    <tr>
        <th>name</th>
        @foreach ($levels as $level)
        <th colspan = '6'>{{$level->level}}</th>
        @endforeach
    </tr>

    <tr>
        <th></th>

        @foreach ($subjects as $subject)

        <th>{{$subject->subject}}</th>

        @endforeach



    </tr>
    @foreach ($formdatas as $formdata)
    @php
            $totalsubject = [];
        @endphp
    @foreach ($formdata->subject as $regular)

        @php
            array_push($totalsubject,$regular->subject_id)
        @endphp

    @endforeach
    @foreach ($formdata->backsubject as $back)

        @php
            array_push($totalsubject,$back->subject_id)
        @endphp

    @endforeach


    @php
        array_unique($totalsubject);
        // collect($totalsubject)->sortByAsc('key') ;
        // collect($totalsubject)->sortBy('Key','ASC')
        ksort($totalsubject)

    @endphp

    <tr>
        <td>{{$formdata->userdetail->name}} </td>

        @foreach ($subjects as $subject)
        @php
            $i=0;
        @endphp
        @foreach ($totalsubject as $abc)

            @if($abc ==$subject->id)
                <td>1</td>
                @php
                    $i=1;
                    break;
                @endphp
            @endif
        @endforeach
        @if ($i==0)
        <td></td>

        @endif
        @endforeach
    </tr>
    @endforeach
</table>
